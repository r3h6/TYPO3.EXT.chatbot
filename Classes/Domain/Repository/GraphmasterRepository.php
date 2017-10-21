<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Repository;

use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;
use TYPO3\CMS\Core\Database\ConnectionPool;
use R3H6\Chatbot\Domain\Parser\AimlParser;
use R3H6\Chatbot\Domain\Model\Bot;
use R3H6\Chatbot\Domain\Resource\Aiml;
use R3H6\Chatbot\Domain\Resource\AimlCategory;
use R3H6\Chatbot\Domain\Resource\AimlPath;
use R3H6\Chatbot\Domain\Graphmaster\Match;

/***
 *
 * This file is part of the "Chatbot" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 R3 H6 <r3h6@outlook.com>
 *
 ***/

/**
 * The repository for Graphmasters
 */
class GraphmasterRepository
{
    const TABLE_NAME = 'tx_chatbot_domain_model_graphmaster';

    /**
     * @var \R3H6\Chatbot\Domain\Model\Bot
     */
    protected $bot;

    /**
     * @var \TYPO3\CMS\Core\Database\Connection
     */
    protected $connection;

    public function __construct(Bot $bot)
    {
        $this->bot = $bot;
        $this->connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable(self::TABLE_NAME);
    }

    public function walk(AimlPath $path)
    {
        $this->time = time();

        $match = new Match();
        $this->_walk($match, $path, 0, 0, false);
        return $match;
    }

    private function _walk(Match $match, AimlPath $path, int $depth, int $parentWordUid, bool $wildcard)
    {
        if (time() - $this->time > 3) {
            throw new \Exception("Timeout", 1);

        }

        if ($depth+1 > count($path)) {
            return;
        }

        $isLastWord = ($depth+1 >= count($path));
        $word = $path->getWord($depth);
        $pathType = $path->indexToType($depth);

        if (strpos(AimlPath::WILCARDS, $word) === false) {
            $sequence = [
                AimlPath::WORD_PRIORITY_PREFIX.$word,
                AimlPath::WILDCARD_HIGHER_PRIORITY,
                AimlPath::WILDCARD_HIGH_PRIORITY,
                $word,
                AimlPath::WILDCARD_LOW_PRIORITY,
                AimlPath::WILDCARD_LOWER_PRIORITY,
            ];
        } else {
            $sequence = [$word];
        }

        $this->getLogger()->error("Start $word, d $depth, p $parentWordUid, w $wildcard, l $isLastWord");

        foreach ($sequence as $searchWord) {

            $this->getLogger()->error($searchWord);

            $record = $this->findNode($searchWord, $parentWordUid);
            if ($record === false) {
                continue;
            }
            $this->getLogger()->error('Found', $record);

            if ($isLastWord){
                $match->setTemplate($record);
                return true;
            }

            $ret = null;
            if (strpos(AimlPath::WILCARDS_ZERO_PLUS, $searchWord) !== false) {
                // $match = clone $match;
                $ret = $this->_walk($match, $path, $depth, $record['uid'], true);
            }
            if ($ret === null) {
                // $match = clone $match;
                $match->setStar($word, $pathType);
                $ret = $this->_walk($match, $path, $depth + 1, $record['uid'], true);
            }

            if ($ret) {
                return $ret;
            }
        }

        if ($wildcard) {
            // $match = clone $match;
            $match->setStar($word, $pathType);
            $ret = $this->_walk($match, $path, $depth + 1, $parentWordUid, $wildcard);
            if ($ret) {
                return $ret;
            }
        }

        $this->getLogger()->error("End $word");
        return;
    }

    public function importAiml(Aiml $aiml)
    {
        $signalSlotDispatcher = $this->getSignalSlotDispatcher();
        $signalSlotDispatcher->connect(AimlParser::class, AimlParser::SIGNAL_ON_CATEGORY_END, $this, 'importCategory');

        $parser = $this->getAimlParser();
        $parser->parse($aiml);
    }

    public function importCategory(AimlCategory $category)
    {
        $path = $category->getPath();
        $currentWordUid = 0;
        foreach ($path as $word) {
            $record = $this->findNode($word, $currentWordUid);
            if (is_array($record)) {
                $currentWordUid = $record['uid'];
            } else {
                $currentWordUid = $this->addNode($word, $currentWordUid);
            }
        }


        $con = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tx_chatbot_domain_model_template');
        $con->insert(
            'tx_chatbot_domain_model_template',
            [
                'template' => $category->getTemplate(),
                'bot' => (int) $this->bot->getUid()
            ]
        );
        $templateUid = (int) $con->lastInsertId();

        $this->connection->update(
            self::TABLE_NAME,
            ['template' => $templatUid],
            ['uid' => $currentWordUid]
        );
    }

    private function addNode(string $word, int $previousWord): int
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->insert(self::TABLE_NAME)
            ->values([
                'word' => $word,
                'parent' => $previousWord,
                'bot' => $this->bot->getUid()
            ])
            ->execute();

        return (int) $this->connection->lastInsertId();
    }

    private function findNode(string $word, int $previousWord)
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        return $queryBuilder
            ->select('*')
            ->from(self::TABLE_NAME)
            ->where(
                $queryBuilder->expr()->eq('word', $queryBuilder->createNamedParameter($word)),
                $queryBuilder->expr()->eq('parent', $queryBuilder->createNamedParameter($previousWord, \PDO::PARAM_INT)),
                $queryBuilder->expr()->eq('bot', $queryBuilder->createNamedParameter($this->bot->getUid(), \PDO::PARAM_INT))
            )
            ->setMaxResults(1)
            ->execute()
            ->fetch();
    }

    /**
     * @return \TYPO3\CMS\Extbase\SignalSlot\Dispatcher
     */
    protected function getSignalSlotDispatcher(): Dispatcher
    {
        return GeneralUtility::makeInstance(ObjectManager::class)->get(Dispatcher::class);
    }

    /**
     * @return \R3H6\Chatbot\Domain\Parser\AimlParser
     */
    protected function getAimlParser(): AimlParser
    {
        return GeneralUtility::makeInstance(ObjectManager::class)->get(AimlParser::class);
    }

    /**
     * Get class logger
     *
     * @return TYPO3\CMS\Core\Log\Logger
     */
    protected function getLogger (){
        return GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);
    }
}

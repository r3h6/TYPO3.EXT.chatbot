<?php
namespace R3H6\Chatbot\Domain;

use R3H6\Chatbot\Domain\Model\Bot;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

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
 * Graphmaster
 */
class Graphmaster implements GraphmasterInterface
{
    /**
     * @var \R3H6\Chatbot\Domain\Graphmaster\GraphmasterInterface
     */
    protected $concreteGraphmaster;

    public function __construct(Bot $bot)
    {

    }

    public function walk(AimlPath $path):Match
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
                $
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

    public function importAiml(Bot $bot, Aiml $aiml)
    {
        $signalSlotDispatcher = $this->getSignalSlotDispatcher();
        $signalSlotDispatcher->connect(AimlParser::class, AimlParser::SIGNAL_ON_CATEGORY_END, $this, 'importCategory');

        $parser = $this->getAimlParser();
        $parser->parse($aiml);
    }

    public function importCategory(Bot $bot, AimlCategory $category)
    {
        $path = $category->getPath();
        $parentNode = $this->getRootNode();
        foreach ($path as $word) {
            $node = $this->findNode($word, $parentNode);
            if ($node) {
                $parentNode = $node;
            } else {
                $newNode = $this->createNode();
                $newNode->setWord($word);
                $newNode->setParentNode($parentNode);
                $this->addNode($newNode);
                $parentNode = $newNode;
            }
        }


        // $con = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tx_chatbot_domain_model_template');
        // $con->insert(
        //     'tx_chatbot_domain_model_template',
        //     [
        //         'template' => $category->getTemplate(),
        //         'bot' => (int) $this->bot->getUid()
        //     ]
        // );
        // $templateUid = (int) $con->lastInsertId();

        // $this->connection->update(
        //     self::TABLE_NAME,
        //     ['template' => $templatUid],
        //     ['uid' => $currentWordUid]
        // );
    }

    public function addNode(Bot $bot, NodeInterface $node)
    {
        $this->concreteGraphmaster->addNode($node);
    }

    public function findNode(Bot $bot, string $word, NodeInterface $parentNode): NodeInterface
    {
        return $this->concreteGraphmaster->findNode($word, $parentNode);
    }

    public function getRootNode(): NodeInterface
    {
        return $this->concreteGraphmaster->getRoodNode();
    }

    public function createNode(): NodeInterface
    {
        return $this->concreteGraphmaster->createNode();
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

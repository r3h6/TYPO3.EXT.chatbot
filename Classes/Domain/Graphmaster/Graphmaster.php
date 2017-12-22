<?php
namespace R3H6\Chatbot\Domain\Graphmaster;

use R3H6\Chatbot\Domain\Model\Bot;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use R3H6\Chatbot\Domain\Repository\GraphmasterRepository;
use R3H6\Chatbot\Domain\Resource\AimlCategory;
use R3H6\Chatbot\Domain\Resource\Aiml;
use R3H6\Chatbot\Domain\Resource\AimlPath;
use R3H6\Chatbot\Domain\Parser\AimlParser;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;

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

    protected $bot;

    /**
     * @var \TYPO3\CMS\Core\Log\Logger
     */
    protected $logger;

    public function __construct(Bot $bot)
    {
        $this->concreteGraphmaster = GeneralUtility::makeInstance(ObjectManager::class)->get(GraphmasterRepository::class);
        $this->setBot($bot);
        $this->logger = $this->getLogger();
    }

    public function setBot(Bot $bot)
    {
        $this->concreteGraphmaster->setBot($bot);
    }

    public function walk(AimlPath $path):Match
    {
        $this->time = time();

        $rootNode = $this->getRootNode();
        $match = new Match();
        $this->_walk($match, $path, 0, $rootNode, false);
        return $match;
    }

    private function _walk(Match $match, AimlPath $path, int $depth, NodeInterface $parentNode, bool $wildcard): bool
    {
        if (time() - $this->time > 3) {
            throw new \Exception("Timeout", 1);

        }

        if ($depth+1 > count($path)) {
            return false;
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

        $this->getLogger()->error("Start $word, d $depth, p $parentNode, w $wildcard, l $isLastWord");

        foreach ($sequence as $searchWord) {

            $this->getLogger()->error($searchWord);

            $node = $this->findNode($searchWord, $parentNode);

            if ($node === null) {
                $this->logger->error('Continue...');
                continue;
            }
            $this->getLogger()->error('Found', [$node]);

            if ($isLastWord){
                $match->setTemplate($node->getTemplate());
                return true;
            }

            if (strpos(AimlPath::WILCARDS_ZERO_PLUS, $searchWord) !== false) {
                // $match = clone $match;
                if ($this->_walk($match, $path, $depth, $node, true)) {
                    return true;
                }
            }
                // $match = clone $match;
            $match->setStar($word, $pathType);
            if ($this->_walk($match, $path, $depth + 1, $node, true)) {
                return true;
            }
        }

        if ($wildcard) {
            // $match = clone $match;
            $match->setStar($word, $pathType);
            if ($this->_walk($match, $path, $depth + 1, $parentNode, $wildcard)) {
                return true;
            }
        }

        $this->getLogger()->error("End $word");
        return false;
    }

    public function importAimlif(Aimlif $aimlif)
    {
        $path = $aimlif->getPatternPath();
        $parentNode = $this->getRootNode();
        foreach ($path as $word) {
            $node = $this->findNode($word, $parentNode);
            if ($node) {
                $parentNode = $node;
            } else {
                $newNode = $this->createNode();
                $newNode->setWord($word);
                $newNode->setParentNode($parentNode);
                $this->setNode($newNode);
                $parentNode = $newNode;
            }
        }
        $lastNode = $parentNode;
        // add aimlif
    }

    // public function importAiml(Aiml $aiml)
    // {
    //     $signalSlotDispatcher = $this->getSignalSlotDispatcher();
    //     $signalSlotDispatcher->connect(AimlParser::class, AimlParser::SIGNAL_ON_CATEGORY_END, $this, 'importCategory');

    //     $parser = $this->getAimlParser();
    //     $parser->parse($aiml);
    // }

    // public function importCategory(AimlCategory $category)
    // {
    //     $path = $category->getPath();
    //     $parentNode = $this->getRootNode();
    //     foreach ($path as $word) {

    //         $this->logger->error($word);

    //         $node = $this->findNode($word, $parentNode);
    //         if ($node) {
    //             $parentNode = $node;
    //         } else {
    //             $newNode = $this->createNode();
    //             $newNode->setWord($word);
    //             $newNode->setParentNode($parentNode);
    //             $this->setNode($newNode);
    //             $parentNode = $newNode;
    //         }
    //     }

    //     $aiml = $category->getTemplate();

    //     $newTemplate = $this->createTemplate();
    //     $newTemplate->setPath($path);
    //     $newTemplate->setAiml($aiml);

    //     if ($parentNode->hasTemplate()) {
    //         $policy = MergePolicy::cast(MergePolicy::KEEP_FIRST);
    //         $template = CategoryUtility::merge($parentNode->getTemplate(), $newTemplate, $policy);
    //     } else {
    //         $template = $newTemplate;
    //     }

    //     $parentNode->setTemplate($template);

    //     $this->setNode($parentNode);
    // }

    public function setNode(NodeInterface $node)
    {
        $this->concreteGraphmaster->setNode($node);
    }

    public function findNode(string $word, NodeInterface $parentNode = null)
    {
        return $this->concreteGraphmaster->findNode($word, $parentNode);
    }

    public function getRootNode(): NodeInterface
    {
        return $this->concreteGraphmaster->getRootNode();
    }

    public function createTemplate(): TemplateInterface
    {
        return $this->concreteGraphmaster->createTemplate();
    }


    public function createNode(): NodeInterface
    {
        return $this->concreteGraphmaster->createNode();
    }

    // /**
    //  * @return \TYPO3\CMS\Extbase\SignalSlot\Dispatcher
    //  */
    // protected function getSignalSlotDispatcher(): Dispatcher
    // {
    //     return GeneralUtility::makeInstance(ObjectManager::class)->get(Dispatcher::class);
    // }

    // /**
    //  * @return \R3H6\Chatbot\Domain\Parser\AimlParser
    //  */
    // protected function getAimlParser(): AimlParser
    // {
    //     return GeneralUtility::makeInstance(ObjectManager::class)->get(AimlParser::class);
    // }

    /**
     * Get class logger
     *
     * @return TYPO3\CMS\Core\Log\Logger
     */
    protected function getLogger (){
        return GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);
    }
}

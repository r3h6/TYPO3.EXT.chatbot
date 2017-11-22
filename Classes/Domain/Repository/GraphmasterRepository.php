<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Repository;

use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;
use TYPO3\CMS\Core\Database\ConnectionPool;
use R3H6\Chatbot\Domain\Parser\AimlParser;
use R3H6\Chatbot\Domain\Model\Template;
use R3H6\Chatbot\Domain\Model\Bot;
use R3H6\Chatbot\Domain\Model\Graphmaster;
use R3H6\Chatbot\Domain\Resource\Aiml;
use R3H6\Chatbot\Domain\Resource\AimlCategory;
use R3H6\Chatbot\Domain\Resource\AimlPath;
use R3H6\Chatbot\Domain\Graphmaster\Match;
use R3H6\Chatbot\Domain\Graphmaster\NodeInterface;
use R3H6\Chatbot\Domain\Graphmaster\TemplateInterface;

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
class GraphmasterRepository extends \TYPO3\CMS\Extbase\Persistence\Repository implements \R3H6\Chatbot\Domain\Graphmaster\GraphmasterInterface
{
    protected $rootNode;
    protected $bot;

    public function setBot(Bot $bot)
    {
        $this->bot = $bot;
    }

    public function initializeObject()
    {
        $this->rootNode = new Graphmaster();
        $this->rootNode->setUid(0);
    }

    public function setNode(NodeInterface $node)
    {
        if (!($node instanceof Graphmaster)) {
            throw new \InvalidArgumentException("Node is not a ".Graphmaster::class, 1511375839);
        }

        $node->setBot($this->bot);

        if ($node->getUid()) {
            $this->update($node);
        } else {
            $this->add($node);
        }

        $this->persistenceManager->persistAll();
    }

    public function findNode(string $word, NodeInterface $parentNode = null)
    {
        $query = $this->createQuery();
        $query->matching(
            $query->logicalAnd(
                $query->equals('word', $word),
                $query->equals('parentNode', $parentNode)
            )
        );
        $query->setLimit(1);
        return $query->execute()->getFirst();
    }

    public function createTemplate(): TemplateInterface
    {
        return new Template();
    }

    // public function getRootNode(): NodeInterface
    // {
    //     return $this->rootNode;
    // }

    public function createNode(): NodeInterface
    {
        return new Graphmaster();
    }
}

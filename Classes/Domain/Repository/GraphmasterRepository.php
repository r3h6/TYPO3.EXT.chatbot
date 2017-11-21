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
use R3H6\Chatbot\Domain\Model\Graphmaster;
use R3H6\Chatbot\Domain\Resource\Aiml;
use R3H6\Chatbot\Domain\Resource\AimlCategory;
use R3H6\Chatbot\Domain\Resource\AimlPath;
use R3H6\Chatbot\Domain\Graphmaster\Match;
use R3H6\Chatbot\Domain\Graphmaster\NodeInterface;

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
class GraphmasterRepository extends \TYPO3\CMS\Extbase\Persistence\Repository implements \R3H6\Chatbot\Domain\GraphmasterInterface
{
    protected $rootNode;

    public function addNode(NodeInterface $node)
    {
        $this->add($node);
        $this->persistenceManager->persistAll();
    }

    public function findNode(string $word, NodeInterface $parentNode): NodeInterface
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

    public function getRootNode(): NodeInterface
    {
        if ($this->rootNode === null) {
            $this->rootNode = new Graphmaster();
        }
        return $this->rootNode;
    }

    public function createNode(): NodeInterface
    {
        return new Graphmaster();
    }
}

<?php
namespace R3H6\Chatbot\Domain\Graphmaster;

use R3H6\Chatbot\Domain\Model\Bot;

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
interface GraphmasterInterface
{
    public function setBot(Bot $bot);

    public function setNode(NodeInterface $node);

    public function findNode(string $word, NodeInterface $parentNode = null);

    // public function getRootNode(): NodeInterface;

    public function createNode(): NodeInterface;
    public function createTemplate(): TemplateInterface;
}

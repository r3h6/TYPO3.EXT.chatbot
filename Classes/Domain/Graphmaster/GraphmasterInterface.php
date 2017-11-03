<?php
namespace R3H6\Chatbot\Domain;

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
    public function addNode(NodeInterface $node);

    public function findNode(string $word, NodeInterface $parentNode): NodeInterface;

    public function getRootNode(): NodeInterface;
}

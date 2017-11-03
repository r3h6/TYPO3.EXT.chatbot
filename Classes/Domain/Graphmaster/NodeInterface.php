<?php
namespace R3H6\Chatbot\Domain\Graphmaster;

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
 * Map
 */
interface NodeInterface
{
    public function __construct(string $word, NodeInterface $parentNode, TemplateInterface $template = null);

    public function getWord(): string;
    // public function setWord(string $word);

    public function getTemplate(): TemplateInterface;
    // public function setTemplate(TemplateInterface $template);

    public function getParentNode(): NodeInterface;
    // public function setParentNode(NodeInterface $parentNode);
}

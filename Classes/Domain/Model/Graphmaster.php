<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Model;

use R3H6\Chatbot\Domain\Graphmaster\TemplateInterface;
use R3H6\Chatbot\Domain\Graphmaster\NodeInterface;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

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
class Graphmaster extends AbstractEntity implements NodeInterface
{
    /**
     * Word
     *
     * @var string
     */
    protected $word = '';

    /**
     * Parent
     *
     * @var \R3H6\Chatbot\Domain\Model\Graphmaster
     */
    protected $parentNode = null;

    /**
     * Bot
     *
     * @var \R3H6\Chatbot\Domain\Model\Bot
     */
    protected $bot = null;

    /**
     * Template
     *
     * @var \R3H6\Chatbot\Domain\Model\Template
     */
    protected $template = null;

    // public function __construct(string $word, NodeInterface $parentNode, TemplateInterface $template = null);

    /**
     * Returns the word
     *
     * @return string $word
     */
    public function getWord(): string
    {
        return $this->word;
    }

    /**
     * Sets the word
     *
     * @param string $word
     * @return void
     */
    public function setWord(string $word)
    {
        $this->word = $word;
    }

    /**
     * Returns the bot
     *
     * @return \R3H6\Chatbot\Domain\Model\Bot $bot
     */
    public function getBot(): Bot
    {
        return $this->bot;
    }

    /**
     * Sets the bot
     *
     * @param \R3H6\Chatbot\Domain\Model\Bot $bot
     * @return void
     */
    public function setBot(\R3H6\Chatbot\Domain\Model\Bot $bot)
    {
        $this->bot = $bot;
    }

    /**
     * Returns the template
     *
     * @return \R3H6\Chatbot\Domain\Model\Template $template
     */
    public function getTemplate():TemplateInterface
    {
        return $this->template;
    }

    /**
     * Sets the template
     *
     * @param \R3H6\Chatbot\Domain\Model\Template $template
     * @return void
     */
    public function setTemplate(TemplateInterface $template)
    {
        $this->template = $template;
    }

    /**
     * Returns the parentNode
     *
     * @return \R3H6\Chatbot\Domain\Model\Graphmaster parentNode
     */
    public function getParentNode(): NodeInterface
    {
        return $this->parentNode;
    }

    /**
     * Sets the parentNode
     *
     * @param \R3H6\Chatbot\Domain\Model\Graphmaster $parentNode
     * @return void
     */
    public function setParentNode(NodeInterface $parentNode)
    {
        $this->parentNode = $parentNode;
    }
}

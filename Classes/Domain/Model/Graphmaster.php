<?php
namespace R3H6\Chatbot\Domain\Model;

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
class Graphmaster extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
    protected $parent = null;

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

    /**
     * Returns the word
     *
     * @return string $word
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * Sets the word
     *
     * @param string $word
     * @return void
     */
    public function setWord($word)
    {
        $this->word = $word;
    }

    /**
     * Returns the parent
     *
     * @return \R3H6\Chatbot\Domain\Model\Graphmaster $parent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Sets the parent
     *
     * @param \R3H6\Chatbot\Domain\Model\Graphmaster $parent
     * @return void
     */
    public function setParent(\R3H6\Chatbot\Domain\Model\Graphmaster $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Returns the bot
     *
     * @return \R3H6\Chatbot\Domain\Model\Bot $bot
     */
    public function getBot()
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
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Sets the template
     *
     * @param \R3H6\Chatbot\Domain\Model\Template $template
     * @return void
     */
    public function setTemplate(\R3H6\Chatbot\Domain\Model\Template $template)
    {
        $this->template = $template;
    }
}

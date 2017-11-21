<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
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
 * Template
 */
class Template extends AbstractEntity implements TemplateInterface
{
    /**
     * Template
     *
     * @var string
     */
    protected $template = '';

    /**
     * Pattern
     *
     * @var string
     */
    protected $pattern = '';

    /**
     * File
     *
     * @var string
     */
    protected $file = '';

    /**
     * Bot
     *
     * @var \R3H6\Chatbot\Domain\Model\Bot
     */
    protected $bot = null;

    /**
     * That
     *
     * @var string
     */
    protected $that = '';

    /**
     * Topic
     *
     * @var string
     */
    protected $topic = '';

    /**
     * Returns the template
     *
     * @return string $template
     */
    public function getTemplate():string
    {
        return $this->template;
    }

    /**
     * Sets the template
     *
     * @param string $template
     * @return void
     */
    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    /**
     * Returns the pattern
     *
     * @return string $pattern
     */
    public function getPattern():string
    {
        return $this->pattern;
    }

    /**
     * Sets the pattern
     *
     * @param string $pattern
     * @return void
     */
    public function setPattern(string $pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Returns the file
     *
     * @return string $file
     */
    public function getFile():string
    {
        return $this->file;
    }

    /**
     * Sets the file
     *
     * @param string $file
     * @return void
     */
    public function setFile(string $file)
    {
        $this->file = $file;
    }

    /**
     * Returns the bot
     *
     * @return \R3H6\Chatbot\Domain\Model\Bot $bot
     */
    public function getBot():Bot
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
     * Returns the that
     *
     * @return string $that
     */
    public function getThat():string
    {
        return $this->that;
    }

    /**
     * Sets the that
     *
     * @param string $that
     * @return void
     */
    public function setThat(string $that)
    {
        $this->that = $that;
    }

    /**
     * Returns the topic
     *
     * @return string $topic
     */
    public function getTopic():string
    {
        return $this->topic;
    }

    /**
     * Sets the topic
     *
     * @param string $topic
     * @return void
     */
    public function setTopic(string $topic)
    {
        $this->topic = $topic;
    }
}

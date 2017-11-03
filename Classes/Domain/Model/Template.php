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
 * Template
 */
class Template extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Sets the template
     *
     * @param string $template
     * @return void
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * Returns the pattern
     *
     * @return string $pattern
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Sets the pattern
     *
     * @param string $pattern
     * @return void
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Returns the file
     *
     * @return string $file
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets the file
     *
     * @param string $file
     * @return void
     */
    public function setFile($file)
    {
        $this->file = $file;
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
     * Returns the that
     *
     * @return string $that
     */
    public function getThat()
    {
        return $this->that;
    }

    /**
     * Sets the that
     *
     * @param string $that
     * @return void
     */
    public function setThat($that)
    {
        $this->that = $that;
    }

    /**
     * Returns the topic
     *
     * @return string $topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Sets the topic
     *
     * @param string $topic
     * @return void
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }
}

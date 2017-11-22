<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use R3H6\Chatbot\Domain\Graphmaster\TemplateInterface;
use R3H6\Chatbot\Domain\Resource\AimlPath;

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
     * Aiml
     *
     * @var string
     */
    protected $aiml = '';

    /**
     * Pattern
     *
     * @var string
     */
    protected $pattern = '';

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

    /**
     * Returns the aiml
     *
     * @return string aiml
     */
    public function getAiml():string
    {
        return $this->aiml;
    }

    /**
     * Sets the aiml
     *
     * @param string $aiml
     * @return void
     */
    public function setAiml(string $aiml)
    {
        $this->aiml = $aiml;
    }

    public function setPath(AimlPath $path)
    {
        //
    }
}

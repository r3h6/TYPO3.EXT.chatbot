<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use R3H6\Chatbot\Domain\Graphmaster\AimlifInterface;
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
 * Aimlif
 */
class Aimlif extends AbstractEntity implements AimlifInterface
{
    /**
     * Aiml
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
    protected $fileName = '';

    /**
     * Bot
     *
     * @var \R3H6\Chatbot\Domain\Model\Bot
     */
    protected $bot = null;

    /**
     * activationCount
     *
     * @var int
     */
    protected $activationCount = 0;

    /**
     * Returns the pattern
     *
     * @return string $pattern
     */
    public function getPattern(): string
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
    public function getThat(): string
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
    public function getTopic(): string
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
     * @param AimlPath $path
     */
    public function setPath(AimlPath $path)
    {

    }

    /**
     * Returns the template
     *
     * @return string template
     */
    public function getTemplate(): string
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
     * Returns the fileName
     *
     * @return string fileName
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * Sets the fileName
     *
     * @param string $fileName
     * @return void
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * Returns the activationCount
     *
     * @return int $activationCount
     */
    public function getActivationCount(): int
    {
        return $this->activationCount;
    }

    /**
     * Sets the activationCount
     *
     * @param int $activationCount
     * @return void
     */
    public function setActivationCount(int $activationCount)
    {
        $this->activationCount = $activationCount;
    }
}

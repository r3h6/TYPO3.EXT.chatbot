<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Resource;

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
 * AimlCategory
 */
class AimlCategory
{
    /**
     * Topic
     * @var string
     */
    private $topic;

    /**
     * That
     * @var string
     */
    private $that;

    /**
     * Template
     * @var string
     */
    private $template;
    /**
     * Pattern
     * @var string
     */
    private $pattern;

    public function __construct(string $template, string $pattern, string $that, string $topic)
    {
        $this->template = $template;
        $this->pattern = $pattern;
        $this->that = $that;
        $this->topic = $topic;
    }

    /**
     * @return string
     */
    public function getTopic():string
    {
        return $this->topic;
    }

    /**
     * @return string
     */
    public function getThat():string
    {
        return $this->that;
    }

    /**
     * @return string
     */
    public function getTemplate():string
    {
        return $this->template;
    }

    /**
     * @return string
     */
    public function getPattern():string
    {
        return $this->pattern;
    }

    /**
     * @return R3H6\Chatbot\Domain\Resource\AimlPath
     */
    public function getPath():AimlPath
    {
        return new AimlPath($this->pattern, $this->that, $this->topic);
    }
}

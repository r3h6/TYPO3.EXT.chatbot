<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Graphmaster;

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
 * Map
 */
class Match
{
    private $star;
    private $topicStar;
    private $thatStar;

    private $template;

    public function __construct()
    {
        $this->star = [];
        $this->topicStar = [];
        $this->thatStar = [];
    }



    public function getStar(int $index): string
    {
        return $this->star[$index];
    }

    public function getTopicStar(int $index): string
    {
        return $this->topicStar[$index];
    }

    public function getThatStar(int $index): string
    {
        return $this->thatStar[$index];
    }

    /**
     * @param mixed $star
     *
     * @return self
     */
    public function setStar(string $word, string $type)
    {
        switch ($type) {
            case AimlPath::PATH_TYPE_PATTERN:
                $this->star[] = $word;
                break;
            case AimlPath::PATH_TYPE_THAT:
                $this->thatStar[] = $word;
                break;
            case AimlPath::PATH_TYPE_TOPIC:
                $this->topicStar[] = $word;
                break;
            default:
                throw new \InvalidArgumentException("Unknown type $type", 1511885492);
                break;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     *
     * @return self
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }
}

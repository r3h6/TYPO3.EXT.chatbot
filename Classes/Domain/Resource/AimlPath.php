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
 * AimlPath
 */
class AimlPath implements \Iterator, \Countable
{
    const PATH_TYPE_PATTERN = 'pattern';
    const PATH_TYPE_THAT = 'that';
    const PATH_TYPE_TOPIC = 'topic';

    const PATH_SEPARATOR_THAT = '<that>';
    const PATH_SEPARATOR_TOPIC = '<topic>';

    const WORD_PRIORITY_PREFIX = '$';

    const WILDCARD_HIGHER_PRIORITY = '#';
    const WILDCARD_HIGH_PRIORITY = '_';
    const WILDCARD_LOW_PRIORITY = '^';
    const WILDCARD_LOWER_PRIORITY = '*';

    const WILCARDS = self::WILDCARD_HIGHER_PRIORITY.self::WILDCARD_HIGH_PRIORITY.self::WILDCARD_LOW_PRIORITY.self::WILDCARD_LOWER_PRIORITY;
    const WILCARDS_ZERO_PLUS = self::WILDCARD_HIGHER_PRIORITY.self::WILDCARD_LOW_PRIORITY;

    private $array;
    private $position;
    private $count;

    /**
     * @var int
     */
    private $thatIndex;

    /**
     * @var int
     */
    private $topicIndex;

    public function __construct(string $pattern, string $that, string $topic)
    {
        $this->array = preg_split('/\s+/', sprintf('%s %s %s %s %s', $pattern, self::PATH_SEPARATOR_THAT, $that, self::PATH_SEPARATOR_TOPIC, $topic));
        $this->position = 0;
        $this->count = count($this->array);
        $this->thatIndex = array_search(self::PATH_SEPARATOR_THAT, $this->array);
        $this->topicIndex = array_search(self::PATH_SEPARATOR_TOPIC, $this->array);
    }

    public function getWord(int $index):string
    {
        if (false === isset($this->array[$index])) {
            throw new \OutOfBoundsException("Index $index is out of band!", 1508526222);
        }
        return $this->array[$index];
    }

    public function indexToType(int $index)
    {
        if ($this->thatIndex && $index > $this->thatIndex) {
            return self::PATH_TYPE_THAT;
        }
        if ($this->topicIndex && $index > $this->topicIndex) {
            return self::PATH_TYPE_TOPIC;
        }
        return self::PATH_TYPE_PATTERN;
    }




    public function count():int
    {
        return $this->count;
    }

    public function current ():string
    {
        return $this->array[$this->position];
    }
    public function key ():int
    {
        return $this->position;
    }
    public function next ()
    {
        ++$this->position;
    }
    public function rewind ()
    {
        $this->position = 0;
    }
    public function valid ():bool
    {
        return isset($this->array[$this->position]);
    }
    public function __toString(): string
    {
        return join(' ', $this->array);
    }

    /**
     * @return int
     */
    public function getThatIndex()
    {
        return $this->thatIndex;
    }

    /**
     * @return int
     */
    public function getTopicIndex()
    {
        return $this->topicIndex;
    }
}

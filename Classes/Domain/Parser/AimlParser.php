<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Parser;


use \R3H6\Chatbot\Domain\Resource\Aiml;
use \R3H6\Chatbot\Domain\Resource\AimlCategory;
use \R3H6\Chatbot\Domain\Model\Aimlif;

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
 * Aiml
 */
class AimlParser
{
    const ELEMENT_CATEGORY = 'CATEGORY';
    const ELEMENT_PATTERN = 'PATTERN';
    const ELEMENT_TEMPLATE = 'TEMPLATE';
    const ELEMENT_THAT = 'THAT';
    const ELEMENT_TOPIC = 'TOPIC';
    const ATTRIBUTE_TOPIC_NAME = 'NAME';
    const SIGNAL_ON_CATEGORY_END = 'onCategoryEnd';

    /**
     * @var array<string>
     */
    private $topic;

    /**
     * @var string
     */
    private $that;

    /**
     * @var string
     */
    private $template;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher
     */
    private $signalSlotDispatcher;

    /**
     * @var \R3H6\Chatbot\Domain\Parser\AimlParserEventHandlerInterface
     */
    private $eventHandler;

    public function __construct(AimlParserEventHandlerInterface $eventHandler)
    {
        $this->eventHandler = $eventHandler;
        $this->topic = ['*'];
        $this->that = '*';
        $this->template = '';
        $this->pattern = '';
        $this->fileName = '';
    }

    public function parse(Aiml $aiml)
    {
        $this->fileName = $aiml->getFileName();
        $element = simplexml_load_string((string) $aiml);
        $this->walk($element);
    }

    private function walk(\SimpleXMLElement $element)
    {
        $name = strtoupper($element->getName());

        switch ($name) {
            case self::ELEMENT_CATEGORY:
                $this->that = '*';
                $this->template = '';
                $this->pattern = '';
                break;
            case self::ELEMENT_PATTERN:
                $this->pattern = str_ireplace(['<pattern>', '</pattern>'], '', $element->asXML());
                break;
            case self::ELEMENT_TEMPLATE:
                $this->template = str_ireplace(['<template>', '</template>'], '', $element->asXML());
                break;
            case self::ELEMENT_THAT:
                $this->that = str_ireplace(['<that>', '</that>'], '', $element->asXML());
                break;
            case self::ELEMENT_TOPIC:
                $newTopic = null;
                foreach ($element->attributes() as $key => $value) {
                    if (strtoupper($key) === self::ATTRIBUTE_TOPIC_NAME) {
                        $newTopic = $value;
                    }
                }
                if ($newTopic === null && count($element) === 0) {
                    $newTopic = (string) $element;
                }

                if ($newTopic !== null) {
                    array_push($this->topic, $newTopic);
                }

                break;
        }

        foreach ($element as $child) {
            $this->walk($child);
        }

        switch ($name) {
            case self::ELEMENT_CATEGORY:
                $aimlif = new Aimlif();
                $aimlif->setPattern($this->pattern);
                $aimlif->setThat($this->that);
                $aimlif->setTopic(end($this->topic));
                $aimlif->setTemplate($this->template);
                $aimlif->setFileName($this->fileName);
                $this->eventHandler->onCategoryEnd($aimlif);

                if (count($this->topic) > 1) {
                    array_pop($this->topic);
                }

                break;
            case self::ELEMENT_PATTERN:
                break;
            case self::ELEMENT_TEMPLATE:
                break;
            case self::ELEMENT_THAT:
                break;
            case self::ELEMENT_TOPIC:
                break;
        }
    }

    private function emitOnCategoryEnd(Aimlif $aimlif)
    {
        $this->signalSlotDispatcher->dispatch(__CLASS__, self::SIGNAL_ON_CATEGORY_END, [$aimlif]);
    }

    // public function parse(Aiml $aiml)
    // {
    //     echo get_class($this->parser);

    //     $this->parser = xml_parser_create();

    //     xml_set_object($this->parser, $this);
    //     xml_parser_set_option($this->parser, XML_OPTION_SKIP_WHITE, 1);
    //     xml_set_element_handler($this->parser, 'openElementHandler', 'closeElementHandler');
    //     xml_set_character_data_handler($this->parser, 'dataHandler');

    //     xml_parse($this->parser, (string) $aiml);
    // }

    // public function openElementHandler($parser, string $name, array $attributes)
    // {
    //     switch ($name) {
    //         case self::ELEMENT_CATEGORY:
    //             $this->currentElement = $name;
    //             $this->category = new class(){
    //                 public $topic = '';
    //                 public $that = '';
    //                 public $template = '';
    //                 public $pattern = '';
    //             };
    //             if (!empty($this->topic)) {
    //                 $this->category->topic .= $this->topic[0];
    //             }
    //             break;
    //         case self::ELEMENT_PATTERN:
    //             $this->currentElement = $name;
    //             break;
    //         case self::ELEMENT_TEMPLATE:
    //             $this->currentElement = $name;
    //             break;
    //         case self::ELEMENT_THAT:
    //             $this->currentElement = $name;
    //             break;
    //         case self::ELEMENT_TOPIC:
    //             $this->currentElement = $name;
    //             array_push($this->topic, $attributes[self::ATTRIBUTE_TOPIC_NAME]);
    //             break;
    //     }
    // }

    // public function closeElementHandler($parser, string $name)
    // {
    //     switch ($name) {
    //         case self::ELEMENT_CATEGORY:
    //             print_r($this->category);
    //             // exit;
    //             break;
    //         case self::ELEMENT_PATTERN:
    //             break;
    //         case self::ELEMENT_TEMPLATE:
    //             break;
    //         case self::ELEMENT_THAT:
    //             break;
    //         case self::ELEMENT_TOPIC:
    //             array_pop($this->topic);
    //             break;
    //     }
    // }

    // public function dataHandler($parser, string $data)
    // {
    //     $data = trim($data);
    //     switch ($this->currentElement) {
    //         case self::ELEMENT_CATEGORY:
    //             break;
    //         case self::ELEMENT_PATTERN:
    //             $this->category->pattern .= $data;
    //             break;
    //         case self::ELEMENT_TEMPLATE:
    //             $this->category->template .= $data;
    //             break;
    //         case self::ELEMENT_THAT:
    //             $this->category->that .= $data;
    //             break;
    //         case self::ELEMENT_TOPIC:
    //             if (!empty($data)) {
    //                 $this->category->topic .= $data;
    //             }
    //             break;
    //     }
    // }
}

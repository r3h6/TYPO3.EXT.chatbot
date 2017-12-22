<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Importer;

use R3H6\Chatbot\Domain\Model\Bot;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use R3H6\Chatbot\Domain\Parser\AimlParser;
use R3H6\Chatbot\Domain\Parser\AimlParserEventHandlerInterface

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
 * AimlImporter
 */
class AimlImporter implements AimlParserEventHandlerInterface
{
    /**
     * [$aimlifRepository description]
     * @var \R3H6\Chatbot\Domain\Repository\AimlifRepository
     */
    protected $aimlifRepository;

    protected $bot;

    public function __construct(Bot $bot)
    {
        $this->bot = $bot;
    }

    public function import(Aiml $aiml)
    {
        $parser = $this->getAimlParser();
        $parser->parse($aiml);
    }

    public function onCategoryEnd(\R3H6\Chatbot\Domain\Model\Aimlif $aimlif)
    {
        $aimlif->setBot($this->bot);
        $this->aimlifRepository->import($aimlif);
    }

    /**
     * @return \R3H6\Chatbot\Domain\Parser\AimlParser
     */
    protected function getAimlParser(): AimlParser
    {
        return GeneralUtility::makeInstance(ObjectManager::class)->get(AimlParser::class, $this);
    }
}
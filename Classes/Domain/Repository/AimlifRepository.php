<?php
namespace R3H6\Chatbot\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use R3H6\Chatbot\Domain\Parser\AimlParser;
use R3H6\Chatbot\Domain\Resource\Aiml;
use R3H6\Chatbot\Domain\Model\Bot;
use R3H6\Chatbot\Domain\Model\Aimlif;

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
 * The repository for Aimlifs
 */
class AimlifRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    // *
    //  * SignalSlotDispatcher
    //  *
    //  * @var TYPO3\CMS\Extbase\SignalSlot\Dispatcher
    //  * @inject

    // protected $signalSlotDispatcher;

    // protected $bot;

    // public function initializeObject()
    // {
    //     $this->signalSlotDispatcher->connect(AimlParser::class, AimlParser::SIGNAL_ON_CATEGORY_END, $this, 'importAimlif');
    // }

    // public function importAiml(Aiml $aiml, Bot $bot)
    // {
    //     // Deleta all aimlif by filename

    //     $this->bot = $bot;
    //     $parser = $this->getAimlParser();
    //     $parser->parse($aiml);
    //     $this->bot = null;
    // }

    // public function importAimlif(Aimlif $aimlif)
    // {
    //     $aimlif->setBot($this->bot);
    //     parent::add($aimlif);
    // }

    // public function search(Aimlif $aimlif)
    // {
    //     $query = $this->createQuery();

    //     $query->matching(
    //         $query->logicalAnd(
    //             $query->equals('pattern', $aimlif->getPattern()),
    //             $query->equals('that', $aimlif->getThat()),
    //             $query->equals('topic', $aimlif->getTopic()),
    //         )
    //     );
    // }
    //

    public function import(Aimlif $aimlif)
    {
        if ($aimlif->getBot() === null) {
            throw new \InvalidArgumentException('Importet aimlif has no bot', 1513926206);
        }


        // Wenn mergen wie handhaben wenn unterschiedliche aiml files... löschen etc
        parent::add($aimlif);
    }

    public function add($object)
    {
        throw new \RuntimeException('Method add is nota allowed on this repository. Use import instead!', 1513891610);
    }

    public function update($modifiedObject)
    {
        throw new \RuntimeException('Method update is nota allowed on this repository. Use import instead!', 1513891611);
    }

    // /**
    //  * @return \R3H6\Chatbot\Domain\Parser\AimlParser
    //  */
    // protected function getAimlParser(): AimlParser
    // {
    //     return GeneralUtility::makeInstance(ObjectManager::class)->get(AimlParser::class);
    // }
}

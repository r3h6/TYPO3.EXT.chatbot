<?php
namespace R3H6\Chatbot\Tests\Functional\Domain\Import;

use R3H6\Chatbot\Domain\Import\AimlImporter;
use R3H6\Chatbot\Domain\Resource\AimlCategory;
use R3H6\Chatbot\Domain\Resource\AimlPath;
use R3H6\Chatbot\Domain\Resource\Aiml;
use R3H6\Chatbot\Domain\Model\Bot;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use R3H6\Chatbot\Tests\Fixtures\Bot\AliceBot;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

class AimlImporterTest extends \TYPO3\TestingFramework\Core\Functional\FunctionalTestCase
{
    protected $testExtensionsToLoad = [ 'typo3conf/ext/chatbot' ];

    /**
     * @var \R3H6\Chatbot\Domain\Import\AimlImporter
     */
    protected $subject;

    public function setUp()
    {
        parent::setUp();

        $botFixture = new AliceBot();
        $this->subject = GeneralUtility::makeInstance(ObjectManager::class)->get(AimlImporter::class, $botFixture);
    }

    /**
     * @test
     */
    public function import()
    {
        $aiml = new Aiml('EXT:chatbot/Tests/Fixtures/Aiml/import.aiml');

        $this->subject->import($aiml);

        /** @var PersistenceManager $persistenceManager */
        $persistenceManager = GeneralUtility::makeInstance(ObjectManager::class)->get(PersistenceManager::class);
        $persistenceManager->persistAll();

        $this->assertCSVDataSet('EXT:chatbot/Tests/Fixtures/DatabaseAssertions/Import.csv');
    }



}
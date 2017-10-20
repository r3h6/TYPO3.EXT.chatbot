<?php
namespace R3H6\Chatbot\Tests\Functional\Domain\Model;

use R3H6\Chatbot\Domain\Model\Bot;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class BotTest extends \TYPO3\TestingFramework\Core\Functional\FunctionalTestCase
{
    protected $testExtensionsToLoad = [ 'typo3conf/ext/chatbot' ];

    protected $bot;

    public function setUp()
    {
        parent::setUp();

        $this->bot = GeneralUtility::makeInstance(ObjectManager::class)->get(Bot::class)
    }

    /**
     * @test
     */
    public function learnAiml()
    {
        $this->assertTrue($this->bot->learnAiml($aiml));
    }

}
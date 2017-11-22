<?php
namespace R3H6\Chatbot\Tests\Functional\Domain\Graphmaster;

use R3H6\Chatbot\Domain\Graphmaster\Graphmaster;
use R3H6\Chatbot\Domain\Resource\AimlCategory;
use R3H6\Chatbot\Domain\Resource\AimlPath;
use R3H6\Chatbot\Domain\Resource\Aiml;
use R3H6\Chatbot\Domain\Model\Bot;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use R3H6\Chatbot\Tests\Fixtures\Bot\AliceBot;

class GraphmasterTest extends \TYPO3\TestingFramework\Core\Functional\FunctionalTestCase
{
    protected $testExtensionsToLoad = [ 'typo3conf/ext/chatbot' ];

    /**
     * @var \R3H6\Chatbot\Domain\Graphmaster\Graphmaster
     */
    protected $subject;

    public function setUp()
    {
        parent::setUp();

        $botFixture = new AliceBot();

        $this->subject = GeneralUtility::makeInstance(ObjectManager::class)->get(Graphmaster::class, $botFixture);
    }

    /**
     * @test
     */
    public function importCategoryFillsDatabase()
    {
        $categoryFixture = new AimlCategory('Template', 'INPUT', 'THAT', 'TOPIC');
        $this->subject->importCategory($categoryFixture);
        $this->assertCSVDataSet('EXT:chatbot/Tests/Fixtures/DatabaseAssertions/ImportCategory.csv');
    }

    /**
     * @test
     * @group aiml1
     * @dataProvider keywordsDataProvider
     */
    public function keyword($input, $that, $topic)
    {
        $aiml = new Aiml('EXT:chatbot/Tests/Fixtures/Aiml/keyword.aiml');
        $this->subject->importAiml($aiml);

        $path = new AimlPath($input, $that, $topic);
        $match = $this->subject->walk($path);

        $this->assertNotNull($match->getTemplate());
    }

    /**
     * @test
     * @group aiml2
     * @dataProvider keywordsDataProvider
     */
    public function keyword2($input, $that, $topic)
    {
        $aiml = new Aiml('EXT:chatbot/Tests/Fixtures/Aiml/keyword2.aiml');
        $this->subject->importAiml($aiml);

        $path = new AimlPath($input, $that, $topic);
        $match = $this->subject->walk($path);

        $this->assertNotNull($match->getTemplate());
    }

    public function keywordsDataProvider()
    {
        return [
            ['KEYWORD', '*', '*'],
            ['LOREM KEYWORD', '*', '*'],
            ['KEYWORD LOREM', '*', '*'],
            ['LOREM KEYWORD LOREM', '*', '*'],
        ];
    }

}
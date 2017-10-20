<?php
namespace R3H6\Chatbot\Tests\Unit\Domain\Parser;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Test case.
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class AimlParserTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \R3H6\Chatbot\Domain\Parser\AimlParser
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \R3H6\Chatbot\Domain\Parser\AimlParser();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function parseAiml()
    {
        $aiml = new \R3H6\Chatbot\Domain\Resource\Aiml(file_get_contents(GeneralUtility::getFileAbsFileName('EXT:chatbot/Tests/Fixtures/Aiml/ai.aiml')));
        $this->subject->parse($aiml);
        // $this->assertSame(' ', $aiml);
    }
}

<?php
namespace R3H6\Chatbot\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class GraphmasterTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \R3H6\Chatbot\Domain\Model\Graphmaster
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \R3H6\Chatbot\Domain\Model\Graphmaster();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getWordReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getWord()
        );
    }

    /**
     * @test
     */
    public function setWordForStringSetsWord()
    {
        $this->subject->setWord('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'word',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getParentReturnsInitialValueForGraphmaster()
    {
        self::assertEquals(
            null,
            $this->subject->getParent()
        );
    }

    /**
     * @test
     */
    public function setParentForGraphmasterSetsParent()
    {
        $parentFixture = new \R3H6\Chatbot\Domain\Model\Graphmaster();
        $this->subject->setParent($parentFixture);

        self::assertAttributeEquals(
            $parentFixture,
            'parent',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBotReturnsInitialValueForBot()
    {
        self::assertEquals(
            null,
            $this->subject->getBot()
        );
    }

    /**
     * @test
     */
    public function setBotForBotSetsBot()
    {
        $botFixture = new \R3H6\Chatbot\Domain\Model\Bot();
        $this->subject->setBot($botFixture);

        self::assertAttributeEquals(
            $botFixture,
            'bot',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTemplateReturnsInitialValueForTemplate()
    {
        self::assertEquals(
            null,
            $this->subject->getTemplate()
        );
    }

    /**
     * @test
     */
    public function setTemplateForTemplateSetsTemplate()
    {
        $templateFixture = new \R3H6\Chatbot\Domain\Model\Template();
        $this->subject->setTemplate($templateFixture);

        self::assertAttributeEquals(
            $templateFixture,
            'template',
            $this->subject
        );
    }
}

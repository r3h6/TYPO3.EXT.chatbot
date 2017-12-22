<?php
namespace R3H6\Chatbot\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class AimlifTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \R3H6\Chatbot\Domain\Model\Aimlif
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \R3H6\Chatbot\Domain\Model\Aimlif();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getActivationCountReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getActivationCount()
        );
    }

    /**
     * @test
     */
    public function setActivationCountForIntSetsActivationCount()
    {
        $this->subject->setActivationCount(12);

        self::assertAttributeEquals(
            12,
            'activationCount',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPatternReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPattern()
        );
    }

    /**
     * @test
     */
    public function setPatternForStringSetsPattern()
    {
        $this->subject->setPattern('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pattern',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getThatReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getThat()
        );
    }

    /**
     * @test
     */
    public function setThatForStringSetsThat()
    {
        $this->subject->setThat('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'that',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTopicReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTopic()
        );
    }

    /**
     * @test
     */
    public function setTopicForStringSetsTopic()
    {
        $this->subject->setTopic('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'topic',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTemplateReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTemplate()
        );
    }

    /**
     * @test
     */
    public function setTemplateForStringSetsTemplate()
    {
        $this->subject->setTemplate('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'template',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFileNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFileName()
        );
    }

    /**
     * @test
     */
    public function setFileNameForStringSetsFileName()
    {
        $this->subject->setFileName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'fileName',
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
    public function getGraphmasterNodeReturnsInitialValueForGraphmaster()
    {
        self::assertEquals(
            null,
            $this->subject->getGraphmasterNode()
        );
    }

    /**
     * @test
     */
    public function setGraphmasterNodeForGraphmasterSetsGraphmasterNode()
    {
        $graphmasterNodeFixture = new \R3H6\Chatbot\Domain\Model\Graphmaster();
        $this->subject->setGraphmasterNode($graphmasterNodeFixture);

        self::assertAttributeEquals(
            $graphmasterNodeFixture,
            'graphmasterNode',
            $this->subject
        );
    }
}

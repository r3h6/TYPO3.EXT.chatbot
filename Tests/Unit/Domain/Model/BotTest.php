<?php
namespace R3H6\Chatbot\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class BotTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \R3H6\Chatbot\Domain\Model\Bot
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \R3H6\Chatbot\Domain\Model\Bot();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }
}

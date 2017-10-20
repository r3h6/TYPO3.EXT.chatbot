<?php
namespace R3H6\Chatbot\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class SubstitutionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \R3H6\Chatbot\Domain\Model\Substitution
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \R3H6\Chatbot\Domain\Model\Substitution();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}

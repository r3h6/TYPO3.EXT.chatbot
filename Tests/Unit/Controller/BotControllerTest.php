<?php
namespace R3H6\Chatbot\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class BotControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \R3H6\Chatbot\Controller\BotController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\R3H6\Chatbot\Controller\BotController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

}

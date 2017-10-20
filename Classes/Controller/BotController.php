<?php
namespace R3H6\Chatbot\Controller;

/***
 *
 * This file is part of the "TYPO3 bot" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 R3 H6 <r3h6@outlook.com>
 *
 ***/

/**
 * BotController
 */
class BotController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * botRepository
     *
     * @var \R3H6\Chatbot\Domain\Repository\BotRepository
     * @inject
     */
    protected $botRepository = null;

    /**
     * action talk
     *
     * @param R3H6\Chatbot\Domain\Model\Bot
     * @return void
     */
    public function talkAction()
    {

    }
}

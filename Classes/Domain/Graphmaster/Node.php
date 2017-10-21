<?php
namespace R3H6\Chatbot\Domain\Graphmaster;

/***
 *
 * This file is part of the "Chatbot" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 R3 H6 <r3h6@outlook.com>
 *
 ***/

/**
 * Map
 */
class Node
{
    /**
     * [$uid description]
     * @var int
     */
    private $uid;

    /**
     * [$word description]
     * @var string
     */
    private $word;

    /**
     * [$parent description]
     * @var int
     */
    private $parent;

    /**
     * [$template description]
     * @var int
     */
    private $template;

    public function __construct()
    {

    }
}

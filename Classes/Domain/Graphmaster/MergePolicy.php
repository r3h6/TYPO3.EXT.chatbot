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
class MergePolicy extends \TYPO3\CMS\Core\Type\Enumeration
{
    const __default = self::KEEP_FIRST;

    const KEEP_FIRST = 0;
    const KEEP_LAST = 1;
    const RANDOM = 2;
}

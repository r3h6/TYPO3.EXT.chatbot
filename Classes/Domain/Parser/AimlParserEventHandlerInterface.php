<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Parser;


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
 * AimlParserEventHandlerInterface
 */
interface AimlParserEventHandlerInterface
{
    public function onCategoryEnd(\R3H6\Chatbot\Domain\Model\Aimlif $aimlif);
}

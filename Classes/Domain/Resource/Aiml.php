<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Resource;

use TYPO3\CMS\Core\Utility\GeneralUtility;

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
 * Aiml
 */
class Aiml
{
    public function __construct(string $aiml)
    {
        if (strtolower(substr($aiml, -5)) === '.aiml') {
            $aiml = @file_get_contents(GeneralUtility::getFileAbsFileName($aiml));
            if ($aiml === false) {
                throw new \RuntimeException("Argument is not a valid aiml file", 1508437846);
            }
        }
        $this->aiml = $aiml;
    }
    public function __toString()
    {
        return $this->aiml;
    }
}

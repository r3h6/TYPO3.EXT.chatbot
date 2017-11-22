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
class CategoryUtility
{
    private function __construct();

    public static function merge(TemplateInterface $a, TemplateInterface $b, MergePolicy $policy)
    {
        if ($policy->equals(MergePolicy::cast(MergePolicy::KEEP_FIRST))) {
            return $a;
        }
        if ($policy->equals(MergePolicy::cast(MergePolicy::KEEP_LAST))) {
            return $b;
        }
        if ($policy->equals(MergePolicy::cast(MergePolicy::RANDOM))) {
            $a->getAiml();
        }
    }
}

<?php
declare(strict_types=1);

namespace R3H6\Chatbot\Domain\Model;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
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
 * Bot
 */
class Bot extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var \R3H6\Chatbot\Domain\Repository\GraphmasterRepository
     */
    protected $graphmaster = null;

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    public function __construct()
    {
        $this->graphmaster;
    }

    /**
     * Returns the name
     *
     * @return string name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param Input $input
     */
    public function talk(Input $input)
    {
        foreach ($input as $path) {
            $match = $this->graphmaster->walk($path);
        }
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {

    }
}

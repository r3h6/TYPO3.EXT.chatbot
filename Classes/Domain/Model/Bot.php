<?php
namespace R3H6\Chatbot\Domain\Model;

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
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * substitutions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Substitution>
     * @cascade remove
     */
    protected $substitutions = null;

    /**
     * maps
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Map>
     * @cascade remove
     */
    protected $maps = null;

    /**
     * sets
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Set>
     * @cascade remove
     */
    protected $sets = null;

    /**
     * aiml
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Aiml>
     * @cascade remove
     */
    protected $aiml = null;

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
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
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
        $this->substitutions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->maps = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->sets = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->aiml = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Substitution
     *
     * @param \R3H6\Chatbot\Domain\Model\Substitution $substitution
     * @return void
     */
    public function addSubstitution(\R3H6\Chatbot\Domain\Model\Substitution $substitution)
    {
        $this->substitutions->attach($substitution);
    }

    /**
     * Removes a Substitution
     *
     * @param \R3H6\Chatbot\Domain\Model\Substitution $substitutionToRemove The Substitution to be removed
     * @return void
     */
    public function removeSubstitution(\R3H6\Chatbot\Domain\Model\Substitution $substitutionToRemove)
    {
        $this->substitutions->detach($substitutionToRemove);
    }

    /**
     * Returns the substitutions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Substitution> $substitutions
     */
    public function getSubstitutions()
    {
        return $this->substitutions;
    }

    /**
     * Sets the substitutions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Substitution> $substitutions
     * @return void
     */
    public function setSubstitutions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $substitutions)
    {
        $this->substitutions = $substitutions;
    }

    /**
     * Adds a Map
     *
     * @param \R3H6\Chatbot\Domain\Model\Map $map
     * @return void
     */
    public function addMap(\R3H6\Chatbot\Domain\Model\Map $map)
    {
        $this->maps->attach($map);
    }

    /**
     * Removes a Map
     *
     * @param \R3H6\Chatbot\Domain\Model\Map $mapToRemove The Map to be removed
     * @return void
     */
    public function removeMap(\R3H6\Chatbot\Domain\Model\Map $mapToRemove)
    {
        $this->maps->detach($mapToRemove);
    }

    /**
     * Returns the maps
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Map> $maps
     */
    public function getMaps()
    {
        return $this->maps;
    }

    /**
     * Sets the maps
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Map> $maps
     * @return void
     */
    public function setMaps(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $maps)
    {
        $this->maps = $maps;
    }

    /**
     * Adds a Set
     *
     * @param \R3H6\Chatbot\Domain\Model\Set $set
     * @return void
     */
    public function addSet(\R3H6\Chatbot\Domain\Model\Set $set)
    {
        $this->sets->attach($set);
    }

    /**
     * Removes a Set
     *
     * @param \R3H6\Chatbot\Domain\Model\Set $setToRemove The Set to be removed
     * @return void
     */
    public function removeSet(\R3H6\Chatbot\Domain\Model\Set $setToRemove)
    {
        $this->sets->detach($setToRemove);
    }

    /**
     * Returns the sets
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Set> $sets
     */
    public function getSets()
    {
        return $this->sets;
    }

    /**
     * Sets the sets
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Set> $sets
     * @return void
     */
    public function setSets(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sets)
    {
        $this->sets = $sets;
    }

    /**
     * Adds a Aiml
     *
     * @param \R3H6\Chatbot\Domain\Model\Aiml $aiml
     * @return void
     */
    public function addAiml(\R3H6\Chatbot\Domain\Model\Aiml $aiml)
    {
        $this->aiml->attach($aiml);
    }

    /**
     * Removes a Aiml
     *
     * @param \R3H6\Chatbot\Domain\Model\Aiml $aimlToRemove The Aiml to be removed
     * @return void
     */
    public function removeAiml(\R3H6\Chatbot\Domain\Model\Aiml $aimlToRemove)
    {
        $this->aiml->detach($aimlToRemove);
    }

    /**
     * Returns the aiml
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Aiml> $aiml
     */
    public function getAiml()
    {
        return $this->aiml;
    }

    /**
     * Sets the aiml
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\R3H6\Chatbot\Domain\Model\Aiml> $aiml
     * @return void
     */
    public function setAiml(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $aiml)
    {
        $this->aiml = $aiml;
    }

    public function learnAiml(Aiml $aiml)
    {

    }
}

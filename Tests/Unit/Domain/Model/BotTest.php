<?php
namespace R3H6\Chatbot\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author R3 H6 <r3h6@outlook.com>
 */
class BotTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \R3H6\Chatbot\Domain\Model\Bot
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \R3H6\Chatbot\Domain\Model\Bot();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSubstitutionsReturnsInitialValueForSubstitution()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getSubstitutions()
        );
    }

    /**
     * @test
     */
    public function setSubstitutionsForObjectStorageContainingSubstitutionSetsSubstitutions()
    {
        $substitution = new \R3H6\Chatbot\Domain\Model\Substitution();
        $objectStorageHoldingExactlyOneSubstitutions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneSubstitutions->attach($substitution);
        $this->subject->setSubstitutions($objectStorageHoldingExactlyOneSubstitutions);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneSubstitutions,
            'substitutions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addSubstitutionToObjectStorageHoldingSubstitutions()
    {
        $substitution = new \R3H6\Chatbot\Domain\Model\Substitution();
        $substitutionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $substitutionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($substitution));
        $this->inject($this->subject, 'substitutions', $substitutionsObjectStorageMock);

        $this->subject->addSubstitution($substitution);
    }

    /**
     * @test
     */
    public function removeSubstitutionFromObjectStorageHoldingSubstitutions()
    {
        $substitution = new \R3H6\Chatbot\Domain\Model\Substitution();
        $substitutionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $substitutionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($substitution));
        $this->inject($this->subject, 'substitutions', $substitutionsObjectStorageMock);

        $this->subject->removeSubstitution($substitution);
    }

    /**
     * @test
     */
    public function getMapsReturnsInitialValueForMap()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getMaps()
        );
    }

    /**
     * @test
     */
    public function setMapsForObjectStorageContainingMapSetsMaps()
    {
        $map = new \R3H6\Chatbot\Domain\Model\Map();
        $objectStorageHoldingExactlyOneMaps = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneMaps->attach($map);
        $this->subject->setMaps($objectStorageHoldingExactlyOneMaps);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneMaps,
            'maps',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addMapToObjectStorageHoldingMaps()
    {
        $map = new \R3H6\Chatbot\Domain\Model\Map();
        $mapsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $mapsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($map));
        $this->inject($this->subject, 'maps', $mapsObjectStorageMock);

        $this->subject->addMap($map);
    }

    /**
     * @test
     */
    public function removeMapFromObjectStorageHoldingMaps()
    {
        $map = new \R3H6\Chatbot\Domain\Model\Map();
        $mapsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $mapsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($map));
        $this->inject($this->subject, 'maps', $mapsObjectStorageMock);

        $this->subject->removeMap($map);
    }

    /**
     * @test
     */
    public function getSetsReturnsInitialValueForSet()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getSets()
        );
    }

    /**
     * @test
     */
    public function setSetsForObjectStorageContainingSetSetsSets()
    {
        $set = new \R3H6\Chatbot\Domain\Model\Set();
        $objectStorageHoldingExactlyOneSets = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneSets->attach($set);
        $this->subject->setSets($objectStorageHoldingExactlyOneSets);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneSets,
            'sets',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addSetToObjectStorageHoldingSets()
    {
        $set = new \R3H6\Chatbot\Domain\Model\Set();
        $setsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $setsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($set));
        $this->inject($this->subject, 'sets', $setsObjectStorageMock);

        $this->subject->addSet($set);
    }

    /**
     * @test
     */
    public function removeSetFromObjectStorageHoldingSets()
    {
        $set = new \R3H6\Chatbot\Domain\Model\Set();
        $setsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $setsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($set));
        $this->inject($this->subject, 'sets', $setsObjectStorageMock);

        $this->subject->removeSet($set);
    }

    /**
     * @test
     */
    public function getAimlReturnsInitialValueForAiml()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAiml()
        );
    }

    /**
     * @test
     */
    public function setAimlForObjectStorageContainingAimlSetsAiml()
    {
        $aiml = new \R3H6\Chatbot\Domain\Model\Aiml();
        $objectStorageHoldingExactlyOneAiml = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAiml->attach($aiml);
        $this->subject->setAiml($objectStorageHoldingExactlyOneAiml);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAiml,
            'aiml',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAimlToObjectStorageHoldingAiml()
    {
        $aiml = new \R3H6\Chatbot\Domain\Model\Aiml();
        $aimlObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $aimlObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($aiml));
        $this->inject($this->subject, 'aiml', $aimlObjectStorageMock);

        $this->subject->addAiml($aiml);
    }

    /**
     * @test
     */
    public function removeAimlFromObjectStorageHoldingAiml()
    {
        $aiml = new \R3H6\Chatbot\Domain\Model\Aiml();
        $aimlObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $aimlObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($aiml));
        $this->inject($this->subject, 'aiml', $aimlObjectStorageMock);

        $this->subject->removeAiml($aiml);
    }
}

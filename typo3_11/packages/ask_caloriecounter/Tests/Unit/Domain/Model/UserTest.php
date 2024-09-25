<?php

declare(strict_types=1);

namespace ASK\AskCaloriecounter\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class UserTest extends UnitTestCase
{
    /**
     * @var \ASK\AskCaloriecounter\Domain\Model\User|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \ASK\AskCaloriecounter\Domain\Model\User::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getUserReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getUser()
        );
    }

    /**
     * @test
     */
    public function setUserForIntSetsUser(): void
    {
        $this->subject->setUser(12);

        self::assertEquals(12, $this->subject->_get('user'));
    }

    /**
     * @test
     */
    public function getGarminuserReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getGarminuser()
        );
    }

    /**
     * @test
     */
    public function setGarminuserForStringSetsGarminuser(): void
    {
        $this->subject->setGarminuser('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('garminuser'));
    }

    /**
     * @test
     */
    public function getIntakesReturnsInitialValueForFoodIntake(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getIntakes()
        );
    }

    /**
     * @test
     */
    public function setIntakesForObjectStorageContainingFoodIntakeSetsIntakes(): void
    {
        $intake = new \ASK\AskCaloriecounter\Domain\Model\FoodIntake();
        $objectStorageHoldingExactlyOneIntakes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneIntakes->attach($intake);
        $this->subject->setIntakes($objectStorageHoldingExactlyOneIntakes);

        self::assertEquals($objectStorageHoldingExactlyOneIntakes, $this->subject->_get('intakes'));
    }

    /**
     * @test
     */
    public function addIntakeToObjectStorageHoldingIntakes(): void
    {
        $intake = new \ASK\AskCaloriecounter\Domain\Model\FoodIntake();
        $intakesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $intakesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($intake));
        $this->subject->_set('intakes', $intakesObjectStorageMock);

        $this->subject->addIntake($intake);
    }

    /**
     * @test
     */
    public function removeIntakeFromObjectStorageHoldingIntakes(): void
    {
        $intake = new \ASK\AskCaloriecounter\Domain\Model\FoodIntake();
        $intakesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $intakesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($intake));
        $this->subject->_set('intakes', $intakesObjectStorageMock);

        $this->subject->removeIntake($intake);
    }

    /**
     * @test
     */
    public function getConsumptionsReturnsInitialValueForCalorieConsumption(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getConsumptions()
        );
    }

    /**
     * @test
     */
    public function setConsumptionsForObjectStorageContainingCalorieConsumptionSetsConsumptions(): void
    {
        $consumption = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption();
        $objectStorageHoldingExactlyOneConsumptions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneConsumptions->attach($consumption);
        $this->subject->setConsumptions($objectStorageHoldingExactlyOneConsumptions);

        self::assertEquals($objectStorageHoldingExactlyOneConsumptions, $this->subject->_get('consumptions'));
    }

    /**
     * @test
     */
    public function addConsumptionToObjectStorageHoldingConsumptions(): void
    {
        $consumption = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption();
        $consumptionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $consumptionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($consumption));
        $this->subject->_set('consumptions', $consumptionsObjectStorageMock);

        $this->subject->addConsumption($consumption);
    }

    /**
     * @test
     */
    public function removeConsumptionFromObjectStorageHoldingConsumptions(): void
    {
        $consumption = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption();
        $consumptionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $consumptionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($consumption));
        $this->subject->_set('consumptions', $consumptionsObjectStorageMock);

        $this->subject->removeConsumption($consumption);
    }
}

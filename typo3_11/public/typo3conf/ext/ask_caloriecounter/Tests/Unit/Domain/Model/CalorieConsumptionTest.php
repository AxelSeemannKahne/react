<?php

declare(strict_types=1);

namespace ASK\AskCaloriecounter\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class CalorieConsumptionTest extends UnitTestCase
{
    /**
     * @var \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption::class,
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
    public function getCaloriesReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCalories()
        );
    }

    /**
     * @test
     */
    public function setCaloriesForStringSetsCalories(): void
    {
        $this->subject->setCalories('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('calories'));
    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForCalorieConsumptionType(): void
    {
        self::assertEquals(
            null,
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForCalorieConsumptionTypeSetsType(): void
    {
        $typeFixture = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType();
        $this->subject->setType($typeFixture);

        self::assertEquals($typeFixture, $this->subject->_get('type'));
    }
}

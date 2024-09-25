<?php

declare(strict_types=1);

namespace ASK\AskCaloriecounter\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class FoodIntakeTest extends UnitTestCase
{
    /**
     * @var \ASK\AskCaloriecounter\Domain\Model\FoodIntake|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \ASK\AskCaloriecounter\Domain\Model\FoodIntake::class,
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
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getCalReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getCal()
        );
    }

    /**
     * @test
     */
    public function setCalForIntSetsCal(): void
    {
        $this->subject->setCal(12);

        self::assertEquals(12, $this->subject->_get('cal'));
    }

    /**
     * @test
     */
    public function getSugarReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getSugar()
        );
    }

    /**
     * @test
     */
    public function setSugarForIntSetsSugar(): void
    {
        $this->subject->setSugar(12);

        self::assertEquals(12, $this->subject->_get('sugar'));
    }

    /**
     * @test
     */
    public function getProteinReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getProtein()
        );
    }

    /**
     * @test
     */
    public function setProteinForStringSetsProtein(): void
    {
        $this->subject->setProtein('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('protein'));
    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForFoodType(): void
    {
        self::assertEquals(
            null,
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForFoodTypeSetsType(): void
    {
        $typeFixture = new \ASK\AskCaloriecounter\Domain\Model\FoodType();
        $this->subject->setType($typeFixture);

        self::assertEquals($typeFixture, $this->subject->_get('type'));
    }
}

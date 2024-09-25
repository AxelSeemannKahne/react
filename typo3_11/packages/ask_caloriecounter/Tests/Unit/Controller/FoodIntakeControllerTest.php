<?php

declare(strict_types=1);

namespace ASK\AskCaloriecounter\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class FoodIntakeControllerTest extends UnitTestCase
{
    /**
     * @var \ASK\AskCaloriecounter\Controller\FoodIntakeController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\ASK\AskCaloriecounter\Controller\FoodIntakeController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllFoodIntakesFromRepositoryAndAssignsThemToView(): void
    {
        $allFoodIntakes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $foodIntakeRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodIntakeRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $foodIntakeRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFoodIntakes));
        $this->subject->_set('foodIntakeRepository', $foodIntakeRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('foodIntakes', $allFoodIntakes);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFoodIntakeToView(): void
    {
        $foodIntake = new \ASK\AskCaloriecounter\Domain\Model\FoodIntake();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('foodIntake', $foodIntake);

        $this->subject->showAction($foodIntake);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenFoodIntakeToFoodIntakeRepository(): void
    {
        $foodIntake = new \ASK\AskCaloriecounter\Domain\Model\FoodIntake();

        $foodIntakeRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodIntakeRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodIntakeRepository->expects(self::once())->method('add')->with($foodIntake);
        $this->subject->_set('foodIntakeRepository', $foodIntakeRepository);

        $this->subject->createAction($foodIntake);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenFoodIntakeToView(): void
    {
        $foodIntake = new \ASK\AskCaloriecounter\Domain\Model\FoodIntake();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('foodIntake', $foodIntake);

        $this->subject->editAction($foodIntake);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenFoodIntakeInFoodIntakeRepository(): void
    {
        $foodIntake = new \ASK\AskCaloriecounter\Domain\Model\FoodIntake();

        $foodIntakeRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodIntakeRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodIntakeRepository->expects(self::once())->method('update')->with($foodIntake);
        $this->subject->_set('foodIntakeRepository', $foodIntakeRepository);

        $this->subject->updateAction($foodIntake);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenFoodIntakeFromFoodIntakeRepository(): void
    {
        $foodIntake = new \ASK\AskCaloriecounter\Domain\Model\FoodIntake();

        $foodIntakeRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodIntakeRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodIntakeRepository->expects(self::once())->method('remove')->with($foodIntake);
        $this->subject->_set('foodIntakeRepository', $foodIntakeRepository);

        $this->subject->deleteAction($foodIntake);
    }
}

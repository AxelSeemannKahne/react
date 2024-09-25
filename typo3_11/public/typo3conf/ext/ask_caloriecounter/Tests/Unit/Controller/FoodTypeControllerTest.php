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
class FoodTypeControllerTest extends UnitTestCase
{
    /**
     * @var \ASK\AskCaloriecounter\Controller\FoodTypeController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\ASK\AskCaloriecounter\Controller\FoodTypeController::class))
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
    public function listActionFetchesAllFoodTypesFromRepositoryAndAssignsThemToView(): void
    {
        $allFoodTypes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $foodTypeRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodTypeRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $foodTypeRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFoodTypes));
        $this->subject->_set('foodTypeRepository', $foodTypeRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('foodTypes', $allFoodTypes);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFoodTypeToView(): void
    {
        $foodType = new \ASK\AskCaloriecounter\Domain\Model\FoodType();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('foodType', $foodType);

        $this->subject->showAction($foodType);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenFoodTypeToFoodTypeRepository(): void
    {
        $foodType = new \ASK\AskCaloriecounter\Domain\Model\FoodType();

        $foodTypeRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodTypeRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodTypeRepository->expects(self::once())->method('add')->with($foodType);
        $this->subject->_set('foodTypeRepository', $foodTypeRepository);

        $this->subject->createAction($foodType);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenFoodTypeToView(): void
    {
        $foodType = new \ASK\AskCaloriecounter\Domain\Model\FoodType();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('foodType', $foodType);

        $this->subject->editAction($foodType);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenFoodTypeInFoodTypeRepository(): void
    {
        $foodType = new \ASK\AskCaloriecounter\Domain\Model\FoodType();

        $foodTypeRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodTypeRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodTypeRepository->expects(self::once())->method('update')->with($foodType);
        $this->subject->_set('foodTypeRepository', $foodTypeRepository);

        $this->subject->updateAction($foodType);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenFoodTypeFromFoodTypeRepository(): void
    {
        $foodType = new \ASK\AskCaloriecounter\Domain\Model\FoodType();

        $foodTypeRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodTypeRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodTypeRepository->expects(self::once())->method('remove')->with($foodType);
        $this->subject->_set('foodTypeRepository', $foodTypeRepository);

        $this->subject->deleteAction($foodType);
    }
}

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
class CalorieConsumptionTypeControllerTest extends UnitTestCase
{
    /**
     * @var \ASK\AskCaloriecounter\Controller\CalorieConsumptionTypeController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\ASK\AskCaloriecounter\Controller\CalorieConsumptionTypeController::class))
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
    public function listActionFetchesAllCalorieConsumptionTypesFromRepositoryAndAssignsThemToView(): void
    {
        $allCalorieConsumptionTypes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $calorieConsumptionTypeRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $calorieConsumptionTypeRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCalorieConsumptionTypes));
        $this->subject->_set('calorieConsumptionTypeRepository', $calorieConsumptionTypeRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('calorieConsumptionTypes', $allCalorieConsumptionTypes);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCalorieConsumptionTypeToView(): void
    {
        $calorieConsumptionType = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('calorieConsumptionType', $calorieConsumptionType);

        $this->subject->showAction($calorieConsumptionType);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenCalorieConsumptionTypeToCalorieConsumptionTypeRepository(): void
    {
        $calorieConsumptionType = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType();

        $calorieConsumptionTypeRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $calorieConsumptionTypeRepository->expects(self::once())->method('add')->with($calorieConsumptionType);
        $this->subject->_set('calorieConsumptionTypeRepository', $calorieConsumptionTypeRepository);

        $this->subject->createAction($calorieConsumptionType);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenCalorieConsumptionTypeToView(): void
    {
        $calorieConsumptionType = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('calorieConsumptionType', $calorieConsumptionType);

        $this->subject->editAction($calorieConsumptionType);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenCalorieConsumptionTypeInCalorieConsumptionTypeRepository(): void
    {
        $calorieConsumptionType = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType();

        $calorieConsumptionTypeRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $calorieConsumptionTypeRepository->expects(self::once())->method('update')->with($calorieConsumptionType);
        $this->subject->_set('calorieConsumptionTypeRepository', $calorieConsumptionTypeRepository);

        $this->subject->updateAction($calorieConsumptionType);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenCalorieConsumptionTypeFromCalorieConsumptionTypeRepository(): void
    {
        $calorieConsumptionType = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType();

        $calorieConsumptionTypeRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $calorieConsumptionTypeRepository->expects(self::once())->method('remove')->with($calorieConsumptionType);
        $this->subject->_set('calorieConsumptionTypeRepository', $calorieConsumptionTypeRepository);

        $this->subject->deleteAction($calorieConsumptionType);
    }
}

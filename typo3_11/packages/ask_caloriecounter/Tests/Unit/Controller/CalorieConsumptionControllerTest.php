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
class CalorieConsumptionControllerTest extends UnitTestCase
{
    /**
     * @var \ASK\AskCaloriecounter\Controller\CalorieConsumptionController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\ASK\AskCaloriecounter\Controller\CalorieConsumptionController::class))
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
    public function listActionFetchesAllCalorieConsumptionsFromRepositoryAndAssignsThemToView(): void
    {
        $allCalorieConsumptions = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $calorieConsumptionRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\CalorieConsumptionRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $calorieConsumptionRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCalorieConsumptions));
        $this->subject->_set('calorieConsumptionRepository', $calorieConsumptionRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('calorieConsumptions', $allCalorieConsumptions);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCalorieConsumptionToView(): void
    {
        $calorieConsumption = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('calorieConsumption', $calorieConsumption);

        $this->subject->showAction($calorieConsumption);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenCalorieConsumptionToCalorieConsumptionRepository(): void
    {
        $calorieConsumption = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption();

        $calorieConsumptionRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\CalorieConsumptionRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $calorieConsumptionRepository->expects(self::once())->method('add')->with($calorieConsumption);
        $this->subject->_set('calorieConsumptionRepository', $calorieConsumptionRepository);

        $this->subject->createAction($calorieConsumption);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenCalorieConsumptionToView(): void
    {
        $calorieConsumption = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('calorieConsumption', $calorieConsumption);

        $this->subject->editAction($calorieConsumption);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenCalorieConsumptionInCalorieConsumptionRepository(): void
    {
        $calorieConsumption = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption();

        $calorieConsumptionRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\CalorieConsumptionRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $calorieConsumptionRepository->expects(self::once())->method('update')->with($calorieConsumption);
        $this->subject->_set('calorieConsumptionRepository', $calorieConsumptionRepository);

        $this->subject->updateAction($calorieConsumption);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenCalorieConsumptionFromCalorieConsumptionRepository(): void
    {
        $calorieConsumption = new \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption();

        $calorieConsumptionRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\CalorieConsumptionRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $calorieConsumptionRepository->expects(self::once())->method('remove')->with($calorieConsumption);
        $this->subject->_set('calorieConsumptionRepository', $calorieConsumptionRepository);

        $this->subject->deleteAction($calorieConsumption);
    }
}

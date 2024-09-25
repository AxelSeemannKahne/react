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
class FoodPresetControllerTest extends UnitTestCase
{
    /**
     * @var \ASK\AskCaloriecounter\Controller\FoodPresetController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\ASK\AskCaloriecounter\Controller\FoodPresetController::class))
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
    public function listActionFetchesAllFoodPresetsFromRepositoryAndAssignsThemToView(): void
    {
        $allFoodPresets = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $foodPresetRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodPresetRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $foodPresetRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFoodPresets));
        $this->subject->_set('foodPresetRepository', $foodPresetRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('foodPresets', $allFoodPresets);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFoodPresetToView(): void
    {
        $foodPreset = new \ASK\AskCaloriecounter\Domain\Model\FoodPreset();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('foodPreset', $foodPreset);

        $this->subject->showAction($foodPreset);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenFoodPresetToFoodPresetRepository(): void
    {
        $foodPreset = new \ASK\AskCaloriecounter\Domain\Model\FoodPreset();

        $foodPresetRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodPresetRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodPresetRepository->expects(self::once())->method('add')->with($foodPreset);
        $this->subject->_set('foodPresetRepository', $foodPresetRepository);

        $this->subject->createAction($foodPreset);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenFoodPresetToView(): void
    {
        $foodPreset = new \ASK\AskCaloriecounter\Domain\Model\FoodPreset();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('foodPreset', $foodPreset);

        $this->subject->editAction($foodPreset);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenFoodPresetInFoodPresetRepository(): void
    {
        $foodPreset = new \ASK\AskCaloriecounter\Domain\Model\FoodPreset();

        $foodPresetRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodPresetRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodPresetRepository->expects(self::once())->method('update')->with($foodPreset);
        $this->subject->_set('foodPresetRepository', $foodPresetRepository);

        $this->subject->updateAction($foodPreset);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenFoodPresetFromFoodPresetRepository(): void
    {
        $foodPreset = new \ASK\AskCaloriecounter\Domain\Model\FoodPreset();

        $foodPresetRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\FoodPresetRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodPresetRepository->expects(self::once())->method('remove')->with($foodPreset);
        $this->subject->_set('foodPresetRepository', $foodPresetRepository);

        $this->subject->deleteAction($foodPreset);
    }
}

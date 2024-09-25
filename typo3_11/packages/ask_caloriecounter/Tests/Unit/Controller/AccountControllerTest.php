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
class AccountControllerTest extends UnitTestCase
{
    /**
     * @var \ASK\AskCaloriecounter\Controller\AccountController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\ASK\AskCaloriecounter\Controller\AccountController::class))
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
    public function listActionFetchesAllAccountsFromRepositoryAndAssignsThemToView(): void
    {
        $allAccounts = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $accountRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\AccountRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $accountRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAccounts));
        $this->subject->_set('accountRepository', $accountRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('accounts', $allAccounts);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAccountToView(): void
    {
        $account = new \ASK\AskCaloriecounter\Domain\Model\Account();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('account', $account);

        $this->subject->showAction($account);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenAccountToAccountRepository(): void
    {
        $account = new \ASK\AskCaloriecounter\Domain\Model\Account();

        $accountRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\AccountRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $accountRepository->expects(self::once())->method('add')->with($account);
        $this->subject->_set('accountRepository', $accountRepository);

        $this->subject->createAction($account);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAccountToView(): void
    {
        $account = new \ASK\AskCaloriecounter\Domain\Model\Account();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('account', $account);

        $this->subject->editAction($account);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAccountInAccountRepository(): void
    {
        $account = new \ASK\AskCaloriecounter\Domain\Model\Account();

        $accountRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\AccountRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $accountRepository->expects(self::once())->method('update')->with($account);
        $this->subject->_set('accountRepository', $accountRepository);

        $this->subject->updateAction($account);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenAccountFromAccountRepository(): void
    {
        $account = new \ASK\AskCaloriecounter\Domain\Model\Account();

        $accountRepository = $this->getMockBuilder(\ASK\AskCaloriecounter\Domain\Repository\AccountRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $accountRepository->expects(self::once())->method('remove')->with($account);
        $this->subject->_set('accountRepository', $accountRepository);

        $this->subject->deleteAction($account);
    }
}

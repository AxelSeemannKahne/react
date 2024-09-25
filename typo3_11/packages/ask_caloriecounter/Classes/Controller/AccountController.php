<?php

declare(strict_types=1);

namespace ASK\AskCaloriecounter\Controller;


/**
 * This file is part of the "CalorieCounter" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 
 */

/**
 * AccountController
 */
class AccountController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * accountRepository
     *
     * @var \ASK\AskCaloriecounter\Domain\Repository\AccountRepository
     */
    protected $accountRepository = null;

    /**
     * @param \ASK\AskCaloriecounter\Domain\Repository\AccountRepository $accountRepository
     */
    public function injectAccountRepository(\ASK\AskCaloriecounter\Domain\Repository\AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $accounts = $this->accountRepository->findAll();
        $this->view->assign('accounts', $accounts);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\Account $account
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\ASK\AskCaloriecounter\Domain\Model\Account $account): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('account', $account);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\Account $newAccount
     */
    public function createAction(\ASK\AskCaloriecounter\Domain\Model\Account $newAccount)
    {
        die("create Account");

        //        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        //        $this->accountRepository->add($newAccount);
        //        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\Account $account
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("account")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\ASK\AskCaloriecounter\Domain\Model\Account $account): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('account', $account);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\Account $account
     */
    public function updateAction(\ASK\AskCaloriecounter\Domain\Model\Account $account)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->accountRepository->update($account);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\Account $account
     */
    public function deleteAction(\ASK\AskCaloriecounter\Domain\Model\Account $account)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->accountRepository->remove($account);
        $this->redirect('list');
    }
}

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
 * FoodIntakeController
 */
class FoodIntakeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * foodIntakeRepository
     *
     * @var \ASK\AskCaloriecounter\Domain\Repository\FoodIntakeRepository
     */
    protected $foodIntakeRepository = null;

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
        $foodIntakes = $this->foodIntakeRepository->findAll();
        $this->view->assign('foodIntakes', $foodIntakes);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodIntake $foodIntake
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\ASK\AskCaloriecounter\Domain\Model\FoodIntake $foodIntake): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('foodIntake', $foodIntake);
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
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodIntake $newFoodIntake
     */
    public function createAction(\ASK\AskCaloriecounter\Domain\Model\FoodIntake $newFoodIntake)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodIntakeRepository->add($newFoodIntake);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodIntake $foodIntake
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("foodIntake")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\ASK\AskCaloriecounter\Domain\Model\FoodIntake $foodIntake): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('foodIntake', $foodIntake);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodIntake $foodIntake
     */
    public function updateAction(\ASK\AskCaloriecounter\Domain\Model\FoodIntake $foodIntake)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodIntakeRepository->update($foodIntake);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodIntake $foodIntake
     */
    public function deleteAction(\ASK\AskCaloriecounter\Domain\Model\FoodIntake $foodIntake)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodIntakeRepository->remove($foodIntake);
        $this->redirect('list');
    }

    /**
     * @param \ASK\AskCaloriecounter\Domain\Repository\FoodIntakeRepository $foodIntakeRepository
     */
    public function injectFoodIntakeRepository(\ASK\AskCaloriecounter\Domain\Repository\FoodIntakeRepository $foodIntakeRepository)
    {
        $this->foodIntakeRepository = $foodIntakeRepository;
    }
}

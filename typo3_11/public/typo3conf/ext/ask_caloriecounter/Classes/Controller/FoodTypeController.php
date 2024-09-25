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
 * FoodTypeController
 */
class FoodTypeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * foodTypeRepository
     *
     * @var \ASK\AskCaloriecounter\Domain\Repository\FoodTypeRepository
     */
    protected $foodTypeRepository = null;

    /**
     * @param \ASK\AskCaloriecounter\Domain\Repository\FoodTypeRepository $foodTypeRepository
     */
    public function injectFoodTypeRepository(\ASK\AskCaloriecounter\Domain\Repository\FoodTypeRepository $foodTypeRepository)
    {
        $this->foodTypeRepository = $foodTypeRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $foodTypes = $this->foodTypeRepository->findAll();
        $this->view->assign('foodTypes', $foodTypes);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodType $foodType
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\ASK\AskCaloriecounter\Domain\Model\FoodType $foodType): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('foodType', $foodType);
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
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodType $newFoodType
     */
    public function createAction(\ASK\AskCaloriecounter\Domain\Model\FoodType $newFoodType)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodTypeRepository->add($newFoodType);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodType $foodType
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("foodType")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\ASK\AskCaloriecounter\Domain\Model\FoodType $foodType): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('foodType', $foodType);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodType $foodType
     */
    public function updateAction(\ASK\AskCaloriecounter\Domain\Model\FoodType $foodType)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodTypeRepository->update($foodType);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodType $foodType
     */
    public function deleteAction(\ASK\AskCaloriecounter\Domain\Model\FoodType $foodType)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodTypeRepository->remove($foodType);
        $this->redirect('list');
    }
}

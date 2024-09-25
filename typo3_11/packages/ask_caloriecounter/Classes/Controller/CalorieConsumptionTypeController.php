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
 * CalorieConsumptionTypeController
 */
class CalorieConsumptionTypeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

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
        $calorieConsumptionTypes = $this->calorieConsumptionTypeRepository->findAll();
        $this->view->assign('calorieConsumptionTypes', $calorieConsumptionTypes);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $calorieConsumptionType
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $calorieConsumptionType): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('calorieConsumptionType', $calorieConsumptionType);
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
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $newCalorieConsumptionType
     */
    public function createAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $newCalorieConsumptionType)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->calorieConsumptionTypeRepository->add($newCalorieConsumptionType);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $calorieConsumptionType
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("calorieConsumptionType")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $calorieConsumptionType): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('calorieConsumptionType', $calorieConsumptionType);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $calorieConsumptionType
     */
    public function updateAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $calorieConsumptionType)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->calorieConsumptionTypeRepository->update($calorieConsumptionType);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $calorieConsumptionType
     */
    public function deleteAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $calorieConsumptionType)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->calorieConsumptionTypeRepository->remove($calorieConsumptionType);
        $this->redirect('list');
    }
}

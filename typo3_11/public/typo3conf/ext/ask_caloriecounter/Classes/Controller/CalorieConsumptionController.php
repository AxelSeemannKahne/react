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
 * CalorieConsumptionController
 */
class CalorieConsumptionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * calorieConsumptionRepository
     *
     * @var \ASK\AskCaloriecounter\Domain\Repository\CalorieConsumptionRepository
     */
    protected $calorieConsumptionRepository = null;

    /**
     * @param \ASK\AskCaloriecounter\Domain\Repository\CalorieConsumptionRepository $calorieConsumptionRepository
     */
    public function injectCalorieConsumptionRepository(\ASK\AskCaloriecounter\Domain\Repository\CalorieConsumptionRepository $calorieConsumptionRepository)
    {
        $this->calorieConsumptionRepository = $calorieConsumptionRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $calorieConsumptions = $this->calorieConsumptionRepository->findAll();
        $this->view->assign('calorieConsumptions', $calorieConsumptions);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $calorieConsumption
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $calorieConsumption): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('calorieConsumption', $calorieConsumption);
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
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $newCalorieConsumption
     */
    public function createAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $newCalorieConsumption)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->calorieConsumptionRepository->add($newCalorieConsumption);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $calorieConsumption
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("calorieConsumption")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $calorieConsumption): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('calorieConsumption', $calorieConsumption);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $calorieConsumption
     */
    public function updateAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $calorieConsumption)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->calorieConsumptionRepository->update($calorieConsumption);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $calorieConsumption
     */
    public function deleteAction(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $calorieConsumption)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->calorieConsumptionRepository->remove($calorieConsumption);
        $this->redirect('list');
    }
}

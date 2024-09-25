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
 * FoodPresetController
 */
class FoodPresetController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * foodPresetRepository
     *
     * @var \ASK\AskCaloriecounter\Domain\Repository\FoodPresetRepository
     */
    protected $foodPresetRepository = null;

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
        $foodPresets = $this->foodPresetRepository->findAll();
        $this->view->assign('foodPresets', $foodPresets);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodPreset $foodPreset
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\ASK\AskCaloriecounter\Domain\Model\FoodPreset $foodPreset): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('foodPreset', $foodPreset);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {

        echo "111"; die();
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodPreset $newFoodPreset
     */
    public function createAction(\ASK\AskCaloriecounter\Domain\Model\FoodPreset $newFoodPreset)
    {
        echo 1;
        die;

        //        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        //        $this->foodPresetRepository->add($newFoodPreset);
        //        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodPreset $foodPreset
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("foodPreset")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\ASK\AskCaloriecounter\Domain\Model\FoodPreset $foodPreset): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('foodPreset', $foodPreset);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodPreset $foodPreset
     */
    public function updateAction(\ASK\AskCaloriecounter\Domain\Model\FoodPreset $foodPreset)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodPresetRepository->update($foodPreset);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodPreset $foodPreset
     */
    public function deleteAction(\ASK\AskCaloriecounter\Domain\Model\FoodPreset $foodPreset)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodPresetRepository->remove($foodPreset);
        $this->redirect('list');
    }

    /**
     * @param \ASK\AskCaloriecounter\Domain\Repository\FoodPresetRepository $foodPresetRepository
     */
    public function injectFoodPresetRepository(\ASK\AskCaloriecounter\Domain\Repository\FoodPresetRepository $foodPresetRepository)
    {
        $this->foodPresetRepository = $foodPresetRepository;
    }
}

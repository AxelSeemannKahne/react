<?php

declare(strict_types=1);

namespace ASK\AskCaloriecounter\Domain\Model;


/**
 * This file is part of the "CalorieCounter" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 
 */

/**
 * Account
 */
class Account extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * user
     *
     * @var int
     */
    protected $user = 0;

    /**
     * garminuser
     *
     * @var string
     */
    protected $garminuser = '';

    /**
     * intakes
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ASK\AskCaloriecounter\Domain\Model\FoodIntake>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $intakes = null;

    /**
     * consumptions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $consumptions = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->intakes = $this->intakes ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->consumptions = $this->consumptions ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the user
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the user
     *
     * @param int $user
     * @return void
     */
    public function setUser(int $user)
    {
        $this->user = $user;
    }

    /**
     * Returns the garminuser
     *
     * @return string
     */
    public function getGarminuser()
    {
        return $this->garminuser;
    }

    /**
     * Sets the garminuser
     *
     * @param string $garminuser
     * @return void
     */
    public function setGarminuser(string $garminuser)
    {
        $this->garminuser = $garminuser;
    }

    /**
     * Adds a FoodIntake
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodIntake $intake
     * @return void
     */
    public function addIntake(\ASK\AskCaloriecounter\Domain\Model\FoodIntake $intake)
    {
        $this->intakes->attach($intake);
    }

    /**
     * Removes a FoodIntake
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodIntake $intakeToRemove The FoodIntake to be removed
     * @return void
     */
    public function removeIntake(\ASK\AskCaloriecounter\Domain\Model\FoodIntake $intakeToRemove)
    {
        $this->intakes->detach($intakeToRemove);
    }

    /**
     * Returns the intakes
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ASK\AskCaloriecounter\Domain\Model\FoodIntake>
     */
    public function getIntakes()
    {
        return $this->intakes;
    }

    /**
     * Sets the intakes
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ASK\AskCaloriecounter\Domain\Model\FoodIntake> $intakes
     * @return void
     */
    public function setIntakes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $intakes)
    {
        $this->intakes = $intakes;
    }

    /**
     * Adds a CalorieConsumption
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $consumption
     * @return void
     */
    public function addConsumption(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $consumption)
    {
        $this->consumptions->attach($consumption);
    }

    /**
     * Removes a CalorieConsumption
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $consumptionToRemove The CalorieConsumption to be removed
     * @return void
     */
    public function removeConsumption(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption $consumptionToRemove)
    {
        $this->consumptions->detach($consumptionToRemove);
    }

    /**
     * Returns the consumptions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption>
     */
    public function getConsumptions()
    {
        return $this->consumptions;
    }

    /**
     * Sets the consumptions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ASK\AskCaloriecounter\Domain\Model\CalorieConsumption> $consumptions
     * @return void
     */
    public function setConsumptions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $consumptions)
    {
        $this->consumptions = $consumptions;
    }
}

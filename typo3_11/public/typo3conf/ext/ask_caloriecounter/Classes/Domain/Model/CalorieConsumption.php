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
 * CalorieConsumption
 */
class CalorieConsumption extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * calories
     *
     * @var string
     */
    protected $calories = null;

    /**
     * type
     *
     * @var \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType
     */
    protected $type = null;

    /**
     * Returns the calories
     *
     * @return string
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Sets the calories
     *
     * @param string $calories
     * @return void
     */
    public function setCalories(string $calories)
    {
        $this->calories = $calories;
    }

    /**
     * Returns the type
     *
     * @return \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $type
     * @return void
     */
    public function setType(\ASK\AskCaloriecounter\Domain\Model\CalorieConsumptionType $type)
    {
        $this->type = $type;
    }
}

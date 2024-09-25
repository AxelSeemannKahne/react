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
 * FoodPreset
 */
class FoodPreset extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = null;

    /**
     * cal
     *
     * @var int
     */
    protected $cal = null;

    /**
     * sugar
     *
     * @var int
     */
    protected $sugar = null;

    /**
     * protein
     *
     * @var int
     */
    protected $protein = null;

    /**
     * type
     *
     * @var \ASK\AskCaloriecounter\Domain\Model\FoodType
     */
    protected $type = null;

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the cal
     *
     * @return int
     */
    public function getCal()
    {
        return $this->cal;
    }

    /**
     * Sets the cal
     *
     * @param int $cal
     * @return void
     */
    public function setCal(int $cal)
    {
        $this->cal = $cal;
    }

    /**
     * Returns the sugar
     *
     * @return int
     */
    public function getSugar()
    {
        return $this->sugar;
    }

    /**
     * Sets the sugar
     *
     * @param int $sugar
     * @return void
     */
    public function setSugar(int $sugar)
    {
        $this->sugar = $sugar;
    }

    /**
     * Returns the protein
     *
     * @return int
     */
    public function getProtein()
    {
        return $this->protein;
    }

    /**
     * Sets the protein
     *
     * @param int $protein
     * @return void
     */
    public function setProtein(int $protein)
    {
        $this->protein = $protein;
    }

    /**
     * Returns the type
     *
     * @return \ASK\AskCaloriecounter\Domain\Model\FoodType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param \ASK\AskCaloriecounter\Domain\Model\FoodType $type
     * @return void
     */
    public function setType(\ASK\AskCaloriecounter\Domain\Model\FoodType $type)
    {
        $this->type = $type;
    }
}

<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'AskCaloriecounter',
        'Caloriecounterapi',
        [   \ASK\AskCaloriecounter\Controller\FoodPresetController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\AccountController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\FoodTypeController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\FoodIntakeController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\CalorieConsumptionController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\CalorieConsumptionTypeController::class => 'list, insert, create, new'
        ],
        // non-cacheable actions
        [
            \ASK\AskCaloriecounter\Controller\AccountController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\FoodTypeController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\FoodPresetController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\FoodIntakeController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\CalorieConsumptionController::class => 'list, insert, create, new',
            \ASK\AskCaloriecounter\Controller\CalorieConsumptionTypeController::class => 'list, insert, create, new'
        ]
    );

})();

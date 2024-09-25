<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'AskCaloriecounter',
        'Caloriecounterapi',
        [
            \ASK\AskCaloriecounter\Controller\FoodPresetController::class => 'create, list, insert'
        ],
        // non-cacheable actions
        [
            \ASK\AskCaloriecounter\Controller\AccountController::class => 'create, update, delete',
            \ASK\AskCaloriecounter\Controller\FoodTypeController::class => 'create, update, delete',
            \ASK\AskCaloriecounter\Controller\FoodPresetController::class => 'create, update, delete, insert',
            \ASK\AskCaloriecounter\Controller\FoodIntakeController::class => 'create, update, delete',
            \ASK\AskCaloriecounter\Controller\CalorieConsumptionController::class => 'create, update, delete',
            \ASK\AskCaloriecounter\Controller\CalorieConsumptionTypeController::class => 'create, update, delete'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'AskCaloriecounter',
        'Account',
        [
            \ASK\AskCaloriecounter\Controller\AccountController::class => 'list'
        ],
        // non-cacheable actions
        [
            \ASK\AskCaloriecounter\Controller\AccountController::class => 'create, update, delete',
            \ASK\AskCaloriecounter\Controller\FoodTypeController::class => 'create, update, delete',
            \ASK\AskCaloriecounter\Controller\FoodPresetController::class => 'create, update, delete',
            \ASK\AskCaloriecounter\Controller\FoodIntakeController::class => 'create, update, delete',
            \ASK\AskCaloriecounter\Controller\CalorieConsumptionController::class => 'create, update, delete',
            \ASK\AskCaloriecounter\Controller\CalorieConsumptionTypeController::class => 'create, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    caloriecounterapi {
                        iconIdentifier = ask_caloriecounter-plugin-caloriecounterapi
                        title = LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_ask_caloriecounter_caloriecounterapi.name
                        description = LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_ask_caloriecounter_caloriecounterapi.description
                        tt_content_defValues {
                            CType = list
                            list_type = askcaloriecounter_caloriecounterapi
                        }
                    }
                    account {
                        iconIdentifier = ask_caloriecounter-plugin-account
                        title = LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_ask_caloriecounter_account.name
                        description = LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_ask_caloriecounter_account.description
                        tt_content_defValues {
                            CType = list
                            list_type = askcaloriecounter_account
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

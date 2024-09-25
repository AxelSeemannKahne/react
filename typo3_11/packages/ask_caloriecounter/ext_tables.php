<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_askcaloriecounter_domain_model_account', 'EXT:ask_caloriecounter/Resources/Private/Language/locallang_csh_tx_askcaloriecounter_domain_model_account.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_askcaloriecounter_domain_model_account');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_askcaloriecounter_domain_model_foodtype', 'EXT:ask_caloriecounter/Resources/Private/Language/locallang_csh_tx_askcaloriecounter_domain_model_foodtype.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_askcaloriecounter_domain_model_foodtype');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_askcaloriecounter_domain_model_foodpreset', 'EXT:ask_caloriecounter/Resources/Private/Language/locallang_csh_tx_askcaloriecounter_domain_model_foodpreset.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_askcaloriecounter_domain_model_foodpreset');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_askcaloriecounter_domain_model_foodintake', 'EXT:ask_caloriecounter/Resources/Private/Language/locallang_csh_tx_askcaloriecounter_domain_model_foodintake.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_askcaloriecounter_domain_model_foodintake');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_askcaloriecounter_domain_model_calorieconsumption', 'EXT:ask_caloriecounter/Resources/Private/Language/locallang_csh_tx_askcaloriecounter_domain_model_calorieconsumption.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_askcaloriecounter_domain_model_calorieconsumption');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_askcaloriecounter_domain_model_calorieconsumptiontype', 'EXT:ask_caloriecounter/Resources/Private/Language/locallang_csh_tx_askcaloriecounter_domain_model_calorieconsumptiontype.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_askcaloriecounter_domain_model_calorieconsumptiontype');
})();

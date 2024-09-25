<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_askcaloriecounter_domain_model_account',
        'label' => 'user',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'garminuser',
        'iconfile' => 'EXT:ask_caloriecounter/Resources/Public/Icons/tx_askcaloriecounter_domain_model_account.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'user, garminuser, intakes, consumptions, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_askcaloriecounter_domain_model_account',
                'foreign_table_where' => 'AND {#tx_askcaloriecounter_domain_model_account}.{#pid}=###CURRENT_PID### AND {#tx_askcaloriecounter_domain_model_account}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'user' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_askcaloriecounter_domain_model_account.user',
            'description' => 'LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_askcaloriecounter_domain_model_account.user.description',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        'garminuser' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_askcaloriecounter_domain_model_account.garminuser',
            'description' => 'LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_askcaloriecounter_domain_model_account.garminuser.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'intakes' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_askcaloriecounter_domain_model_account.intakes',
            'description' => 'LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_askcaloriecounter_domain_model_account.intakes.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_askcaloriecounter_domain_model_foodintake',
                'foreign_field' => 'account',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'consumptions' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_askcaloriecounter_domain_model_account.consumptions',
            'description' => 'LLL:EXT:ask_caloriecounter/Resources/Private/Language/locallang_db.xlf:tx_askcaloriecounter_domain_model_account.consumptions.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_askcaloriecounter_domain_model_calorieconsumption',
                'foreign_field' => 'account',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
    
    ],
];

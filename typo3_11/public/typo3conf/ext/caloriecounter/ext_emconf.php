<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Rest-Api Caloriecounter',
    'description' => 'Caloriecounter-Extension for EXT:nnrestapi',
    'category' => 'frontend',
    'author' => 'Axel Seemann-Kahne',
    'author_email' => 'info@seemann-kahne.de',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-11.9.99',
            'nnhelpers' => '1.4.0-0.0.0',
            'nnrestapi' => '1.0.0-0.0.0',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];

<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_bot',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'enablecolumns' => [
        ],
        'searchFields' => 'name,substitutions,maps,sets,aiml',
        'iconfile' => 'EXT:chatbot/Resources/Public/Icons/tx_chatbot_domain_model_bot.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'name, substitutions, maps, sets, aiml',
    ],
    'types' => [
        '1' => ['showitem' => 'name, substitutions, maps, sets, aiml'],
    ],
    'columns' => [

        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_bot.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'substitutions' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_bot.substitutions',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chatbot_domain_model_substitution',
                'foreign_field' => 'bot',
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
        'maps' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_bot.maps',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chatbot_domain_model_map',
                'foreign_field' => 'bot',
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
        'sets' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_bot.sets',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chatbot_domain_model_set',
                'foreign_field' => 'bot',
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
        'aiml' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_bot.aiml',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chatbot_domain_model_aiml',
                'foreign_field' => 'bot',
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

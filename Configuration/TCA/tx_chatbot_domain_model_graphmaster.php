<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_graphmaster',
        'label' => 'word',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        // 'cruser_id' => 'cruser_id',
        // 'delete' => 'deleted',
        'enablecolumns' => [
            // 'disabled' => 'hidden',
            // 'starttime' => 'starttime',
            // 'endtime' => 'endtime',
        ],
        'searchFields' => 'word,parent,bot,template',
        'iconfile' => 'EXT:chatbot/Resources/Public/Icons/tx_chatbot_domain_model_graphmaster.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, word, parent, bot, template',
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, word, parent, bot, template, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'word' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_graphmaster.word',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'parent' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_graphmaster.parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_chatbot_domain_model_graphmaster',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'bot' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_graphmaster.bot',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_chatbot_domain_model_bot',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'template' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_graphmaster.template',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chatbot_domain_model_template',
                'minitems' => 0,
                'maxitems' => 1,
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

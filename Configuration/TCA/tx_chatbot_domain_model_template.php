<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_template',
        'label' => 'aiml',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'enablecolumns' => [
        ],
        'searchFields' => 'aiml,pattern,that,topic,file,bot',
        'iconfile' => 'EXT:chatbot/Resources/Public/Icons/tx_chatbot_domain_model_template.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'aiml, pattern, that, topic, file, bot',
    ],
    'types' => [
        '1' => ['showitem' => 'aiml, pattern, that, topic, file, bot'],
    ],
    'columns' => [

        'aiml' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_template.aiml',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'pattern' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_template.pattern',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'that' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_template.that',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'topic' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_template.topic',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'file' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_template.file',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'bot' => [
            'exclude' => true,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_template.bot',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_chatbot_domain_model_bot',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
    
    ],
];

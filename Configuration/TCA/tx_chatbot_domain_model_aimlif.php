<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_aimlif',
        'label' => 'activation_count',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'enablecolumns' => [
        ],
        'searchFields' => 'activation_count,pattern,that,topic,template,file_name,bot',
        'iconfile' => 'EXT:chatbot/Resources/Public/Icons/tx_chatbot_domain_model_aimlif.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'activation_count, pattern, that, topic, template, file_name, bot',
    ],
    'types' => [
        '1' => ['showitem' => 'activation_count, pattern, that, topic, template, file_name, bot'],
    ],
    'columns' => [

        'activation_count' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_aimlif.activation_count',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'pattern' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_aimlif.pattern',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'that' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_aimlif.that',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'topic' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_aimlif.topic',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'template' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_aimlif.template',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'file_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_aimlif.file_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'bot' => [
            'exclude' => true,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_aimlif.bot',
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

<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_template',
        'label' => 'template',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'enablecolumns' => [
        ],
        'searchFields' => 'template,pattern,file,bot',
        'iconfile' => 'EXT:chatbot/Resources/Public/Icons/tx_chatbot_domain_model_template.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'template, pattern, file, bot',
    ],
    'types' => [
        '1' => ['showitem' => 'template, pattern, file, bot'],
    ],
    'columns' => [

        'template' => [
            'exclude' => false,
            'label' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_template.template',
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

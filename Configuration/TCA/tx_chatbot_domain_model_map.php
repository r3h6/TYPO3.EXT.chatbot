<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:chatbot/Resources/Private/Language/locallang_db.xlf:tx_chatbot_domain_model_map',
        'label' => 'uid',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'enablecolumns' => [
        ],
        'searchFields' => '',
        'iconfile' => 'EXT:chatbot/Resources/Public/Icons/tx_chatbot_domain_model_map.gif'
    ],
    'interface' => [
        'showRecordFieldList' => '',
    ],
    'types' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [

        'bot' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];

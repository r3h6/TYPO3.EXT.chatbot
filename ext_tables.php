<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('chatbot', 'Configuration/TypoScript', 'Chatbot');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chatbot_domain_model_bot', 'EXT:chatbot/Resources/Private/Language/locallang_csh_tx_chatbot_domain_model_bot.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chatbot_domain_model_bot');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chatbot_domain_model_graphmaster', 'EXT:chatbot/Resources/Private/Language/locallang_csh_tx_chatbot_domain_model_graphmaster.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chatbot_domain_model_graphmaster');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chatbot_domain_model_aimlif', 'EXT:chatbot/Resources/Private/Language/locallang_csh_tx_chatbot_domain_model_aimlif.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chatbot_domain_model_aimlif');

    }
);

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

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chatbot_domain_model_template', 'EXT:chatbot/Resources/Private/Language/locallang_csh_tx_chatbot_domain_model_template.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chatbot_domain_model_template');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chatbot_domain_model_set', 'EXT:chatbot/Resources/Private/Language/locallang_csh_tx_chatbot_domain_model_set.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chatbot_domain_model_set');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chatbot_domain_model_map', 'EXT:chatbot/Resources/Private/Language/locallang_csh_tx_chatbot_domain_model_map.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chatbot_domain_model_map');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chatbot_domain_model_substitution', 'EXT:chatbot/Resources/Private/Language/locallang_csh_tx_chatbot_domain_model_substitution.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chatbot_domain_model_substitution');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_chatbot_domain_model_aiml', 'EXT:chatbot/Resources/Private/Language/locallang_csh_tx_chatbot_domain_model_aiml.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_chatbot_domain_model_aiml');

    }
);

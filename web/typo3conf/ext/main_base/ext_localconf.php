<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {
        // ================================================================================
        // Include basic typoscript constants on extension-install
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants(trim('
            <INCLUDE_TYPOSCRIPT: source="FILE:EXT:main_base/Configuration/TypoScript/constants.ts">
        '));
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(trim('
            <INCLUDE_TYPOSCRIPT: source="FILE:EXT:main_base/Configuration/TypoScript/setup.ts">
        '));
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(trim('
            <INCLUDE_TYPOSCRIPT: source="FILE:EXT:main_base/Configuration/TypoScript/pageTsConf.ts">
        '));
    }
);

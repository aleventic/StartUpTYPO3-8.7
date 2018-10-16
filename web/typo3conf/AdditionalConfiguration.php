<?php
namespace TYPO3\CMS\Core\Utility;
require_once PATH_site . '../vendor/autoload.php';
use TYPO3\CMS\Core\Utility\StringUtility;

// We let the loader load context and environment specific configuration
// No other code must go in here!
$configLoader = \Helhum\TYPO3\Distribution\ConfigLoaderFactory::buildLoader(
    $context = GeneralUtility::getApplicationContext()->isProduction() ? 'production' : 'development',
    $rootDir = dirname(dirname(__DIR__)),
    $fixedCacheIdentifier = getenv('CONFIGURATION_CACHE_IDENTIFIER')
);
$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
    $GLOBALS['TYPO3_CONF_VARS'],
    $configLoader->load()
);

// Konfiguration für die Nutzung von APC/APCu
// Von https://www.mittwald.de/faq/frage/apcu-mit-typo3-verwenden
if (!function_exists('mw_setCacheBackend')) {
    function mw_setCacheBackend($backendClassName, $cacheName)
    {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheName]['backend'] = $backendClassName;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheName]['options'] = array();
    }
}

$mw_apcExtensionLoaded = extension_loaded('apc');
$mw_apcuExtensionLoaded = extension_loaded('apcu');
$mw_apcAvailable = $mw_apcExtensionLoaded || $mw_apcuExtensionLoaded;
$mw_apcEnabled = ini_get('apc.enabled') == TRUE;

if (GeneralUtility::getApplicationContext() !== 'Development' && $mw_apcAvailable && $mw_apcEnabled) {
    $mw_backendClassName = $mw_apcExtensionLoaded ? 'TYPO3\\CMS\\Core\\Cache\\Backend\\ApcBackend'
        : 'TYPO3\\CMS\\Core\\Cache\\Backend\\ApcuBackend';
} else {
    $mw_backendClassName = 'TYPO3\\CMS\\Core\\Cache\\Backend\\FileBackend';
}

mw_setCacheBackend($mw_backendClassName, 'cache_hash');
mw_setCacheBackend($mw_backendClassName, 'cache_imagesizes');
mw_setCacheBackend($mw_backendClassName, 'cache_pages');
mw_setCacheBackend($mw_backendClassName, 'cache_pagesection');
mw_setCacheBackend($mw_backendClassName, 'cache_rootline');
mw_setCacheBackend($mw_backendClassName, 'extbase_datamapfactory_datamap');
mw_setCacheBackend($mw_backendClassName, 'extbase_object');
mw_setCacheBackend($mw_backendClassName, 'extbase_reflection');
mw_setCacheBackend($mw_backendClassName, 'extbase_typo3dbbackend_queries');
mw_setCacheBackend($mw_backendClassName, 'extbase_typo3dbbackend_tablecolumns');

if (PHP_SAPI === 'cli') {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_object']['backend'] = 'TYPO3\\CMS\\Core\\Cache\\Backend\\FileBackend';
}

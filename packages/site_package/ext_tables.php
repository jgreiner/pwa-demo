<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

call_user_func(
    static function ($extensionKey): void {

        ExtensionManagementUtility::allowTableOnStandardPages('tx_sitepackage_slide');
        ExtensionUtility::registerPlugin('SitePackage', 'DemoPlugin', 'Demo plugin');
    },
    'site_package'
);

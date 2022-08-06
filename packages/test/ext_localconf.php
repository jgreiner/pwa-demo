<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Test',
        'Test',
        [
            \Analogde\Test\Controller\Model1Controller::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \Analogde\Test\Controller\Model1Controller::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    test {
                        iconIdentifier = test-plugin-test
                        title = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_test.name
                        description = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_test.description
                        tt_content_defValues {
                            CType = list
                            list_type = test_test
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

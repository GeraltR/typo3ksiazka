<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Extbooks',
        'Listksiazka',
        [
            \ExtBooks\Extbooks\Controller\KsiazkaController::class => 'list, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \ExtBooks\Extbooks\Controller\KsiazkaController::class => 'new, create, edit, update'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Extbooks',
        'Listautor',
        [
            \ExtBooks\Extbooks\Controller\AutorController::class => 'list, show, new, create, edit, update, delete, '
        ],
        // non-cacheable actions
        [
            \ExtBooks\Extbooks\Controller\AutorController::class => 'new, create, edit, update'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    listksiazka {
                        iconIdentifier = extbooks-plugin-listksiazka
                        title = LLL:EXT:extbooks/Resources/Private/Language/locallang_db.xlf:tx_extbooks_listksiazka.name
                        description = LLL:EXT:extbooks/Resources/Private/Language/locallang_db.xlf:tx_extbooks_listksiazka.description
                        tt_content_defValues {
                            CType = list
                            list_type = extbooks_listksiazka
                        }
                    }
                    listautor {
                        iconIdentifier = extbooks-plugin-listautor
                        title = LLL:EXT:extbooks/Resources/Private/Language/locallang_db.xlf:tx_extbooks_listautor.name
                        description = LLL:EXT:extbooks/Resources/Private/Language/locallang_db.xlf:tx_extbooks_listautor.description
                        tt_content_defValues {
                            CType = list
                            list_type = extbooks_listautor
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

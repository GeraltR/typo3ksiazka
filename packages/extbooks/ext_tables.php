<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Extbooks',
        'web',
        'ebtlistksiazka',
        '',
        [
            \ExtBooks\Extbooks\Controller\KsiazkaController::class => 'list, show, new, create, edit, update, delete, ',
            
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:extbooks/Resources/Public/Icons/user_mod_ebtlistksiazka.svg',
            'labels' => 'LLL:EXT:extbooks/Resources/Private/Language/locallang_ebtlistksiazka.xlf',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Extbooks',
        'web',
        'ebtlistautor',
        '',
        [
            \ExtBooks\Extbooks\Controller\AutorController::class => 'list, show, new, create, edit, update, delete, ',
            
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:extbooks/Resources/Public/Icons/user_mod_ebtlistautor.svg',
            'labels' => 'LLL:EXT:extbooks/Resources/Private/Language/locallang_ebtlistautor.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_extbooks_domain_model_autor', 'EXT:extbooks/Resources/Private/Language/locallang_csh_tx_extbooks_domain_model_autor.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_extbooks_domain_model_autor');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_extbooks_domain_model_ksiazka', 'EXT:extbooks/Resources/Private/Language/locallang_csh_tx_extbooks_domain_model_ksiazka.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_extbooks_domain_model_ksiazka');
})();

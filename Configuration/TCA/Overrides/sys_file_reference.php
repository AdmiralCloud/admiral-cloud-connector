<?php

$additionalFields = [
    'tx_admiralcloudconnector_crop' => [
        'exclude' => true,
        'label' => 'LLL:EXT:admiralcloud_connector/Resources/Private/Language/locallang_be.xlf:sys_file_reference.tx_admiralcloudconnector_crop',
        'config' => [
            'type' => 'input',
            'renderType' => 'admiralCloudImageManipulation'
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'sys_file_reference',
    $additionalFields,
    1
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'sys_file_reference',
    'imageoverlayPalette',
    '--linebreak--,tx_admiralcloudconnector_crop'
);

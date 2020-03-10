<?php

use CPSIT\AdmiralcloudConnector\Backend\InlineControlContainer;

defined('TYPO3_MODE') || die('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1433198160] = [
    'nodeName' => 'inline',
    'priority' => 50,
    'class' => InlineControlContainer::class,
];

// Register the FAL driver for AdmiralCloud
$GLOBALS['TYPO3_CONF_VARS']['SYS']['fal']['registeredDrivers'][\CPSIT\AdmiralcloudConnector\Resource\AdmiralcloudDriver::KEY] = [
'class' => \CPSIT\AdmiralcloudConnector\Resource\AdmiralcloudDriver::class,
'label' => 'Admiral Cloud',
// @todo: is currently needed to not break the backend. Needs to be fixed in TYPO3
'flexFormDS' => 'FILE:EXT:admiralcloud_connector/Configuration/FlexForms/AdmiralcloudDriverFlexForm.xml'
];

// Register slot to use AdmiralCloud API for processed file
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class)
    ->connect(
        \TYPO3\CMS\Extensionmanager\Utility\InstallUtility::class,
        'afterExtensionInstall',
        \CPSIT\AdmiralcloudConnector\Slot\InstallSlot::class,
        'createAdmiralCloudFileStorage'
    );

\TYPO3\CMS\Core\Resource\Rendering\RendererRegistry::getInstance()
    ->registerRendererClass(\CPSIT\AdmiralcloudConnector\Resource\Rendering\AssetRenderer::class);

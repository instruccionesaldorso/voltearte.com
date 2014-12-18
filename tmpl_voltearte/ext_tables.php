<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:tmpl_voltearte/Configuration/PageTSConfig/Setup.ts">');

// Add Custom Content Elements
///////////////////////////////////////

/** @var $cm \Voltearte\TmplVoltearte\ContentElements\ConfigurationManager */
$cm = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Voltearte\\TmplVoltearte\\ContentElements\\ConfigurationManager');

// Foundation Orbit
///////////////////////////////////////
$cm->registerExtbasePluginForElement('tmplvoltearte_orbit');
$cm->addNewContentElementWizardForElement('tmplvoltearte_orbit');

$orbitSlidesTCA = array(
	'tx_tmplvoltearte_orbitslides' => array(
		'exclude' => 1,
		'label' => 'Slides',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_tmplvoltearte_domain_model_orbitslide',
			'foreign_field' => 'foreign_id'
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $orbitSlidesTCA);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tmplvoltearte_domain_model_orbitslide');

$TCA['tt_content']['types']['tmplvoltearte_orbit']['showitem']=
	'--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
	--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
	--div--;Slides, tx_tmplvoltearte_orbitslides,
	--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.appearance,--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.frames;frames,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
	--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
	--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access';

if (TYPO3_MODE === 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['BackendLayoutDataProvider']['file']
		= 'Voltearte\\TmplVoltearte\\Provider\\FileProvider';
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['BackendLayoutFileProvider']['ext'][]
		= $_EXTKEY;
}

?>
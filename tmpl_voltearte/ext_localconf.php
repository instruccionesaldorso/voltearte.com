<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

/** @var $cm \Voltearte\TmplVoltearte\ContentElements\ConfigurationManager */
$cm = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Voltearte\\TmplVoltearte\\ContentElements\\ConfigurationManager');

// Foundation Orbit
///////////////////////////////////////
$cm->registerElement(
	'tmplvoltearte_orbit',
	array(
		'title' => 'Foundation Orbit',
		'extkey' => $_EXTKEY,
		'vendor' => 'Voltearte',
		'ctype' => 'orbit',
		'controller' => 'Orbit',
		'action' => 'index',
		'wizard' => array(
			'description' => 'Foundation Orbit Element (Slider)',
			'icon' => $iconPath . 'Orbit.png',
		)
	)
);

$cm->configureExtbasePluginForElement('tmplvoltearte_orbit');


?>
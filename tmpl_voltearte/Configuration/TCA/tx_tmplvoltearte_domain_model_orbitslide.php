<?php

return array(
	'ctrl' => array(
		'title'	=> 'Orbit Slide',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'hideTable' => TRUE,
		'sortby' => 'sorting',
		'searchFields' => 'title',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('tmpl_voltearte') . 'Resources/Public/Icons/Slide.png',
	),
	'interface' => array(
		'showRecordFieldList' => 'title',
	),
	'types' => array(
		'0' => array(
			'showitem' => 'title, slide_contents,
			--div--;System, hidden, starttime, endtime',
		),
	),
	'palettes' => array(
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m') - 1, date('d'), date('Y')),
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m') - 1, date('d'), date('Y')),
				),
			),
		),

		'foreign_id' => array(
			'exclude' => 1,
			'config' => array(
				'type' => 'passthrough',
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tmpl_voltearte/locallang.xlf:tx_tmplvoltearte_domain_model_orbitslide.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
			),
		),
		'slide_contents' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:tmpl_voltearte/locallang.xlf:tx_tmplvoltearte_domain_model_orbitslide.slide_contents',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tt_content',
				'foreign_table' => 'tt_content',
				'MM' => 'tx_tmplvoltearte_orbitslide_ttcontent_mm',
				'multiple' => FALSE,
				'maxitems' => 999,
				'size' => 10,
			),
		),
	),

);

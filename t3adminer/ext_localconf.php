<?php
if (!defined('TYPO3_MODE')) die ('Access denied.');

if (TYPO3_MODE == 'BE') {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['logoff_post_processing'][] =
		'EXT:t3adminer/classes/class.tx_t3adminer_hooks.php:tx_t3adminer_hooks->logoffHook';
}
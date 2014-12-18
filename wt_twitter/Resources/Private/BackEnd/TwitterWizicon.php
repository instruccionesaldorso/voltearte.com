<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Alex Kellner <alexander.kellner@einpraegsam.net>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 * Class that adds the wizard icon.
 *
 * @author    Alex Kellner <alexander.kellner@einpraegsam.net>
 * @package    TYPO3
 * @subpackage    tx_wttwitter
 */
class tx_wttwitter_pi1_wizicon {

	/**
	 * Processing the wizard items array
	 *
	 * @param array $wizardItems: The wizard items
	 *
	 * @return array Modified array with wizard items
	 */
	function proc($wizardItems) {
		global $LANG;

		$LL = $this->includeLocalLang();

		$wizardItems['plugins_tx_wttwitter_pi1'] = array(
			'icon' => t3lib_extMgm::extRelPath('wt_twitter') . '/Resources/Public/Icons/ce_wiz.gif',
			'title' => $LANG->getLLL('list_title', $LL),
			'description' => $LANG->getLLL('list_plus_wiz_description', $LL),
			'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=wttwitter_list'
		);

		return $wizardItems;
	}

	/**
	 * Reads the [extDir]/locallang.xml and returns the $LOCAL_LANG array found in that file.
	 *
	 * @return array The array with language labels
	 */
	function includeLocalLang() {
		$llFile = t3lib_extMgm::extPath('wt_twitter') . '/Resources/Private/Language/locallang_module.xml';

		$LOCAL_LANG = Tx_WtTwitter_Utility_Compatibility::readLLXMLfile($llFile, $GLOBALS['LANG']->lang);

		return $LOCAL_LANG;
	}
}
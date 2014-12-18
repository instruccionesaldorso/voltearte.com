<?php
namespace Voltearte\TmplVoltearte\ViewHelpers;

	/***************************************************************
	 *  Copyright notice
	 *
	 *  (c) 2014 Sergio Catalá <sergio.catala@e-net.info>, e-net Consulting GmbH & Co. KG
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
 * Class AbideValidationViewHelper
 *
 * @package Enet\PowermailFeFoundation\ViewHelpers
 */
class AbideValidationViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 *
	 *
	 * @param \In2code\Powermail\Domain\Model\Field $field
	 * @return array
	 */
	public function render(\In2code\Powermail\Domain\Model\Field $field) {
		$validationAttributes = array();
		if ($field->getMandatory()) {
			$validationAttributes['required'] = '';
		}
		switch ($field->getValidation()) {
			// email
			case 1:
				$validationAttributes['pattern'] = 'email';
				break;

			// URL
			case 2:
				$validationAttributes['pattern'] = 'url';
				break;

			// phone
			case 3:
				$validationAttributes['pattern'] = '^((00|\+)34)?(0?((-| )?[2-9][0-9]{1,}))+$';
				break;

			// numbers only
			case 4:
				$validationAttributes['pattern'] = 'number';
				break;

			// letters only
			case 5:
				$validationAttributes['pattern'] = 'alpha';
				break;
		}
		return $validationAttributes;
	}
}
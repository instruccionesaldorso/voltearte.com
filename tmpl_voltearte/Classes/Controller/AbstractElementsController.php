<?php
namespace Voltearte\TmplVoltearte\Controller;

/***********************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Sergio Catalá <sergio.catala@e-net.info>, e-net Development
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 **********************************************************************/

class AbstractElementsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Uid of content element
	 *
	 * @var integer
	 */
	protected $uid;

	/**
	 * The Data of Content Element
	 * @var array
	 */
	protected $data = array();

	/**
	 * Init
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->data = $this->configurationManager->getContentObject()->data;
		$this->uid = $this->data['uid'];
	}

	/**
	 * @param $uid
	 * @param string $field
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	protected function resolveFileReferencesOfContentElementByField ($uid, $field = 'image') {
		/** @var $resourceFactory \TYPO3\CMS\Core\Resource\ResourceFactory */
		$resourceFactory = $this->objectManager->get('TYPO3\\CMS\\Core\\Resource\\ResourceFactory');

		/** @var $imageStorage \TYPO3\CMS\Extbase\Persistence\ObjectStorage */
		$imageStorage = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage');

		$database = $this->getDatabaseConnection();
		$res = $database->exec_SELECTgetRows(
			'*',
			'sys_file_reference',
			'uid_foreign = ' . $uid . ' AND fieldname = "' . $field . '" AND deleted=0 AND hidden=0',
			'',
			'sorting_foreign'
		);

		foreach ($res as $row) {
			$fileReference = $resourceFactory->getFileReferenceObject($row['uid'], $row);
			$imageStorage->attach($fileReference);
		}

		return $imageStorage;
	}

	/**
	 * Get database connection
	 *
	 * @return \TYPO3\CMS\Core\Database\DatabaseConnection
	 */
	protected function getDatabaseConnection() {
		return $GLOBALS['TYPO3_DB'];
	}

	/**
	 * @return \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
	 */
	protected function getTSFE() {
		return $GLOBALS['TSFE'];
	}

}
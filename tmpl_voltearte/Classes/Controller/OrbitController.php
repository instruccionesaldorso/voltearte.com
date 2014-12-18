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

class OrbitController extends AbstractElementsController {

	/**
	 * @inject
	 * @var \Voltearte\TmplVoltearte\Domain\Repository\OrbitSlideRepository
	 */
	protected $orbitSlideRepository;

	public function indexAction() {
		$tsfe = $this->getTSFE();

		$slides = $this->orbitSlideRepository->findByForeignId($this->uid);

		$slidesArray = array();

		/** @var $slide \Voltearte\TmplVoltearte\Domain\Model\OrbitSlide */
		foreach ($slides as $slide) {
			$contentElemens = $slide->getSlideContents();

			/** @var $contentElement \Voltearte\TmplVoltearte\Domain\Model\SlideContent */
			foreach ($contentElemens as $contentElement) {
				$conf = array(
					'tables' => 'tt_content',
					'source' => $contentElement->getUid()
				);

				$slidesArray[$slide->getUid()]['records'][] = $contentElement = $tsfe->cObj->RECORDS($conf);
			}
		}

		$this->view
			->assign('data', $this->data)
			->assign('slides', $slidesArray);
	}

}
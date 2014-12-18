<?php
namespace Voltearte\TmplVoltearte\Domain\Model;

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

class OrbitSlide extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string $title
	 */
	protected $title;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Voltearte\TmplVoltearte\Domain\Model\SlideContent> $slideContents
	 */
	protected $slideContents;

	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Voltearte\TmplVoltearte\Domain\Model\SlideContent> $slideContents
	 * @return void
	 */
	public function setSlideContents($slideContents) {
		$this->slideContents = $slideContents;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Voltearte\TmplVoltearte\Domain\Model\SlideContent>
	 */
	public function getSlideContents() {
		return $this->slideContents;
	}

}
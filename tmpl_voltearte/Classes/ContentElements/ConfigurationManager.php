<?php
namespace Voltearte\TmplVoltearte\ContentElements;

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

/**
 * ConfigurationManager
 *
 * This class adds Custom Content Elements which are stored in tt_content.
 * They are connected to a Extbase Controller and Action, so it is rendered with a fluid template.
 *
 * Usage:
 * 1) Register element in ext_localconf by calling registerElement().
 *    The identifier must be unique and has the form extkey_ctype (lowercase and only that one underscore)
 *    Some configurations are required (see $defaultConfiguration for details)
 * 2) Configure Extbase plugin in ext_localconf by calling configureExtbasePluginForElement()
 * 3) Register Extbase plugin for element in ext_tables by calling registerExtbasePluginForElement()
 * 5) (optional) Add new content element wizard for element in ext_tables by calling addNewContentElementWizardForElement()
 * 6) Set $TCA['tt_content']['types'][<ELEMENT>]['showitem'] in ext_tables
 *
 */
class ConfigurationManager implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * The array of elements
	 *
	 * @var array
	 */
	protected $elements = array();

	/**
	 * Default configuration array
	 *
	 * title:         The title of Content Element (required)
	 * extkey:        The extkey of calling Extension (required)
	 * vendorName:    The Vendor name of calling Extension (optional, but must be set if you want a namespaced Controller)
	 * ctype:         The ctype of content element (prefixed with extkey_) (required)
	 * controller:    The Controller which is called for this Content Element (required)
	 * action:        The Action which is called for this Content Element (required)
	 * wizard:        The configuration of New Content Element Wizard
	 * - description: The description of Content Element in New Content Element Wizard (optional, but should be set if you add Wizard)
	 * - icon:        The icon for New Content Element Wizard (optional)
	 * - tabkey       The Tab Key of the Tab for New Content Element Wizard (optional, default "foundation")
	 * - tabTitle     The title of the Tab (optional, should be set if you set non existing tabkey)
	 *
	 * @var array
	 */
	protected $defaultConfiguration = array(
		'title' => '',
		'extkey' => '',
		'vendor' => '',
		'ctype' => '',
		'controller' => '',
		'action' => '',
		'wizard' => array(
			'description' => 'A custom Content Element generated by tmpl_foundation Content Elements ConfigurationManager',
			'tabKey' => 'foundation',
			'tabTitle' => 'Foundation Elements',
			'icon' => 'gfx/c_wiz/user_defined.gif',
		)
	);

	/**
	 * Registers an element by a given identifier and configuration and puts it in the elements-Array
	 * Checks if required configuration is set and throws exceptions otherwise
	 * Merges given configuration with default configuration (given config has priority)
	 *
	 * For use in ext_localconf.php
	 *
	 * @param $extkey
	 * @param $elementName
	 * @param array $configuration
	 * @throws \Voltearte\TmplVoltearte\Exception
	 */
	public function registerElement($identifier, array $configuration) {
		if (empty($identifier)) {
			throw new \Voltearte\TmplVoltearte\Exception('The identifier must not be empty', 1373891836);
		}
		if (empty($configuration['title'])) {
			throw new \Voltearte\TmplVoltearte\Exception('The title must be set in configuration', 1373892286);
		}
		if (empty($configuration['extkey'])) {
			throw new \Voltearte\TmplVoltearte\Exception('The extkey must be set in configuration', 1373962531);
		}
		if (empty($configuration['ctype'])) {
			throw new \Voltearte\TmplVoltearte\Exception('The ctype must be set in configuration', 1373962541);
		}
		if (empty($configuration['controller'])) {
			throw new \Voltearte\TmplVoltearte\Exception('The controller must be set in configuration', 1373962548);
		}
		if (empty($configuration['action'])) {
			throw new \Voltearte\TmplVoltearte\Exception('The action must be set in configuration', 1373962556);
		}

		if (!empty($this->elements[$identifier])) {
			/*
			 * This Exception is temporary disabled because the Extension Manager loads the ext_localconf.php
			 * a second time after an extension has been installed, which would result in an exception every time an extension is
			 * installed, because this ConfigurationManager is a Singelton.
			 * This behavior of the Extension Manager will probalby get fixed in 6.2.
			 *
			 * throw new \Voltearte\TmplVoltearte\Exception('Element with given identifier is already registered', 1373890800);
			 */
		}

		$configuration = \TYPO3\CMS\Core\Utility\GeneralUtility::array_merge_recursive_overrule($this->defaultConfiguration, $configuration);
		$this->elements[$identifier] = $configuration;
	}

	/**
	 * Configures the extbase plugin for the content element
	 *
	 * For use in ext_localconf.php
	 *
	 * @param $identifier
	 */
	public function configureExtbasePluginForElement($identifier) {
		$config = $this->getConfiguration($identifier);

		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
			$config['vendor'] . '.' . $config['extkey'],
			$config['ctype'],
			array(
				$config['controller'] => $config['action']
			),
			array(),
			\TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT

		);
	}

	/**
	 * Registers Extbase Plugin for the given element
	 *
	 * For use in ext_tables.php
	 *
	 * @param $identifier
	 */
	public function registerExtbasePluginForElement($identifier) {
		$config = $this->getConfiguration($identifier);

		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
			$config['vendor'] . '.' . $config['extkey'],
			$config['ctype'],
			$config['title']
		);
	}

	public function addNewContentElementWizardForElement($identifier) {
		$config = $this->getConfiguration($identifier);

		$tsConfig = trim('
mod.wizards.newContentElement.wizardItems.' . $config['wizard']['tabKey'] . ' {
	'. (!\TYPO3\CMS\Core\Utility\GeneralUtility::inList('common,special,forms,plugins', $config['wizard']['tabKey']) ? 'header = ' . $config['wizard']['tabTitle'] : '') .'
	elements {
		'. $identifier . ' {
			title       = ' . $config['title'] . '
			icon        = ' . $config['wizard']['icon'] . '
			description = ' . $config['wizard']['description'] . '
			tt_content_defValues {
				CType = ' . $identifier . '
			}
		}
	}
	show := addToList( ' . $identifier . ' )
}');

		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($tsConfig);
	}

	/**
	 * Gets all registered elements
	 *
	 * @return array
	 */
	public function getElements() {
		return $this->elements;
	}

	/**
	 * Gets the Configuration Array of a given identifier
	 * Throws Exception is identifier does not exist
	 *
	 * @param $identifier
	 * @return array
	 * @throws \Voltearte\TmplVoltearte\Exception
	 */
	public function getConfiguration($identifier) {
		if (empty($this->elements[$identifier])) {
			throw new \Voltearte\TmplVoltearte\Exception('No Element with given identifier is registered', 1373890800);
		}

		return $this->elements[$identifier];
	}

}
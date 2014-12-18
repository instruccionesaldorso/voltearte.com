<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "wt_twitter".
 *
 * Auto generated 15-07-2014 09:51
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Frontend Twitter Feed',
	'description' => 'Show your twitter entries in FE. In addtion: Use for twitter newsticker. Typoscript and HTML templates for all kind of configuration possibilities. Links will be parsed, geotags supported. Extbase and Fluid extension.',
	'category' => 'plugin',
	'version' => '2.1.0',
	'state' => 'alpha',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Nicole Cordes',
	'author_email' => 'cordes@cps-it.de',
	'author_company' => 'CPS-IT GmbH',
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '4.5.0-6.2.99',
			'extbase' => '1.3.0-0.0.0',
			'fluid' => '1.3.0-0.0.0',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);


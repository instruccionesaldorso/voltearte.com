<?php
$EM_CONF[$_EXTKEY] = array(
	'title' => 'Template extension',
	'description' => 'It builds the base layout for the website.',
	'category' => 'plugin',
	'author' => 'Sergio Catalá',
	'author_email' => 'sergio.catala@e-net.info',
	'author_company' => 'e-net Consulting',
	'dependencies' => 'extbase,fluid',
	'state' => 'alpha',
	'clearCacheOnLoad' => '1',
	'version' => '0.0.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0',
			'extbase' => '6.2.0',
			'fluid' => '6.2.0',
		)
	)
);
?>

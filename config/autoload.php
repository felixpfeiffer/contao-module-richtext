<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Module_richtext
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'Contao\ModuleRichttext' => 'system/modules/module_richtext/modules/ModuleRichttext.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_richtext' => 'system/modules/module_richtext/templates',
));

<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 *
 * The TYPOlight webCMS is an accessible web content management system that 
 * specializes in accessibility and generates W3C-compliant HTML code. It 
 * provides a wide range of functionality to develop professional websites 
 * including a built-in search engine, form generator, file and user manager, 
 * CSS engine, multi-language support and many more. For more information and 
 * additional TYPOlight applications like the TYPOlight MVC Framework please 
 * visit the project website http://www.typolight.org.
 *
 * This file modifies the data container array of table tl_module.
 *
 * PHP version 5
 * @copyright  2010 Felix Pfeiffer : Neue Medien
 * @author     Felix Pfeiffer [info@felixpfeiffer.com]
 * @package    richtext_module
 * @license    LGPL
 * @filesource
 */

/**
 * Add a palette to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'richtextAddImage';
$GLOBALS['TL_DCA']['tl_module']['palettes']['module_richtext'] = '{title_legend},name,headline,type;{richtext_legend},richtext;{richtextimage_legend},richtextAddImage;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['richtextAddImage'] = 'singleSRC,richtextAlt,richtextSize,richtextImagemargin,richtextImageUrl,fullsize,richtextCaption,richtextFloating';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['richtext'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['richtext'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'textarea',
	'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'helpwizard'=>true),
	'explanation'             => 'insertTags',
    'sql'                     => "text NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['richtextAddImage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['richtextAddImage'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
    'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['richtextAlt'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['richtextAlt'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'long'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['richtextSize'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['richtextSize'],
	'exclude'                 => true,
	'inputType'               => 'imageSize',
    'options'                 => $GLOBALS['TL_CROP'],
    'reference'               => &$GLOBALS['TL_LANG']['MSC'],
    'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['richtextImagemargin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['richtextImagemargin'],
	'exclude'                 => true,
	'inputType'               => 'trbl',
	'options'                 => array('px', '%', 'em', 'pt', 'pc', 'in', 'cm', 'mm'),
	'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['richtextImageUrl'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['richtextImageUrl'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
	'wizard' => array
	(
		array('tl_richtext_module', 'pagePicker')
	),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['richtextCaption'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['richtextCaption'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['richtextFloating'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['richtextFloating'],
	'exclude'                 => true,
	'inputType'               => 'radioTable',
	'options'                 => array('above', 'left', 'right', 'below'),
	'eval'                    => array('cols'=>4),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('tl_class'=>'w50'),
    'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fullsize']['eval']['tl_class'] .= ' m12';

class tl_richtext_module extends tl_module
{
	/**
	 * Return the link picker wizard
	 * @param object
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		$strField = 'ctrl_' . $dc->field . (($this->Input->get('act') == 'editAll') ? '_' . $dc->id : '');
		return ' ' . $this->generateImage('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top; cursor:pointer;" onclick="Backend.pickPage(\'' . $strField . '\')"');
	}
}
?>
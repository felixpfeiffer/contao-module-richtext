<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Felix Pfeiffer : Neue Medien 2008 
 * @author     Felix Pfeiffer 
 * @package    ModuleRichttext 
 * @license    LGPL 
 * @filesource
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['richtext'] = array('Text', 'Please enter the text (you can use HTML tags).');
$GLOBALS['TL_LANG']['tl_module']['richtextAddImage']     = array('Add an image', 'Add an image to the content element.');
$GLOBALS['TL_LANG']['tl_module']['richtextAlt']          = array('Alternate text', 'An accessible website should always provide an alternate text for images and movies with a short description of their content.');
$GLOBALS['TL_LANG']['tl_module']['richtextSize']         = array('Image width and height', 'Here you can set the image dimensions and the resize mode.');
$GLOBALS['TL_LANG']['tl_module']['richtextImagemargin']  = array('Image margin', 'Here you can enter the top, right, bottom and left margin.');
$GLOBALS['TL_LANG']['tl_module']['richtextImageUrl']     = array('Image link target', 'A custom image link target will override the lightbox link, so the image cannot be viewed fullsize anymore.');
$GLOBALS['TL_LANG']['tl_module']['richtextFloating']     = array('Image alignment', 'Please specify how to align the image.');
$GLOBALS['TL_LANG']['tl_module']['richtextCaption']      = array('Image caption', 'Here you can enter a short text that will be displayed below the image.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_module']['richtext']     = 'Richtext';
$GLOBALS['TL_LANG']['tl_module']['richtextimage_legend']     = 'Image settings';

?>
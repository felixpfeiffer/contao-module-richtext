<?php

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
namespace Contao;

/**
 * Class ModuleRichttext 
 *
 * @copyright  Felix Pfeiffer : Neue Medien 2008 
 * @author     Felix Pfeiffer 
 * @package    Controller
 */
class ModuleRichttext extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_richtext';

	/**
	 * Redirect to the selected page
	 * @return string
	 */
	public function generate()
	{
		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{

        global $objPage;

        // Clean the RTE output
        if ($objPage->outputFormat == 'xhtml')
        {
            $this->richtext = \String::toXhtml($this->richtext);
        }
        else
        {
            $this->richtext = \String::toHtml5($this->richtext);
        }

        // Add the static files URL to images
        if (TL_FILES_URL != '')
        {
            $path = $GLOBALS['TL_CONFIG']['uploadPath'] . '/';
            $this->richtext = str_replace(' src="' . $path, ' src="' . TL_FILES_URL . $path, $this->richtext);
        }

        $this->Template->richtext = \String::encodeEmail($this->richtext);

        $this->Template->addImage = false;

        // Add an image
        if ($this->richtextAddImage && $this->singleSRC != '')
        {
            if (!is_numeric($this->singleSRC))
            {
                $this->Template->richtext = '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
            }
            else
            {
                $objModel = \FilesModel::findByPk($this->singleSRC);

                if ($objModel !== null && is_file(TL_ROOT . '/' . $objModel->path))
                {
                    $arrItem = array(
                        'singleSRC'		=> $objModel->path,
                        'alt'		    => $this->richtextAlt,
                        'imagemargin'   => $this->richtextImagemargin,
                        'floating'		=> $this->richtextFloating,
                        'caption'		=> $this->richtextCaption,
                        'imageUrl'		=> $this->richtextImageUrl,
                        'size'			=> $this->richtextSize,
                        'fullsize'		=> $this->fullsize
                    );
                    $this->addImageToTemplate($this->Template, $arrItem);
                }
            }
        }


		// Add image
		/*if ($this->richtextAddImage && strlen($this->singleSRC) && is_file(TL_ROOT . '/' . $this->singleSRC))
		{
			$arrItem = array(
				'singleSRC'		=> $this->singleSRC,
				'alt'		    => $this->richtextAlt,
				'imagemargin'   => $this->richtextImagemargin,
				'floating'		=> $this->richtextFloating,
				'caption'		=> $this->richtextCaption,
				'imageUrl'		=> $this->richtextImageUrl,
				'size'			=> $this->richtextSize,
				'fullsize'		=> $this->fullsize
			);
			
			$this->addImageToTemplate($this->Template, $arrItem);
		}*/
	}
}

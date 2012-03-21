<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) Leo Feyer
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
 * @copyright  Christian Barkowsky 2008-2012
 * @author     Christian Barkowsky <http://www.christianbarkowsky.de>
 * @package    Webcam
 * @license    LGPL
 */


class ModuleWebcamThumbnail extends Module
{
	/**
	 * Template
	 */
	protected $strTemplate = 'mod_webcam_thumbnails';


	/**
	 * Generate
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### WEBCAM THUMBNAIL ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Get all records and add them to an array
	 */
	protected function compile()
	{
		$arrContent = array();

		if(!$this->truth($this->alt))
		{
			// Raster minicams
			$query  = "SELECT id, title, source FROM tl_module_webcam ";
			$query .= "WHERE display = '1' ";
			$query .= "AND id = ".$this->webcam_select." ";
			$query .= "LIMIT 1;";

			$objCams = $this->Database->prepare($query)->execute();
			while ($objCams->next())
			{
				$arrContent[] = array
				(
					'id'     => $objCams->id,
					'title' => $objCams->title,
					'image'	=> $objCams->source,
				);
			}

			if($this->source == 1)
			{
				$query2  = "SELECT id, title, source FROM tl_module_webcam ";
				$query2 .= "WHERE display = '1' ";
				$query2 .= "AND id != ".$this->webcam_select;

				$objCams = $this->Database->prepare($query2)->execute();

				while ($objCams->next())
				{
					$arrContent[] = array
					(
						'id'     => $objCams->id,
						'title'  => $objCams->title,
						'image'	=> $objCams->source,
					);
				}

			}

			$this->Template->camArr = $arrContent;
		}
		else
		{
			$query  = "SELECT id, title, source From tl_module_webcam ";
			$query .= "WHERE display = '1' ";
			$query .= "AND id = ".$this->webcam_select." ";
			$query .= "LIMIT 1;";

			$objCams = $this->Database->prepare($query)->execute();

			while ($objCams->next())
			{
				$arrContent[] = array
				(
					'id'     => $objCams->id,
					'title'  => $objCams->title,
					'image'	 => $objCams->source,
				);
			}

			$query2  = "SELECT id, title, source From tl_module_webcam ";
			$query2 .= "WHERE display = '1' ";
			$query2 .= "AND id != ".$this->webcam_select;

			$objCams = $this->Database->prepare($query2)->execute();

			while ($objCams->next())
			{
				$arrContent[] = array
				(
					'id'     => $objCams->id,
					'title'  => $objCams->title,
					'image'	=> $objCams->source
				);
			}

			$this->Template->camArr = $arrContent;
		}

		// JumpTo
		$objPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")->limit(1)->execute($this->webcam_jumpTo);

		if ($objPage->numRows)
		{
			$this->Template->jumpTo = ampersand($this->generateFrontendUrl($objPage->row()));
		}

		// Updateperiode
		$this->Template->updateperiode = $this->webcam_updateperiode;

		// Rotation
		$this->Template->rotate = $this->webcam_rotate;

		// Raster
		$this->Template->raster = $this->webcam_raster;

		// Size
		$arrSize = deserialize($this->webcam_size, true);
		$this->Template->thumpnail_width = $arrSize[0];
		$this->Template->thumpnail_height = $arrSize[1];
	}

	/**
	 *
	 */
	private function truth($x)
	{
		if($x==1)
			return "true";

		return "false";
	}
}

?>
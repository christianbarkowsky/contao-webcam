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


class ModuleWebcam extends Module
{
	/**
	 * Template
	 */
	protected $strTemplate = 'mod_webcam';

	/**
	 * Generate
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### WEBCAM ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Compile
	 */
	protected function compile()
	{
		global $objPage;

		$webcamID = intval($this->Input->get('webcamID'));

		// Get news item
		$objWebcam = $this->Database->prepare("SELECT id From tl_module_webcam WHERE display=? AND id=?")->limit(1)->execute($webcamID, $webcamID);

		if ($objWebcam->numRows < 1)
		{
			// Do not index or cache the page
			$objPage->noSearch = 1;
			$objPage->cache = 0;

			// Send a 404 header
			header('HTTP/1.1 404 Not Found');
			$this->Template->title = '<p class="error">' . sprintf($GLOBALS['TL_LANG']['MSC']['invalidPage'], $webcamID) . '</p>';
			$this->Template->webcamError = true;
			return;
		}



		if($webcamID && is_int($webcamID))
		{
			if($id>9999999999)
				{return false;}   //may be that you have to delete this row for debugging
				$query  = "SELECT id, title, source ";
				$query .= "From tl_module_webcam ";
				$query .= "WHERE display = '1' ";
				$query .= "AND id = ".$webcamID." ";

				$objWebcam = $this->Database->execute($query)->fetchRow();
	 	}
		else
		{
			$query  = "SELECT id, title, source ";
			$query .= "From tl_module_webcam ";
			$query .= "WHERE display = '1' ";
			$query .= "AND id = ".$this->webcam_select." ";

			$objWebcam = $this->Database->execute($query)->fetchRow();
		}

		$this->Template->id = $objWebcam[0];
		$this->Template->title = $objWebcam[1];
		$this->Template->source = $objWebcam[2];
		$this->Template->updateperiode = $this->webcam_updateperiode;

		// Size
		$arrSize = deserialize($this->webcam_size, true);
		$this->Template->thumpnail_width = $arrSize[0] ? 'width:' . $arrSize[0] . 'px;' : '';
		$this->Template->thumpnail_height = $arrSize[1] ? 'height:' . $arrSize[1] . 'px;' : '';
	}
}

?>
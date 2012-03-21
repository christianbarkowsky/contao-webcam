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


/**
 * Backend modules
 */
array_insert($GLOBALS['BE_MOD']['content'], 6, array
(
	'webcam' => array
	(
		'tables'     => array('tl_module_webcam'),
		'icon'       => 'system/modules/webcam/html/webcams.png'
	)
));


/**
 * Frontend modules
 */
array_insert($GLOBALS['FE_MOD'], 5, array
(
	'webcam' => array
	(
		'webcam' => 'ModuleWebcam',
		'webcamthumbnail' => 'ModuleWebcamThumbnail'
	)
));

?>
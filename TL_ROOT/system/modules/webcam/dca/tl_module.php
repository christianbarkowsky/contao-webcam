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
 * Add a palette to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['webcam'] = '{title_legend},name,headline,type;{webcam_settings_legend},webcam_select,webcam_size,webcam_updateperiode;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['webcamthumbnail'] = '{title_legend},name,headline,type;{webcam_settings_legend},webcam_select,webcam_size,webcam_updateperiode,webcam_rotate,webcam_raster,webcam_jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


//choosing a webcam
$GLOBALS['TL_DCA']['tl_module']['fields']['webcam_select'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['MOD']['webcam_select'],
	'inputType'               => 'radio',
	'foreignKey'              => 'tl_module_webcam.title'
);


$GLOBALS['TL_DCA']['tl_module']['fields']['webcam_size'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['webcam_size'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength' => 255, 'multiple'  => true, 'size' => 2, 'rgxp' => 'digit', 'tl_class'  => 'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['webcam_updateperiode'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['MOD']['webcam_updateperiode'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'maxlength'=>'3', 'tl_class'  => 'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['webcam_rotate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['MOD']['webcam_rotate'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['webcam_raster'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['MOD']['webcam_raster'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['webcam_jumpTo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['MOD']['webcam_jumpTo'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio', 'madatory'=>true)
);

?>
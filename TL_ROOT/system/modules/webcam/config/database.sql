--
-- Tabellenstruktur für Tabelle `tl_module_webcam`
--

CREATE TABLE `tl_module_webcam` (
	`id` int(10) NOT NULL auto_increment,
	`tstamp` int(10) NOT NULL default '0',
	`title` varchar(128) NOT NULL default '',
	`source` varchar(255) NOT NULL default '',
	`display` char(1) NOT NULL default '1',
	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table `tl_module`
--

CREATE TABLE `tl_module` (
	`webcam_select` int(10) NOT NULL default '0',
	`webcam_size` varchar(255) NOT NULL default '',
	`webcam_rotate` char(1) NOT NULL default '',
	`webcam_raster` char(1) NOT NULL default '',
	`webcam_jumpTo` varchar(255) NOT NULL default '',
	`webcam_updateperiode` int(10) NOT NULL default '0',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table `tl_module_webcam_versioning_imgs`
--

CREATE TABLE `tl_module_webcam_versioning_imgs` (
	`id` int(10) unsigned NOT NULL auto_increment,
	`pid` int(10) unsigned NOT NULL default '0',
	`tstamp` int(10) unsigned NOT NULL default '0',
	`imgpath` varchar(255) NOT NULL default '',
	PRIMARY KEY  (`id`),
	KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
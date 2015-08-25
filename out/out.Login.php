<?php
//    MyDMS. Document Management System
//    Copyright (C) 2002-2005  Markus Westphal
//    Copyright (C) 2006-2008 Malcolm Cowe
//    Copyright (C) 2006-2008 Malcolm Cowe
//
//    This program is free software; you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation; either version 2 of the License, or
//    (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with this program; if not, write to the Free Software
//    Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.

include("../inc/inc.Settings.php");
include("../inc/inc.Language.php");
include("../inc/inc.ClassUI.php");
include("../inc/inc.Utils.php");

include $settings->_rootDir . "languages/" . $settings->_language . "/lang.inc";

if (isset($_GET["referuri"]) && strlen($_GET["referuri"])>0) {
	$refer=$_GET["referuri"];
}
else if (isset($_POST["referuri"]) && strlen($_POST["referuri"])>0) {
	$refer=$_POST["referuri"];
} else {
	$refer = '';
}

$themes = UI::getStyles();

$tmp = explode('.', basename($_SERVER['SCRIPT_FILENAME']));
$view = UI::factory($theme, $tmp[1], array('enableguestlogin'=>$settings->_enableGuestLogin, 'enablepasswordforgotten'=>$settings->_enablePasswordForgotten, 'referrer'=>$refer, 'themes'=>$themes, 'languages'=>getLanguages(), 'enablelanguageselector'=>$settings->_enableLanguageSelector, 'enablethemeselector'=>$settings->_enableThemeSelector));
if($view) {
	$view->show();
	exit;
}

?>

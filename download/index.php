<?php
/*******************************************************************************
 * Copyright (c) 2009 Eclipse Foundation and others.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *    
 *******************************************************************************/
function getLastChild($dir) {
    $children = scandir($dir);
    return array_pop($children);
}

function getLastMatchingChild($dir, $pattern) {
    $handle = opendir($dir);
    $result = "";
    while (($file = readdir($handle)) !== false) {
        if(preg_match($pattern, $file) == 1) {
            $result = $file;
        }
    }
    closedir($handle);
    return $result;
}

function generateDownloadBlock($title, $baseUri) {
    $html = "<h3>" . $title . "</h3>";
    $win32 = str_replace("[classifier]", "win32.win32.x86", $baseUri);
    $win64 = str_replace("[classifier]", "win32.win32.x86_64", $baseUri);
    $linux32 = str_replace("[classifier]", "linux.gtk.x86", $baseUri);
    $linux64 = str_replace("[classifier]", "linux.gtk.x86_64", $baseUri);
    $macosx64 = str_replace("[classifier]", "macosx.cocoa.x86_64", $baseUri);
    $html .= "  <table class='downloads'>";
    $html .= "  <tbody>";
    $html .= "    <tr class='icons'>";
    $html .= "      <td><img src='/rcptt/img/ico-win.png' /></td>";
    $html .= "      <td><img src='/rcptt/img/ico-linux.png' /></td>";
    $html .= "      <td><img src='/rcptt/img/ico-mac.png' /></td>";
    $html .= "    </tr>";
    $html .= "    <tr>";
    $html .= "      <td>";
    $html .= "        <ul>";
    $html .= "          <li><a href='" . $win32 . "'>Windows 32-bit</a></li>";
    $html .= "          <li><a href='" . $win64 . "'>Windows 64-bit</a></li>";
    $html .= "        </ul>";
    $html .= "      </td>";
    $html .= "      <td>";
    $html .= "        <ul>";
    $html .= "          <li><a href='" . $linux32 . "'>Linux 32-bit</a></li>";
    $html .= "          <li><a href='" . $linux64 . "'>Linux 64-bit</a></li>";
    $html .= "        </ul>";
    $html .= "      </td>";
    $html .= "      <td>";
    $html .= "        <ul>";
    $html .= "          <li><a href='" . $macosx64 . "'>Mac OS X 64-bit</a></li>";
    $html .= "        </ul>";
    $html .= "      </td>";
    $html .= "    </tr>";
    $html .= "  </tbody>";
    $html .= "</table>";
       
    return $html;
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App 	= new App();
$Nav	= new Nav();
$Menu 	= new Menu();
include($App->getProjectCommon());
	
$pageTitle 		= "Downloads";
	
$html = file_get_contents('_index.html');

$downloadsHome=$App->getDownloadBasePath() . "/rcptt";
$releasesHome=$downloadsHome . "/release";



# TODO: Once we get two parallel streams, we will need to make release logic more complex
# TODO: Once we get beyond .9 bugfix version, we can't just use alphabetic sorting
$latestRelease=getLastChild($releasesHome);


$nightlyHome=$downloadsHome . "/nightly";
$latestNightlyUnqualified = getLastChild($nightlyHome);
$latestNightlyHome = $nightlyHome . "/" . $latestNightlyUnqualified;
$latestNightlyQualifier = getLastMatchingChild($latestNightlyHome, "/\\d+/");


$html = "<div class='content-wrapper'>";
$html .= "<h2>RCP Testing Tool IDE Downloads</h2>";

$html .= generateDownloadBlock($latestRelease . " Release", "http://www.eclipse.org/downloads/download.php?file=/rcptt/release/" . $latestRelease . "/ide/rcptt.ide-" . $latestRelease ."-[classifier].zip");

$html .= generateDownloadBlock($latestNightlyUnqualified . "." . $latestNightlyQualifier . " Nightly", "http://download.eclipse.org/rcptt/nightly/" . $latestNightlyUnqualified . "/" . $latestNightlyQualifier . "/ide/rcptt.ide-" . $latestNightlyUnqualified . "-N" . $latestNightlyQualifier . "-[classifier].zip");
$html .= "</div>";
# www.eclipse.org/downloads/download.php?file=/rcptt/release/1.5.1/ide/rcptt.ide-1.5.1-macosx.cocoa.x86_64.zip


# 	
# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
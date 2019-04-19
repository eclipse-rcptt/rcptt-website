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
    $children = scandir($dir);
    $result = "";
    foreach ($children as &$child) {
        if(preg_match($pattern, $child) == 1) {
            $result = $child;
        }
    }
    return $result;
}

function generateDownloadBlock($title, $baseUri, $repoUri, $mars=null, $runner = null) {
    $html = "<h3>" . $title . "</h3>";
    $win64 = str_replace("[classifier]", "win32.win32.x86_64", $baseUri);
    $linux64 = str_replace("[classifier]", "linux.gtk.x86_64", $baseUri);
    $macosx64 = str_replace("[classifier]", "macosx.cocoa.x86_64", $baseUri);
    $html .= "  <table class='downloads'>";
    $html .= "  <tbody>";
    $html .= "    <tr class='icons'>";
    $html .= "      <td><img src='/rcptt/img/ico-win.png' /></td>";
    $html .= "      <td><img src='/rcptt/img/ico-linux.png' /></td>";
    $html .= "      <td><img src='/rcptt/img/ico-mac.png' /></td>";
    $html .= "      <td><img src='/rcptt/img/ico-eclipse.png' /></td>";    
    $html .= "    </tr>";
    $html .= "    <tr>";
    $html .= "      <td>";
    $html .= "        <ul>";
    $html .= "          <li><a href='" . $win64 . "'>Windows 64-bit</a></li>";
    $html .= "        </ul>";
    $html .= "      </td>";
    $html .= "      <td>";
    $html .= "        <ul>";
    $html .= "          <li><a href='" . $linux64 . "'>Linux 64-bit</a></li>";
    $html .= "        </ul>";
    $html .= "      </td>";
    $html .= "      <td>";
    $html .= "        <ul>";
    $html .= "          <li><a href='" . $macosx64 . "'>Mac OS X 64-bit</a></li>";
    $html .= "        </ul>";
    $html .= "      </td>";
    $html .= "      <td>";
    $html .= "        <ul>";
    $html .= "          <li><a href='" . $repoUri . "'>Update Site$mars</a></li>";
    if (!empty($runner)) {
      $html .= "          <li><a href='" . $runner . "'>Test Runner</a></li>";
    }
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
$latestRelease="2.4.1";#getLastChild($releasesHome);


$nightlyHome = $downloadsHome . "/nightly";
#Selecting 2.x.x
$latestNightlyUnqualified = getLastMatchingChild($nightlyHome, '/2\.[\d\.]+/');
$latestNightlyHome = $nightlyHome . "/" . $latestNightlyUnqualified;
$latestNightlyQualifier = getLastMatchingChild($latestNightlyHome, '/\d+/');


$html = "<div id='midcolumn'>";
$html .= "<h2>RCP Testing Tool IDE Downloads</h2>";

# www.eclipse.org/downloads/download.php?file=/rcptt/release/1.5.1/ide/rcptt.ide-1.5.1-macosx.cocoa.x86_64.zip
$relPrefix = "http://www.eclipse.org/downloads/download.php?file=/rcptt/release/" . $latestRelease;
$relURI = "http://download.eclipse.org/rcptt/release/";
$html .= generateDownloadBlock(
  $latestRelease . " Release",
  $relPrefix . "/ide/rcptt.ide-" . $latestRelease ."-[classifier].zip",
  $relURI . $latestRelease . "/repository",
  " (Oxygen)",
  $relPrefix . "/runner/rcptt.runner-" . $latestRelease . ".zip"
  );

# http://download.eclipse.org/rcptt/nightly/1.5.5/201503042108/ide/rcptt.ide-incubation-1.5.5-N201503042108-win32.win32.x86_64.zip
# http://download.eclipse.org/rcptt/nightly/1.5.6/201503201039/runner/rcptt.runner-incubation-1.5.6-N201503201039.zip

$prefix = "http://download.eclipse.org/rcptt/nightly/" . $latestNightlyUnqualified . "/" . $latestNightlyQualifier;
$prefixLatest = "http://download.eclipse.org/rcptt/nightly/" . $latestNightlyUnqualified . "/latest";
$decoration = "" . $latestNightlyUnqualified . "-N" . $latestNightlyQualifier;
$html .= generateDownloadBlock(
  $latestNightlyUnqualified . "." . $latestNightlyQualifier . " Nightly",
  $prefix . "/ide/rcptt.ide-" . $decoration . "-[classifier].zip",
  $prefixLatest . "/repository",
  " (Oxygen)",
  $prefix . "/runner/rcptt.runner-" . $decoration . ".zip"
  );
$html .= "</div>";

$html .= file_get_contents('../right_content.html');

# 	
# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
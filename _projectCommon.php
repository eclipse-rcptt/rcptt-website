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

	# Set the theme for your project's web pages.
	# See http://eclipse.org/phoenix/
	$theme = "solstice";
	

	# Define your project-wide Navigation here
	# This appears on the left of the page if you define a left nav
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	
	# If you want to override the eclipse.org navigation, uncomment below.
	#$Nav->setLinkList(array());

	# Define keywords, author and title here, or in each PHP page specifically
	$pageKeywords	= "RCPTT, GUI, functional, automated testing";
	$pageAuthor		= "Ivan Suslov";
	$pageTitle 		= "RCP Testing Tool (RCPTT)";


	# top navigation bar
	# To override and replace the navigation with your own, uncomment the line below.
	$Menu->setMenuItemList(array());
	$Menu->addMenuItem("Home", "/rcptt", "_self");
	$Menu->addMenuItem("Downloads", "/rcptt/download.php", "_self");
	$Menu->addMenuItem("Documentation", "/rcptt/documentation.php", "_self");
	$Menu->addMenuItem("Support", "/rcptt/support.php", "_self");
	$Menu->addMenuItem("Sources", "/rcptt/sources.php", "_self");

	
	# To define additional CSS or other pre-body headers
	$App->AddExtraHtmlHeader('<link rel="stylesheet" href="/rcptt/css/main.css">');
	$App->AddExtraHtmlHeader("<script>
							    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
							    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
							    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
							    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
							    
							    ga('create', 'UA-39589807-5', 'eclipse.org');
							    ga('send', 'pageview');
							  </script>");
	

	# To enable occasional Eclipse Foundation Promotion banners on your pages (EclipseCon, etc)
	$App->Promotion = TRUE;
	
	# If you have Google Analytics code, use it here
	# $App->SetGoogleAnalyticsTrackingCode("YOUR_CODE");
?>
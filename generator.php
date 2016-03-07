<?php
	/*
	*	Author: Stefano G. "Tao" Rago
	*   Date: 07/03/2016
	*	Scope: HTML generator made in PHP to deploy a page with Netflix hidden categories
	*/

	$HTML_FILENAME = "Home.html";


	$head = "<html><head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"description\" content=\"Netflix Categories\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"><link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en\"><link rel=\"stylesheet\" href=\"mdl/material.min.css\"><script src=\"mdl/material.min.js\"></script><link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/icon?family=Material+Icons\"><link rel=\"stylesheet\" href=\"mdl/material.teal-red.min.css\"><link rel=\"stylesheet\" href=\"styles.css\"><style>    #view-source {      position: fixed;      display: block;      right: 0;      bottom: 0;      margin-right: 40px;      margin-bottom: 40px;      z-index: 900;    }</style>			</head>			<body>			  <div class=\"demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100\">  <header class=\"demo-header mdl-layout__header mdl-layout__header--scroll mdl-color--grey-100 mdl-color-text--grey-800\">    <div class=\"mdl-layout__header-row\">      <span class=\"mdl-layout-title\">Netflix Hidden Categories</span>      <div class=\"mdl-layout-spacer\"></div>   </div>  </header>    <div class=\"demo-ribbon\"></div>  <main class=\"demo-main mdl-layout__content\">    <div class=\"demo-container mdl-grid\">      <div class=\"mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone\"></div>      <div class=\"demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col\">      	<div class=\"mdl-grid\">";
	$footer="</div></div></div></main></div></body></html>";

	writeOnFile($head);
	if (($handle = fopen("netflixCats.csv", "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
	     
	            writeOnFile("<div class=\"mdl-cell mdl-cell--4-col\"><a target=\"_blank\" href=\"http://www.netflix.com/browse/genre/".$data[1]."\">".$data[0]."</a></div>");
	        
	    }
	    fclose($handle);
	    echo "Done. Open ".$HTML_FILENAME;
	}
	writeOnFile($footer);


	function writeOnFile($text){
		global $HTML_FILENAME;
		file_put_contents($HTML_FILENAME, $text. "\n", FILE_APPEND);
 	}
?>

 
 
			
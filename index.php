<?php

$albumName = "Basic PHP Photo Album"; // Name your album!

/*
 * Installation:
 * 1.) Place your photos into the images directory.
 *		- Photos will be displayed in alphabetical order.
 * 2.) Rename the "basic-php-photo-album" folder to anything you wish.
 *		- Example: paris-photo-album
 * 3.) Upload the renamed folder and all of its contents to your server.
 *		- If your domain is www.mysite.com, your album can be viewed at
 *			http://www.mysite.com/paris-photo-album/
 * That's it! Make multiple albums by repeating the above 3 steps.
 */

/*
 * You shouldn't need to change anything beyond this.
 *
 */

$p = $_GET['p'];
if ($handle = opendir("images")) {
	$i = 1;
	while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..") {
			$img[$i] = $file;
			if ($p == $img[$i]) {
				$ci = $i;
			}
			$i++;
		}
	}
	closedir($handle);
	$ti = $i - 1;
	$pi = $ci - 1;
	if ($p == "") {
		$ni = $ci + 2;
	} else {
		$ni = $ci + 1;
	}
	$prevNext = "";
	if ($pi > 0) {
		$piFile = $img[$pi];
		$prevNext .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=" . $piFile . "\" title=\"show previous image\">&#171;</a>";
	} else {
		$prevNext .= "&#171;";
	}
	$prevNext .= " | ";
	if ($ni <= $ti) {
		$niFile = $img[$ni];
		$prevNext .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=" . $niFile . "\" title=\"show next image\">&#187;</a>";
	} else {
		$prevNext .= "&#187;";
	}
	if ($p == "") {
		$p = $img[1];
	}
}
?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title><?php echo $albumName; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="imagetoolbar" content="no">
	<style type="text/css">
		body {
			font-family: arial, helvetica, sans-serif;
			margin: 10px;
			padding: 0px 0px 0px 0px;
			font-size: 11px;
			background-color: #ffffff;
			color: #333333;
		}
		
		td, select, input {
			font-family: arial, helvetica, sans-serif;
			font-size: 11px;
		}
		
		p {
			font-family: arial, helvetica, sans-serif;
			font-size: 11px;
			line-height: 16px;
		}
		
		h1 {
			font-family: georgia, times, times new roman, serif;
			font-size: 18px;
			font-weight: bold;
			margin: 0px 0px 10px 0px;
		}
		
		.hRule {
			border-top: 1px solid #cdcdcd;
			margin: 0px 0px 10px 0px;
		}
		
		img {
			border: 1px solid #333333;
		}
		
		.nextPrevious {
			font-size: 18px;
			color: #cdcdcd;
			padding-bottom: 15px;
		}
		
		a, a:visited {
			color: #cc0000;
			text-decoration: none;
		}
		a:active, a:hover {
			color: #cc0000;
			text-decoration: underline;
		}
	</style>
</head>

<body>

<h1><?php echo $albumName; ?></h1>

<div class="hRule"></div>

<table border="0" cellpadding="0" cellspacing="0" align="center">
	<tr align="center">
		<td class="nextPrevious"><?php echo $prevNext; ?></td>
	</tr>
	<tr align="center">
		<td><img src="images/<?php echo $p; ?>" alt="<?php echo $$albumName; ?>" border="0"></td>
	</tr>
</table>

<p><a href="http://www.niblr.com/basic-php-photo-album/" style="color: #cdcdcd;">Basic PHP Photo Album</a></p>

</body>
</html>

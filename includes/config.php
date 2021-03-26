<?php

	$genurl = "https://simonomgeving.dev/";

	$self = htmlentities($_SERVER['PHP_SELF']);
	$replace = preg_match("/([-'a-z0-9]+)(.php)/", $self, $match);
	$self_r = htmlentities($_SERVER['REQUEST_URI']);
	$replace_r = preg_match("/([-'a-z0-9]+)(.php)/", $self_r, $match_r);

if(!empty($match_r[2])) {
	header("Location: /" . $match[1] . "", 301);
}

// Default
switch ($match[1])
{
	default:
		$title = "Dit gaat weer helemaal mis";
	break;
}

switch($match[1])
{
	default:
		$name = "TJ gaat op reis en neemt mee";
	break;
}

switch($match[1])
{
	default:
		$ptype = "website";
	break;
}

switch($match[1])
{
	default:
		$discp = "Martien Mijland zegt het zelf al, dit gaat weer helemaal mis. Kun je nou ook helemaal niks?";
	break;
}

switch($match[1])
{
	default:
		$ogimg = "GENURL/images/ogimg.png";
	break;
}

// index.php
switch($match[1])
{
	case "index":
		$title = "Hotel California - The Eagels";
	break;
}

// info.php
switch($match[1])
{
	case "info":
		$title = "Hotel California - The Eagels";
	break;
}

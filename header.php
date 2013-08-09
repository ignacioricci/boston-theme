<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ignacio Ricci ~ Web/UI Designer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic|Source+Sans+Pro:400,400italic,600,600italic">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/styles/css/baseline.css">
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>

	<header id="header">
		<div id="headerHolder">
			<div id="brand">
				<?php if(get_header_image()){ ?>
				<h1><a href="<?php bloginfo('home'); ?>/"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
				<?php } else { ?>
				<h1><a href="<?php bloginfo('home'); ?>/"><span><?php bloginfo('name'); ?></span></a></h1>
				<?php } ?>
			</div>
		</div>
		<div id="toggleMenu"><a href="#"><strong>Menu</strong> <span></span></a></div>
	</header>

	<section id="central">
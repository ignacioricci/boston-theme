<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>
		<?php if (function_exists('is_tag') && is_tag()) {
			single_tag_title('Tag Archive for &quot;'); echo '&quot; &ndash; '; 
		} elseif (is_archive()) {
			wp_title(''); echo ' Archive &ndash; '; 
		} elseif (is_search()) {
		  	echo 'Search results for &quot;'.wp_specialchars($s).'&quot; &ndash; ';
		} elseif (!(is_404()) && (is_single()) || (is_page())) {
			wp_title(''); echo ' &ndash; ';
		} elseif (is_404()) {
			echo 'Not Found &ndash; ';
		} if (is_home()) {
			bloginfo('name'); echo ' &ndash; '; bloginfo('description');
		} else {
			bloginfo('name');
		} if ($paged > 1) {
			echo ' &ndash; page '. $paged;
		} ?>
		<?php
			$fontType = get_option('t-typo-type');
			$fontSize = get_option('t-size');
			$accent = get_option('t-accent');
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<?php if($fontType == 'serif'){ ?>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic|Source+Sans+Pro:400,400italic,600,600italic">
	<?php } else { ?>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic">
	<?php } ?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/styles/css/baseline.css">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
	<?php if(is_single()){ if (have_posts()) : while (have_posts()) : the_post(); ?>
	<meta property="og:title" content="<?php the_title(); ?> (via <?php bloginfo('name'); ?>)" />
	<?php if(has_post_thumbnail()){ ?>
	<meta property="og:image" content="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail')[0]; ?>" />
	<?php } endwhile; endif; } else { ?>
	<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	<?php if(get_header_image()){ ?>
	<meta property="og:image" content="<?php header_image(); ?>" />
	<?php } } wp_head(); ?>
	<style type="text/css">
		<?php if($fontType == 'serif'){ ?>
			.postTitle h2, .postEntry {
				font-family:'Alegreya', Georgia, Times, serif;
			}
		<?php } if($fontSize == 'small'){ ?>
			.post .postEntry {
				font-size:1em;
			}
		<?php } if($accent){ ?>
			a {
				color:<?php echo $accent; ?>;
				border-color:rgba(<?php echo hex2rgb($accent); ?>,0.15);
			}
			a:hover {
				background:rgba(<?php echo hex2rgb($accent); ?>,0.05);
			}
			#pagination a:hover,
			.respond button {
				background:<?php echo $accent; ?>;	
			}
			.post .postEntry blockquote,
			input[type="text"]:focus, input[type="password"]:focus, textarea:focus {
				border-color:<?php echo $accent; ?>;
			}
		<?php } ?>
	</style>
</head>
<body <?php body_class(); ?>>

	<header id="header">
		<aside class="aside" id="sidebar">
			<div class="asideHolder">
				<div class="asideBox" id="blogBrand">
					<?php if(get_header_image()){ ?>
					<p><a href="<?php bloginfo('home'); ?>/"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" /></a></p>
					<?php } ?>
					<h1><a href="<?php bloginfo('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
					<p><span><?php bloginfo('description'); ?></span></p>
				</div>
				<div class="asideBox" id="blogPages">
					<?php wp_nav_menu(array('theme_location' =>  'mainmenu', 'container' => '', 'depth' => '1')); ?>
				</div>
			</div>
		</aside>
		<div id="toggleMenu"><a href="#"><strong>Menu</strong></a></div>
	</header>

	<section id="central">
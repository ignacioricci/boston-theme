<?php

	// Remove WP Version
	remove_action('wp_head', 'wp_generator');
	
	// Remove Gallery CSS
	add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));

	// Post Like
	include_once(TEMPLATEPATH . '/ssi/post-like.php');

	// Custom Menu
    register_nav_menus(array('mainmenu'=>__('Main Menu'),));

	// Enable post thumbnails
    add_theme_support('post-thumbnails');
	add_image_size('hero', 1200, 800, true);
	add_image_size('post', 800, 9999);

	// Drawer widgets
 	if (function_exists('register_sidebar')){
		register_sidebar(array(
			'name' => 'Drawer Menu',
    		'before_widget' => '<div class="asideBox drawerBox">',
    		'after_widget' => '</div>',
    		'before_title' => '<h3>',
   			'after_title' => '</h3>'
		));
	}

	// Add Social information to user
	function add_social_netw($socialnetw){
        $socialnetw['twitter'] = 'Twitter';
        $socialnetw['facebook'] = 'Facebook';
        $socialnetw['linkedin'] = 'LinkedIn';
        return $socialnetw;
	}
	add_filter('user_contactmethods','add_social_netw', 10 , 1);

	// Enable custom header	 
    add_theme_support('post-thumbnails');
	$himgoptions = array(
		'default-image' => get_template_directory_uri() . '/images/logo.gif',
		'random-default' => false,
		'width' => '',
		'height' => 50,
		'flex-height' => false,
		'flex-width' => false,
		'default-text-color' => '',
		'header-text' => false,
		'uploads' => true,
		'wp-head-callback' => '',
		'admin-head-callback' => '',
		'admin-preview-callback' => '',
	);
	add_theme_support('custom-header', $himgoptions);

?>
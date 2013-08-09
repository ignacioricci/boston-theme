<?php

	// Remove WP Version
	remove_action('wp_head', 'wp_generator');
	
	// Remove Gallery CSS
	add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));

	// Post Like
	include_once(TEMPLATEPATH . '/ssi/post-like.php');

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

?>
<?php

	// Remove WP Version
	remove_action('wp_head', 'wp_generator');
	
	// Remove Gallery CSS
	add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));

	// Post Like
	include_once(TEMPLATEPATH . '/ssi/post-like.php');

	// Add Social information to user
	function add_social_netw($socialnetw){
        $socialnetw['twitter'] = 'Twitter';
        $socialnetw['facebook'] = 'Facebook';
        $socialnetw['linkedin'] = 'LinkedIn';
        return $socialnetw;
	}
	add_filter('user_contactmethods','add_social_netw', 10 , 1);

?>
<?php

	// Remove WP Version
	remove_action('wp_head', 'wp_generator');

	// Remove recent comment styling
	add_action('widgets_init', 'remove_recent_comments_style');
	function remove_recent_comments_style(){
		global $wp_widget_factory;
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
	
	// Remove Gallery CSS
	add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));

	// Post Like
	include_once(TEMPLATEPATH . '/ssi/post-like.php');

	// Theme Options
	include_once(TEMPLATEPATH . '/ssi/theme-options.php');

	// Custom Menu
	register_nav_menus(array('mainmenu'=>__('Main Menu'),));

	// Enable post thumbnails
	add_theme_support('post-thumbnails');
	add_image_size('hero', 1200, 800, true);
	add_image_size('post', 800, 9999);
	add_image_size('thumb', 35, 35);

	// Hexadecimal to RGB
	function hex2rgb($colour){
		if ($colour[0] == '#'){
			$colour = substr($colour, 1);
		}
		if (strlen($colour) == 6){
			list($r, $g, $b) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
		} elseif ( strlen( $colour ) == 3 ) {
			list($r, $g, $b) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
		} else {
			return false;
		}
		$r = hexdec($r);
		$g = hexdec($g);
		$b = hexdec($b);
		return ($r . ',' . $g . ',' . $b);
	}

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
		'default-image' => get_template_directory_uri() . '/images/main/logo.gif',
		'random-default' => false,
		'width' => '',
		'height' => 120,
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

	// Language support
	add_action('after_setup_theme', 'boston_setup');
	function boston_setup(){
		load_theme_textdomain('boston', get_template_directory() . '/l18n');
	}

	// Custom comment output 
	function boston_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		
		<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
			
			<div class="co-avatar">
				<?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
			</div>
			<div class="co-info">
				<div class="co-meta">
					<strong><?php printf('<span>%s</span>', get_comment_author_link()) ?></strong> <em>&mdash; <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></em>
				</div>
				<div class="co-text">
					<?php comment_text() ?>
					<?php if ($comment->comment_approved == '0') : ?>
					<p class="waiting4Mod"><?php _e('Your comment is awaiting moderation.') ?></p>
					<?php endif; ?>
					<p class="reply"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => 3))) ?></p>
					<p class="editComment"><?php edit_comment_link(__('[Edit Comment]'),'','') ?></p>
				</div>
			</div>
<?php } ?>
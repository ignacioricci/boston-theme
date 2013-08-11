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
		'default-image' => get_template_directory_uri() . '/images/main/logo.gif',
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

	// Language support
	add_action('after_setup_theme', 'baseline_setup');
	function baseline_setup(){
	    load_theme_textdomain('baseline', get_template_directory() . '/l18n');
	}

    // Custom comment output 
	function baseline_comments($comment, $args, $depth) {
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
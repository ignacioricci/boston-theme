<aside class="aside" id="drawer">
	<div class="asideHolder">
		<div id="closeDrawer"><a href="#"><?php _e('Close', 'boston'); ?></a></div>
		<div class="asideBox drawerBox" id="sectionsBox">
			<h3><?php _e('Sections', 'boston'); ?></h3>
			<?php wp_nav_menu(array('theme_location' =>  'mainmenu', 'container' => '', 'depth' => '1')); ?>
			<?php
				$rssfeed = get_option('t-rss');
				if($rssfeed != 'no'){
			?>
			<ul class="rssFeed">
				<li><a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a></li>
			</ul>
			<?php } ?>
		</div>
		<?php if (function_exists('register_sidebar'))
			dynamic_sidebar('Drawer Menu');
		?>
	</div>
</aside>
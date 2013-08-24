<aside class="aside" id="drawer">
	<div class="asideHolder">
		<div id="closeDrawer"><a href="#"><?php _e('Close', 'boston'); ?></a></div>
		<div class="asideBox drawerBox" id="sectionsBox">
			<h6><?php _e('Sections', 'boston'); ?></h6>
			<?php wp_nav_menu(array('theme_location' =>  'mainmenu', 'container' => '', 'depth' => '1')); ?>
		</div>
		<?php if (function_exists('register_sidebar'))
			dynamic_sidebar('Drawer Menu');
		?>
	</div>
</aside>
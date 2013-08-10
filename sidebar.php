<aside class="aside" id="drawer">
	<div class="asideHolder">
		<div id="closeDrawer"><a href="#">Close</a></div>
		<?php if (function_exists('register_sidebar'))
			dynamic_sidebar('Drawer Menu');
		?>
	</div>
</aside>
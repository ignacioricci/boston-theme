<aside id="sidebar">
	<div id="sidebarHolder">
		<div id="logo">
			<img src="<?php bloginfo('template_directory'); ?>/images/avatar.jpeg">
		</div>
		<div id="blogInfo">
			<h1><a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('title'); ?></a></h1>
			<p><?php echo bloginfo('description'); ?></p>
			<nav id="sections">
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
			</nav>
		</div>
		<!--
		<div id="search">
			<input type="text" placeholder="Search">
		</div>
	-->
	</div>
</aside>
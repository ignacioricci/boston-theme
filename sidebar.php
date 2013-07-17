<aside id="sidebar">
	<div id="sidebarHolder">
		<div id="logo">
			<img src="images/avatar.jpeg">
		</div>
		<div id="blogInfo">
			<h1>My Blog</h1>
			<p>A blog about nothing. Yeah, nothing</p>
		</div>
		<div id="sections">
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>
		</div>
		<div id="search">
			<input type="text" placeholder="Search">
		</div>
	</div>
</aside>
<aside class="aside" id="sidebar">
	<div class="asideHolder">
		<div class="asideBox" id="blogAuthor">
			<?php
				$users = get_users('orderby=ID&number=1');
				foreach($users as $user){
			?>
			<div id="ba-avatar">
				<?php echo get_avatar($user->ID, 75); ?>
			</div>
			<div id="ba-info">
				<p>
					<em>Written by</em>
					<strong><?php echo $user->display_name; ?></strong>
					<span>Published Articles: <?php echo count_user_posts($user->ID); ?></span>
				</p>
			</div>
			<?php } ?>
		</div>
		<nav class="asideBox" id="postActions">
			<ul>
				<li id="pa-like"><a href="#">Like</a></li>
				<li><a href="#">Share</a></li>
				<li><a href="#">Shortlink</a></li>
			</ul>
		</nav>
	</div>
</aside>
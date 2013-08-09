<aside class="aside" id="sidebar">
	<div class="asideHolder">
		<div class="asideBox" id="blogMainPage">
			asdads
		</div>
		<?php if(is_single()){ ?>
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
					<span>(<?php echo count_user_posts($user->ID); ?> Articles)</span>
				</p>
			</div>
			<?php } ?>
		</div>
		<nav class="asideBox postActions">
			<ul>
				<li class="pa-like"><a class="like <?php like_status($post->ID); ?>" data-postid="<?php the_ID(); ?>" href="#">Likes (<span class="likeCount"><?php like_count($post->ID); ?></span>)</a></li>
				<li><a href="#">Share</a></li>
				<li><a href="#">Shortlink</a></li>
			</ul>
		</nav>
		<?php } ?>
	</div>
</aside>
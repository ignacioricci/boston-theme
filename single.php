<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<section id="content">
		<?php if(has_post_thumbnail()){ ?>
		<div class="hero">
			<?php the_post_thumbnail('post'); ?>
		</div>
		<?php } ?>
		<article class="post">
			<div class="postTitle">
				<h2><?php the_title(); ?></h2>
				<p>Written on <strong><?php the_time('j F Y, h:ia '); ?></strong> under <a href="#">Category Name</a></p>
				<?php the_tags('<p><strong>Tagged with:</strong> ', ', ', '</p>'); ?>
			</div>
			<div class="postEntry">
				<?php the_content(); ?>
			</div>
			<div class="postAuthor">
				<?php
					$users = get_users('orderby=ID&number=1');
					foreach($users as $user){
				?>
				<div class="pa-avatar">
					<?php echo get_avatar($user->ID, 75); ?>
				</div>
				<div class="pa-info">
					<p>
						<em>Written by</em>
						<strong><?php echo $user->display_name; ?></strong>
						<span>(<?php echo count_user_posts($user->ID); ?> Articles)</span>
					</p>
				</div>
				<?php } ?>
			</div>
			<div class="postActions">
				<ul>
					<li class="pa-like"><a class="like <?php like_status($post->ID); ?>" data-postid="<?php the_ID(); ?>" href="#">Likes (<span class="likeCount"><?php like_count($post->ID); ?></span>)</a></li>
					<li class="pa-share"><a href="#">Share</a></li>
				</ul>
			</div>
		</article>
	</section>

	<?php if(have_comments()){ ?>

	<section id="comments">		
		<div id="commentList">
			<h3>3 Comments</h3>
			<ol>
				<li class="comment personItem">
					<div class="personAvatar">
						<img src="images/avatar2.jpg">
					</div>
					<div class="personInfo">
						<p><strong>Ignacio Ricci</strong></p>
					</div>
					<div class="commentText">
						<p>Morbi in ipsum neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum congue nunc at semper. Phasellus dignissim faucibus ligula, a porta elit egestas non. Curabitur erat mi, luctus ac pellentesque a, lacinia nec dolor. Duis suscipit leo justo, sed malesuada neque. Phasellus vitae nulla lobortis enim pretium tempor eget quis odio.</p>
					</div>
				</li>
			</ol>
		</div>
		<div id="respond">		
			<h3>Leave a comment</h3>
			<form action="" method="">
				<p>
					<label for="name">Name</label>
					<input type="text" name="name" id="name">
				</p>
				<p>
					<label for="email">E-mail</label>
					<input type="text" name="email" id="email">
				</p>
				<p>
					<label for="comments">Comment</label>
					<textarea name="comments" id="comments"></textarea>
				</p>
				<p>
					<button class="btn" type="submit">Send</button>
				</p>
			</form>
		</div>
	</section>

	<?php } ?>

	<?php endwhile; endif; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
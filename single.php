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
				<div class="pa-avatar">
					<?php echo get_avatar(get_the_author_meta('ID'), 75); ?>
				</div>
				<div class="pa-info">
					<p>
						<em>Written by</em>
						<strong><?php echo get_the_author_meta('display_name'); ?></strong>
						<span>(Published articles: <?php echo count_user_posts(get_the_author_meta('ID')); ?>)</span>
					</p>
				</div>
			</div>
			<div class="postActions">
				<ul>
					<li class="pa-like"><a class="sitem like <?php like_status($post->ID); ?>" data-postid="<?php the_ID(); ?>" href="#"><span>Likes (<em class="likeCount"><?php like_count($post->ID); ?></em>)</span></a></li>
					<li class="pa-share sitem">
						<span>Share</span>
						<ul>
							<li class="share-tw"><a rel="nofollow" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink() ?>" title="Share this post on Twitter" target="_blank">Twitter</a></li>
							<li class="share-fb"><a rel="nofollow" href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>" title="Share this post on Facebook" target="_blank">Facebook</a></li>
							<li class="share-gp"><a rel="nofollow" href="https://plus.google.com/share?url=<?php the_permalink() ?>" title="Share this post on Google Plus" target="_blank">Google+</a></li>
						</ul>
					</li>
					<?php if(comments_open()){ ?>
					<li class="pa-comments">
						<?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)', 'sitem'); ?>
					</li>
					<?php } ?>
				</ul>
			</div>
		</article>
	</section>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
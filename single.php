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
				<?php
					$showMeta = get_option('t-datecat');
					if($showMeta != 'no'){
				?>
				<p class="articleCat">Written on <strong><?php the_time('j F Y, h:ia '); ?></strong> under <?php the_category(' ,');  ?></p>
				<?php the_tags('<p><strong>Tagged with:</strong> ', ', ', '</p>'); ?>
				<?php } ?>
			</div>
			<div class="postEntry">
				<?php the_content(); ?>
			</div>
			<?php
				$showAuthor = get_option('t-author');
				if($showAuthor != 'no'){
			?>
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
			<?php } ?>
			<div class="postActions">
				<ul>
					<li class="pa-like"><a class="sitem like <?php like_status($post->ID); ?>" data-postid="<?php the_ID(); ?>" href="#"><span>Likes (<em class="likeCount"><?php like_count($post->ID); ?></em>)</span></a></li>
					<li class="pa-share sitem">
						<span>Share</span>
						<ul>
							<li class="share-tw"><a rel="nofollow" href="http://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>+<?php the_permalink() ?>" title="Share this post on Twitter" target="_blank">Twitter</a></li>
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
	
	<?php
		$showPopular = get_option('t-popular');
		if($showPopular != 'no'){
	?>
	<section id="popularArticles">
		<h3>Other popular articles</h3>
		<ul>
			<?php
				$fav_q = new WP_Query('post_type=post&posts_per_page=5&meta_key_votes_count&order=DESC&ignore_sticky_posts=true');
				while($fav_q->have_posts()) : $fav_q->the_post();
			?>
			<li class="popular">
				<?php if(has_post_thumbnail()){ ?>
				<div class="popThumb">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumb'); ?></a>
				</div>
				<?php } ?>
				<div class="popInfo">
					<h4>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<span>(<?php like_count($post->ID); ?> likes)</span>
					</h4>
				</div>
			</li>
			<?php
				endwhile;
				wp_reset_postdata();
			?>
		</ul>
	</section>
	<?php } ?>
	
	<?php
		$disqus = get_option('t-disqus');
		if($disqus != ''){
	?>
	<div id="comments"><div id="disqus_thread"></div></div>
	<?php } else { comments_template(); } ?>

	<?php endwhile; endif; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
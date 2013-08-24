<?php get_header(); ?>

	<section id="content">

		<?php if (have_posts()) : ?>

		<?php
			if (is_author()){
				$curauthor = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
			}
		?>
		
		<?php if(is_archive() || is_search()){ ?>
		<div id="breadcrumbs">		
			<?php if (is_category()) { ?>
			<p><?php _e('Archive for the', 'boston'); ?> <strong>&#8216;<?php single_cat_title(); ?>&#8217;</strong> <?php _e('Category', 'boston'); ?></p>
			<?php } elseif( is_tag() ) { ?>
			<p><?php _e('Posts Tagged with', 'boston'); ?> <strong>&#8216;<?php single_tag_title(); ?>&#8217;</strong></p>
			<?php } elseif (is_day()) { ?>
			<p><?php _e('Archive for', 'boston'); ?> <strong><?php the_time('F jS, Y'); ?></strong></p>
			<?php } elseif (is_month()) { ?>
			<p><?php _e('Archive for', 'boston'); ?> <strong><?php the_time('F, Y'); ?></strong></p>
			<?php } elseif (is_year()) { ?>
			<p><?php _e('Archive for', 'boston'); ?> <strong><?php the_time('Y'); ?></strong></p>
			<?php } elseif (is_author()) { ?>
			<p><?php _e('Archive by', 'boston'); ?> <strong><?php echo $curauthor->display_name; ?></strong></p>
			<?php } elseif (is_search()) { ?>
			<p><?php _e('Search results for', 'boston'); ?> <strong><?php the_search_query(); ?></strong></p>
			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p><?php _e('Blog Archives', 'boston'); ?></p>
			<?php } ?>
		</div>
		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		<article class="post">
			<div class="postTitle">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php
					$showMeta = get_option('t-datecat');
					if($showMeta != 'no'){
				?>
				<p class="articleCat"><?php _e('Written on', 'boston'); ?> <strong><?php the_time('j F Y, h:ia '); ?></strong> <?php _e('under', 'boston'); ?> <?php the_category(' ,');  ?></p>
				<?php the_tags('<p><strong>Tagged with:</strong> ', ', ', '</p>'); ?>
				<?php } ?>
			</div>
			<?php if(has_post_thumbnail()){ ?>
			<div class="postImage">
				<?php the_post_thumbnail('post'); ?>
			</div>
			<?php } ?>
			<div class="postEntry">
				<?php the_content(); ?>
			</div>
			<div class="postActions">
				<ul>
					<li class="pa-like"><a class="sitem like <?php like_status($post->ID); ?>" data-postid="<?php the_ID(); ?>" href="#"><span><?php _e('Likes', 'boston'); ?> (<em class="likeCount"><?php like_count($post->ID); ?></em>)</span></a></li>
					<li class="sitem pa-share">
						<span><?php _e('Share', 'boston'); ?></span>
						<ul>
							<li class="share-tw"><a rel="nofollow" href="http://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>+<?php the_permalink() ?>" title="Share this post on Twitter" target="_blank">Twitter</a></li>
							<li class="share-fb"><a rel="nofollow" href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>" title="Share this post on Facebook" target="_blank">Facebook</a></li>
							<li class="share-gp"><a rel="nofollow" href="https://plus.google.com/share?url=<?php the_permalink() ?>" title="Share this post on Google Plus" target="_blank">Google+</a></li>
						</ul>
					</li>
					<?php if(comments_open()){ ?>
					<li class="pa-comments">
						<?php comments_popup_link(__('Comments (0)', 'boston'), __('Comments (1)', 'boston'), __('Comments (%)', 'boston'), 'sitem'); ?>
					</li>
					<?php } ?>
				</ul>
			</div>
		</article>
		<?php endwhile; ?>
			<div id="pagination">
				<?php
					global $wp_query;
					$limit = 999999999;
					echo paginate_links(array(
						'base' => str_replace($limit, '%#%', esc_url(get_pagenum_link($limit))),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged')),
						'total' => $wp_query->max_num_pages,
						'mid_size' => 5,
						'prev_next' => true
					));
				?>
			</div>
			<?php else : ?>
			<article class="post">
				<div class="postEntry">
					<p><?php _e('No articles found.', 'boston'); ?></p>
				</div>
			</article>
			<?php endif; ?>
	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
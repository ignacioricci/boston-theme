<?php get_header(); ?>

	<section id="content">
		<article class="post">
			<div class="postTitle">
				<h2><?php _e('Error 404: Not found.', 'boston'); ?></h2>
			</div>
			<div class="postEntry">
				<p><?php _e('The article or page you were looking for has been moved or deleted.', 'boston'); ?></p>
				<p><a href="<?php bloginfo('home'); ?>/">&laquo; <?php _e('Return to homepage', 'boston'); ?></a></p>
			</div>
		</article>
	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
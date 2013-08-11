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
			</div>
			<div class="postEntry">
				<?php the_content(); ?>
			</div>
		</article>
	</section>

	<?php endwhile; endif; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
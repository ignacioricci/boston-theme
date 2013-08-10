<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<section id="content">
		<article class="post">
			<div class="postTitle">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p>Written on <strong><?php the_time('j F Y, h:ia '); ?></strong> under <a href="#">Category Name</a></p>
				<?php the_tags('<p><strong>Tagged with:</strong> ', ', ', '</p>'); ?>
			</div>
			<?php if(has_post_thumbnail()){ ?>
			<div class="postImage">
				<?php the_post_thumbnail('post'); ?>
			</div>
			<?php } ?>
			<div class="postEntry">
				<?php the_content(); ?>
			</div>
		</article>
	</section>

	<?php endwhile; endif; ?>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
	<?php if (have_comments()){ ?>

	<section id="comments">
		<div id="commentList">
			<h3 class="subtitle"><?php comments_number(__('Comments (0)', 'boston'), __('Comments (1)', 'boston'), __('Comments (%)', 'boston')); ?></h3>
			<ol>
				<?php wp_list_comments('callback=boston_comments&type=comment&avatar_size=75'); ?>
			</ol>
		</div>
	</section>

	<?php } ?>

	<?php if (comments_open()){ ?>

		<section class="respond">

			<h3 class="subtitle"><?php _e('Leave a response', 'boston'); ?></h3>

			<?php if (get_option('comment_registration') && !is_user_logged_in()){ ?>
			
			<p><?php _e('You must be', 'boston'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logged in', 'boston'); ?></a> <?php _e('to post a comment', 'boston'); ?>.</p>
			
			<?php } ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

				<?php if (is_user_logged_in()){ ?>

				<p><?php _e('Logged in as', 'boston'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>"><?php _e('Log out', 'boston'); ?> &raquo;</a></p>

				<?php } else { ?>
				
				<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
				
				<p>
					<label for="author"><?php _e('Name', 'boston'); ?> <span>(*)</span></label>
					<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" />
				</p>
				<p>
					<label for="email">E-mail <span>(*)</span></label>
					<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" />
				</p>
				<p>
					<label for="url"><?php _e('Website', 'boston'); ?></label>
					<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" />
				</p>

				<?php } ?>
				
				<p>
					<label for="comment"><?php _e('Message', 'boston'); ?> <span>(*)</span></label>
					<textarea name="comment" id="comment" cols="" rows=""></textarea>
				</p>
				
				<p>
					<button name="submit" type="submit"><?php _e('Post Comment', 'boston'); ?></button>
				</p>
				
				<?php
					comment_id_fields();		
					do_action('comment_form', $post->ID);
				?>

			</form>
		</section>

	<?php } else { ?>

	<section class="respond" id="commentsClosed">
		<p><?php _e('Comments are closed for this article.', 'boston'); ?></p>
	</section>

	<?php } ?>
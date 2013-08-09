<?php get_header(); ?>
	
	<section id="content">
		<div class="hero">
			<img src="<?php bloginfo('template_directory'); ?>/images/examples/hero.jpg" alt="" />
		</div>
		<article class="post">
			<div class="postTitle">
				<h2>Eleven Things I Learned from a Skunk</h2>
				<p>Written on 18 May 2013, at 15:00hs under <a href="#">Category Name</a></p>
			</div>
			<div class="postEntry">
				<a href="#" data-postid="<?php the_ID(); ?>" class="like <?php like_status($post->ID); ?>"><span class="likeCount"><?php like_count($post->ID); ?></span> likes</a>
				<p>1. Due to their odor seeming to be everywhere at once, a skunk is a master at misdirection for certain excitable personalities, but its last line of defense (spraying) is also one of the most effective on earth. After letting the two of them into the back yard, the dog who first noticed the skunk and who was therefore chasing around the yard as if she’d been set free inside a nuclear accelerator was not actually the dog that was in danger of being sprayed or “skunked.” She’d been hoodwinked into thinking the skunk was over there and over there and over there all at the same time. </p>
				<p>The second, slower, <a href="#">lumbering dog</a>, big and black and just barely aware that there was reason for such a racket in the first place, accidentally surprised and cornered skunk where it had taken refuge near the minivan.</p>
				<p>While I expended my energy and attention calling and cajoling the first dog — “Sadie… knock it off… get back in here…” — the second dog had sprinted back to the house in a panic, already past me and now inside, visiting her new odor upon every room and occupant, attempting to remove said odor by rubbing against all available surfaces: carpet, bed, blanket, stair, door, spouse.</p>
				<p><strong>2. Skunk odor is one of the top ten most-toxic odors known to humankind, behind… well, behind nothing I know. It reminds me of nothing humanly imaginable.</strong> Like spoiled and burning all-season radials. But worse. And how do you spoil all-season radials anyway? And you have to concentrate that smell in ways indescribable,as if skunks are using odor technology at least twenty-five years into the future.</p>
				<p>You know the Pepe Le Pew cartoons where Pepe walks into a scene and all the people run away, screaming in terror? I never really understood exactly why they did that until my dog was skunked. Then I understood perfectly well. Running? Screaming? Terror? This is an under-reaction. </p>
			</div>
		</article>
	</section>

	<?php get_sidebar('main'); ?>
	
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

	<?php get_sidebar('aux'); ?>

<?php get_footer(); ?>
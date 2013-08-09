		
		<footer id="footer">
			<div id="copyright">Proudly powered by <a href="#">WordPress</a>. <br /> <a href="#">Baseline theme</a> by <a href="#">Ignacio Ricci</a></div>
		</footer>

	</section>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(function(){
			jQuery('#toggleMenu a, #closeDrawer a').click(function(){
				jQuery('#central').toggleClass('mixed');
				jQuery('#drawer').toggleClass('open');
			});
		});
	</script>

	<?php wp_footer(); ?>

</body>
</html>
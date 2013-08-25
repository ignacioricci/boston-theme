		
		<footer id="footer">
			<p><?php _e('Proudly powered by', 'boston'); ?> <a href="http://wordpress.org/" target="_blank">WordPress</a>. <span><a href="http://boston-theme.com" target="_blank">Boston theme</a> <?php _e('by', 'boston'); ?> <a href="http://ignacioricci.com" target="_blank">Ignacio Ricci</a></span></p>
		</footer>

	</section>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<?php
		$disqus = get_option('t-disqus');
		if(is_single() && $disqus != ''){
	?>
    <script type="text/javascript">
		var disqus_shortname = '<?php echo $disqus; ?>';
		(function(){
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
    </script>
    <?php } ?>
    
	<?php wp_footer(); ?>

</body>
</html>
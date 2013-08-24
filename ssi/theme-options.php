<?php

	add_action('admin_menu', 'customThemeMenu');
	
	function customThemeMenu(){
		global $ThemeName;
		if ($_GET['page'] == basename(__FILE__)){
			if ('save' == $_POST['action']){
				foreach ($_POST as $key => $value):
					if(isset($key)): 
					if(is_array($value)): $value = serialize($value); endif;
						update_option( $key, $value ); 
					else: 
						delete_option($key); 
					endif;
				endforeach;
				header("Location: themes.php?page=theme-options.php&saved=true");
				die;
			}
		}
		add_theme_page($ThemeName . ' Theme Options', $ThemeName . ' Boston Options', 'edit_themes', basename(__FILE__), 'customThemePage');
	}
 
	function customThemePage(){

?>
	<div class="wrap" id="customThemeOptions">
		<div class="icon-32" id="icon-themes"></div>
		<h2>Boston Options</h2>
		<?php if ($_REQUEST['saved']) echo '<div id="message" class="updated"><strong>Boston options saved.</strong></div>'; ?>
		<div class="manage-menus">Use this page to customize different aspects of your blog.</div>
		<form method="post" action="">
		<table class="wp-list-table widefat">
			<thead>
				<tr><th colspan="2"><span>Typography</span></th></tr>
			</thead>
			<tbody>
				<tr valign="top">
					<td class="labelItem"><strong>Type</strong> <em>(Default is: Sans-serif)</em></td>
					<td>
					<?php $ttypeArray = array('serif' => 'Serif', 'sans_serif' => 'Sans Serif');?>
					<?php $ttype = get_option('t-typo-type'); ?>
					<?php foreach($ttypeArray as $key => $value): ?>
						<p class="mulOption">
							<input type="radio" name="t-typo-type" value="<?php echo $key; ?>" id="t-typo-type-<?php echo $key; ?>"<?php if($ttype==$key || $ttype == '') echo ' checked'; ?> />
							<label for="t-typo-type-<?php echo $key; ?>"><?php echo $value; ?></label>
						</p>
					<?php endforeach; ?>
					</td>
				</tr>
				<tr valign="top">
					<td class="labelItem"><strong>Size</strong> <em>(Default is: Big)</em></td>
					<td>
						<?php $tsizeArray = array('small' => 'Small', 'big' => 'Big');?>
						<?php $tsize = get_option('t-size'); ?>
						<?php foreach($tsizeArray as $key => $value): ?>
							<p class="mulOption">
								<input type="radio" name="t-size" value="<?php echo $key ;?>" id="t-size-<?php echo $key; ?>"<?php if($tsize==$key || $tsize == '') echo ' checked'; ?> />
								<label for="t-size-<?php echo $key; ?>"><?php echo $value; ?></label>
							</p>
						<?php endforeach; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="wp-list-table widefat">
			<thead>
				<tr><th colspan="2"><span>Accent color</span></th></tr>
			</thead>
			<tbody>
				<tr valign="top">
					<td class="labelItem"><strong>Link Color</strong><br /><em>(Default is: #990000)</em></td>
					<td>
						<?php $taccent = get_option('t-accent'); ?>
						<p>
							<input class="in" type="text" name="t-accent" id="t-accent" value="<?php if($taccent){ echo $taccent; } else { echo '#990000'; } ?>" />
						</p>
						<div id="colorPickerHolder"><div id="picker"></div></div>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="wp-list-table widefat">
			<thead>
				<tr><th colspan="2"><span>Articles</span></th></tr>
			</thead>
			<tbody>
				<tr valign="top">
					<td class="labelItem"><strong>Show Date, Category &amp; Tags</strong> <em>(Default is: Yes)</em></td>
					<td>
					<?php $tdatecatArray = array('no' => 'No', 'yes' => 'Yes');?>
					<?php $tdatecat = get_option('t-datecat'); ?>
					<?php foreach($tdatecatArray as $key => $value): ?>
						<p class="mulOption">
							<input type="radio" name="t-datecat" value="<?php echo $key; ?>" id="t-datecat-<?php echo $key; ?>"<?php if($tdatecat==$key || $tdatecat == '') echo ' checked'; ?> />
							<label for="t-datecat-<?php echo $key; ?>"><?php echo $value; ?></label>
						</p>
					<?php endforeach; ?>
					</td>
				</tr>
				<tr valign="top">
					<td><strong>Show other popular posts in single page</strong> <em>(Default is: Yes)</em></td>
					<td>
					<?php $tpopularArray = array('no' => 'No', 'yes' => 'Yes');?>
					<?php $tpopular = get_option('t-popular'); ?>
					<?php foreach($tpopularArray as $key => $value): ?>
						<p class="mulOption">
							<input type="radio" name="t-popular" value="<?php echo $key; ?>" id="t-popular-<?php echo $key; ?>"<?php if($tpopular==$key || $tpopular == '') echo ' checked'; ?> />
							<label for="t-popular-<?php echo $key; ?>"><?php echo $value; ?></label>
						</p>
					<?php endforeach; ?>
					</td>
				</tr>
				<tr valign="top">
					<td><strong>Show author in single page</strong> <em>(Default is: Yes)</em></td>
					<td>
					<?php $tauthorArray = array('no' => 'No', 'yes' => 'Yes');?>
					<?php $tauthor = get_option('t-author'); ?>
					<?php foreach($tauthorArray as $key => $value): ?>
						<p class="mulOption">
							<input type="radio" name="t-author" value="<?php echo $key; ?>" id="t-author-<?php echo $key; ?>"<?php if($tauthor==$key || $tauthor == '') echo ' checked'; ?> />
							<label for="t-author-<?php echo $key; ?>"><?php echo $value; ?></label>
						</p>
					<?php endforeach; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="wp-list-table widefat">
			<thead>
				<tr><th colspan="2"><span>Custom Comments</span></th></tr>
			</thead>
				<tr valign="top">
					<td class="labelItem"><strong>DISQUS Shortname</strong> </br> <a href="http://disqus.com/admin/universalcode/" target="_blank">http://disqus.com/admin/universalcode/</a></td>
					<td>
						<?php $tdiscuss = get_option('t-discuss'); ?>
						<p>
							<input class="in" type="text" name="t-discuss" id="t-discuss" value="<?php echo get_option('t-discuss');?>" />
						</p>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="wp-list-table widefat">
			<thead>
				<tr><th colspan="2"><span>Google Analytics</span></th></tr>
			</thead>
				<tr valign="top">
					<td class="labelItem"><strong>Tracking ID</strong> <em>(Ex: UA-XXXXX-Y)</em> </br> <a href="https://support.google.com/analytics/answer/1008080?hl=en">Tracking code information</a></td>
					<td>
						<?php $tanalytics = get_option('t-tanalytics'); ?>
						<p>
							<input class="in" type="text" name="t-tanalytics" id="t-tanalytics" value="<?php echo get_option('t-tanalytics');?>" />
						</p>
					</td>
				</tr>
			</tbody>
		</table>

		<input id="saveCustomThemeChanges" class="button button-primary button-hero" name="save" type="submit" value="Save changes" name="save" /><input type="hidden" name="action" value="save" />
		
		</form>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#picker').farbtastic('#t-accent');
			jQuery('#t-accent').focus(function(){
				jQuery('#picker').show();
			});
			jQuery('#t-accent').blur(function(){
				jQuery('#picker').hide();
			});
		  });
	</script>

	<?php
		wp_register_style('theme_options_styles', get_template_directory_uri().'/admin/styles/theme-options.css', __FILE__);
		wp_enqueue_style('theme_options_styles');
		wp_enqueue_script('theme_colorpicker_js', get_template_directory_uri().'/admin/js/farbtastic.js', '', '', 1 );
			wp_localize_script('theme_colorpicker_js', 'theme_colorpicker_js', array(
			'url' => admin_url('theme-options.php')
		));
	?>

<?php } ?>
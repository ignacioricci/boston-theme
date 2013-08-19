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
				if($_POST['t-social-items']===null): delete_option('t-social-items'); endif;
				header("Location: themes.php?page=theme-options.php&saved=true");
				die;
			}
		}
		add_theme_page($ThemeName . ' Theme Options', $ThemeName . ' Baseline Options', 'edit_themes', basename(__FILE__), 'customThemePage');
	}
 
	function customThemePage(){

?>
	<?php if ($_REQUEST['saved']) echo '<div class="themeMessage"><strong>Baseline options saved.</strong></div>'; ?>
	<div class="wrap" id="customThemeOptions">
		<div class="icon-32" id="icon-themes" style="float:left; width:46px; height:50px; margin:10px 0 0; background-repeat:no-repeat"></div>
		<h2 style="float:left; margin-top:3px;">Baseline Options</h2>
		<div class="manage-menus">Use this page to customize different aspects of your blog.</div>
		<form method="post" action="">
		<table class="wp-list-table widefat">
			<thead>
				<tr><th colspan="2"><span>Typography</span></th></tr>
			</thead>
			<tbody>
				<tr valign="top">
					<td><strong>Type</strong> <em style="color:#666">(Default is: Sans-serif)</em></td>
					<td>
					<?php $tcstyleArray = array('sans_serif' => 'Sans-serif', 'serif' => 'Serif');?>
					<?php $tcstyle = get_option( 't-c-style' ); ?>
					<?php foreach($tcstyleArray as $key => $value): ?>
						<p class="mulOption">
							<input type="radio" name="t-c-style" value="<?php echo $key; ?>" id="t-c-style-<?php echo $key; ?>"<?php if($tcstyle==$key) echo ' checked'; ?> />
							<label for="t-c-style-<?php echo $key; ?>"><?php echo $value; ?></label>
						</p>
					<?php endforeach; ?>
					</td>
				</tr>
				<tr valign="top">
					<td><strong>Size</strong> <em style="color:#666">(Default is: Big)</em></td>
					<td>
						<?php $tsideposArray = array('big' => 'Big', 'small' => 'Small');?>
						<?php $tcpos = get_option( 't-side-position' ); ?>
						<?php foreach($tsideposArray as $key => $value): ?>
							<p class="mulOption">
								<input type="radio" name="t-side-position" value="<?php echo $key ;?>" id="t-side-position-<?php echo $key; ?>"<?php if($tcpos==$key) echo ' checked'; ?> />
								<label for="t-side-position-<?php echo $key; ?>"><?php echo $value; ?></label>
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
					<td><strong>Link Color</strong><br /><em style="color:#666">(Default is: #990000)</em></td>
					<td>
						<p>
							<input type="text" name="t-accent-color" id="t-accent-color" value="<?php echo get_option( 't-accent-color' ); ?>" style="padding:5px; color:#333;" />
						</p>
					</td>
				</tr>
				<tr><td colspan="2"><div id="picker"></div></td></tr>
			</tbody>
		</table>
		<table class="wp-list-table widefat">
			<thead>
				<tr><th colspan="2"><span>Single Article</span></th></tr>
			</thead>
			<tbody>
				<tr valign="top">
					<td><strong>Show date &amp; category</strong> <em style="color:#666">(Default is: Yes)</em></td>
					<td>
					<?php $tcstyleArray = array('sans_serif' => 'Sans-serif', 'serif' => 'Serif');?>
					<?php $tcstyle = get_option( 't-c-style' ); ?>
					<?php foreach($tcstyleArray as $key => $value): ?>
						<p class="mulOption">
							<input type="radio" name="t-c-style" value="<?php echo $key; ?>" id="t-c-style-<?php echo $key; ?>"<?php if($tcstyle==$key) echo ' checked'; ?> />
							<label for="t-c-style-<?php echo $key; ?>"><?php echo $value; ?></label>
						</p>
					<?php endforeach; ?>
					</td>
				</tr>
				<tr valign="top">
					<td><strong>Show other popular posts</strong> <em style="color:#666">(Default is: Yes)</em></td>
					<td>
					<?php $tcstyleArray = array('sans_serif' => 'Sans-serif', 'serif' => 'Serif');?>
					<?php $tcstyle = get_option( 't-c-style' ); ?>
					<?php foreach($tcstyleArray as $key => $value): ?>
						<p class="mulOption">
							<input type="radio" name="t-c-style" value="<?php echo $key; ?>" id="t-c-style-<?php echo $key; ?>"<?php if($tcstyle==$key) echo ' checked'; ?> />
							<label for="t-c-style-<?php echo $key; ?>"><?php echo $value; ?></label>
						</p>
					<?php endforeach; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="wp-list-table widefat">
			<thead>
				<tr><th colspan="2"><span>Comments</span></th></tr>
			</thead>
				<tr valign="top">
					<td><strong>Use DISQUS</strong> <em style="color:#666">(Default is: no)</em></td>
					<td>
						<p>
							<input type="text" name="t-articles" id="t-articles" style="padding:5px; color:#333;" value="<?php echo get_option( 't-articles' );?>" />
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
					<td><strong>Paste code</strong> <em style="color:#666">(Default is: no)</em></td>
					<td>
						<p>
							<input type="text" name="t-articles" id="t-articles" style="padding:5px; color:#333;" value="<?php echo get_option( 't-articles' );?>" />
						</p>
					</td>
				</tr>
			</tbody>
		</table>

		<input style="margin-top:20px;" class="button-primary" name="save" type="submit" value="Save changes" name="save" /><input type="hidden" name="action" value="save" />
		
		</form>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function() {
		    jQuery('#picker').farbtastic('#t-accent-color');
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
<?php
/**
 * The 90s Retro Theme Admin Settings Page
 */

add_action('admin_menu', 'back_to_the_90s_add_theme_menu_item');
add_action('admin_init', 'back_to_the_90s_register_options');

function back_to_the_90s_register_options() {
	add_settings_section('section', esc_html__('All Theme Settings', 'back-to-the-90s-free'), null, 'back-to-the-90s-free-theme-options');
}

function back_to_the_90s_settings_page() {
?>
	<div class="back-to-the-90s-free-settings">
	<form method='post' action='options.php'>
	<h1><span class='dashicons dashicons-heart'></span> <?php esc_html_e('Settings for the Back to The 90s Theme', 'back-to-the-90s-free'); ?></h1>
		<?php
			back_to_the_90s_display_demo_notification();
			settings_fields('section');
			do_settings_sections('back-to-the-90s-free-theme-options');
			back_to_the_90s_display_disabled_settings();
		?>          
	</form>
	</div>
<?php
}

function back_to_the_90s_add_theme_menu_item() {
	add_theme_page(esc_html__('Back to The 90s Theme Settings', 'back-to-the-90s-free'), esc_html__('Back to The 90s Theme Settings', 'back-to-the-90s-free'), 'edit_theme_options', 'back-to-the-90s-free-theme-settings', 'back_to_the_90s_settings_page');
}

function back_to_the_90s_display_disabled_settings() {
	
	$pm_wp_seo_url = 'https://wordpress.org/plugins/poor-mans-wp-seo/';
	
	echo '
		<h4>Tip: Go to <span style="font-style: italic">Appearance &rarr; Customize</span> for more settings.</h4>
		<h4>Have your already considered the search engine visibility of your site? The simple and free <a href="'.esc_url($pm_wp_seo_url).'" title="Free download at WordPress.org" target="_blank">Poor Man\'s WordPress SEO</a> plugin is recommended.</h4>
		<table class="form-table disabled">
		<tr><th scope="row">Is this site under construction?</th><td><input disabled name="back_to_the_90s_site_under_construction" value="1" type="checkbox"></td></tr>
		<tr><th scope="row">Display animated GIFs</th><td><input disabled name="back_to_the_90s_display_gifs" value="1" type="checkbox"></td></tr>
		<tr><th scope="row">Alternative location of the main GIF (leave blank for default). Will be sized to 48x48px.</th><td><input disabled placeholder="Use default" name="back_to_the_90s_gif1_alt_location" value="" type="text"></td></tr>
		<tr><th scope="row">Play audio file on the background of front page</th><td><input disabled name="back_to_the_90s_play_background_midi" value="1" type="checkbox"></td></tr>
		<tr><th scope="row">Alternative audio location (MP3)</th><td><input disabled placeholder="Use default" name="back_to_the_90s_alt_audio_url" value="" type="text"></td></tr>
		<tr><th scope="row">Display scroller notification on the front page</th><td><input disabled name="retro_scroller_enabled" value="1" checked="checked" type="checkbox"></td></tr>
		<tr><th scope="row">Text for scroller</th><td><input placeholder="Use default" disabled name="retro_scroller_text" value="" type="text"></td></tr>
		</table>		
		<p class="submit"><input disabled name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit"></p>		
	';
}

function back_to_the_90s_display_demo_notification() {
	echo '<div class="back-to-the-90s-free-alert"><span class="dashicons dashicons-lock"></span>This is the demonstration version of the Back to The 90s Retro Theme. The settings are restricted. To gain full access to settings and customization <a href="'.esc_url($GLOBALS['back-to-the-90s-free-theme-url']).'">get the full version</a>.</div>';
}
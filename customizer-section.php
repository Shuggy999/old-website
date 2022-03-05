<?php
class Back_to_The_90s_Free_Customizer_Section extends WP_Customize_Section {

	public $type = 'back-to-the-90s-free-section';
	public $priority = -1;

	protected function render_template() {
		if (get_transient('back-to-the-90s-free-premium-dismiss')) {
			return;
		}
		
		echo '
		<div class="back-to-the-90s-free-alert">
			<span class="dashicons dashicons-lock"></span> <p><strong>Notice:</strong> You are using the demonstration version of the <strong>Back to The 90s Retro Theme</strong>. The customizations are restricted. To gain <strong>full access</strong> to settings and customization<br/><strong><span class="dashicons dashicons-yes premium-check"></span> <a class="theme-link" target="_blank" href="https://mokimoki.net/90s-retro-wordpress-theme/">get the full version</a></strong>.</p><p><br/><strong>Full version brings you</strong><br/>&middot; Possibility to change colors<br/>&middot; Background images<br/>&middot; Header images<br/>&middot; Fonts<br/>&middot; Option for background music<br/>&middot; Frontpage scroller<br/>&middot; Styling shortcodes<br/>&middot; Add your own CSS<br/><span class="italic">&middot; and much more...</span></p><p><br/><a class="back-to-the-90s-free-alert-close" href="#">Understood</a></p></div>
		</div>
		';
	}
}

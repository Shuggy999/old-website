<?php
function back_to_the_90s_theme_customizer_css() {
	$css_main_width = is_active_sidebar('widget-area-2') ? 'calc(100% - 500px)' : 'calc(100% - 300px)';

	echo '
		<style>	
			body { 
				color: #eee; 
				background: #000; 			
			}
			a { 
				color: #ff00ff; 
			}
			h1,h2,h3,h4,h5,h6 { 
				color: #eee;
			}
			h1 a,h2 a,h3 a,h4 a,h5 a,h6 a { color: #0f0; }
			.home main h2 {
				color: #0f0;
			}
			nav h2 a { 
				color: #eee; 
			}		
			nav a { 
				color: #f0f; 
			}
			main {
				width: '. esc_html($css_main_width) .';
			}
			
			aside.sidebar {
				border-left: 2px groove #000;
			}
			
			nav {
				border-right: 2px groove #000;
			}
			
			.separator {
				border-bottom: 2px groove #000;
			}
		</style>
	';
}

function back_to_the_90s_customize_register($wp_customize) {
	require_once('customizer-section.php');

	$wp_customize->register_section_type('Back_to_The_90s_Free_Customizer_Section');

	$wp_customize->add_section(
		new Back_to_The_90s_Free_Customizer_Section(
			$wp_customize,
			'back-to-the-90s-free-section',
			array(
				'title' => esc_html__('Premium Features', 'back-to-the-90s-free')
			)
		)
	);

	$wp_customize->add_setting('back-to-the-90s-free-customize-setting', array(
		'default'   => NULL,
		'transport' => 'postMessage',
		'sanitize_callback'  => 'esc_attr'
	));
	
	$wp_customize->add_control('back-to-the-90s-free-customize-control', array(
	  'label' => NULL,
	  'type' => 'textarea',
	  'section' => 'back-to-the-90s-free-section',
	));
}

add_action('wp_head', 'back_to_the_90s_theme_customizer_css');
add_action('customize_register', 'back_to_the_90s_customize_register');

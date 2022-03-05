<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
		
		<?php wp_head(); ?>		
	</head>
	<body id="back-to-the-90s-free" <?php body_class(); ?>>
	
		<div class="wrapper">
		
			<nav class="nav theme-navigation">
				<?php back_to_the_90s_nav(); ?>
			</nav>
			
			<div style="clear:both"></div>
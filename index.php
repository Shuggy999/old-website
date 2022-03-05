<?php get_header(); ?>

	<main>

		<?php if (get_header_image() != '') : ?>
		<header class="header clear">

				<div class="logo">
					<a href="<?php echo esc_url(home_url()); ?>">
						<img src="<?php header_image(); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
					</a>
				</div>

		</header>
	
		<?php else: ?>
		
		<header>
			<h1><?php echo esc_html(get_bloginfo('description')); ?></h1>
		</header>
		<?php endif; ?>
	
		<section>		
			<?php echo '<h2>' . esc_html__('Latest Posts', 'back-to-the-90s-free') . '</h2>'; ?>			

			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>

		</section>
		
		<?php get_footer(); ?>
	</main>

<?php get_sidebar(); ?>

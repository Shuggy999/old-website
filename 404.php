<?php get_header(); ?>

	<main>
		<section>
			<article id="post-404">
				<h1>
					<?php back_to_the_90s_free_print_gif3_if_enabled(); ?>
					<?php esc_html_e('Page not found', 'back-to-the-90s-free'); ?>
				</h1>
				<h2>
					<a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Return home?', 'back-to-the-90s-free'); ?></a>
				</h2>
			</article>
		</section>

		<?php get_footer(); ?>
	</main>

<?php get_sidebar(); ?>

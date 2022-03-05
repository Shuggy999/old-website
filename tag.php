<?php get_header(); ?>

	<main>
		<section>

			<h1>
				<?php back_to_the_90s_free_print_gif1_if_enabled(); ?>
				<?php esc_html_e('Tag Archive: ', 'back-to-the-90s-free'); echo single_tag_title('', FALSE); ?>
			</h1>

			<?php get_template_part('loop'); ?>

			<?php the_posts_pagination(); ?>
			<?php the_posts_navigation(); ?>

		</section>
		
		<?php get_footer(); ?>
	</main>

<?php get_sidebar(); ?>



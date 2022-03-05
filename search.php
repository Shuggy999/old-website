<?php get_header(); ?>

	<main>
		<section>

			<h1>
				<?php back_to_the_90s_free_print_gif1_if_enabled(); ?>
				Search Results for <?php echo esc_html(get_search_query()); ?>
			</h1>

			<?php get_template_part('loop'); ?>

			<?php the_posts_pagination(); ?>
			<?php the_posts_navigation(); ?>

		</section>
		
		<?php get_footer(); ?>

	</main>

<?php get_sidebar(); ?>


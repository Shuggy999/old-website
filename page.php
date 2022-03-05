<?php get_header(); ?>

<main>
	<section>

		<h1>
			<?php back_to_the_90s_free_print_gif1_if_enabled(); ?>
			<?php the_title(); ?>
		</h1>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_post_thumbnail_url(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<div style="clear:both"></div>
			<?php endif; ?>


			<?php the_content(); ?>

			<?php comments_template( '', TRUE); ?>

			<br/>

			<?php edit_post_link(); ?>

		</article>
		<?php endwhile; ?>

		<?php else : ?>

		<article>
			<h2><?php esc_html_e('Sorry, nothing to display.', 'back-to-the-90s-free'); ?></h2>
		</article>

		<?php endif; ?>

	</section>

	<?php get_footer(); ?>
</main>

<?php get_sidebar(); ?>
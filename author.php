<?php get_header(); ?>

<main role="main">
	<section>

		<?php if ( have_posts() ): the_post(); ?>

		<h1>
			<?php back_to_the_90s_print_gif1_if_enabled(); ?>
			<?php esc_html_e('Author Archives for ', 'back-to-the-90s-free'); echo get_the_author(); ?>
		</h1>

		<?php if (get_the_author_meta( 'description')) : ?>

		<?php echo get_avatar( get_the_author_meta( 'user_email')); ?>

		<?php endif; ?>

		<?php rewind_posts(); while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(array(120, 120)); ?>
			</a>
			<?php endif; ?>

			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>

			<span class="date">
					<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
						<?php the_date(); ?> <?php the_time(); ?>
					</time>
				</span>
			<span class="author"><?php esc_html_e('Published by', 'back-to-the-90s-free'); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php comments_popup_link(esc_html__('Leave a comment', 'back-to-the-90s-free'), esc_html__('1 Comment', 'back-to-the-90s-free'), esc_html__('% Comments', 'back-to-the-90s-free')); ?></span>

			<?php back_to_the_90s_free_excerpt('back_to_the_90s_free_index'); ?>

			<?php edit_post_link(); ?>

			<div class="separator" style="clear:both"></div>

		</article>

		<?php endwhile; ?>

		<?php else : ?>

		<article>

			<h2><?php esc_html_e('Sorry, nothing to display.', 'back-to-the-90s-free'); ?></h2>

		</article>

		<?php endif; ?>

		<?php the_posts_pagination(); ?>
		<?php the_posts_navigation(); ?>

	</section>

	<?php get_footer(); ?>
</main>

<?php get_sidebar(); ?>
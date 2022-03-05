<?php get_header(); ?>

<main>
	<section>

		<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_post_thumbnail_url(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			<div style="clear:both"></div>
			<?php endif; ?>

			<h1>
				<?php back_to_the_90s_free_print_gif1_if_enabled(); ?>			
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h1>

			<span class="date">
				<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
					<?php the_date(); ?> <?php the_time(); ?>
				</time>
			</span>
			<span class="author"><?php esc_html_e('Published by', 'back-to-the-90s-free'); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php if (comments_open(get_the_ID())) comments_popup_link(esc_html__('Leave a comment', 'back-to-the-90s-free'), esc_html__('1 Comment', 'back-to-the-90s-free'), esc_html__('% Comments', 'back-to-the-90s-free')); ?></span>

			<div class="separator high"></div>

			<?php the_content(); ?>

			<div style="clear:both"></div>

			<?php the_tags(esc_html__('Tags: ', 'back-to-the-90s-free'), ', ', '<br>'); ?>

			<span class="category"><?php esc_html_e('Categorised in: ', 'back-to-the-90s-free'); the_category(', '); ?></span>

			<?php edit_post_link(); ?>

			<div class="separator" style="clear:both"></div>

			<?php comments_template(); ?>

		</article>

		<?php endwhile; ?>

		<?php else : ?>

		<article>

			<h1><?php esc_html_e('Sorry, nothing to display.', 'back-to-the-90s-free'); ?></h1>

		</article>

		<?php endif; ?>

	</section>

	<?php get_footer(); ?>
</main>

<?php get_sidebar(); ?>
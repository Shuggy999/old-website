<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<div class="separator" style="clear:both"></div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (has_post_thumbnail()) : ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail(array(150, 150)); ?>
	</a>
	<?php endif; ?>
	
	<h3>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	</h3>
	
	<span class="date">
			<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
				<?php the_date(); ?> <?php the_time(); ?>
			</time>
		</span>
	<span class="author"><?php esc_html_e( 'Published by', 'back-to-the-90s-free'); ?> <?php the_author_posts_link(); ?></span>
	<span class="comments"><?php if (comments_open(get_the_ID())) comments_popup_link(esc_html__( 'Leave a comment', 'back-to-the-90s-free'), esc_html__('1 Comment', 'back-to-the-90s-free'), esc_html__('% Comments', 'back-to-the-90s-free')); ?></span>
	
	<?php back_to_the_90s_free_excerpt('back_to_the_90s_free_index'); ?>

	<?php edit_post_link(); ?>

</article>

<?php endwhile; ?>

<?php else : ?>

<article>
	<h2><?php esc_html_e('Sorry, nothing to display.', 'back-to-the-90s-free'); ?></h2>
</article>

<?php endif; ?>
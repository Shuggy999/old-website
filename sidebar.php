		<?php if (is_active_sidebar('widget-area-2')) : ?>
		<div style="clear:both"></div>
		<aside class="sidebar">

			<div class="sidebar-widget">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2' )); ?>
			</div>
			
			<div style="clear:both"></div>
		</aside>
		<?php endif; ?>

		</div>
		<?php wp_footer(); ?>
	</body>
</html>

<?php 
	if (get_option('show_on_front') === 'posts') {
		get_template_part('index'); 
	} else {
		$wp_query = new WP_Query(array('page_id' => (int)get_option('page_for_posts')));
		get_template_part('single'); 
	}
?>
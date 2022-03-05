<?php 
	if (get_option('show_on_front') === 'posts') {
		get_template_part('index'); 
	} else {
		get_template_part('single'); 
	}
?>
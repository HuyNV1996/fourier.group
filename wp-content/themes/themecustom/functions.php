<?php

function theme_settup() {
	register_nav_menu('topmenu', __('Menu chính'));

	function setpostview($postID){
		$count_key ='views';
		$count = get_post_meta($postID, $count_key, true);
		if($count == ''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		} else {
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	function getpostviews($postID){
		$count_key ='views';
		$count = get_post_meta($postID, $count_key, true);
		if($count == ''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0";
		}
		return $count;
	}
}

add_action('init', 'theme_settup');

wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0.1');
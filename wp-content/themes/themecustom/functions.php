<?php

function theme_setup() {
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

	add_theme_support( 'post-thumbnails' );
}

add_action('init', 'theme_setup');

function custom_customize_register( $wp_customize ) {
    // Thêm cài đặt cho text
    $wp_customize->add_setting('custom_text_setting', array(
        'default'   => 'Default text here',
        'transport' => 'refresh',
    ));

    // Thêm cài đặt cho ảnh
    $wp_customize->add_setting('custom_image_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Thêm phần (section) cho cài đặt
    $wp_customize->add_section('custom_content_section', array(
        'title'      => __('Custom Content', 'textdomain'),
        'priority'   => 30,
    ));

    // Thêm điều khiển cho text
    $wp_customize->add_control('custom_text_control', array(
        'label'    => __('Custom Text', 'textdomain'),
        'section'  => 'custom_content_section',
        'settings' => 'custom_text_setting',
        'type'     => 'textarea',
    ));

    // Thêm điều khiển cho ảnh
    $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'custom_image_control', array(
        'label'    => __('Custom Image', 'textdomain'),
        'section'  => 'custom_content_section',
        'settings' => 'custom_image_setting',
    )));
}
add_action('customize_register', 'custom_customize_register');
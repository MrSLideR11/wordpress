<?php

add_theme_support('menus');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('custom-logo', array('height' => 250, 'width' => 250, 'flex-width' => true, 'flex-height' => true));

add_image_size('total-auto', 275, 125, true);

add_filter('show_admin_bar', '__return_false'); //Hide adminbar

add_action('wp_enqueue_scripts', 'include_files');

function include_files() {
	wp_enqueue_style( 'styles-theme', get_template_directory_uri() . '/dist/css/app.css' );
	wp_enqueue_script( 'scripts-theme', get_stylesheet_directory_uri() . '/dist/js/app.js', array(), null, true );
    wp_localize_script('scripts-theme', 'wp_variables', array(
		'ajax' => admin_url('admin-ajax.php'),
		'site_url' => site_url(),
		'site_assets' => get_stylesheet_directory_uri(),
	));
}

// Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива 
add_filter( 'get_the_archive_title', function( $title ){ 
	return preg_replace('~^[^:]+: ~', '', $title ); 
});

add_filter( 'get_the_archive_title', 'webpro_remove_name_cat' ); 
function webpro_remove_name_cat( $title ){ 
	if ( is_category() ) { 
		$title = single_cat_title( '', false ); 
	} elseif ( is_tag() ) { 
		$title = single_tag_title( '', false ); 
	} return $title; 
}

function pre($arr){
	echo "<pre>"; print_r($arr); echo "</pre>";
}

//Reg menu
register_nav_menu( 'heaedr', 'header' );
register_nav_menu( 'footer', 'footer' );
require_once "inc/customizer.php";
require_once "inc/post-types.php";
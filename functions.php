<?php

function k79_enqueue_scripts() {
	$version = '1.1';

	// Them file style. array() <---- file phia truoc
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/plugins/bootstrap/css/bootstrap.min.css' ), array(), $version );
	wp_enqueue_style( 'themify-icons', get_theme_file_uri( 'assets/plugins/themify/css/themify-icons.css' ), array(), $version );
	wp_enqueue_style( 'slick-theme', get_theme_file_uri( 'assets/plugins/slick-carousel/slick-theme.css' ), array(), $version );
	wp_enqueue_style( 'slick', get_theme_file_uri( 'assets/plugins/slick-carousel/slick.css' ), array(), $version );
	wp_enqueue_style( 'owl.carousel', get_theme_file_uri( 'assets/plugins/owl-carousel/owl.carousel.min.css' ), array(), $version );
	wp_enqueue_style( 'owl.theme.default', get_theme_file_uri( 'assets/plugins/owl-carousel/owl.theme.default.min.css' ), array(), $version );
	wp_enqueue_style( 'magnific-popup', get_theme_file_uri( 'assets/plugins/magnific-popup/magnific-popup.css' ), array(), $version );
	wp_enqueue_style( 'style', get_theme_file_uri( 'assets/css/style.css' ), array(), $version );

	wp_enqueue_script( 'bootstrap', get_theme_file_uri( 'assets/plugins/bootstrap/js/bootstrap.min.js' ), array( 'jquery' ), $version, true );
	wp_enqueue_script( 'popper', get_theme_file_uri( 'assets/plugins/bootstrap/js/popper.min.js' ), array( 'jquery' ), $version, true );
	wp_enqueue_script( 'carousel', get_theme_file_uri( 'assets/plugins/owl-carousel/owl.carousel.min.js' ), array( 'jquery' ), $version, true );
	wp_enqueue_script( 'slick', get_theme_file_uri( 'assets/plugins/slick-carousel/slick.min.js' ), array( 'jquery' ), $version, true );
	wp_enqueue_script( 'magnific-popup', get_theme_file_uri( 'assets/plugins/magnific-popup/magnific-popup.js' ), array( 'jquery' ), $version, true );
	wp_enqueue_script( 'instafeed', get_theme_file_uri( 'assets/plugins/instafeed-js/instafeed.min.js' ), array( 'jquery' ), $version, true );
	wp_enqueue_script( 'custom', get_theme_file_uri( 'assets/js/custom.js' ), array( 'jquery' ), $version, true );
	wp_enqueue_script( 'ajax-js', get_theme_file_uri( 'assets/js/ajax.js' ), array( 'jquery' ), $version, true );

	wp_localize_script( 'ajax-js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'k79_enqueue_scripts' );


function k79_setup() {

	// Ho tro anh dai dien.
	add_theme_support( 'post-thumbnails' );

	// Ham ba lang gi do ho tro html5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Them kich thuoc hinh: ten kich thuoc, dai, rong, co cat hay khong.
	add_image_size( 'article-thumbnail', 550, 550, true );

	// Custom logo.
	$args = array(
		'height'               => 60,
		'width'                => 142,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true,
	);
	add_theme_support( 'custom-logo', $args );  // argument.

	// Dang ky menu.
	register_nav_menus( array(
		'main-menu-location'   => 'Main Menu Location',
		'footer-menu-location' => 'Footer Menu Location',
		'social-menu-location' => 'Social Menu Location',
	) );
}
add_action( 'after_setup_theme', 'k79_setup' );

// Them class vao the "a" cua menu
function k79_add_class_to_a( $atts, $item, $args ) {

	if ( $args->menu->slug == 'main-menu' ) {
		$atts['class'] = 'nav-link';
	}

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'k79_add_class_to_a', 10, 3 );

function k79_nav_menu_submenu_css_class( $classes ) {
	$classes[] = 'dropdown-menu';

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'k79_nav_menu_submenu_css_class' );

function k79_add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		//Check if the item is a parent item
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			//Add "menu-parent-item" class to parents
			$item->classes[] = 'dropdown';
		}
	}

	return $items;
}

// add_menu_parent_class to menu.
add_filter( 'wp_nav_menu_objects', 'k79_add_menu_parent_class' );

require get_template_directory() . '/inc/member-functions.php';
require get_template_directory() . '/inc/topic-functions.php';

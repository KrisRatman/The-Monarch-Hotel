<?php

require get_template_directory() . '/inc/booking.php';

function monarch_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'monarch_setup' );

function monarch_enqueue_assets() {
	wp_enqueue_style(
		'monarch-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'monarch-tailwind',
		get_template_directory_uri() . '/assets/tailwind.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'monarch-main',
		get_template_directory_uri() . '/assets/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'monarch_enqueue_assets' );

function monarch_enqueue_booking_assets() {
	wp_enqueue_script(
		'monarch-booking',
		get_template_directory_uri() . '/assets/booking.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_localize_script( 'monarch-booking', 'monarchBooking', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'monarch_booking_nonce' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'monarch_enqueue_booking_assets' );

// Hardening: this is a static landing page — no blogging clients, pingbacks or XML-RPC needed.
add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

function monarch_meta_description() {
	$description = get_bloginfo( 'description' );
	if ( $description ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'monarch_meta_description', 1 );

<?php
/**
 * Coach Theme functions and definitions.
 *
 * @package CoachTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'COACH_THEME_VERSION', '1.0.0' );

/** Theme setup. */
function coach_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus( array( 'primary' => __( 'Primary menu', 'coach-theme' ) ) );
}
add_action( 'after_setup_theme', 'coach_theme_setup' );

/** Load the compiled Tailwind stylesheet. */
function coach_theme_assets() {
	wp_enqueue_style( 'coach-theme', get_theme_file_uri( '/assets/css/theme.css' ), array(), COACH_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'coach_theme_assets' );

/** Register the Events content type. */
function coach_theme_register_events() {
	register_post_type( 'event', array(
		'labels' => array(
			'name' => __( 'Events', 'coach-theme' ),
			'singular_name' => __( 'Event', 'coach-theme' ),
			'add_new_item' => __( 'Add New Event', 'coach-theme' ),
			'edit_item' => __( 'Edit Event', 'coach-theme' ),
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-calendar-alt',
		'show_in_rest' => true,
		'rewrite' => array( 'slug' => 'events' ),
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
	) );
}
add_action( 'init', 'coach_theme_register_events' );

/** Register ACF fields in code, so field definitions ship with the theme. */
function coach_theme_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key' => 'group_coach_homepage',
		'title' => __( 'Homepage content', 'coach-theme' ),
		'fields' => array(
			array( 'key' => 'field_coach_eyebrow', 'label' => __( 'Eyebrow', 'coach-theme' ), 'name' => 'home_eyebrow', 'type' => 'text', 'default_value' => 'COACHING THAT MOVES YOU FORWARD' ),
			array( 'key' => 'field_coach_heading', 'label' => __( 'Main heading', 'coach-theme' ), 'name' => 'home_heading', 'type' => 'text', 'default_value' => 'Build a life and career you love.' ),
			array( 'key' => 'field_coach_intro', 'label' => __( 'Intro text', 'coach-theme' ), 'name' => 'home_intro', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Practical, personal coaching to help you find clarity, create momentum, and make your next move.' ),
			array( 'key' => 'field_coach_hero_image', 'label' => __( 'Hero image', 'coach-theme' ), 'name' => 'home_hero_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'large' ),
			array( 'key' => 'field_coach_cta_text', 'label' => __( 'Button text', 'coach-theme' ), 'name' => 'home_button_text', 'type' => 'text', 'default_value' => 'Book a discovery call' ),
			array( 'key' => 'field_coach_cta_url', 'label' => __( 'Button link', 'coach-theme' ), 'name' => 'home_button_url', 'type' => 'url' ),
		),
		'location' => array( array( array( 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ) ) ),
		'position' => 'normal',
		'show_in_rest' => 1,
	) );

	acf_add_local_field_group( array(
		'key' => 'group_coach_overlay_block',
		'title' => __( 'Image overlay content', 'coach-theme' ),
		'fields' => array(
			array( 'key' => 'field_coach_overlay_image', 'label' => __( 'Background image', 'coach-theme' ), 'name' => 'background_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'large', 'required' => 1 ),
			array( 'key' => 'field_coach_overlay_title', 'label' => __( 'Heading', 'coach-theme' ), 'name' => 'overlay_heading', 'type' => 'text', 'required' => 1 ),
			array( 'key' => 'field_coach_overlay_text', 'label' => __( 'Text', 'coach-theme' ), 'name' => 'overlay_text', 'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_coach_overlay_link', 'label' => __( 'Button link', 'coach-theme' ), 'name' => 'overlay_link', 'type' => 'link' ),
			array( 'key' => 'field_coach_overlay_position', 'label' => __( 'Text position', 'coach-theme' ), 'name' => 'overlay_position', 'type' => 'select', 'choices' => array( 'left' => __( 'Left', 'coach-theme' ), 'center' => __( 'Center', 'coach-theme' ), 'right' => __( 'Right', 'coach-theme' ) ), 'default_value' => 'left', 'ui' => 1 ),
		),
		'location' => array( array( array( 'param' => 'block', 'operator' => '==', 'value' => 'acf/coach-image-overlay' ) ) ),
	) );
}
add_action( 'acf/init', 'coach_theme_register_acf_fields' );

/** Register an editor-friendly image with text overlay block (requires ACF 5.8+). */
function coach_theme_register_blocks() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( array(
			'name' => 'coach-image-overlay',
			'title' => __( 'Image with text overlay', 'coach-theme' ),
			'description' => __( 'A full-width image with editable text and an optional link.', 'coach-theme' ),
			'render_template' => get_theme_file_path( '/template-parts/block-image-overlay.php' ),
			'category' => 'formatting',
			'icon' => 'cover-image',
			'keywords' => array( 'image', 'overlay', 'coach' ),
			'mode' => 'preview',
			'supports' => array( 'align' => array( 'wide', 'full' ), 'anchor' => true, 'jsx' => false ),
		) );
	}
}
add_action( 'acf/init', 'coach_theme_register_blocks' );

/** Add event date and location fields using ACF when available. */
function coach_theme_event_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}
	acf_add_local_field_group( array(
		'key' => 'group_coach_event_details',
		'title' => __( 'Event details', 'coach-theme' ),
		'fields' => array(
			array( 'key' => 'field_coach_event_date', 'label' => __( 'Event date and time', 'coach-theme' ), 'name' => 'event_date', 'type' => 'date_time_picker', 'display_format' => 'F j, Y g:i a', 'return_format' => 'Y-m-d H:i:s' ),
			array( 'key' => 'field_coach_event_location', 'label' => __( 'Location', 'coach-theme' ), 'name' => 'event_location', 'type' => 'text' ),
		),
		'location' => array( array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'event' ) ) ),
	) );
}
add_action( 'acf/init', 'coach_theme_event_fields' );

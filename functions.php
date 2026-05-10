<?php
/**
 * Jwansa Clinic functions and definitions
 */

// إخفاء رسائل التحذير (Deprecated) الخاصة بـ PHP 8 والتي تظهر من إضافات أو من نواة ووردبريس
// إظهار الأخطاء الفادحة مؤقتاً لمعرفة سبب العطل
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

if ( ! function_exists( 'jwansa_setup' ) ) :
	function jwansa_setup() {
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Add support for HTML5.
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'jwansa' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'jwansa_setup' );

/**
 * PHP 8.x Compatibility — منع تمرير null لدوال WordPress الداخلية
 * يحل مشكلة: strpos(): null  و  str_replace(): null
 */
function jwansa_php8_null_fixes() {

	// 1. تنظيف body_class من القيم غير النصية
	add_filter( 'body_class', function( $classes ) {
		return array_values( array_filter( array_map( 'strval', (array) $classes ) ) );
	}, 999 );

	// 2. تنظيف CSS classes في قائمة التنقل
	add_filter( 'nav_menu_css_class', function( $classes ) {
		return array_values( array_filter( array_map( 'strval', (array) $classes ) ) );
	}, 999 );

	// 3. منع null في روابط قائمة التنقل
	add_filter( 'nav_menu_link_attributes', function( $atts ) {
		return array_map( function( $v ) { return (string) ( $v ?? '' ); }, (array) $atts );
	}, 999 );

	// 4. منع null في post_class
	add_filter( 'post_class', function( $classes ) {
		return array_values( array_filter( array_map( 'strval', (array) $classes ) ) );
	}, 999 );

	// 5. منع null في عنوان الموقع
	add_filter( 'bloginfo', function( $output, $show ) {
		return (string) ( $output ?? '' );
	}, 999, 2 );

	// 6. منع null في the_title
	add_filter( 'the_title', function( $title ) {
		return (string) ( $title ?? '' );
	}, 999 );
}
add_action( 'init', 'jwansa_php8_null_fixes' );



/**
 * Enqueue scripts and styles.
 */
function jwansa_scripts() {
	wp_enqueue_style( 'jwansa-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'jwansa-script', get_template_directory_uri() . '/script.js', array(), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'jwansa_scripts' );

/**
 * ACF Options Page — يجب وجودها لكي تعمل get_field('...', 'option')
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'إعدادات الموقع',
		'menu_title' => 'إعدادات الموقع',
		'menu_slug'  => 'jwansa-site-options',
		'capability' => 'edit_posts',
		'redirect'   => false,
	) );
}

/**
 * AJAX handler لإرسال نموذج الحجز
 */
function jwansa_booking_form_submit() {
	// التحقق من nonce
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'jwansa_booking' ) ) {
		wp_send_json_error( array( 'message' => 'طلب غير صالح.' ) );
		wp_die();
	}

	$name    = sanitize_text_field( $_POST['booking_name'] ?? '' );
	$phone   = sanitize_text_field( $_POST['booking_phone'] ?? '' );
	$service = sanitize_text_field( $_POST['booking_service'] ?? '' );
	$file_no = sanitize_text_field( $_POST['booking_file'] ?? '' );
	$message = sanitize_textarea_field( $_POST['booking_message'] ?? '' );

	if ( empty( $name ) || empty( $phone ) ) {
		wp_send_json_error( array( 'message' => 'الاسم ورقم الجوال مطلوبان.' ) );
		wp_die();
	}

	// إرسال بريد إلكتروني للإدارة
	$admin_email = get_option( 'admin_email' );
	$subject     = 'حجز جديد من الموقع — ' . $name;
	$body        = "اسم العميل: {$name}\nرقم الجوال: {$phone}\nالخدمة: {$service}\nرقم الملف: {$file_no}\nالرسالة: {$message}";
	$headers     = array( 'Content-Type: text/plain; charset=UTF-8' );

	wp_mail( $admin_email, $subject, $body, $headers );

	wp_send_json_success( array( 'message' => 'تم استلام طلب الحجز بنجاح! سنتواصل معك قريباً.' ) );
	wp_die();
}
add_action( 'wp_ajax_jwansa_booking',        'jwansa_booking_form_submit' );
add_action( 'wp_ajax_nopriv_jwansa_booking', 'jwansa_booking_form_submit' );

/**
 * تمرير بيانات AJAX للـ script.js
 */
function jwansa_localize_scripts() {
	wp_localize_script( 'jwansa-script', 'jwansaAjax', array(
		'url'   => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'jwansa_booking' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'jwansa_localize_scripts', 20 );

/**
 * Fallback functions for ACF (Advanced Custom Fields)
 * Prevents Fatal Errors if the ACF plugin is not installed or activated.
 */
if ( ! function_exists( 'get_field' ) ) {
	function get_field( $selector, $post_id = false, $format_value = true ) {
		return false;
	}
}
if ( ! function_exists( 'the_field' ) ) {
	function the_field( $selector, $post_id = false, $format_value = true ) {
		// do nothing
	}
}
if ( ! function_exists( 'have_rows' ) ) {
	function have_rows( $selector, $post_id = false ) {
		return false;
	}
}
if ( ! function_exists( 'the_row' ) ) {
	function the_row() {
		// do nothing
	}
}
if ( ! function_exists( 'get_sub_field' ) ) {
	function get_sub_field( $selector, $format_value = true ) {
		return false;
	}
}
if ( ! function_exists( 'the_sub_field' ) ) {
	function the_sub_field( $selector, $format_value = true ) {
		// do nothing
	}
}

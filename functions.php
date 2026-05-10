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
		'capability' => 'edit_pages', // السماح للمحررين (Editors) بالدخول لهذه الصفحة
		'redirect'   => false,
		'icon_url'   => 'dashicons-admin-generic',
		'position'   => 2,
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
 * Register ACF Fields Programmatically
 */
require_inline_acf_fields();
function require_inline_acf_fields() {
	if ( file_exists( get_template_directory() . '/inc/acf-fields.php' ) ) {
		require_once get_template_directory() . '/inc/acf-fields.php';
	}
}

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

/* ==========================================================================
   CUSTOM ADMIN & LOGIN DASHBOARD STYLES
   ========================================================================== */

/**
 * Enqueue custom styles for WP Admin Dashboard
 */
function jwansa_admin_styles() {
	wp_enqueue_style( 'jwansa-admin-style', get_template_directory_uri() . '/admin-style.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'admin_enqueue_scripts', 'jwansa_admin_styles' );

/**
 * Enqueue custom styles for WP Login Screen
 */
function jwansa_login_styles() {
	wp_enqueue_style( 'jwansa-login-style', get_template_directory_uri() . '/admin-style.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'login_enqueue_scripts', 'jwansa_login_styles' );

/**
 * Change the Login Screen Logo Link to the website homepage instead of wordpress.org
 */
function jwansa_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'jwansa_login_logo_url' );

/**
 * Change the Login Screen Logo Title
 */
function jwansa_login_logo_url_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'jwansa_login_logo_url_title' );

/**
 * Remove WordPress Logo from the Admin Bar
 */
function jwansa_remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'jwansa_remove_wp_logo', 999 );

/**
 * Clean up Admin Dashboard for non-administrators (Editors/Clinic Staff)
 */
function jwansa_clean_admin_dashboard() {
	// If the user is an Administrator, don't hide anything (so you can still manage the site)
	if ( current_user_can( 'manage_options' ) ) {
		return;
	}

	// Remove default WP menus
	remove_menu_page( 'plugins.php' ); // إضافات
	remove_menu_page( 'tools.php' ); // أدوات
	remove_menu_page( 'options-general.php' ); // الإعدادات

	// Remove plugin menus (by their slugs)
	remove_menu_page( 'elementor' ); // Elementor
	remove_menu_page( 'edit.php?post_type=elementor_library' ); // Elementor Templates
	remove_menu_page( 'hostinger' ); // Hostinger
	remove_menu_page( 'litespeed' ); // LiteSpeed Cache
	remove_menu_page( 'edit.php?post_type=acf-field-group' ); // ACF Plugin Menu
	remove_menu_page( 'deployer-for-git' ); // Deployer for Git (Guessing slug, we'll also use CSS to be safe)
	remove_menu_page( 'wp-git-deploy' ); 
	
	// Remove some submenu items just in case
	remove_submenu_page( 'themes.php', 'themes.php' ); // Hide theme switcher
}
add_action( 'admin_menu', 'jwansa_clean_admin_dashboard', 999 );

/**
 * Add CSS to force hide complex plugins for non-admins (fallback if slugs change)
 */
function jwansa_force_hide_admin_menus() {
	if ( current_user_can( 'manage_options' ) ) {
		return;
	}
	echo '<style>
		#toplevel_page_hostinger,
		#toplevel_page_elementor,
		#toplevel_page_litespeed,
		#toplevel_page_deployer-for-git,
		#toplevel_page_edit-post_type-acf-field-group,
		#menu-plugins,
		#menu-tools,
		#menu-settings,
		#toplevel_page_wp-git-deploy {
			display: none !important;
		}
	</style>';
}
add_action( 'admin_head', 'jwansa_force_hide_admin_menus' );

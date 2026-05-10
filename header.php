<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- ===== HEADER / NAVBAR ===== -->
  <header class="navbar" id="navbar">
    <div class="container navbar__inner">
      <div class="navbar__logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" />
        </a>
      </div>
      <button class="navbar__toggle" id="navToggle" aria-label="Toggle menu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
          <line x1="3" y1="12" x2="21" y2="12"></line>
          <line x1="3" y1="6" x2="21" y2="6"></line>
          <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
      </button>
      <nav class="navbar__links" id="navLinks">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class'     => '',
            'container'      => false,
            'fallback_cb'    => false, // We'll output default links if no menu exists
        ) );
        ?>
        <?php if ( ! has_nav_menu( 'primary' ) ) : ?>
            <a href="#" class="active">الرئيسية</a>
            <a href="#">من نحن</a>
            <a href="#">تواصل معنا</a>
            <a href="#">المدونة</a>
        <?php endif; ?>
      </nav>
      <div class="navbar__actions" id="navActions">
        <a href="tel:<?php echo get_field('phone_number', 'option') ? get_field('phone_number', 'option') : '+974123456789'; ?>" class="navbar__phone" dir="ltr">
          <svg viewBox="0 0 24 24" fill="var(--primary)" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18" height="18"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          <span><?php echo get_field('phone_display', 'option') ? get_field('phone_display', 'option') : '+974 123 456 789'; ?></span>
        </a>
        <a href="#booking" class="btn btn--primary">تواصل معنا</a>
      </div>
    </div>
  </header>

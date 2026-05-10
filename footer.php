  <footer class="footer">
    <div class="container footer__inner">

      <!-- Col 1: Logo -->
      <div class="footer__col footer__brand">
        <img src="<?php echo get_template_directory_uri(); ?>/images/footerlogo.png" alt="<?php bloginfo( 'name' ); ?>" class="footer__logo" />
        <p class="footer__desc">
            <?php echo get_field('footer_description', 'option') ? get_field('footer_description', 'option') : 'عيادة جوان لطب الأسنان توفر لك تجربة مريحة للعناية بأسنانك مع أفضل الكوادر الطبية.'; ?>
        </p>
      </div>

      <!-- Col 2: Links -->
      <div class="footer__col footer__links">
        <h4>المزيد عنا</h4>
        <ul>
          <li><a href="#">من نحن</a></li>
          <li><a href="#">سياسة الخصوصية</a></li>
          <li><a href="#">الشروط والأحكام</a></li>
          <li><a href="#">تواصل معنا</a></li>
          <li><a href="#">المدونة</a></li>
        </ul>
      </div>

      <!-- Col 3: Contact -->
      <div class="footer__col footer__contact">
        <h4>تواصل معنا</h4>
        <ul class="contact-list">
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="contact-icon">
              <path
                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
              </path>
            </svg>
            <span dir="ltr"><?php echo get_field('phone_display', 'option') ? get_field('phone_display', 'option') : '+095 123 4567'; ?></span>
          </li>
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="contact-icon">
              <path
                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
              </path>
            </svg>
            <span dir="ltr"><?php echo get_field('phone_2_display', 'option') ? get_field('phone_2_display', 'option') : '+095 123 4567'; ?></span>
          </li>
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="contact-icon">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <span dir="ltr"><?php echo get_field('email_address', 'option') ? get_field('email_address', 'option') : 'example@hotmail.com'; ?></span>
          </li>
        </ul>
      </div>

      <!-- Col 4: Socials -->
      <div class="footer__col footer__social">
        <h4>تابعنا على وسائل التواصل</h4>
        <div class="footer__socials">
          <a href="#" class="social-icon" aria-label="Facebook">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </svg>
          </a>
          <a href="#" class="social-icon" aria-label="Twitter">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
              </path>
            </svg>
          </a>
          <a href="#" class="social-icon" aria-label="Instagram">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          <a href="#" class="social-icon" aria-label="LinkedIn">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
              <rect x="2" y="9" width="4" height="12"></rect>
              <circle cx="4" cy="4" r="2"></circle>
            </svg>
          </a>
        </div>
      </div>

    </div>

    <div class="footer__bottom">
      <div class="container footer__bottom-inner">
        <p>جميع الحقوق المحفوظة <?php echo date('Y'); ?></p>
        <p>الرقم الضريبي : <?php echo get_field('tax_number', 'option') ? get_field('tax_number', 'option') : '123456789'; ?></p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>

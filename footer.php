  <footer class="footer">
    <div class="container footer__inner">

      <!-- Col 1: Logo -->
      <div class="footer__col footer__brand">
        <img src="<?php echo get_template_directory_uri(); ?>/images/footerlogo.png" alt="<?php bloginfo( 'name' ); ?>" class="footer__logo" />
        <p class="footer__desc">
            <?php echo esc_html( (string)( get_field('footer_description', 'option') ?: 'عيادة جوان لطب الأسنان توفر لك تجربة مريحة للعناية بأسنانك مع أفضل الكوادر الطبية.' ) ); ?>
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
            <a href="tel:<?php echo get_field('phone_number', 'option') ? get_field('phone_number', 'option') : '+966177222220'; ?>" dir="ltr"><?php echo get_field('phone_display', 'option') ? get_field('phone_display', 'option') : '+966177222220'; ?></a>
          </li>
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="contact-icon">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <span dir="ltr"><?php echo get_field('email_address', 'option') ? get_field('email_address', 'option') : 'info@jwansa.com'; ?></span>
          </li>
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="contact-icon">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <span><?php echo esc_html( (string)( get_field('address_text', 'option') ?: 'نجران – طريق الملك عبدالعزيز – دحضه' ) ); ?></span>
          </li>
        </ul>
      </div>

      <!-- Col 4: Socials -->
      <div class="footer__col footer__social">
        <h4>تابعنا على وسائل التواصل</h4>
        <div class="footer__socials">
          <?php $fb_url = get_field('facebook_url', 'option'); ?>
          <?php if($fb_url): ?>
          <a href="<?php echo esc_url($fb_url); ?>" class="social-icon" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </svg>
          </a>
          <?php endif; ?>
          <?php $tw_url = get_field('twitter_url', 'option') ?: 'https://x.com/jwan_clinic'; ?>
          <?php if($tw_url): ?>
          <a href="<?php echo esc_url($tw_url); ?>" class="social-icon" aria-label="Twitter / X" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
              </path>
            </svg>
          </a>
          <?php endif; ?>
          <?php $ig_url = get_field('instagram_url', 'option') ?: 'https://www.instagram.com/jwan_clinic_sa/'; ?>
          <?php if($ig_url): ?>
          <a href="<?php echo esc_url($ig_url); ?>" class="social-icon" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          <?php endif; ?>
          <?php $snap_url = get_field('snapchat_url', 'option'); ?>
          <?php if($snap_url): ?>
          <a href="<?php echo esc_url($snap_url); ?>" class="social-icon" aria-label="Snapchat" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2C8.5 2 6 4.5 6 8v.5c-.5.3-1 .5-1.5.7-.3.1-.5.4-.5.7 0 .5.4.9.9.9.2 0 .4 0 .6-.1-.3.7-.6 1.5-.6 2.3C4.9 15.7 8 18 12 18s7.1-2.3 7.1-5c0-.8-.3-1.6-.6-2.3.2.1.4.1.6.1.5 0 .9-.4.9-.9 0-.3-.2-.6-.5-.7-.5-.2-1-.4-1.5-.7V8c0-3.5-2.5-6-6-6z"/>
            </svg>
          </a>
          <?php endif; ?>
          <?php $tiktok_url = get_field('tiktok_url', 'option') ?: 'https://www.tiktok.com/@jwan_clinic'; ?>
          <?php if($tiktok_url): ?>
          <a href="<?php echo esc_url($tiktok_url); ?>" class="social-icon" aria-label="TikTok" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 15.68a6.32 6.32 0 0 0 6.27 6.32 6.32 6.32 0 0 0 6.27-6.31V7.97a8.36 8.36 0 0 0 4.33 1.23V5.88a5.02 5.02 0 0 1-2.28-.53V6.69z"/>
            </svg>
          </a>
          <?php endif; ?>
          <?php $pinterest_url = get_field('pinterest_url', 'option') ?: 'https://www.pinterest.com/jwansaClinic/'; ?>
          <?php if($pinterest_url): ?>
          <a href="<?php echo esc_url($pinterest_url); ?>" class="social-icon" aria-label="Pinterest" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.951-7.252 4.168 0 7.41 2.967 7.41 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.367 18.601 0 12.017 0z"/>
            </svg>
          </a>
          <?php endif; ?>
          <?php $wa_url = get_field('whatsapp_number', 'option') ?: '+966177222220'; ?>
          <?php if($wa_url): ?>
          <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $wa_url); ?>" class="social-icon" aria-label="WhatsApp" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 2a10 10 0 0 0-8.607 15.028L2 22l5.083-1.338A10 10 0 1 0 12 2z"/>
            </svg>
          </a>
          <?php endif; ?>
        </div>
      </div>

    </div>

    <div class="footer__bottom">
      <div class="container footer__bottom-inner">
        <p>جميع الحقوق المحفوظة &copy; <?php echo date('Y'); ?> &mdash; <?php bloginfo('name'); ?></p>
        <p>الرقم الضريبي : <?php echo get_field('tax_number', 'option') ? esc_html(get_field('tax_number', 'option')) : '123456789'; ?></p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>

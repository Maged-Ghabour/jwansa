<?php
/**
 * Template Name: Front Page
 */
get_header(); ?>

  <!-- ===== HERO SECTION ===== -->
  <section class="hero">
    <div class="container hero__top">
      <h1 class="hero__title"><?php echo esc_html( (string)( get_field('hero_title') ?: 'ابتسامة بدون ألم... بسعر ثابت 175 ريال فقط' ) ); ?></h1>
      <p class="hero__sub"><?php echo wp_kses_post( (string)( get_field('hero_subtitle') ?: 'اختر خدمتك من 4 خدمات أسنان أساسية<br>مع كشف واستشارة مجانية بالكامل' ) ); ?></p>
    </div>
    <div class="container relative">
      <div class="hero__media-wrapper">
        <div class="hero__notch">
          <a href="#booking" class="btn btn--primary btn--hero-notch">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px;">
              <path
                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
              </path>
            </svg>
            <?php echo get_field('hero_button_text') ? get_field('hero_button_text') : 'احجز استشارتك الآن'; ?>
          </a>
        </div>
        <?php $hero_image = get_field('hero_image'); ?>
        <img src="<?php echo $hero_image ? esc_url($hero_image['url']) : get_template_directory_uri() . '/images/hero.png'; ?>" alt="Hero" class="hero__img" />
      </div>
    </div>
  </section>

  <!-- ===== STATS BAR ===== -->
  <div class="stats-bar-wrapper container">
    <div class="stats-bar">
      <div class="stats-bar__inner">
        <div class="stat-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon_1.png" alt="عنوان العيادة" class="stat-item__icon" />
          <div class="stat-item__text">
            <strong><?php echo jwansa_get_global_field('stat_1_title') ? jwansa_get_global_field('stat_1_title') : 'عنوان العيادة:'; ?></strong>
            <span><?php echo jwansa_get_global_field('stat_1_text') ? jwansa_get_global_field('stat_1_text') : 'عيادة جوان - نجران - شارع المعتصم'; ?></span>
          </div>
        </div>
        <div class="stat-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon_2.png" alt="مواعيد العمل" class="stat-item__icon" />
          <div class="stat-item__text">
            <strong><?php echo jwansa_get_global_field('stat_2_title') ? jwansa_get_global_field('stat_2_title') : 'مواعيد العمل:'; ?></strong>
            <span><?php echo jwansa_get_global_field('stat_2_text') ? jwansa_get_global_field('stat_2_text') : 'من السبت الى الخميس - من الساعة 3 م الى 11 م'; ?></span>
          </div>
        </div>
        <div class="stat-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon_3.png" alt="رقم العيادة" class="stat-item__icon" />
          <div class="stat-item__text">
            <strong><?php echo jwansa_get_global_field('stat_3_title') ? jwansa_get_global_field('stat_3_title') : 'رقم العيادة:'; ?></strong>
            <span dir="ltr"><?php echo jwansa_get_global_field('stat_3_text') ? jwansa_get_global_field('stat_3_text') : '+966177222220'; ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== SERVICES SECTION ===== -->
  <section class="services section-pad">
    <div class="container">
      <div class="section-header">
        <div class="section-label">
          <img src="<?php echo get_template_directory_uri(); ?>/images/iconHeader.png" alt="" class="section-icon" />
          <?php echo esc_html( (string)( get_field('services_label') ?: 'وش يشمل العرض؟' ) ); ?>
        </div>
        <h2 class="section-title"><?php echo esc_html( (string)( get_field('services_title') ?: 'بسعر 175 ريال فقط تقدر تختار خدمة واحدة من التالي:' ) ); ?></h2>
      </div>
      <div class="services__grid">
        
        <?php if( have_rows('services_list') ): ?>
            <?php while( have_rows('services_list') ): the_row(); 
                $icon = get_sub_field('service_image');
            ?>
            <div class="service-card">
              <div class="service-card__body">
                <h3><?php the_sub_field('service_title'); ?></h3>
                <p><?php the_sub_field('service_description'); ?></p>
              </div>
              <div class="service-card__img-wrapper">
                <?php if( $icon && !empty($icon['url']) ): ?>
                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php the_sub_field('service_title'); ?>" loading="lazy" />
                <?php endif; ?>
              </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <!-- Fallback Content -->
            <div class="service-card">
              <div class="service-card__body">
                <h3>1- خلع سن أو ضرس عادي</h3>
                <p>حل سريع وآمن للتخلص من آلام أسنانك واستعادة راحتك</p>
              </div>
              <div class="service-card__img-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/service 1.png" alt="خلع سن أو ضرس عادي" />
              </div>
            </div>
            <div class="service-card">
              <div class="service-card__body">
                <h3>2- حشوة تجميلية</h3>
                <p>تحسين فوري لشكل أسنانك بابتسامة أجمل وطبيعية</p>
              </div>
              <div class="service-card__img-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/service 2.png" alt="حشوة تجميلية" />
              </div>
            </div>
            <div class="service-card">
              <div class="service-card__body">
                <h3>3- حشوة وقائية للأطفال</h3>
                <p>حماية مبكرة لأسنان طفلك من التسوس بطريقة آمنة</p>
              </div>
              <div class="service-card__img-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/service 3.png" alt="حشوة وقائية للأطفال" />
              </div>
            </div>
            <div class="service-card">
              <div class="service-card__body">
                <h3>4- جلسة فلورايد للأطفال</h3>
                <p>تقوية أسنان الأطفال وتقليل فرص التسوس بسهولة</p>
              </div>
              <div class="service-card__img-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/service 4.png" alt="جلسة فلورايد للأطفال" />
              </div>
            </div>
        <?php endif; ?>

      </div>
      <div class="services__footer-cta">
        <div class="cta-text">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="var(--primary)" stroke="var(--white)" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="11" stroke="none"></circle>
            <path d="M7 12.5l3 3 7-7" fill="none"></path>
          </svg>
          <strong><?php echo get_field('services_cta_text') ? get_field('services_cta_text') : 'والكشف مجاني قبل أي إجراء'; ?></strong>
        </div>
        <a href="#booking" class="btn btn--primary btn--cta">
          تواصل معنا
          <span class="btn-icon-circle">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
          </span>
        </a>
      </div>
    </div>
  </section>

  <!-- ===== QUIZ / QUESTIONNAIRE SECTION ===== -->
  <section class="quiz section-pad">
    <div class="container">
      <div class="section-header">
        <div class="section-label">
          <img src="<?php echo get_template_directory_uri(); ?>/images/iconHeader.png" alt="" class="section-icon" />
          <?php echo esc_html( (string)( get_field('quiz_label') ?: 'هذا العرض مناسب لك إذا...' ) ); ?>
        </div>
        <h2 class="section-title"><?php echo esc_html( (string)( get_field('quiz_title') ?: 'حدد بسرعة هل هذا العرض يناسب احتياجك' ) ); ?></h2>
      </div>

      <div class="quiz-content">
        <div class="quiz-features-row">
          <div class="quiz-feature">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="var(--primary)" stroke="var(--white)"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="11" stroke="none"></circle>
              <path d="M7 12.5l3 3 7-7" fill="none"></path>
            </svg>
            <strong><?php echo esc_html( (string)( get_field('quiz_item_1') ?: 'مهتم بصحة أسنان أطفالك' ) ); ?></strong>
          </div>
          <div class="quiz-feature">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="var(--primary)" stroke="var(--white)"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="11" stroke="none"></circle>
              <path d="M7 12.5l3 3 7-7" fill="none"></path>
            </svg>
            <strong><?php echo esc_html( (string)( get_field('quiz_item_2') ?: 'تعاني من ألم مفاجئ في أحد الأسنان' ) ); ?></strong>
          </div>
        </div>

        <div class="quiz-banner">
            <?php $quiz_banner = get_field('quiz_banner'); ?>
            <img src="<?php echo $quiz_banner ? esc_url($quiz_banner['url']) : get_template_directory_uri() . '/images/banner 1.png'; ?>" alt="بانر الاستبيان" />
        </div>

        <div class="quiz-features-row">
          <div class="quiz-feature">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="var(--primary)" stroke="var(--white)"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="11" stroke="none"></circle>
              <path d="M7 12.5l3 3 7-7" fill="none"></path>
            </svg>
            <strong><?php echo esc_html( (string)( get_field('quiz_item_3') ?: 'تبغى تحسن شكل ابتسامتك' ) ); ?></strong>
          </div>
          <div class="quiz-feature">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="var(--primary)" stroke="var(--white)"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="11" stroke="none"></circle>
              <path d="M7 12.5l3 3 7-7" fill="none"></path>
            </svg>
            <strong><?php echo esc_html( (string)( get_field('quiz_item_4') ?: 'تحتاج حل سريع وبتكلفة واضحة' ) ); ?></strong>
          </div>
        </div>

        <div class="quiz-action">
          <a href="#booking" class="btn btn--primary btn--cta">
            تواصل معنا
            <span class="btn-icon-circle">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7" />
              </svg>
            </span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== WHY CHOOSE US SECTION ===== -->
  <section class="why-us section-pad">
    <div class="container">
      <div class="section-header">
        <div class="section-label">
          <img src="<?php echo get_template_directory_uri(); ?>/images/iconHeader.png" alt="" class="section-icon" />
          <?php echo esc_html( (string)( get_field('why_label') ?: 'ليش تختار عيادة جوان؟' ) ); ?>
        </div>
        <h2 class="section-title"><?php echo esc_html( (string)( get_field('why_title') ?: 'أسباب تخلي ثقتك فينا أسهل' ) ); ?></h2>
      </div>
      <div class="why-us__grid">
        
        <?php if( have_rows('why_us_list') ): ?>
            <?php while( have_rows('why_us_list') ): the_row(); 
                $icon = get_sub_field('why_image');
            ?>
            <div class="why-card">
              <div class="why-card__icon">
                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php the_sub_field('why_title'); ?>" />
              </div>
              <h3><?php the_sub_field('why_title'); ?></h3>
              <p><?php the_sub_field('why_description'); ?></p>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="why-card">
              <div class="why-card__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon1.png" alt="أطباء مختصين" />
              </div>
              <h3>أطباء مختصين</h3>
              <p>فريق طبي مؤهل يقدم لك رعاية دقيقة وآمنة في كل زيارة</p>
            </div>
            <div class="why-card">
              <div class="why-card__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon2.png" alt="راحتك أولويتنا" />
              </div>
              <h3>راحتك أولويتنا</h3>
              <p>نهتم بتجربة مريحة ونقلل القلق قدر الإمكان أثناء العلاج</p>
            </div>
            <div class="why-card">
              <div class="why-card__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon3.png" alt="موقع سهل الوصول" />
              </div>
              <h3>موقع سهل الوصول</h3>
              <p>في موقع حيوي بنجران يسهل الوصول إليه بسرعة وبدون تعقيد</p>
            </div>
            <div class="why-card">
              <div class="why-card__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon4.png" alt="تجربة سلسة" />
              </div>
              <h3>تجربة سلسة</h3>
              <p>من الحجز إلى الزيارة، كل خطوة مصممة لتكون سهلة وسريعة</p>
            </div>
        <?php endif; ?>

      </div>
    </div>
  </section>

  <!-- ===== BOOKING SECTION ===== -->
  <section class="booking section-pad" id="booking">
    <div class="container">
      <div class="section-header">
        <div class="section-label">
          <img src="<?php echo get_template_directory_uri(); ?>/images/iconHeader.png" alt="" class="section-icon" />
          العرض لفترة محدودة
        </div>
        <h2 class="section-title">احجز موعدك الآن ولا تفوت العرض</h2>
      </div>
      <div class="booking__inner">
        <div class="booking__form">
            <?php 
                // Display Contact Form 7 or WPForms shortcode if defined in ACF, otherwise fallback to standard form
                $form_shortcode = get_field('booking_form_shortcode');
                if($form_shortcode):
                    echo do_shortcode($form_shortcode);
                else:
            ?>
          <form id="bookingForm">
            <div class="form-row">
              <div class="form-group">
                <label for="booking_name">الاسم:</label>
                <input type="text" id="booking_name" name="booking_name" placeholder="محمد أحمد" required />
              </div>
              <div class="form-group">
                <label for="booking_phone">رقم الجوال:</label>
                <input type="tel" id="booking_phone" name="booking_phone" dir="ltr" style="text-align: right;" placeholder="+095 123 4567" required />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="booking_service">اختر الخدمة:</label>
                <div class="custom-select-wrapper">
                  <select id="booking_service" name="booking_service">
                    <option>خلع سن أو ضرس عادي</option>
                    <option>حشوة تجميلية</option>
                    <option>حشوة وقائية للأطفال</option>
                    <option>جلسة فلورايد للأطفال</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="booking_file">رقم الملف (إن وجد):</label>
                <input type="text" id="booking_file" name="booking_file" placeholder="مثال: 75" />
              </div>
            </div>
            <div class="form-group">
              <label for="booking_message">رسالتك (إن وجد):</label>
              <textarea id="booking_message" name="booking_message" placeholder="رسالتك" rows="5"></textarea>
            </div>
          </form>
          <?php endif; ?>
        </div>
        <div class="booking__map">
            <?php $map_iframe = get_field('map_iframe'); ?>
            <?php if( !empty($map_iframe) ): ?>
                <?php echo wp_kses_post( (string) $map_iframe ); ?>
            <?php else: ?>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.2!2d46.7!3d24.7!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDQyJzAwLjAiTiA0NsKwNDInMDAuMCJF!5e0!3m2!1sar!2ssa!4v1"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            <?php endif; ?>
          <div class="booking__map-cutout">
            <button type="submit" form="bookingForm" class="btn btn--primary btn--cta booking__submit-btn">
              احجز الآن
              <span class="btn-icon-circle">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path d="M19 12H5M12 19l-7-7 7-7" />
                </svg>
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>

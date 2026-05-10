<?php
/**
 * Register ACF Local Field Groups programmatically
 */

if ( function_exists( 'acf_add_local_field_group' ) ) :

	// 1. Site Options (إعدادات الموقع)
	acf_add_local_field_group( array(
		'key'                   => 'group_site_options',
		'title'                 => 'إعدادات الموقع العامة',
		'fields'                => array(
			array(
				'key'           => 'field_footer_desc',
				'label'         => 'وصف الفوتر',
				'name'          => 'footer_description',
				'type'          => 'textarea',
				'default_value' => 'عيادة جوان لطب الأسنان توفر لك تجربة مريحة للعناية بأسنانك مع أفضل الكوادر الطبية.',
			),
			array(
				'key'           => 'field_phone_num',
				'label'         => 'رقم الجوال (للاتصال)',
				'name'          => 'phone_number',
				'type'          => 'text',
				'instructions'  => 'أدخل الرقم مع رمز الدولة، مثال: +966500000000',
			),
			array(
				'key'           => 'field_phone_disp',
				'label'         => 'رقم الجوال (للعرض)',
				'name'          => 'phone_display',
				'type'          => 'text',
				'instructions'  => 'مثال: +966 50 000 0000',
			),
			array(
				'key'           => 'field_whatsapp_num',
				'label'         => 'رقم الواتساب',
				'name'          => 'whatsapp_number',
				'type'          => 'text',
			),
			array(
				'key'           => 'field_facebook_url',
				'label'         => 'رابط فيسبوك',
				'name'          => 'facebook_url',
				'type'          => 'url',
			),
			array(
				'key'           => 'field_twitter_url',
				'label'         => 'رابط تويتر',
				'name'          => 'twitter_url',
				'type'          => 'url',
			),
			array(
				'key'           => 'field_instagram_url',
				'label'         => 'رابط انستجرام',
				'name'          => 'instagram_url',
				'type'          => 'url',
			),
			array(
				'key'           => 'field_tiktok_url',
				'label'         => 'رابط تيك توك',
				'name'          => 'tiktok_url',
				'type'          => 'url',
			),
			array(
				'key'           => 'field_pinterest_url',
				'label'         => 'رابط بنترست',
				'name'          => 'pinterest_url',
				'type'          => 'url',
			),
			array(
				'key'           => 'field_snapchat_url',
				'label'         => 'رابط سناب شات',
				'name'          => 'snapchat_url',
				'type'          => 'url',
			),
			array(
				'key'           => 'field_email_address',
				'label'         => 'البريد الإلكتروني',
				'name'          => 'email_address',
				'type'          => 'email',
			),
			array(
				'key'           => 'field_address_text',
				'label'         => 'عنوان العيادة',
				'name'          => 'address_text',
				'type'          => 'text',
			),
			array(
				'key'           => 'field_tax_number',
				'label'         => 'الرقم الضريبي',
				'name'          => 'tax_number',
				'type'          => 'text',
			),
			array(
				'key'   => 'field_tab_stats_bar',
				'label' => 'شريط المعلومات (تحت الصورة الرئيسية)',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_stat_1_title',
				'label'         => 'عنوان الخانة الأولى',
				'name'          => 'stat_1_title',
				'type'          => 'text',
				'default_value' => 'عنوان العيادة:',
			),
			array(
				'key'           => 'field_stat_1_text',
				'label'         => 'نص الخانة الأولى',
				'name'          => 'stat_1_text',
				'type'          => 'text',
				'default_value' => 'عيادة جوان - نجران - شارع المعتصم',
			),
			array(
				'key'           => 'field_stat_2_title',
				'label'         => 'عنوان الخانة الثانية',
				'name'          => 'stat_2_title',
				'type'          => 'text',
				'default_value' => 'مواعيد العمل:',
			),
			array(
				'key'           => 'field_stat_2_text',
				'label'         => 'نص الخانة الثانية',
				'name'          => 'stat_2_text',
				'type'          => 'text',
				'default_value' => 'من السبت الى الخميس - من الساعة 3 م الى 11 م',
			),
			array(
				'key'           => 'field_stat_3_title',
				'label'         => 'عنوان الخانة الثالثة',
				'name'          => 'stat_3_title',
				'type'          => 'text',
				'default_value' => 'رقم العيادة:',
			),
			array(
				'key'           => 'field_stat_3_text',
				'label'         => 'نص الخانة الثالثة',
				'name'          => 'stat_3_text',
				'type'          => 'text',
				'default_value' => '+966177222220',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'jwansa-site-options',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'seamless',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
	) );

	// 2. Front Page Fields (حقول الصفحة الرئيسية)
	acf_add_local_field_group( array(
		'key'                   => 'group_front_page',
		'title'                 => 'إعدادات الصفحة الرئيسية',
		'fields'                => array(
			// Hero Section
			array(
				'key'   => 'field_tab_hero',
				'label' => 'القسم الرئيسي (Hero)',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_hero_title',
				'label' => 'العنوان الرئيسي',
				'name'  => 'hero_title',
				'type'  => 'text',
				'default_value' => 'ابتسامة بدون ألم... بسعر ثابت 175 ريال فقط',
			),
			array(
				'key'   => 'field_hero_subtitle',
				'label' => 'النص الفرعي',
				'name'  => 'hero_subtitle',
				'type'  => 'textarea',
				'default_value' => 'اختر خدمتك من 4 خدمات أسنان أساسية<br>مع كشف واستشارة مجانية بالكامل',
			),
			array(
				'key'           => 'field_hero_image',
				'label'         => 'صورة القسم الرئيسي',
				'name'          => 'hero_image',
				'type'          => 'image',
				'return_format' => 'array',
			),

			// Services Section
			array(
				'key'   => 'field_tab_services',
				'label' => 'الخدمات',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_services_label',
				'label' => 'الكلمة الدلالية للخدمات',
				'name'  => 'services_label',
				'type'  => 'text',
				'default_value' => 'وش يشمل العرض؟',
			),
			array(
				'key'   => 'field_services_title',
				'label' => 'عنوان قسم الخدمات',
				'name'  => 'services_title',
				'type'  => 'text',
				'default_value' => 'بسعر 175 ريال فقط تقدر تختار خدمة واحدة من التالي:',
			),
			array(
				'key'          => 'field_services_list',
				'label'        => 'قائمة الخدمات',
				'name'         => 'services_list',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'إضافة خدمة',
				'sub_fields'   => array(
					array(
						'key'   => 'field_service_title',
						'label' => 'عنوان الخدمة',
						'name'  => 'service_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_service_description',
						'label' => 'وصف الخدمة',
						'name'  => 'service_description',
						'type'  => 'textarea',
					),
					array(
						'key'           => 'field_service_image',
						'label'         => 'أيقونة الخدمة',
						'name'          => 'service_image',
						'type'          => 'image',
						'return_format' => 'array',
					),
				),
			),

			// Quiz Section
			array(
				'key'   => 'field_tab_quiz',
				'label' => 'قسم الاستبيان',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_quiz_label',
				'label' => 'الكلمة الدلالية',
				'name'  => 'quiz_label',
				'type'  => 'text',
				'default_value' => 'هذا العرض مناسب لك إذا...',
			),
			array(
				'key'   => 'field_quiz_title',
				'label' => 'العنوان',
				'name'  => 'quiz_title',
				'type'  => 'text',
				'default_value' => 'حدد بسرعة هل هذا العرض يناسب احتياجك',
			),
			array(
				'key'   => 'field_quiz_item_1',
				'label' => 'النقطة الأولى',
				'name'  => 'quiz_item_1',
				'type'  => 'text',
				'default_value' => 'مهتم بصحة أسنان أطفالك',
			),
			array(
				'key'   => 'field_quiz_item_2',
				'label' => 'النقطة الثانية',
				'name'  => 'quiz_item_2',
				'type'  => 'text',
				'default_value' => 'تعاني من ألم مفاجئ في أحد الأسنان',
			),
			array(
				'key'   => 'field_quiz_item_3',
				'label' => 'النقطة الثالثة',
				'name'  => 'quiz_item_3',
				'type'  => 'text',
				'default_value' => 'تبغى تحسن شكل ابتسامتك',
			),
			array(
				'key'   => 'field_quiz_item_4',
				'label' => 'النقطة الرابعة',
				'name'  => 'quiz_item_4',
				'type'  => 'text',
				'default_value' => 'تحتاج حل سريع وبتكلفة واضحة',
			),
			array(
				'key'           => 'field_quiz_banner',
				'label'         => 'صورة الاستبيان الجانبية',
				'name'          => 'quiz_banner',
				'type'          => 'image',
				'return_format' => 'array',
			),

			// Why Us Section
			array(
				'key'   => 'field_tab_why',
				'label' => 'لماذا تختارنا؟',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_why_label',
				'label' => 'الكلمة الدلالية',
				'name'  => 'why_label',
				'type'  => 'text',
				'default_value' => 'ليش تختار عيادة جوان؟',
			),
			array(
				'key'   => 'field_why_title',
				'label' => 'العنوان الرئيسي',
				'name'  => 'why_title',
				'type'  => 'text',
				'default_value' => 'أسباب تخلي ثقتك فينا أسهل',
			),
			array(
				'key'          => 'field_why_list',
				'label'        => 'قائمة المميزات',
				'name'         => 'why_us_list',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'إضافة ميزة',
				'sub_fields'   => array(
					array(
						'key'   => 'field_why_title_sub',
						'label' => 'عنوان الميزة',
						'name'  => 'why_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_why_description_sub',
						'label' => 'وصف الميزة',
						'name'  => 'why_description',
						'type'  => 'textarea',
					),
					array(
						'key'           => 'field_why_icon_sub',
						'label'         => 'أيقونة الميزة',
						'name'          => 'why_image',
						'type'          => 'image',
						'return_format' => 'array',
					),
				),
			),

			// Booking Section
			array(
				'key'   => 'field_tab_booking',
				'label' => 'قسم الحجز والخريطة',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_map_iframe',
				'label' => 'كود الخريطة (iframe)',
				'name'  => 'map_iframe',
				'type'  => 'textarea',
			),
			array(
				'key'          => 'field_booking_form_shortcode',
				'label'        => 'كود فورم الحجز (اختياري)',
				'name'         => 'booking_form_shortcode',
				'type'         => 'text',
				'instructions' => 'إذا تركت هذا الحقل فارغاً سيتم استخدام الفورم الافتراضي المدمج.',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
	) );

endif;

<?php
if ( ! function_exists( 'online_educenter_child_options' ) ) {
	function online_educenter_child_options($wp_customize){
		$course_term = get_terms(
			apply_filters(
				'online_educenter_display_cate_filter', array(
					'taxonomy' => 'course_category',
					'parent'   => 0
				)
			)
		);
		$course_cat = array();
		foreach( $course_term as $category ) {
			if(!is_object($category)) continue;
			$course_cat[$category->term_id] = $category->name;
		}
		unset($course_term);


		global $wp_customize;

    /**
     * List All Pages
    */
    $slider_pages = array();
    $slider_pages_obj = get_pages();
    $slider_pages[''] = esc_html__('Select Page','online-educenter');
    foreach ($slider_pages_obj as $page) {
      $slider_pages[$page->ID] = $page->post_title;
    }

    /**
     * Slider Feature Services Settings
    */
    $wp_customize->add_section( 'online_educenter_features_services_area_options', array(
      'title'    => esc_html__('Slider Services Settings', 'online-educenter'),
      'priority' => 4,
    ));

        $wp_customize->add_setting( 'online_educenter_features_services_enable', array(
            'default'            =>  1,
            'sanitize_callback'  =>  'sanitize_text_field',
        ));

        $wp_customize->add_control(new Educenter_Switch_Control( $wp_customize,'online_educenter_features_services_enable', 
            array(
                'section'       => 'online_educenter_features_services_area_options',
                'label'         =>  esc_html__('Enable Disable Section', 'online-educenter'),
                'type'          =>  'switch',
                'description'   =>  esc_html__('Enable disable featues section','online-educenter'),
                 'switch_label' => array(
                    'enable' => esc_html__('Yes', 'educenter'),
                    'disable' => esc_html__('No', 'educenter')
                ),
            )
        ));

        if(class_exists('LearnPress')){

            $wp_customize->get_control('educenter_homepage_slider_type')->choices = array(
                'default' => esc_html__('Default Slider', 'online-educenter'),
                'advance' => esc_html__('Advance Slider', 'online-educenter'),
                'search' => esc_html__('Course Search', 'online-educenter'),
            );


            $wp_customize->add_setting( 'online_educenter_slider_title', array(
                'default'			=> '',
                'sanitize_callback' => 'sanitize_text_field'
            ));
            $wp_customize->add_control('online_educenter_slider_title', array(
                'section'    => 'educenter_banner_slider',
                'label'      => esc_html__('Title', 'online-educenter'),
                'type'       => 'text'  
            ));

            $wp_customize->add_setting( 'online_educenter_slider_desc', array(
                'default'			=> '',
                'sanitize_callback' => 'sanitize_text_field'
            ));
            $wp_customize->add_control('online_educenter_slider_desc', array(
                'section'    => 'educenter_banner_slider',
                'label'      => esc_html__('Description', 'online-educenter'),
                'type'       => 'text'  
            ));


            $wp_customize->add_setting( 'online_educenter_slider_features', array(
                'default'			=> '',
                'sanitize_callback' => 'wp_kses_post'
            ));
            $wp_customize->add_control('online_educenter_slider_features', array(
                'section'    => 'educenter_banner_slider',
                'label'      => esc_html__('Features', 'online-educenter'),
                'description'      => esc_html__('Write in ul li for list', 'online-educenter'),
                'type'       => 'textarea'
            ));

        }
            


        $wp_customize->add_setting( 'online_educenter_feature_services_area_settings', array(
            'sanitize_callback' => 'educenter_sanitize_repeater',
            'default' => json_encode( array(
            array(
                  'fservices_icon' => 'fa fa-desktop',
                  'fservices_page' => '',
                )
            ) )        
        ));

        $wp_customize->add_control( new Educenter_Repeater_Control( $wp_customize, 'online_educenter_feature_services_area_settings', array(
            'label'   => esc_html__('Features Services Settings Area','online-educenter'),
            'section' => 'online_educenter_features_services_area_options',
            'box_label' => esc_html__('Features Services','online-educenter'),
            'add_label' => esc_html__('Add New','online-educenter'),
        ),
        array(
            'fservices_icon' => array(
                'type'      => 'icon',
                'label'     => esc_html__( 'Select Services Icon', 'online-educenter' ),
                'default'   => 'fa fa-desktop'
            ),
            'fservices_page' => array(
                'type'      => 'select',
                'label'     => esc_html__( 'Select Services Page', 'online-educenter' ),
                'options'   => $slider_pages
            )      
        )));




		$wp_customize->add_setting( 'educenter_course_area_settings', array(
			'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		if(class_exists('Educenter_Customize_Control_Checkbox_Multiple')){
			$wp_customize->add_control( new Educenter_Customize_Control_Checkbox_Multiple( $wp_customize, 'educenter_course_area_settings', array(
				'label' => esc_html__( 'Course Cateogry', 'online-educenter' ),
				'section' => 'educenter_courses_settings',
				'settings' => 'educenter_course_area_settings',
				'choices' => $course_cat
			) ) );

			unset($course_cat);
		}

		$wp_customize->add_setting( 'educenter_course_area_number_of_course', array(
			'default'			=> '8',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control('educenter_course_area_number_of_course', array(
			'section'    => 'educenter_courses_settings',
			'label'      => esc_html__('No of course', 'online-educenter'),
			'type'       => 'number'  
		));


		/**
		 * Services Settings Area
		*/

        $slider_pages_obj = new WP_Query(
            array(
                'post_type'      => 'lp_course',
                'posts_per_page' => -1,
            )
        );
        
        $course_pages = array();
        if( is_object($slider_pages_obj) && isset($slider_pages_obj->posts) ){
            foreach ($slider_pages_obj->posts as $page) {
                $course_pages[$page->ID] = $page->post_title;
            }
        }
        wp_reset_query(  );
		$wp_customize->add_setting( 'educenter_services_area_settings', array(
			'sanitize_callback' => 'educenter_sanitize_repeater',
            'transport' => 'postMessage',
			'default' => json_encode( array(
				array(
					'services_icon' => 'fa fa-desktop',
					'services_page' => '' 
					)
				) )        
		));

        $wp_customize->add_control( new Educenter_Repeater_Control( $wp_customize, 'educenter_services_area_settings', array(
            'label'   => esc_html__('Course Settings Area','online-educenter'),
            'section' => 'educenter_services_settings',
            'settings' => 'educenter_services_area_settings',
            'box_label' => esc_html__('Course','online-educenter'),
            'add_label' => esc_html__('Add New','online-educenter'),
        ),
        array(
            'services_icon' => array(
                'type'      => 'icon',
                'label'     => esc_html__( 'Select Icon', 'online-educenter' ),
                'default'   => 'fa fa-desktop'
            ),
            'services_page' => array(
                'type'      => 'select',
                'label'     => esc_html__( 'Select Course', 'online-educenter' ),
                'options'   => $course_pages
            )          
        )));

        $wp_customize->selective_refresh->add_partial( 'educenter_services_area_settings', array(
            'settings'        => array( 'educenter_services_area_settings' ),
            'selector'        => '#edu-services-section',
            'container_inclusive'  => true,
            'render_callback' => function() {
                do_action( 'educenter_courses');
            }
        ) );

        /** gallery section */
        $wp_customize->remove_control('educenter_gallery_section_column');
        $wp_customize->remove_control('educenter_gallery_section_column_gap');
        /** testimonial image */
        $wp_customize->remove_control('educenter_testimonial_slider_item');
        $wp_customize->add_setting( 'learnpress_online_education_testimonial_bg_image', array(
            'default'       =>      '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'esc_url_raw'
        ));
        
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'learnpress_online_education_testimonial_bg_image', array(
            'section'       => 'educenter_testimonial_settings',
            'label'         => esc_html__('Background Image', 'online-educenter'),
            'type'          => 'image',
        )));

	
	}
}
add_action( 'customize_register' , 'online_educenter_child_options', 11 );

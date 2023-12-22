<?php
add_action( 'wp_head', 'learn_press_educenter_remove_course_action' );
function learn_press_educenter_remove_course_action() {
    remove_action( 'educenter_courses','educenter_courses_section', 35 );
	remove_action( 'educenter_services','educenter_services_section', 25 );
	remove_action( 'educenter_action_front_page','educenter_banner_section', 5 );
	remove_action( 'educenter_testimonials','educenter_testimonials_section', 55 );
	remove_action( 'educenter_gallery','educenter_gallery_section', 50 );
}

if ( ! function_exists( 'online_educenter_courses_section' ) ) :

	/**
	 * Courses Section
	 *
	 * @since 1.0.0
	*/
	function online_educenter_courses_section() { 

		$courses = get_theme_mod( 'educenter_courses_section_area_options', 1 );

		if( !empty( $courses ) && $courses == 1 ){ ?>

			<section id="edu-courses-section" class="ed-courses layout-2">
				<div class="container">
					<?php

						/**
						 * Section Main Title & SubTitle
						*/
						$title    = get_theme_mod('educenter_courses_section_title');
						$subtitle = get_theme_mod('educenter_courses_section_subtitle');

						$column = get_theme_mod('educenter_courses_section_column', 4);
						$layout = $view_style = get_theme_mod('educenter_courses_section_view', 'grid');

						if($view_style == 'slide'){
							$view_style = 'grid';
						}


						educenter_section_title( $title, $subtitle );
					?>

					<div class="ed-isotope lp-archive-courses">
						<div class="ed-col-wrap">
							<ul class="learn-press-courses <?php if( $layout == 'slide') echo 'ed-blog-slider cS-hidden'; ?>" data-layout="<?php echo esc_attr($view_style); ?>" data-items="<?php echo esc_attr($column);?>">
								<?php

								$courses = get_theme_mod('educenter_course_area_settings');

								if( $courses ) {
                                    $courses = explode(',', $courses);
									$course_query = new WP_Query(
                                        array(
                                            'post_type'      => 'lp_course',
                                            'posts_per_page' => get_theme_mod('educenter_course_area_number_of_course', 8),
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'course_category',
                                                    'field' => 'term_id',
                                                    'terms' => $courses
                                                ),
                                            ),
                                        )
                                    );


                                    while ( $course_query->have_posts() ) {
                                        $course_query->the_post();
                                        learn_press_get_template( 'content-course.php' );
                                    }
                                    wp_reset_postdata();
									
                                } ?>
								
							</ul>	
						</div>
					</div>
				</div>
			</section>

	<?php } }

endif;
add_action( 'educenter_courses','online_educenter_courses_section', 35 );

if ( ! function_exists( 'online_educenter_services_section' ) ) :

	/**
	 * Services Section
	 *
	 * @since 1.0.0
	*/
	function online_educenter_services_section() { 

		$services = get_theme_mod( 'educenter_services_area_options', 1 );

		if( !empty( $services ) && $services == 1 ){ ?>

			<section id="edu-services-section" class="ed-services layout-2">
				<div class="container">
					<div class="ed-service-left">
						<?php
							/**
							 * Section Main Title & SubTitle
							*/
							$title    = get_theme_mod('educenter_services_main_title');
							$subtitle = get_theme_mod('educenter_services_main_subtitle');

							educenter_section_title( $title, $subtitle );
						?>
						<div class="ed-isotope lp-archive-courses">
							<div class="ed-col-wrap">
								<ul class="learn-press-courses" data-layout="grid">
								<?php

									$services = get_theme_mod('educenter_services_area_settings');
									if( $services ):
										$services = json_decode( $services );

										foreach($services as $service):

											$page_id = $service->services_page;

											if( !empty( $page_id ) ):
												$course_query = new WP_Query(
													array(
														'post_type'      => 'lp_course',
														'post__in' => array($page_id)
														
													)
												);

												while ( $course_query->have_posts() ) {
													$course_query->the_post();
													learn_press_get_template( 'content-course.php' );
												}
												wp_reset_postdata();
											endif;
										endforeach;
									endif;
								?>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</section>

	<?php } }

endif;

add_action( 'educenter_services','online_educenter_services_section', 25 );

/**
 * Slider Features Services
*/
if ( ! function_exists( 'online_educenter_slider_features_services' ) ){

    /**
     * Main Banner/Slider Section
     *
     * @since 1.0.0
    */
    function online_educenter_slider_features_services() { 
		if( get_theme_mod('online_educenter_features_services_enable', 1)):
		$features_services = get_theme_mod('online_educenter_feature_services_area_settings');

		if( $features_services ) {
			$features_services = json_decode( $features_services );
			if( $features_services[0]->fservices_page ){
			?>

			<div class="edu-section-wrapper edu-features-wrapper">
				<div class="container">
					<div class="grid-items-wrapper edu-column-wrapper">
						<?php
							$count = 1;
							foreach($features_services as $features_service){ 

								$page_id = $features_service->fservices_page;

							if( !empty( $page_id ) ) {

								$fservices_page = new WP_Query( 'page_id='.$page_id );

							if( $fservices_page->have_posts() ) { while( $fservices_page->have_posts() ) { $fservices_page->the_post();

						?>
							<div class="single-post-wrapper edu-column-<?php echo intval( $count );  ?>">
								<div class="icon-holder">
									<i class="<?php echo esc_attr( $features_service->fservices_icon ); ?>"></i>
								</div>
								<h3 class="post-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<?php the_excerpt(); ?>
							</div>
						<?php $count++; } } wp_reset_postdata(); } } ?>

					</div>
				</div>
			</div>
			
			<?php } 
		} 
		endif;
		}
}
add_action( 'educenter_action_front_page','online_educenter_slider_features_services', 6 );


/** LearnPress Plugin Item Search */
if ( ! function_exists( 'online_educenter_banner_section' ) ) :

	/**
	 * Main Banner/Slider Section
	 *
	 * @since 1.0.0
	*/
	function online_educenter_banner_section() { 

		$option = get_theme_mod( 'educenter_slider_options', 1 );

		if( !empty( $option ) && $option == 1 ){
			$slider_type = get_theme_mod('educenter_homepage_slider_type', 'default');
			?>

		<section class="ed-slider slider-layout-2 slider-nav-<?php echo esc_attr(get_theme_mod('educenter_banner_nav_style', 1)); ?>">
			<div class="ed-slide">
				<?php
				if( $slider_type == 'default'):
					educenter_default_banner_content();
				elseif ( $slider_type == 'search' ):
					online_educenter_search_form();
				else:
					educenter_advance_banner_content();
				endif;
				?>

			</div>
		</section>

	<?php } }

endif;

add_action( 'educenter_action_front_page','online_educenter_banner_section', 5 );

if( !function_exists('online_educenter_search_form')):
	function online_educenter_search_form(){ 
		
		$title = get_theme_mod('online_educenter_slider_title');
		$desc = get_theme_mod('online_educenter_slider_desc');
		$features = get_theme_mod('online_educenter_slider_features');
		$image_path = get_stylesheet_directory_uri(  ). "/banner-730866.jpg";
		?>
		<div class="slide ed-banner-search-wrapper">
				<?php if( $image_path ): ?>
				<img src="<?php echo esc_url( $image_path ); ?>" alt="<?php the_title_attribute(); ?>">
				<?php endif; ?>

				<div class="ed-overlay"></div>

				<div class="container">
					<div class="ed-slider-info">
						<?php if( $title ): ?>
						<h2><?php echo esc_html( $title ); ?></h2>
						<?php endif; ?>

						<?php if( $desc ): ?>
						<p><?php echo esc_html( $desc ); ?>
						<?php endif; ?>
						
						<?php
							$placeholder = "What do you want to learn today?";
						?>
						<div class="courses-searching">
							<form method="get" action="<?php echo esc_url( get_post_type_archive_link('lp_course') ); ?>">
								<input type="text" value="" name="c_search" placeholder="<?php echo esc_attr( $placeholder ); ?>" class="thim-s form-control courses-search-input" autocomplete="off" />
								<input type="hidden" value="course" name="ref" />
								<button type="submit"><i class="fa fa-search"></i></button>
								<span class="widget-search-close"></span>
							</form>
							<ul class="courses-list-search list-unstyled"></ul>
						</div>

						<?php if ( $features ): ?>
							<div class="banner-features"><?php echo wp_kses_post( $features ); ?></div>
						<?php endif; ?>

					</div>
				</div>
			</div>
		<?php
	}
endif;

if ( ! function_exists( 'learnpress_online_education_testimonials_section' ) ) :

	/**
	 * Testimonials Section
	 *
	 * @since 1.0.0
	*/
	function learnpress_online_education_testimonials_section() { 

		$testimonial = get_theme_mod( 'educenter_testimonial_area_options', 1 );

		if( !empty( $testimonial ) && $testimonial == 1 ){ 
			$img = get_theme_mod('learnpress_online_education_testimonial_bg_image');
			$bg_style = "";
			if( $img ){
				$bg_style = "style=background-image:url(". $img. ")";
			}
			?>

			<section id="edu-testimonials-section" class="ed-testimonials layout-2" <?php echo esc_attr($bg_style); ?>>
				<div class="container">
					<div class="ed-testimonial-title-wrap">
						<?php
							/**
							 * Section Main Title & SubTitle
							*/
							$title    = get_theme_mod('educenter_testimonial_title');
							$subtitle = get_theme_mod('educenter_testimonial_subtitle');

							educenter_section_title( $title, $subtitle );
						?>

						<div class="ed-slider-nav">
							<button type="button" role="presentation" class="btn ed-button ed-testimonial-prev mr-2"><i class="fas fa-angle-left"></i></button>
							<button type="button" role="presentation" class="btn ed-button ed-testimonial-next"><i class="fas fa-angle-right"></i></button>
						</div>
					</div>

					<div class="ed-testimonial-wrap layout-1 cS-hidden2" data-items="1" data-items-tablet="1">
						<?php

							$testimonials = get_theme_mod('educenter_testimonial_area_settings');

						if( $testimonials ){

							$testimonials = json_decode( $testimonials );

							foreach($testimonials as $testimonial){ 

								$page_id = $testimonial->testimonial_page;

							if( !empty( $page_id ) ) {

								$testimonial_page = new WP_Query( 'page_id='.$page_id );		

							if( $testimonial_page->have_posts() ) { while( $testimonial_page->have_posts() ) { $testimonial_page->the_post();
						?>
							<div class="ed-test-slide">
								<div class="ed-test-slide-wrap">
									<div class="ed-img-holder">
										<?php the_post_thumbnail( 'thumbnail' ); ?>
									</div>

									<div class="ed-text-holder">
										<span> <?php the_excerpt(); ?> </span>
										<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
									</div>
								</div>
							</div>
						<?php } } wp_reset_postdata(); } } } ?>
					</div>
				</div>
			</section>

	<?php } }

endif;

add_action( 'educenter_testimonials','learnpress_online_education_testimonials_section', 55 );


if ( ! function_exists( 'learnpress_online_education_gallery_section' ) ) :

	/**
	 * Gallery Section
	 *
	 * @since 1.0.0
	*/
	function learnpress_online_education_gallery_section() { 

		$gallery = get_theme_mod( 'educenter_gallery_area_options', 1 );
		$is_full_width = get_theme_mod('educenter_gallery_section_full_width', false);
		if( !empty( $gallery ) && $gallery == 1 ){ 

			$allgallery = get_theme_mod('educenter_gallery_image');

			if( !empty( $allgallery ) ){ ?>

				<section id="edu-gallery-section" class="ed-gallery clearfix">
					<?php if(!$is_full_width): ?>
					<div class="container">
					<?php endif; ?>	

						<?php
							/**
							 * Section Main Title & SubTitle
							*/
							$title    = get_theme_mod('educenter_gallery_section_title');
							$subtitle = get_theme_mod('educenter_gallery_section_subtitle');
							$column = get_theme_mod('educenter_gallery_section_column', 3);
							educenter_section_title( $title, $subtitle );
						?>

						<div class="ed-gallery-wrapper">
							<ul class="honeycomb">
							<?php 
								$allgallery = explode(',', $allgallery);
								$gap = get_theme_mod('educenter_gallery_section_column_gap', 'gap');
								foreach ($allgallery as $gallery) {

									$image = wp_get_attachment_image_src( $gallery, 'educenter-gallery', true);
									$large = wp_get_attachment_image_src( $gallery, 'original', true);
									$caption = wp_get_attachment_caption($gallery);
									$caption_class = "ed-no-caption";
									if( $caption ) $caption_class = "ed-caption";
								?>
									<li class="honeycomb-cell <?php echo esc_attr($caption_class); ?>">
										<a href="<?php echo esc_url( $large[0] ); ?>" title="<?php echo esc_html($caption); ?>" rel="edugallery[edu]" class="ed-btn-wrap">
											<img class="honeycomb-cell__image" src="<?php echo esc_url( $image[0] ); ?>">
											<div class="honeycomb-cell__title"><?php echo esc_html($caption); ?></div>
										</a>
									</li>

									
									
									
									
									
								<?php }  ?>
								<li class="honeycomb-cell honeycomb__placeholder"></li>
							</ul>
						</div>	
						<?php if(!$is_full_width): ?>
					</div>
					<?php endif; ?>
				</section>

	<?php } } }

endif;

add_action( 'educenter_gallery','learnpress_online_education_gallery_section', 50 );
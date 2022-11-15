<?php 
    if( have_rows( 'slider_module_settings' ) ) {
        while( have_rows( 'slider_module_settings' ) ) {
            the_row();

            $slider_items_per_row = get_sub_field( 'slider_items_per_row' );

            $slider_type = get_sub_field( 'slider_type' );
            $slider_arrow = get_sub_field( 'slider_arrow' );

            $slider_gap = get_sub_field( 'slider_gap' );

            $slider_data_source_filter = get_sub_field( 'slider_data_source_filter' );
            $slider_data_source_category = get_sub_field( 'slider_data_source_category' );

            if( have_rows( 'slider_settings' ) ) {
                while( have_rows( 'slider_settings' ) ) {
                    the_row();
        
                    $slider_loop = get_sub_field( 'slider_loop' );
                    $slider_centered_slides = get_sub_field( 'slider_centered_slides' );
                    $slider_initial_slide = get_sub_field( 'slider_initial_slide' );
                    $slider_slides_per_group = get_sub_field( 'slider_slides_per_group' );
                    $slider_slides_per_view = get_sub_field( 'slider_slides_per_view' );
                    $slider_space_between = get_sub_field( 'slider_space_between' );
                    $slider_carousel = get_sub_field( 'slider_carousel' );
                    $slider_carousel_autoplay = get_sub_field( 'slider_carousel_autoplay' );
                    $slider_carousel_delay = get_sub_field( 'slider_carousel_delay' );
                }
            }

            if( have_rows( 'coverflow_settings' ) ) {
                while( have_rows( 'coverflow_settings' ) ) {
                    the_row();
        
                    $coverflow_rotate = get_sub_field( 'coverflow_rotate' );
                    $coverflow_stretch = get_sub_field( 'coverflow_stretch' );
                    $coverflow_depth = get_sub_field( 'coverflow_depth' );
                    $coverflow_modifier = get_sub_field( 'coverflow_modifier' );
                    $coverflow_shadows = get_sub_field( 'coverflow_shadows' );
                }
            }

            if( have_rows( 'slider_post_settings' ) ) {
                while( have_rows( 'slider_post_settings' ) ) {
                    the_row();
        
                    $slider_total_items = get_sub_field( 'slider_total_items' );
                    $slider_order_by = get_sub_field( 'slider_order_by' );
                    $slider_order = get_sub_field( 'slider_order' );
                    $slider_show_title = get_sub_field( 'slider_show_title' );
                    $slider_post_heading_type = get_sub_field( 'slider_post_heading_type' );
                    $slider_show_description = get_sub_field( 'slider_show_description' );
                    $slider_show_date = get_sub_field( 'slider_show_date' );
                    $slider_show_button = get_sub_field( 'slider_show_button' );
                    $slider_button_label = get_sub_field( 'slider_button_label' );
                }
            }

            if( have_rows( 'slider_pagination_settings' ) ) {
                while( have_rows( 'slider_pagination_settings' ) ) {
                    the_row();
        
                    $slider_pagination = get_sub_field( 'slider_pagination' );
                    $slider_pagination_type = get_sub_field( 'slider_pagination_type' );
                }
            }

            if( have_rows( 'slide_dimensions' ) ) {
                while( have_rows( 'slide_dimensions' ) ) {
                    the_row();
        
                    $slider_slide_width = get_sub_field( 'slider_slide_width' );
                    $slider_slide_height = get_sub_field( 'slider_slide_height' );
                }
            }

            if( have_rows( 'slide_border_radius' ) ) {
                while( have_rows( 'slide_border_radius' ) ) {
                    the_row();
        
                    $slide_radius_top_left = get_sub_field( 'slide_radius_top_left' );
                    $slide_radius_top_right = get_sub_field( 'slide_radius_top_right' );
                    $slide_radius_bottom_right = get_sub_field( 'slide_radius_bottom_right' );
                    $slide_radius_bottom_left = get_sub_field( 'slide_radius_bottom_left' );
                }
            }

            if( have_rows( 'animation_settings' ) ) {
                while( have_rows( 'animation_settings' ) ) {
                    the_row();
        
                    $transition_animation = get_sub_field( 'transition_animation' );
                    $transition_direction = get_sub_field( 'transition_direction' );
                    $transition_zoom_direction = get_sub_field( 'transition_zoom_direction' );
                    $transition_duration = get_sub_field( 'transition_duration' );
                    $transition_delay = get_sub_field( 'transition_delay' );
                }
            }
        }
    }

    if( $slider_data_source_category ) {
        $results = array(); 
        $ctr = 0;

        while( $ctr < sizeof( $slider_data_source_category ) ) {
            array_push( $results, $slider_data_source_category[$ctr]->slug );
            $ctr++;
        }
    }

    $slider_post_query = new WP_Query(array(
        'post_type'             => $slider_data_source_filter,
        'posts_per_page'        => $slider_total_items,
        'orderby'               => $slider_order_by,
        'order'                 => $slider_order,
        'ignore_sticky_posts'   => 1,

        'tax_query' => $slider_data_source_category ? array(
            array (
                'taxonomy' => $slider_data_source_category[0]->taxonomy,
                'field' => 'slug',
                'terms' => $results,
            )
        ) : '',
    ));
    
    $randID = uniqid();
?>        
    
    <div class="slider-module__wrapper<?php if( $slider_type ) { echo ' ' . $slider_type; } ?><?php echo ' slider-module__wrapper-' . $randID; ?>"
        data-sliderid="<?php echo 'slider-module__wrapper-' . $randID; ?>"
        data-slidertype="<?php echo $slider_type ?>"
        data-slidercentered="<?php if( $slider_centered_slides ) echo 'true'; else echo 'false'; ?>"
        data-sliderinitial="<?php echo $slider_initial_slide ?>"
        data-sliderloop="<?php if( $slider_loop ) echo 'true'; else echo 'false'; ?>"
        data-sliderpergroup="<?php echo $slider_slides_per_group ?>"
        data-sliderperview="<?php if($slider_slides_per_view === 0) echo 'auto'; else echo $slider_slides_per_view; ?>"
        data-sliderspace="<?php echo $slider_space_between ?>"
        data-sliderautoplay="<?php if( $slider_carousel && $slider_carousel_autoplay ) echo 'true'; else echo 'false'; ?>"
        data-sliderdelay="<?php echo $slider_carousel_delay; ?>"

        <?php if( $slider_type=='slider-type-two' ): ?>
            data-coverflowrotate="<?php echo $coverflow_rotate ?>"
            data-coverflowstretch="<?php echo $coverflow_stretch ?>"
            data-coverflowdepth="<?php echo $coverflow_depth ?>"
            data-coverflowmodifier="<?php echo $coverflow_modifier ?>"
            data-coverflowshadow="<?php if( $coverflow_shadows ) echo 'true'; else echo 'false'; ?>"
        <?php endif; ?>

        <?php if( $transition_animation == 'fade' || $transition_animation == 'flip' || $transition_animation == 'slide' ): ?>
            data-aos="<?php echo $transition_animation . '-' . $transition_direction; ?>"
        <?php endif; ?>
        
        <?php if( $transition_animation == 'zoom' ): ?>
            data-aos="<?php echo $transition_animation . '-' . $transition_zoom_direction; ?>"
        <?php endif; ?>

        data-aos="<?php echo $transition_animation; ?>"

        <?php if( $transition_duration ): ?>
            data-aos-duration="<?php echo $transition_duration; ?>"
        <?php endif; ?>
        
        data-aos-delay="<?php echo $transition_delay; ?>"
    >
    
        <div class="slider-module__cards swiper-wrapper">

            <?php if( $slider_post_query->have_posts() ): while( $slider_post_query->have_posts() ): $slider_post_query->the_post(); ?>
                <article class="slider-module__cards__card swiper-slide"
                    style="
                        <?php 
                            if( $slider_type == 'slider-type-two' ) {
                                if( $slider_slide_width ) echo 'width:' . $slider_slide_width . 'rem;'; 
                            }

                            if( $slider_type == 'slider-type-one' || $slider_type == 'slider-type-two' ) {
                                if( $slider_slide_height ) echo 'height:' . $slider_slide_height . 'rem;';
                            }
                        ?>

                        <?php 
                            if( $slide_radius_top_left ) echo 'border-top-left-radius: ' . $slide_radius_top_left . 'em;';
                            if( $slide_radius_top_right ) echo 'border-top-right-radius: ' . $slide_radius_top_right . 'em;';
                            if( $slide_radius_bottom_right ) echo 'border-bottom-right-radius: ' . $slide_radius_bottom_right . 'em;';
                            if( $slide_radius_bottom_left ) echo 'border-bottom-left-radius: ' . $slide_radius_bottom_left . 'em;';
                        ?>
                    "
                >
                    
                    <?php if( !$slider_show_button ): ?>
                        <a href="<?php the_permalink(); ?>"><span class="hit-area"></span></a>
                    <?php endif; ?>
                        
                    <div class="slider-module__cards__card-overlay background-overlay"></div>
                    
                    <?php
                        if( $slider_slides_per_view == 1 ) {
                            the_post_thumbnail( 'theme-full',
                                array(
                                    'class' => 'img-fluid',
                                    'width' => 1920,
                                ) 
                            );
                        } else {
                            the_post_thumbnail( 'theme-small',
                                array(
                                    'class' => 'img-fluid',
                                    'width' => 640,
                                ) 
                            );
                        }
                    ?>
                    
                    <div class="slider-module__cards__card-content-container">
                        <?php if( $slider_show_title || $slider_show_date ): ?>
                            <header class="slider-module__cards__card-content">
                                <?php if( $slider_show_title ): ?>
                                    <?php echo '<' . $slider_post_heading_type . '>' . get_the_title() . '</' . $slider_post_heading_type . '>'; ?>
                                <?php endif; ?>

                                <?php if( $slider_show_date ): ?>
                                    <span class="post-date"><?php the_time('F j, Y'); ?></span>
                                <?php endif; ?>
                            </header>
                        <?php endif; ?>

                        <?php if( $slider_show_description ): ?>
                            <?php the_excerpt(); ?>
                        <?php endif; ?>

                        <?php if( $slider_show_button ): ?>
                            <div class="button-module">
                                <div class="button-module__wrapper">
                                    <a href="<?php the_permalink(); ?>">
                                        <span class="custom-primary-btn">
                                            <?php if( $slider_button_label ) echo $slider_button_label; else echo 'Read more'; ?>
                                        </span>
                                    </a> 
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>    

                </article>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            
        </div> 

        <?php if( $slider_arrow && sizeof($slider_post_query->posts) > 1 ): ?>
            <div class="slider-module__arrow">
                <div class="swiper-button-prev slider-module__arrow-prev"></div>
                <div class="swiper-button-next slider-module__arrow-next"></div>    
            </div>
        <?php endif; ?>
        
        <?php if( $slider_pagination && ( $slider_type=='slider-type-one' || $slider_type=='slider-type-two' ) ): ?>

            <?php if( $slider_pagination_type == 'bullet' ): ?>
                <div class="slider-module__pagination--bullet swiper-pagination"></div>
            <?php endif; ?>

            <?php if( $slider_pagination_type == 'scroll' ): ?>
                <div class="slider-module__pagination--scrollbar swiper-scrollbar"></div>
            <?php endif; ?>

        <?php endif; ?>             
    </div>

<?php if( have_rows( 'slider_module_settings' ) ): while( have_rows( 'slider_module_settings' ) ): the_row();
    $slider_items_per_row = get_sub_field( 'slider_items_per_row' );

    $slider_type = get_sub_field( 'slider_type' );
    $slider_gallery = get_sub_field( 'slider_gallery' );
    $slider_arrow = get_sub_field( 'slider_arrow' );

    $slider_gap = get_sub_field( 'slider_gap' );

    $slider_data_source_filter = get_sub_field( 'slider_data_source_filter' );
    $slider_data_source_category = get_sub_field( 'slider_data_source_category' );
    
    $slider_custom_thumbnail_size = get_sub_field( 'slider_custom_thumbnail_size' );
    $slider_custom_heading_type = get_sub_field( 'slider_custom_heading_type' );
    $slider_custom_show_button = get_sub_field( 'slider_custom_show_button' );

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

    $randID = uniqid();
?>   
    
    <?php if( $slider_type=='slider-type-three' && $slider_gallery ): ?>
        <div class="slider-module__wrapper slider-type-three__gallery-top<?php echo ' slider-module__wrapper-' . $randID; ?>"
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

                <?php foreach( $slider_gallery as $image ): ?>
                    
                    <picture class="swiper-slide">
                        <source media="(max-width:980px)"
                                srcset="<?php echo $image['sizes']['theme-large']; ?> 980w">
                        <source media="(max-width:768px)"
                                srcset="<?php echo $image['sizes']['theme-medium']; ?> 768w">
                        <source media="(max-width:640px)"
                                srcset="<?php echo $image['sizes']['theme-small']; ?> 640w">
                        <source media="(max-width:425px)"
                                srcset="<?php echo $image['sizes']['theme-xsmall']; ?> 425w">

                        <img <?php if( $image['alt'] ) echo 'alt="' . $image['alt'] . '"'; ?> src="<?php echo $image['sizes']['theme-xlarge']; ?>" class="img-fluid" width="<?php echo $image['sizes']['theme-xlarge-width']; ?>">
                    </picture>
                            
                <?php endforeach; ?>  
                
            </div> 

            <?php if( $slider_arrow && sizeof( $slider_gallery ) > 1 ): ?>
                <div class="slider-module__arrow slider-03">
                    <div class="slider-module__arrow swiper-button-prev slider-module__arrow-prev"></div>
                    <div class="slider-module__arrow swiper-button-next slider-module__arrow-next"></div>    
                </div>
            <?php endif; ?>           
        </div>

        <div class="slider-module__wrapper slider-type-three__gallery-thumbs<?php echo ' slider-module__wrapper-' . $randID; ?>">
        
            <div class="slider-module__cards swiper-wrapper">

                <?php if( sizeof( $slider_gallery ) > 1 ): ?>
                    <?php foreach( $slider_gallery as $thumb ): ?>
                        <div class="swiper-slide">
                            <img <?php if( $thumb['alt'] ) echo 'alt="' . $thumb['alt'] . '"'; ?> src="<?php echo $thumb['sizes']['theme-xsmall']; ?>" class="img-fluid" width="<?php echo $thumb['sizes']['theme-xsmall-width']; ?>">
                        </div>        
                    <?php endforeach; ?>  
                <?php endif; ?>    

            </div> 

        </div>

    <?php else:?>
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

            <?php if( have_rows( 'slider_custom_settings' ) ): ?>   

                <div class="slider-module__cards swiper-wrapper">

                    <?php while( have_rows( 'slider_custom_settings' ) ): the_row();
                        $slider_custom_image = get_sub_field( 'slider_custom_image' );
                        $slider_custom_title = get_sub_field( 'slider_custom_title' );
                        $slider_custom_description = get_sub_field( 'slider_custom_description' );
                        $slider_custom_link = get_sub_field( 'slider_custom_link' );

                        if( $slider_custom_image ) {
                            $slider_custom_image_size = $slider_custom_image['sizes'][$slider_custom_thumbnail_size];
                            $slider_custom_image_width = $slider_custom_image['sizes'][$slider_custom_thumbnail_size . '-width'];
                            $slider_custom_image_height = $slider_custom_image['sizes'][$slider_custom_thumbnail_size . '-height'];
                            $slider_custom_image_alt = $slider_custom_image['alt'];
                        }

                        if( $slider_custom_link ) {
                            $slider_custom_link_url = $slider_custom_link['url'];
                            $slider_custom_link_title = $slider_custom_link['title'];
                            $slider_custom_link_target = $slider_custom_link['target'] ? $slider_custom_link['target'] : '_self';
                        }
                    ?>
                        
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
                            <?php if( $slider_custom_link && !$slider_custom_show_button ) : ?>
                                <a href="<?php echo esc_url( $slider_custom_link_url ); ?>" target="<?php echo esc_attr( $slider_custom_link_target ); ?>" aria-label="<?php echo $slider_custom_title; ?>">
                                    <span class="hit-area"></span>
                                </a>
                            <?php endif; ?>
                                
                            <div class="slider-module__cards__card-overlay background-overlay"></div>
                            
                            <?php if( $slider_custom_image ): ?>
                                <picture>
                                    <source media="(max-width:980px)"
                                            srcset="<?php echo $slider_custom_image['sizes']['theme-large']; ?> 980w">
                                    <source media="(max-width:768px)"
                                            srcset="<?php echo $slider_custom_image['sizes']['theme-medium']; ?> 768w">
                                    <source media="(max-width:640px)"
                                            srcset="<?php echo $slider_custom_image['sizes']['theme-small']; ?> 640w">
                                    <source media="(max-width:425px)"
                                            srcset="<?php echo $slider_custom_image['sizes']['theme-xsmall']; ?> 425w">
                                    
                                    <img src="<?php echo $slider_custom_image_size; ?>" width="<?php echo $slider_custom_image_width; ?>" height="<?php echo $slider_custom_image_height; ?>" alt="<?php echo $slider_custom_image_alt; ?>" class="img-fluid">
                                </picture>       
                            <?php endif; ?>
                            
                            <div class="slider-module__cards__card-content-container">
                                <?php if( $slider_custom_title || $slider_custom_description ): ?>
                                    <header class="slider-module__cards__card-content">
                                        <?php if( $slider_custom_title ): ?>
                                            <?php echo '<' . $slider_custom_heading_type . '>' . $slider_custom_title . '</' . $slider_custom_heading_type . '>'; ?>
                                        <?php endif; ?>        

                                        <?php if( $slider_custom_description ): ?>
                                            <p><?php echo $slider_custom_description; ?></p>
                                        <?php endif; ?>
                                    </header>
                                <?php endif; ?>

                                <?php if( $slider_custom_show_button && $slider_custom_link ): ?>
                                    <div class="button-module">
                                        <div class="button-module__wrapper">
                                            <a href="<?php echo esc_url( $slider_custom_link_url ); ?>" target="<?php echo esc_attr( $slider_custom_link_target ); ?>" role="button">
                                                <span class="custom-primary-btn">
                                                    <?php if( $slider_custom_link_title ) echo esc_html( $slider_custom_link_title ); ?>
                                                </span>
                                            </a> 
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </article>
                        
                    <?php endwhile; ?>
                    
                </div> 

                <?php if( $slider_arrow ): ?>
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
                
            <?php endif; ?>   
        </div>

    <?php endif; ?>

<?php endwhile; endif; ?>
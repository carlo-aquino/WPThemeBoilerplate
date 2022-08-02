<?php 
    if( have_rows( 'slider_module_settings' ) ) {
        while( have_rows( 'slider_module_settings' ) ) {
            the_row();

            $slider_items_per_row = get_sub_field( 'slider_items_per_row' );

            $slider_type = get_sub_field( 'slider_type' );
            $slider_gallery = get_sub_field( 'slider_gallery' );
            $slider_arrow = get_sub_field( 'slider_arrow' );

            $slider_gap = get_sub_field( 'slider_gap' );

            $slider_data_source_filter = get_sub_field( 'slider_data_source_filter' );
            $slider_data_source_category = get_sub_field( 'slider_data_source_category' );

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
    
?>      
    
    <?php if( $slider_type=='slider-type-three' ): ?>

        <div class="slider-module__wrapper slider-type-three__gallery-top"
            <?php if( $transition_animation == 'fade' || $transition_animation == 'flip' || $transition_animation == 'slide' ): ?>
                data-aos="<?php echo $transition_animation . '-' . $transition_direction; ?>"
            <?php endif; ?>
            
            <?php if( $transition_animation == 'zoom' ): ?>
                data-aos="<?php echo $transition_animation . '-' . $transition_zoom_direction; ?>"
            <?php endif; ?>

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

                        <img <?php if( $image['alt'] ) { echo 'alt="' . $image['alt'] . '"'; } ?> src="<?php echo $image['sizes']['theme-xlarge']; ?>" class="img-fluid" width="<?php echo $image['sizes']['theme-xlarge-width']; ?>" loading="lazy">
                    </picture>
                            
                <?php endforeach; ?>  
                
            </div> 

            <?php if( $slider_arrow ): ?>
                <div class="slider-module__arrows slider-03">
                    <div class="slider-module__arrow slider-module__arrow-prev"></div>
                    <div class="slider-module__arrow slider-module__arrow-next"></div>    
                </div>
            <?php endif; ?>           
        </div>

        <div class="slider-module__wrapper slider-type-three__gallery-thumbs">
        
            <div class="slider-module__cards swiper-wrapper">

                <?php foreach( $slider_gallery as $thumb ): ?>
                    <div class="swiper-slide">
                        <img <?php if( $thumb['alt'] ) { echo 'alt="' . $thumb['alt'] . '"'; } ?> src="<?php echo $thumb['sizes']['theme-xsmall']; ?>" class="img-fluid" width="<?php echo $thumb['sizes']['theme-xsmall-width']; ?>">
                    </div>        
                <?php endforeach; ?>  
                
            </div> 

        </div>

    <?php endif; ?>


    <script type="module">
        var galleryThumbs = new Swiper('.slider-type-three__gallery-thumbs', {
            grabCursor: true,
            spaceBetween: 16,
            slidesPerView: 3,
            // loop: true,
            loopedSlides: 3,
            watchSlidesProgress: true,
        });

        var galleryTop = new Swiper('.slider-type-three__gallery-top', {
            grabCursor: true,
            spaceBetween: 10,
            loop: true,
            loopedSlides: 3,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            thumbs: {
                swiper: galleryThumbs,
            },
        });
    </script>

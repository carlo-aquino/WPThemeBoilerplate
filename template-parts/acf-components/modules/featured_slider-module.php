<?php 
    if( have_rows( 'featured_slider_module_settings' ) ) {
        while( have_rows( 'featured_slider_module_settings' ) ) {
            the_row();

            $slider_css_id = get_sub_field( 'slider_css_id' );
            $slider_css_class = get_sub_field( 'slider_css_class' );

            if( have_rows( 'slide_dimensions' ) ) {
                while( have_rows( 'slide_dimensions' ) ) {
                    the_row();
        
                    $slider_slide_width = get_sub_field( 'slider_slide_width' );
                    $slider_slide_height = get_sub_field( 'slider_slide_height' );
                }
            }

            if( have_rows( 'slider_margin_settings' ) ) {
                while( have_rows( 'slider_margin_settings' ) ) {
                    the_row();
        
                    $slider_margin_top = get_sub_field( 'slider_margin_top' );
                    $slider_margin_bottom = get_sub_field( 'slider_margin_bottom' );
                    $slider_margin_left = get_sub_field( 'slider_margin_left' );
                    $slider_margin_right = get_sub_field( 'slider_margin_right' );
                }
            }

            if( have_rows( 'slider_padding_settings' ) ) {
                while( have_rows( 'slider_padding_settings' ) ) {
                    the_row();
        
                    $slider_padding_top = get_sub_field( 'slider_padding_top' );
                    $slider_padding_bottom = get_sub_field( 'slider_padding_bottom' );
                    $slider_padding_left = get_sub_field( 'slider_padding_left' );
                    $slider_padding_right = get_sub_field( 'slider_padding_right' );
                }
            }
        }
    }

    $slider_post_query = new WP_Query(array(
        'post_type'             => 'portfolio',
        'posts_per_page'        => -1,
        'orderby'               => 'title',
        'order'                 => 'ASC',
        'ignore_sticky_posts'   => 1,
    ));
    
?>

    <div id="<?php if( $slider_css_id ) { echo ' ' . $slider_css_id; } ?>" class="featured-slider-module container-fluid g-0<?php if( $slider_css_class ) { echo ' ' . $slider_css_class; } ?>">
        
        <div class="featured-slider-module__container row g-0">

            <div class="featured-slider-module__wrapper swiper-wrapper--left">
            
                <div class="featured-slider-module__cards slider-left">

                    <div class="text-module">
                        <div class="text-module__wrapper"> 
                            <h3><span>BRANDS</span></h3>
                        </div>
                    </div>

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        
                        <?php if( $slider_post_query->have_posts() ): while( $slider_post_query->have_posts() ): $slider_post_query->the_post(); ?>
                            <article class="featured-slider-module__cards__card swiper-slide">
                                
                                <header class="featured-slider-module__cards__card-content">
                                    <h2><?php the_title(); ?></h2>
                                </header>

                                <?php the_content(); ?>

                                <div class="featured-slider-module__cards__card-buttons">
                                    <div class="button-module">
                                        <div class="button-module__wrapper">
                                            
                                            <a href="<?php echo site_url('/schools'); ?>">
                                                <span>INQUIRE NOW</span>
                                            </a> 

                                        </div>
                                    </div>
                                </div>

                            </article>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                    
                </div>       
            </div>

            <div class="featured-slider-module__wrapper swiper-wrapper--right">
            
                <div class="featured-slider-module__cards slider-right">

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        <?php if( $slider_post_query->have_posts() ): while( $slider_post_query->have_posts() ): $slider_post_query->the_post();
                        
                            $school_logo = get_field( 'school_logo' );

                            if( $school_logo ) {
                                $school_logo_url = $school_logo['url'];
                                $school_logo_size = $school_logo['sizes']['medium'];
                                $school_logo_width = $school_logo['sizes']['medium-width'];
                                $school_logo_height = $school_logo['medium-height'];
                                $school_logo_alt = $school_logo['alt'];
                            } ?>

                            <article class="featured-slider-module__cards__card swiper-slide column-center">
                                    
                                <div class="featured-slider-module__cards__card-overlay background-overlay"></div>
                                
                                <img src="<?php echo $school_logo_size; ?>" width="<?php echo $school_logo_width; ?>" alt="<?php echo $school_logo_alt; ?>" class="img-fluid">

                            </article>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>

                    <div class="swiper-scrollbar"></div>
                    
                </div> 
                
            </div>

        </div>

        <div class="featured-slider-module__container-mobile">

            <div class="featured-slider-module__wrapper swiper-wrapper--right">
                
                <div class="featured-slider-module__cards slider-mobile mobile-spacer">

                    <div class="text-module">
                        <div class="text-module__wrapper"> 
                            <h3><span>BRANDS</span></h3>
                        </div>
                    </div>

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        <?php if( $slider_post_query->have_posts() ): while( $slider_post_query->have_posts() ): $slider_post_query->the_post();
                        
                            $school_logo = get_field( 'school_logo' );

                            if( $school_logo ) {
                                $school_logo_url = $school_logo['url'];
                                $school_logo_size = $school_logo['sizes']['medium'];
                                $school_logo_width = $school_logo['sizes']['medium-width'];
                                $school_logo_height = $school_logo['medium-height'];
                                $school_logo_alt = $school_logo['alt'];
                            } ?>

                            <article class="featured-slider-module__cards__card swiper-slide column-center">
                                    
                                <div class="featured-slider-module__cards__card-overlay background-overlay"></div>
                                
                                <img src="<?php echo $school_logo_size; ?>" width="<?php echo $school_logo_width; ?>" alt="<?php echo $school_logo_alt; ?>" class="img-fluid">

                            </article>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                    
                </div>      
                
            </div>
            
        </div>

    </div>



<script type="module">

    var sliderLeft = new Swiper('.slider-left', {
        grabCursor: true,
        spaceBetween: 200,
        centeredSlides: true,
        // loop: true,
        loopedSlides: 2
    });

    var sliderRight = new Swiper('.slider-right', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        initialSlide: 0,
        slidesPerGroup: 1,
        spaceBetween: 80,

        touchRatio: 0.2,
        slideToClickedSlide: false,
        // loop: true,
        loopedSlides: 2,

        coverflowEffect: {
            rotate: 0,
            stretch: 5,
            depth: 100,
            modifier: 2,
            slideShadows: true,
        },

        scrollbar: {
            el: '.swiper-scrollbar',
            hide: false,
            draggable: true,
        },
    });

    sliderLeft.controller.control = sliderRight;
    sliderRight.controller.control = sliderLeft;

    var sliderMobile = new Swiper('.slider-mobile', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',

        coverflowEffect: {
            rotate: 0,
            stretch: 20,
            depth: 150,
            modifier: 2,
            slideShadows: true,
        },

        loop: true,
    });

</script>
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
                
                <div class="featured-slider-module__cards slider-left"
                    data-aos="fade-right"
                    data-aos-duration="800"
                >

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        
                        <?php if( $slider_post_query->have_posts() ): while( $slider_post_query->have_posts() ): $slider_post_query->the_post(); ?>
                            <article class="featured-slider-module__cards__card swiper-slide">
                                
                                <header class="featured-slider-module__cards__card-content">
                                    <h2><?php the_title(); ?></h2>
                                </header>

                                <?php the_excerpt(); ?>

                                <div class="featured-slider-module__cards__card-buttons">
                                    <div class="button-module">
                                        <div class="button-module__wrapper">
                                            
                                            <a href="<?php the_permalink(); ?>">
                                                <span class="custom-primary-btn">More Info</span>
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
                
                <div class="featured-slider-module__cards slider-right"
                    data-aos="slide-left"
                    data-aos-duration="700"
                    data-aos-easing="ease-out-sine" 
                >

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        <?php if( $slider_post_query->have_posts() ): while( $slider_post_query->have_posts() ): $slider_post_query->the_post(); ?>

                            <article class="featured-slider-module__cards__card swiper-slide column-center">
                                    
                                <div class="featured-slider-module__cards__card-overlay background-overlay"></div>
                                
                                <?php the_post_thumbnail( 'theme-small',
                                    array(
                                        'class' => 'img-fluid',
                                        'width' => 640,
                                        'alt'   => get_the_title(),
                                    ) 
                                ); ?>

                            </article>

                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>

                    <div class="featured-slider-module__cards-overlay cards-overlay"></div>

                </div> 

                <div class="swiper-button-prev"></div>   
                <div class="swiper-button-next"></div>   
            </div>

        </div>

        <div class="featured-slider-module__container-mobile">

            <div class="featured-slider-module__wrapper">
                
                <div class="featured-slider-module__cards slider-mobile">

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        <?php if( $slider_post_query->have_posts() ): while( $slider_post_query->have_posts() ): $slider_post_query->the_post(); ?>
                        
                            <article class="featured-slider-module__cards__card swiper-slide column-center">
                                        
                                <a href="<?php the_permalink(); ?>"><span class="hit-area"></span></a>

                                <div class="featured-slider-module__cards__card-overlay background-overlay"></div>

                                <div class="featured-slider-module__cards__card-heading title-overlay">
                                    <h2><?php the_title(); ?></h2>
                                </div>
                                
                                <?php the_post_thumbnail( 'theme-xsmall',
                                    array(
                                        'class' => 'img-fluid',
                                        'width' => 640,
                                        'alt'   => get_the_title(),
                                    ) 
                                ); ?>

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
        spaceBetween: 40,
        centeredSlides: true,
        loop: true,
        loopedSlides: 3
    });

    var sliderRight = new Swiper('.slider-right', {
        slidesPerView: 2.5,
        spaceBetween: 24,
        grabCursor: true,

        touchRatio: 0.2,
        slideToClickedSlide: false,
        loop: true,
        loopedSlides: 3,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    sliderLeft.controller.control = sliderRight;
    sliderRight.controller.control = sliderLeft;

    var sliderMobile = new Swiper('.slider-mobile', {
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        initialSlide: 1,
        slidesPerGroup: 1,
        spaceBetween: 24,
        loop: true,
    });

</script>
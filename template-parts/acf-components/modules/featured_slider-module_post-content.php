<?php 
    if( have_rows( 'featured_slider_module_settings' ) ) {
        while( have_rows( 'featured_slider_module_settings' ) ) {
            the_row();

            $featured_slider_narrow_data_source = get_sub_field( 'featured_slider_narrow_data_source' );
            $featured_slider_data_source_filter = get_sub_field( 'featured_slider_data_source_filter' );
            $featured_slider_height = get_sub_field( 'featured_slider_height' );
        }
    }

    $slider_post_query = new WP_Query(array(
        'post_type'             => $featured_slider_narrow_data_source->name,
        'posts_per_page'        => -1,
        'orderby'               => 'title',
        'order'                 => 'ASC',
        'ignore_sticky_posts'   => 1,

        // 'tax_query' => array(
        //     array (
        //         'taxonomy' => $featured_slider_data_source_filter,
        //         'field' => 'slug',
        //         'terms' => $featured_slider_data_source_filter,
        //     )
        // ),
    )); 
?>

    <div class="featured-slider-module__container row g-0">

        <div class="featured-slider-module__wrapper swiper-wrapper--left">
            
            <div class="featured-slider-module__cards featured-slider__left slider-left" data-aos="fade-right" data-aos-duration="800">

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
            
            <div class="featured-slider-module__cards featured-slider__right slider-right"<?php if( $featured_slider_height ){ echo ' style="height: ' . $featured_slider_height . 'rem";'; } ?> data-aos="slide-left" data-aos-duration="1000" data-aos-easing="ease-out-sine">

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

            <div class="swiper-button-prev featured-slider-module__arrow-prev" data-aos="custom-fade" data-aos-duration="1000" data-aos-delay="200" data-aos-easing="ease-out-sine"></div>   
            <div class="swiper-button-next featured-slider-module__arrow-next" data-aos="custom-fade" data-aos-duration="1000" data-aos-delay="200" data-aos-easing="ease-out-sine"></div>   
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

<script type="module">
    let featuredSliderLeft = new Swiper('.featured-slider__left', {
        grabCursor: true,
        spaceBetween: 40,
        centeredSlides: true,
        loop: true,
        loopedSlides: 3
    });

    let featuredSliderRight = new Swiper('.featured-slider__right', {
        grabCursor: true,

        touchRatio: 0.2,
        slideToClickedSlide: false,
        loop: true,
        loopedSlides: 3,

        navigation: {
            nextEl: '.featured-slider-module__arrow-next',
            prevEl: '.featured-slider-module__arrow-prev',
        },

        breakpoints: {
            980: {
                slidesPerView: 1.5,
                spaceBetween: 20,
            },

            1280: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

            1600: {
                slidesPerView: 2.5,
                spaceBetween: 24,
            },
        },
    });

    featuredSliderLeft.controller.control = featuredSliderRight;
    featuredSliderRight.controller.control = featuredSliderLeft;

    let sliderMobile = new Swiper('.slider-mobile', {
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 1.5,
        slidesPerGroup: 1,
        spaceBetween: 24,
        loop: true,
    });
</script>
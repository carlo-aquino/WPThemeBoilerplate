<?php 
    if( have_rows( 'featured_slider_module_settings' ) ) {
        while( have_rows( 'featured_slider_module_settings' ) ) {
            the_row();

            $featured_slider_data_source = get_sub_field( 'featured_slider_data_source' );
            $featured_slider_data_source_filter = get_sub_field( 'featured_slider_data_source_filter' );
            $featured_slider_height = get_sub_field( 'featured_slider_height' );


            if( have_rows( 'margin_settings' ) ) {
                while( have_rows( 'margin_settings' ) ) {
                    the_row();
        
                    $margin_top = get_sub_field( 'margin_top' );
                    $margin_bottom = get_sub_field( 'margin_bottom' );
                    $margin_left = get_sub_field( 'margin_left' );
                    $margin_right = get_sub_field( 'margin_right' );
                }
            }
        
            if( have_rows( 'padding_settings' ) ) {
                while( have_rows( 'padding_settings' ) ) {
                    the_row();
        
                    $padding_top = get_sub_field( 'padding_top' );
                    $padding_bottom = get_sub_field( 'padding_bottom' );
                    $padding_left = get_sub_field( 'padding_left' );
                    $padding_right = get_sub_field( 'padding_right' );
                }
            }

            if( have_rows( 'id_classes_settings' ) ) {
                while( have_rows( 'id_classes_settings' ) ) {
                    the_row();
        
                    $css_id = get_sub_field( 'css_id' );
                    $css_class = get_sub_field( 'css_class' );
                }
            }
        }
    }

    $slider_post_query = new WP_Query(array(
        'post_type'             => $featured_slider_data_source,
        'posts_per_page'        => -1,
        'orderby'               => 'title',
        'order'                 => 'ASC',
        'ignore_sticky_posts'   => 1,

        'tax_query' => array(
            array (
                'taxonomy' => $featured_slider_data_source_filter->taxonomy,
                'field' => 'slug',
                'terms' => $featured_slider_data_source_filter->slug,
            )
        ),
    )); 
?>

    <div id="<?php if( $css_id ) { echo ' ' . $css_id; } ?>" class="featured-slider-module container-fluid g-0<?php if( $css_class ) { echo ' ' . $css_class; } ?>">
        
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
                
                <div class="featured-slider-module__cards slider-right"<?php if( $featured_slider_height ){ echo ' style="height: ' . $featured_slider_height . 'rem";'; } ?>
                    data-aos="slide-left"
                    data-aos-duration="1000"
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

                <div class="swiper-button-prev featured-slider-module__arrow-prev"></div>   
                <div class="swiper-button-next featured-slider-module__arrow-next"></div>   
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
        // slidesPerView: 2.5,
        // spaceBetween: 24,
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
                slidesPerView: 2,
                spaceBetween: 20,
            },

            1400: {
                slidesPerView: 2.5,
                spaceBetween: 24,
            },
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
<?php 
    if( have_rows( 'featured_slider_module_settings' ) ) {
        while( have_rows( 'featured_slider_module_settings' ) ) {
            the_row();

            $featured_slider_narrow_data_source = get_sub_field( 'featured_slider_narrow_data_source' );
            $featured_slider_data_source_filter = get_sub_field( 'featured_slider_data_source_filter' );
            $featured_slider_height = get_sub_field( 'featured_slider_height' );
        }
    }

    if( $featured_slider_data_source_filter ) {
        $results = array(); 
        $ctr = 0;

        while( $ctr < sizeof( $featured_slider_data_source_filter ) ) {
            array_push( $results, $featured_slider_data_source_filter[$ctr]->slug );
            $ctr++;
        }
    }

    $slider_post_query = new WP_Query(array(
        'post_type'             => $featured_slider_narrow_data_source->name,
        'posts_per_page'        => -1,
        'orderby'               => 'title',
        'order'                 => 'ASC',
        'ignore_sticky_posts'   => 1,

        'tax_query' => $featured_slider_data_source_filter ? array(
            array (
                'taxonomy' => $featured_slider_data_source_filter[0]->taxonomy,
                'field' => 'slug',
                'terms' => $results,
            )
        ) : '',
    )); 

    $randID = uniqid();
?>
    <?php if( $slider_post_query->have_posts() ):  ?>
        <div class="featured-slider-module__container row g-0<?php echo ' featured-slider-module__container-' . $randID; ?>" data-featuredsliderid="<?php echo 'featured-slider-module__container-' . $randID; ?>">

            <div class="featured-slider-module__wrapper swiper-wrapper--left">
                
                <div class="featured-slider-module__cards featured-slider__left slider-left" data-aos="fade-right" data-aos-duration="800">

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        
                        <?php while( $slider_post_query->have_posts() ): $slider_post_query->the_post(); ?>
                            <article class="featured-slider-module__cards__card swiper-slide">
                                
                                <header class="featured-slider-module__cards__card-content">
                                    <h2><?php the_title(); ?></h2>
                                </header>

                                <?php the_excerpt(); ?>

                                <div class="featured-slider-module__cards__card-buttons">
                                    <div class="button-module">
                                        <div class="button-module__wrapper">
                                            
                                            <a href="<?php the_permalink(); ?>" role="button">
                                                <span class="custom-primary-btn">More Info</span>
                                            </a> 

                                        </div>
                                    </div>
                                </div>

                            </article>
                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>    

                </div>       
            </div>

            <div class="featured-slider-module__wrapper swiper-wrapper--right">
                
                <div class="featured-slider-module__cards featured-slider__right slider-right"<?php if( $featured_slider_height ){ echo ' style="height: ' . $featured_slider_height . 'rem";'; } ?> data-aos="slide-left" data-aos-duration="1000" data-aos-easing="ease-out-sine">

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        <?php while( $slider_post_query->have_posts() ): $slider_post_query->the_post(); ?>

                            <article class="featured-slider-module__cards__card swiper-slide column-center">
                                    
                                <div class="featured-slider-module__cards__card-overlay background-overlay"></div>
                                
                                <?php the_post_thumbnail( 'theme-small',
                                    array(
                                        'class' => 'img-fluid',
                                        'width' => 640,
                                    ) 
                                ); ?>

                            </article>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>

                    <div class="featured-slider-module__cards-overlay cards-overlay"></div>

                </div> 

                <div class="swiper-button-prev featured-slider-module__arrow-prev" data-aos="custom-fade" data-aos-duration="1000" data-aos-delay="200" data-aos-easing="ease-out-sine"></div>   
                <div class="swiper-button-next featured-slider-module__arrow-next" data-aos="custom-fade" data-aos-duration="1000" data-aos-delay="200" data-aos-easing="ease-out-sine"></div>   
            </div>

        </div>

        <div class="featured-slider-module__container-mobile<?php echo ' featured-slider-module__container__mobile-' . $randID; ?>" data-featuredsliderid="<?php echo 'featured-slider-module__container__mobile-' . $randID; ?>">

            <div class="featured-slider-module__wrapper">
                
                <div class="featured-slider-module__cards slider-mobile">

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        <?php while( $slider_post_query->have_posts() ): $slider_post_query->the_post(); ?>
                        
                            <article class="featured-slider-module__cards__card swiper-slide column-center">
                                        
                                <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><span class="hit-area"></span></a>

                                <div class="featured-slider-module__cards__card-overlay background-overlay"></div>

                                <div class="featured-slider-module__cards__card-heading title-overlay">
                                    <h2><?php the_title(); ?></h2>
                                </div>
                                
                                <?php the_post_thumbnail( 'theme-xsmall',
                                    array(
                                        'class' => 'img-fluid',
                                        'width' => 640,
                                    ) 
                                ); ?>

                            </article>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>

                </div>      
                
            </div>
            
        </div>

    <?php endif; ?>
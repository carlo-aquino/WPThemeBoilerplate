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

    $slider_post_query = new WP_Query(array(
        'post_type'             => $slider_data_source_filter,
        'posts_per_page'        => $slider_total_items,
        'orderby'               => $slider_order_by,
        'order'                 => $slider_order,
        'ignore_sticky_posts'   => 1,

        // 'tax_query' => array(
        //     array (
        //         'taxonomy' => $slider_data_source_category->taxonomy,
        //         'field' => 'slug',
        //         'terms' => $slider_data_source_category->slug,
        //     )
        // ),
    ));
    
?>        

    <div class="slider-module__wrapper<?php if( $slider_type ) { echo ' ' . $slider_type; } ?>"
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
                        <?php if( $slider_slide_width ) { echo 'width:' . $slider_slide_width . 'rem;'; } ?>
                        <?php if( $slider_slide_height ) { echo 'height:' . $slider_slide_height . 'rem;'; } ?>
                    "
                >
                    
                    <a href="<?php the_permalink(); ?>"><span class="hit-area"></span></a>
                        
                    <div class="slider-module__cards__card-overlay background-overlay"></div>
                    
                    <?php the_post_thumbnail( 'theme-small',
                        array(
                            'class' => 'img-fluid',
                            'width' => 640,
                            'alt'   => get_the_title(),
                        ) 
                    ); ?>
                    
                    <header class="slider-module__cards__card-content">
                        <h3><?php the_title(); ?></h3>
                        <span><strong><?php the_time('F j, Y'); ?></strong></span>
                    </header>

                </article>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            
        </div> 

        <?php if( $slider_arrow ): ?>
            <div class="slider-module__arrow">
                <div class="swiper-button-prev slider-module__arrow-prev"></div>
                <div class="swiper-button-next slider-module__arrow-next"></div>    
            </div>
        <?php endif; ?>
        
        <?php if( $slider_pagination && ( $slider_type=='slider-type-one' || $slider_type=='slider-type-two' ) ): ?>

            <?php if( $slider_pagination_type == 'bullet' ): ?>
                <div class="swiper-pagination"></div>
            <?php endif; ?>

            <?php if( $slider_pagination_type == 'scroll' ): ?>
                <div class="swiper-scrollbar"></div>
            <?php endif; ?>

        <?php endif; ?>             
    </div>

<?php if( $slider_type == 'slider-type-one' ): ?>
    <!-- Initialize Swiper -->
    <script type="module">
        let swiper01 = new Swiper('.slider-type-one', {
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        initialSlide: 1,
        slidesPerGroup: 1,
        spaceBetween: 16,

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        scrollbar: {
            el: '.swiper-scrollbar',
            hide: false,
            draggable: true,
        },

        loop: true,

        navigation: {
            nextEl: '.slider-module__arrow-next',
            prevEl: '.slider-module__arrow-prev',
        },
    });
    </script>
<?php endif; ?>

<?php if( $slider_type == 'slider-type-two' ): ?>
    <!-- Initialize Swiper -->
    <script type="module">
        let swiper02 = new Swiper('.slider-type-two', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            initialSlide: 0,
            slidesPerGroup: 1,

            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 280,
                modifier: 2,
                slideShadows: true,
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            scrollbar: {
                el: '.swiper-scrollbar',
                hide: false,
                draggable: true,
            },

            loop: true,

            navigation: {
                nextEl: '.slider-module__arrow-next',
                prevEl: '.slider-module__arrow-prev',
            },
        });
    </script>
<?php endif; ?>

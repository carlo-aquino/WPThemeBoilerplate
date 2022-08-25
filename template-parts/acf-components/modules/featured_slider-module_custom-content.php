<?php if( have_rows( 'featured_slider_module_settings' ) ): while( have_rows( 'featured_slider_module_settings' ) ): the_row();
    $featured_slider_height = get_sub_field( 'featured_slider_height' );
?>

    <?php if( have_rows( 'featured_slider_custom_content' ) ): ?>
        <div class="featured-slider-module__container row g-0">

            <div class="featured-slider-module__wrapper swiper-wrapper--left">
                
                <div class="featured-slider-module__cards slider-left" data-aos="fade-right" data-aos-duration="800">

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">
                        
                        <?php while( have_rows( 'featured_slider_custom_content' ) ): the_row();
                            $featured_slider_custom_title = get_sub_field('featured_slider_custom_title');
                            $featured_slider_custom_description = get_sub_field('featured_slider_custom_description');
                            $featured_slider_custom_link = get_sub_field('featured_slider_custom_link');

                            if( $featured_slider_custom_link ) {
                                $featured_slider_custom_link_url = $featured_slider_custom_link['url'];
                                $featured_slider_custom_link_title = $featured_slider_custom_link['title'];
                                $featured_slider_custom_link_target = $featured_slider_custom_link['target'] ? $featured_slider_custom_link['target'] : '_self';
                            }
                        ?>
                            <article class="featured-slider-module__cards__card swiper-slide">
                                
                                <?php if( $featured_slider_custom_title ): ?>
                                    <header class="featured-slider-module__cards__card-content">
                                        <h2><?php echo $featured_slider_custom_title; ?></h2>
                                    </header>
                                <?php endif; ?>

                                <?php if( $featured_slider_custom_description ): ?>
                                    <p><?php echo $featured_slider_custom_description; ?></p>
                                <?php endif; ?>

                                <?php if( $featured_slider_custom_link ): ?>
                                    <div class="featured-slider-module__cards__card-buttons">
                                        <div class="button-module">
                                            <div class="button-module__wrapper">
                                                
                                                <a href="<?php echo $featured_slider_custom_link_url; ?>" target="<?php echo $featured_slider_custom_link_target; ?>">
                                                    <span class="custom-primary-btn"><?php echo $featured_slider_custom_link_title; ?></span>
                                                </a> 

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </article>
                        <?php endwhile; ?>

                    </div>    

                </div>       
            </div>

            <div class="featured-slider-module__wrapper swiper-wrapper--right">
                
                <div class="featured-slider-module__cards slider-right"<?php if( $featured_slider_height ){ echo ' style="height: ' . $featured_slider_height . 'rem";'; } ?> data-aos="slide-left" data-aos-duration="1000" data-aos-easing="ease-out-sine">

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">

                        <?php while( have_rows( 'featured_slider_custom_content' ) ): the_row();
                            $featured_slider_custom_image = get_sub_field('featured_slider_custom_image');

                            if( $featured_slider_custom_image ) {
                                $featured_slider_custom_image_size = $featured_slider_custom_image['sizes']['theme-small'];
                                $featured_slider_custom_image_width = $featured_slider_custom_image['sizes'][ 'theme-small-width'];
                                $featured_slider_custom_image_height = $featured_slider_custom_image['sizes'][ 'theme-small-height'];
                                $featured_slider_custom_image_alt = $featured_slider_custom_image['alt'];
                            }
                        ?>

                            <article class="featured-slider-module__cards__card swiper-slide column-center">
                                    
                                <div class="featured-slider-module__cards__card-overlay background-overlay"></div>
                                
                                <?php if( $featured_slider_custom_image ): ?>
                                    <picture>
                                        <source media="(max-width:980px)"
                                                srcset="<?php echo $featured_slider_custom_image['sizes']['theme-large']; ?> 980w">
                                        <source media="(max-width:768px)"
                                                srcset="<?php echo $featured_slider_custom_image['sizes']['theme-medium']; ?> 768w">
                                        <source media="(max-width:640px)"
                                                srcset="<?php echo $featured_slider_custom_image['sizes']['theme-small']; ?> 640w">
                                        <source media="(max-width:425px)"
                                                srcset="<?php echo $featured_slider_custom_image['sizes']['theme-xsmall']; ?> 425w">

                                        <img src="<?php echo $featured_slider_custom_image_size; ?>" width="<?php echo $featured_slider_custom_image_width; ?>" height="<?php echo $featured_slider_custom_image_height; ?>" alt="<?php echo $featured_slider_custom_image_alt; ?>" class="img-fluid" loading="lazy">
                                    </picture>       
                                <?php endif; ?>

                            </article>

                        <?php endwhile; ?>
                    </div>

                    <div class="featured-slider-module__cards-overlay cards-overlay"></div>

                </div> 

                <div class="swiper-button-prev featured-slider-module__arrow-prev featured-slider-module-custom__arrow-prev" data-aos="custom-fade" data-aos-duration="1000" data-aos-delay="200" data-aos-easing="ease-out-sine"></div>   
                <div class="swiper-button-next featured-slider-module__arrow-next featured-slider-module-custom__arrow-next" data-aos="custom-fade" data-aos-duration="1000" data-aos-delay="200" data-aos-easing="ease-out-sine"></div>   
            </div>

        </div>

        <div class="featured-slider-module__container-mobile">

            <div class="featured-slider-module__wrapper">
                
                <div class="featured-slider-module__cards slider-mobile">

                    <div class="featured-slider-module__cards-wrapper swiper-wrapper">

                        <?php while( have_rows( 'featured_slider_custom_content' ) ): the_row();
                            $featured_slider_custom_image = get_sub_field('featured_slider_custom_image');
                            $featured_slider_custom_title = get_sub_field('featured_slider_custom_title');
                            $featured_slider_custom_link = get_sub_field('featured_slider_custom_link');

                            if( $featured_slider_custom_link ) {
                                $featured_slider_custom_link_url = $featured_slider_custom_link['url'];
                                $featured_slider_custom_link_title = $featured_slider_custom_link['title'];
                                $featured_slider_custom_link_target = $featured_slider_custom_link['target'] ? $featured_slider_custom_link['target'] : '_self';
                            }    

                            if( $featured_slider_custom_image ) {
                                $featured_slider_custom_image_size = $featured_slider_custom_image['sizes']['theme-small'];
                                $featured_slider_custom_image_width = $featured_slider_custom_image['sizes'][ 'theme-small-width'];
                                $featured_slider_custom_image_height = $featured_slider_custom_image['sizes'][ 'theme-small-height'];
                                $featured_slider_custom_image_alt = $featured_slider_custom_image['alt'];
                            }
                        ?>
                        
                            <article class="featured-slider-module__cards__card swiper-slide column-center">
                                        
                                <a href="<?php echo $featured_slider_custom_link_url; ?>"><span class="hit-area"></span></a>

                                <div class="featured-slider-module__cards__card-overlay background-overlay"></div>

                                <div class="featured-slider-module__cards__card-heading title-overlay">
                                    <h2><?php echo $featured_slider_custom_title; ?></h2>
                                </div>
                                
                                <?php if( $featured_slider_custom_image ): ?>
                                    <picture>
                                        <source media="(max-width:980px)"
                                                srcset="<?php echo $featured_slider_custom_image['sizes']['theme-large']; ?> 980w">
                                        <source media="(max-width:768px)"
                                                srcset="<?php echo $featured_slider_custom_image['sizes']['theme-medium']; ?> 768w">
                                        <source media="(max-width:640px)"
                                                srcset="<?php echo $featured_slider_custom_image['sizes']['theme-small']; ?> 640w">
                                        <source media="(max-width:425px)"
                                                srcset="<?php echo $featured_slider_custom_image['sizes']['theme-xsmall']; ?> 425w">

                                        <img src="<?php echo $featured_slider_custom_image_size; ?>" width="<?php echo $featured_slider_custom_image_width; ?>" height="<?php echo $featured_slider_custom_image_height; ?>" alt="<?php echo $featured_slider_custom_image_alt; ?>" class="img-fluid" loading="lazy">
                                    </picture>       
                                <?php endif; ?>

                            </article>

                        <?php endwhile; ?>
                    </div>

                </div>      
                
            </div>
            
        </div>

    <?php endif;?>

<?php endwhile; endif; ?>

    <script type="module">

        var sliderLeft = new Swiper('.slider-left', {
            grabCursor: true,
            spaceBetween: 40,
            centeredSlides: true,
            loop: true,
            loopedSlides: 3
        });

        var sliderRight = new Swiper('.slider-right', {
            grabCursor: true,

            touchRatio: 0.2,
            slideToClickedSlide: false,
            loop: true,
            loopedSlides: 3,

            navigation: {
                nextEl: '.featured-slider-module-custom__arrow-next',
                prevEl: '.featured-slider-module-custom__arrow-prev',
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

        sliderLeft.controller.control = sliderRight;
        sliderRight.controller.control = sliderLeft;

        var sliderMobile = new Swiper('.slider-mobile', {
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 1.5,
            slidesPerGroup: 1,
            spaceBetween: 24,
            loop: true,
        });

    </script>
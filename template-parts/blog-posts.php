<?php if( have_posts() ): ?>

    <section class="blog-posts mobile-spacer">

        <div class="blog-posts__wrapper content-limit">

            <div class="blog-posts__cards">

                <?php while( have_posts() ): the_post(); ?>

                    <article class="blog-posts__cards__card" data-aos="fade-left" data-aos-duration="800" data-aos-delay="<?php echo $ctr; ?>">
                        
                        <a href="<?php the_permalink(); ?>"><span class="hit-area"></span></a>

                        <?php if( is_sticky() ): ?>
                            <div class="features-module__cards__card-violator">
                                <strong>PINNED</strong>
                            </div>
                        <?php endif; ?>
                            
                        <div class="blog-posts__cards__card-overlay background-overlay"></div>
                        
                        <?php the_post_thumbnail( 'theme-small',
                            array(
                                'class' => 'img-fluid',
                                'width' => 640,
                                'alt'   => get_the_title(),
                            ) 
                        ); ?>
                        
                        <header class="blog-posts__cards__card-content">
                            <h2><?php the_title(); ?></h2>
                            <span class="grid-date"><strong><?php the_time('F j, Y'); ?></strong></span>
                        </header>

                    </article>

                <?php $ctr = $ctr+200; endwhile; ?>

            </div>

            <?php if( is_paginated() ): ?>
                <div class="page-content__search-pagination">
                    <?php echo paginate_links(); ?>
                </div>
            <?php endif; ?>    
        </div>

    </section>
    
<?php endif; ?>
<?php get_header(); 
    global $post; 
    $page_for_posts = get_queried_object_id(); 
    $post = get_post( $page_for_posts ); 
    setup_postdata( $post ); 
    
    $page_class = get_field( 'page_class' ); 
?>

    <main class="index__main<?php if( $page_class ) { echo ' ' . $page_class; } ?>">
        <?php

            if( have_rows( 'page_banner', $page_for_posts ) ) {
                while( have_rows( 'page_banner', $page_for_posts ) ){
                    the_row(); 
                    $page_bg_enable = get_sub_field( 'page_bg_enable' );
    
                    if( have_rows( 'banner_type' ) ) {
                        while( have_rows( 'banner_type' ) ){
                            the_row(); 
    
                            if ( $page_bg_enable ) {
                                get_template_part( 'template-parts/page', 'banner' );
                            }
                        }
                    }
                }  
            } 
            
            get_template_part( 'template-parts/page', 'builder', get_post_format() );
        ?>

        <?php if( have_posts() ): ?>
            <section class="index-posts mobile-spacer">

                <div class="index-posts__wrapper content-limit">

                    <div class="index-posts__cards">

                        <?php while( have_posts() ): the_post(); ?>

                            <article class="index-posts__cards__card">
                                
                                <a href="<?php the_permalink(); ?>"><span class="hit-area"></span></a>

                                <?php if( is_sticky() ): ?>
                                    <div class="features-module__cards__card-violator">
                                        <strong>PINNED</strong>
                                    </div>
                                <?php endif; ?>
                                    
                                <div class="index-posts__cards__card-overlay background-overlay"></div>
                                
                                <?php the_post_thumbnail( 'theme-small',
                                    array(
                                        'class' => 'img-fluid',
                                        'width' => 640,
                                        'alt'   => get_the_title(),
                                    ) 
                                ); ?>
                                
                                <header class="index-posts__cards__card-content">
                                    <h2><?php the_title(); ?></h2>
                                    <span class="grid-date"><strong><?php the_time('F j, Y'); ?></strong></span>
                                </header>

                            </article>

                        <?php endwhile; ?>

                    </div>

                    <div class="page-content__search-pagination">
                        <?php echo paginate_links(); ?>
                    </div>

                </div>

            </section>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>
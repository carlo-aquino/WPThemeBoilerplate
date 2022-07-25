<?php get_header(); $posts_page_title = get_the_title( get_option('page_for_posts', true) ); ?>

    <main class="single__main mobile-spacer">

        <?php if( have_posts() ): while( have_posts() ):
            the_post(); 
            $featuredIMG_single = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            
            <section class="single-template">
                <div class="single__header single__width-limit">

                    <div class="single__header-breadcrumbs">
                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
                            <?php echo $posts_page_title; ?>
                        </a>
                    
                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                        <?php echo get_the_category_list(', '); ?>
                    </div>

                    <header>
                        <h1><?php the_title(); ?></h1>
                    </header>

                    <span class="post-time"><?php the_time('F j, Y'); ?> - Philippines</span>
                </div>

                <div class="single__featured-image">
                    <?php
                        if( $featuredIMG_single ) {
                            the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) );
                        }
                    ?>
                </div>
            </section>

            <section class="page-container single__width-limit">
                <?php the_content(); ?>
            </section>

        <?php endwhile; endif; ?>
        
    </main>

<?php get_footer(); ?>
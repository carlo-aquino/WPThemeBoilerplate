<?php get_header(); ?>

    <main class="single__main">

        <?php if( have_posts() ): while( have_posts() ):
            the_post(); 
            $featuredIMG_single = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            
            <section class="single-template">
                <div class="single__header single__width-limit">
                    <header>
                        <h1><?php the_title(); ?></h1>
                    </header>

                    <span><?php the_time('F j, Y'); ?> - Philippines</span>
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
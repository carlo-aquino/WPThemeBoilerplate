<?php get_header(); ?>

    <main class="archive-portfolio__main">

        <?php get_template_part( 'template-parts/page', 'banner' ); ?>
        
        <section class="archive-portfolio mobile-spacer">

            <div class="archive-portfolio__wrapper <?php if( !$full_width ) { echo 'content-limit'; } ?>">   

                <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
                
                    <article>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>
                        <img src="<?php the_field('school_logo'); ?>" alt="">
                    </article>
                    
                <?php endwhile; endif; ?>    

                <div class="page-content__search-pagination">
                    <?php echo paginate_links(); ?>
                </div>

            </div>

        </section>
        
    </main>

<?php get_footer(); ?>
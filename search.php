<?php get_header(); global $wp_query; $search_counter = 0; ?>    
    
    <main class="search__main theme__main">

        <?php get_template_part( 'template-parts/page', 'banner' ); ?>

        <section class="page-content__search mobile-spacer">
            <div class="page-search__width-limit">

                <div class="page-content__search-results">
                    <?php if( have_posts() ) {
                        while( have_posts() ) {
                            the_post();
                            $search_counter++;
                        }
                    } ?>

                    <div class="page-content__search-results__left">
                        <span>Search result(s) for: <strong><em><?php echo $_GET['s']; ?></em></strong></span>
                    </div>

                    <div class="page-content__search-results__right">
                        <?php if( $search_counter==0 ): ?>
                            <span>Result(s): 0</span>
                        <?php else: ?>
                            <span>Result(s): <?php echo $wp_query->found_posts; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
                    <article class="page-content__search-item">
                        <h2>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <span>
                            <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
                        </span>

                        <?php the_excerpt(); ?>
                    </article>
                <?php endwhile; endif; ?>

                <?php if( is_paginated() ): ?>
                    <div class="page-content__search-pagination">
                        <?php echo paginate_links(); ?>
                    </div>
                <?php endif; ?>    
            </div>
        </section>
    </main>

<?php get_footer();?>
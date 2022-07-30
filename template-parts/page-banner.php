<?php if( have_rows( 'page_banner' ) ): while( have_rows( 'page_banner' ) ): the_row();
    $page_bg_enable = get_sub_field( 'page_bg_enable' );
    $current_category = get_queried_object();
?>
    
    <?php if( have_rows( 'banner_type' ) ): while( have_rows( 'banner_type' ) ):
        the_row(); 
        $banner_text_toggle = get_sub_field( 'banner_text_toggle' );
        $banner_text = get_sub_field( 'banner_text' );
        $banner_subtitle = get_sub_field( 'banner_subtitle' ); ?>

        <?php if ( $page_bg_enable || is_search() || is_category() || is_post_type_archive( 'portfolio' ) ): ?>
            <section class="page-banner full-bleed">

                <?php get_template_part( 'template-parts/page', 'banner-content' ); ?>

                <div class="page-banner__heading content-limit section-width">
                    <div class="page-banner__heading-container">
                        <?php if( $banner_text_toggle ): ?>
                            <h1><?php 
                                if( $banner_text ) {
                                    echo $banner_text;
                                } elseif( is_home() ) {
                                    single_post_title();
                                } else {
                                    the_title();
                                }
                            ?></h1>
                        <?php endif; ?>

                        <?php if( is_search() ) { echo '<h1>Search Results</h1>'; } ?>

                        <?php if( is_category() ) { echo '<h1>Archive: ' . $current_category->name . '</h1>'; } ?>

                        <?php if( is_post_type_archive( 'portfolio' ) ) { echo '<h1>Portfolio</h1>'; } ?>

                        <?php if( $banner_text_toggle && $banner_subtitle ): ?>
                            <p><?php echo $banner_subtitle; ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="page-banner__overlay"></div>

            </section>
        <?php endif; ?>

    <?php endwhile; endif; ?>      

<?php endwhile; endif; ?>
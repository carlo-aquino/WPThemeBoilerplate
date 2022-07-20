<?php 
    $banner_text_toggle = get_sub_field( 'banner_text_toggle' );
    $banner_text = get_sub_field( 'banner_text' );
    $banner_subtitle = get_sub_field( 'banner_subtitle' ); ?>

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

                <?php if( is_post_type_archive( 'portfolio' ) ) { echo '<h1>Portfolio</h1>'; } ?>

                <?php if( $banner_text_toggle && $banner_subtitle ): ?>
                    <p><?php echo $banner_subtitle; ?></p>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="page-banner__overlay"></div>
    </section>
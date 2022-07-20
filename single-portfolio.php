<?php get_header();
    $page_class = get_field( 'page_class' );
?>

    <main class="single__portfolio<?php if( $page_class ) { echo ' ' . $page_class; } ?>">
        <?php 
            if( have_rows( 'page_banner' ) ) {
                while( have_rows( 'page_banner' ) ){
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
        ?>

        <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
            
            
        <?php endwhile; endif; ?>

        <div class="page-container">
            <?php get_template_part( 'template-parts/page', 'builder' ); ?>
        </div>
    </main>

<?php get_footer(); ?>
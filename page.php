<?php get_header(); 
    $page_class = get_field( 'page_class' );
?>

    <main class="page__main<?php if( $page_class ) { echo ' ' . $page_class; } ?><?php if( $page_bg_enable ) { echo ' theme__main'; } ?>">

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

            if( have_posts() ) {
                while( have_posts() ) {
                    the_post(); 
                    the_content();
                }  
            } 
        ?>

        <div class="page-container">
            <?php get_template_part( 'template-parts/page', 'builder' ); ?>
        </div>
        
    </main>

<?php get_footer(); ?>
<?php get_header(); 
    global $post; 
    $page_for_posts = get_queried_object_id(); 
    $post = get_post( $page_for_posts ); 
    setup_postdata( $post ); 
    
    $page_class = get_field( 'page_class' ); 

    $ctr = 0;
?>

    <main class="blog__main<?php if( $page_class ) { echo ' ' . $page_class; } ?>">
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

            get_template_part( 'template-parts/blog', 'posts' );
        ?>
    </main>

<?php get_footer(); ?>
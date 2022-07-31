<?php get_header(); 
    global $post; 
    $page_for_posts = get_queried_object_id(); 
    $post = get_post( $page_for_posts ); 
    setup_postdata( $post ); 
    
    $page_class = get_field( 'page_class' ); 
?>

    <main class="blog__main<?php if( $page_class ) { echo ' ' . $page_class; } ?>">

        <?php
            get_template_part( 'template-parts/page', 'banner' );
            get_template_part( 'template-parts/page', 'builder', get_post_format() );
            get_template_part( 'template-parts/blog', 'posts' );
        ?>
        
    </main>

<?php get_footer(); ?>
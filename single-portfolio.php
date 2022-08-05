<?php get_header(); 
    $page_class = get_field( 'page_class' );
?>

    <main class="page__main<?php if( $page_class ) { echo ' ' . $page_class; } ?>">

        <?php get_template_part( 'template-parts/page', 'banner' ); ?>

        <div class="page-container">
            <?php get_template_part( 'template-parts/page', 'builder' ); ?>
        </div>
        
    </main>

<?php get_footer(); ?>
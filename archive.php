<?php get_header(); ?>

    <main class="archive__main">
        
        <?php

            get_template_part( 'template-parts/page', 'banner' );

            get_template_part( 'template-parts/blog', 'posts' );
            
        ?>

    </main>

<?php get_footer(); ?>
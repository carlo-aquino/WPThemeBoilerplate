<?php 
    $page_for_posts = get_queried_object_id();
    $pageBanner_featuredIMG = wp_get_attachment_image_src( get_post_thumbnail_id( $page_for_posts ), 'full' ); 
    $banner_options = get_sub_field( 'banner_options' ); 
    $banner_video_file =  get_sub_field('banner_video_file');
?>


    <?php if( $banner_options=='image' ): ?>

        <?php if( $pageBanner_featuredIMG[0] ): ?>
            <img src="<?php echo $pageBanner_featuredIMG[0]; ?>" loading="lazy">
        <?php else: ?>

            <?php if( is_front_page() ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/homepage-banner.jpg" alt="Homepage banner" loading="lazy">
            <?php endif; ?>

            <?php if( is_home() ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/homepage-banner.jpg" alt="Blog page banner" loading="lazy">
            <?php endif; ?>

            <?php if( is_page() ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/homepage-banner.jpg" alt="Blog page banner" loading="lazy">
            <?php endif; ?>

            <?php if( is_singular( 'portfolio' )  ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/portfolio-banner.jpg" alt="Portfolio page banner" loading="lazy">
            <?php endif; ?>

        <?php endif; ?>

    <?php endif; ?>

    <?php if( is_single() ): ?>
        <img src="<?php bloginfo('template_directory'); ?>/dist/img/blogpage-banner.jpg" alt="Blog page banner" loading="lazy">
    <?php endif; ?>

    <?php if( is_post_type_archive( 'portfolio' )  ): ?>
        <img src="<?php bloginfo('template_directory'); ?>/dist/img/portfolio-banner.jpg" alt="Portfolio page banner" loading="lazy">
    <?php endif; ?>

    <?php if( is_search() ): ?>
        <img src="<?php bloginfo('template_directory'); ?>/dist/img/search-banner.jpg" alt="Search page banner" loading="lazy">
    <?php endif; ?>

    <?php if( $banner_options=='video' ): ?>

        <video autoplay muted loop>
            <source src="<?php echo $banner_video_file; ?>" type="video/mp4">
        </video>

    <?php endif; ?>



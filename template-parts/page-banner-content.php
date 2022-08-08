<?php 
    $page_for_posts = get_queried_object_id();
    $banner_options = get_sub_field( 'banner_options' ); 
    $banner_image_source = get_sub_field( 'banner_image_source' ); 
    $banner_custom_image = get_sub_field( 'banner_custom_image' ); 
    $banner_video_file =  get_sub_field('banner_video_file');

    $featuredimage = get_the_post_thumbnail_url();
?>


    <?php if( $banner_options=='image' ): ?>

        <?php if( $banner_image_source == 'featured' && $featuredimage ): ?>
            <img src="<?php echo $featuredimage; ?>" alt="<?php the_title(); ?>">
        <?php elseif( $banner_image_source == 'custom' && $banner_custom_image ): ?>
            <img src="<?php echo $banner_custom_image; ?>" alt="<?php the_title(); ?>">
        <?php else: ?>

            <?php if( is_front_page() ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/homepage-banner.jpg" alt="Homepage banner" loading="lazy">

            <?php elseif( is_home() ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/homepage-banner.jpg" alt="Blog page banner" loading="lazy">

            <?php elseif( is_singular( 'portfolio' )  ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/portfolio-banner.jpg" alt="Portfolio page banner" loading="lazy">

            <?php else: ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/homepage-banner.jpg" alt="Blog page banner" loading="lazy">    
            <?php endif; ?>

        <?php endif; ?>

    <?php endif; ?>

    <?php if( is_category()  ): ?>
        <img src="<?php bloginfo('template_directory'); ?>/dist/img/portfolio-banner.jpg" alt="Archive page banner" loading="lazy">
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
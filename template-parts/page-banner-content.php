<?php 
    $page_for_posts = get_queried_object_id();
    $banner_options = get_sub_field( 'banner_options' ); 
    $banner_image_source = get_sub_field( 'banner_image_source' ); 
    $banner_custom_image = get_sub_field( 'banner_custom_image' ); 
    $banner_video_file =  get_sub_field('banner_video_file');

    if( $banner_custom_image ) {
        $banner_custom_image_size = $banner_custom_image['sizes']['theme-full'];
        $banner_custom_image_width = $banner_custom_image['sizes'][ 'theme-full-width'];
        $banner_custom_image_height = $banner_custom_image['sizes'][ 'theme-full-height'];
        $banner_custom_image_alt = $banner_custom_image['alt'];
    }
?>

<?php if( is_page() || is_single() ): ?>

    <!-- image banner -->
    <?php if( $banner_options=='image' ): ?>

        <?php if( $banner_image_source == 'featured' && $featuredimage ): ?>
            <picture>
                <source media="(max-width:980px)"
                        srcset="<?php echo the_post_thumbnail_url('theme-large'); ?> 980w">
                <source media="(max-width:768px)"
                        srcset="<?php echo the_post_thumbnail_url('theme-medium'); ?> 768w">
                <source media="(max-width:640px)"
                        srcset="<?php echo the_post_thumbnail_url('theme-small'); ?> 640w">
                <source media="(max-width:425px)"
                        srcset="<?php echo the_post_thumbnail_url('theme-xsmall'); ?> 425w">

                <img src="<?php echo the_post_thumbnail_url('theme-full'); ?>">
            </picture>
            
        <?php elseif( $banner_image_source == 'custom' && $banner_custom_image ): ?>
            <picture>
                <source media="(max-width:980px)"
                        srcset="<?php echo esc_url($banner_custom_image['sizes']['theme-large']); ?> 980w">
                <source media="(max-width:768px)"
                        srcset="<?php echo esc_url($banner_custom_image['sizes']['theme-medium']); ?> 768w">
                <source media="(max-width:640px)"
                        srcset="<?php echo esc_url($banner_custom_image['sizes']['theme-small']); ?> 640w">
                <source media="(max-width:425px)"
                        srcset="<?php echo esc_url($banner_custom_image['sizes']['theme-xsmall']); ?> 425w">
                
                <img src="<?php echo esc_url($banner_custom_image_size); ?>" width="<?php echo esc_attr($banner_custom_image_width); ?>" height="<?php echo esc_attr($banner_custom_image_height); ?>" alt="<?php echo esc_attr($banner_custom_image_alt); ?>" class="img-fluid">
            </picture> 
        <?php else: ?>

            <?php if( is_front_page() ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/homepage-banner.jpg" alt="Homepage banner">

            <?php elseif( is_home() ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/homepage-banner.jpg" alt="Blog page banner">

            <?php elseif( is_singular( 'portfolio' )  ): ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/portfolio-banner.jpg" alt="Portfolio page banner">

            <?php else: ?>
                <img src="<?php bloginfo('template_directory'); ?>/dist/img/homepage-banner.jpg" alt="Blog page banner">    
            <?php endif; ?>

        <?php endif; ?>

    <?php endif; ?>

    <!-- video banner -->
    <?php if( $banner_options=='video' ): ?>

        <video autoplay muted loop>
            <source src="<?php echo esc_url($banner_video_file); ?>" type="video/mp4">
        </video>

    <?php endif; ?>

<?php else: ?>

    <?php if( is_category()  ): ?>
        <img src="<?php bloginfo('template_directory'); ?>/dist/img/portfolio-banner.jpg" alt="Archive page banner">
    <?php endif; ?>

    <?php if( is_post_type_archive( 'portfolio' )  ): ?>
        <img src="<?php bloginfo('template_directory'); ?>/dist/img/portfolio-banner.jpg" alt="Portfolio page banner">
    <?php endif; ?>

    <?php if( is_search() ): ?>
        <img src="<?php bloginfo('template_directory'); ?>/dist/img/search-banner.jpg" alt="Search page banner">
    <?php endif; ?>

<?php endif; ?>
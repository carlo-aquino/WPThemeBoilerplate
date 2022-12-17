<?php
    global $post; 
    $page_for_posts = get_queried_object_id(); 
    $post = get_post( $page_for_posts ); 
    setup_postdata( $post ); 

    $header_toggle = get_field( 'header_toggle', 'option' );
    $company_name = get_field( 'company_name', 'option' );
    $favicon = get_field( 'favicon', 'option' );

    if( have_rows('custom_header', 'option') ) {
        while( have_rows('custom_header', 'option') ) {
            the_row();
            $header_type = get_sub_field( 'header_type', 'option' );
        } 
    }   

    $header_code_toggle = get_field( 'header_code_toggle', 'option' );
    $header_code_content = get_field( 'header_code_content', 'option' );
    $body_code_toggle = get_field( 'body_code_toggle', 'option' );
    $body_code_content = get_field( 'body_code_content', 'option' );

    $current_category = get_queried_object();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5">
    <meta name="robots" content="index,follow">
    <title>
        <?php
            if( is_search() ) {
                echo 'Search Results';
            } elseif( is_category() ) {
                echo 'Archive - ' .  $current_category->name;
            } elseif( is_post_type_archive( 'portfolio' ) ) {
                echo 'Portfolio';
            } elseif( is_404() ) {
                echo 'Page not found';
            } else {
                echo the_title( get_post_format() );
                if( is_front_page() ) { echo ' | ' . esc_html($company_name); }
            }
        ?>
    </title>

    <?php 
        if( $header_code_toggle ) {

            if( $header_code_content ) {
                echo $header_code_content;
            }

        }  
    ?>

    <?php if( $favicon ): ?>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($favicon); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
    
    <?php get_template_part( 'template-parts/theme', 'style' ); ?>
</head>

<body <?php body_class(); ?>>
    <?php 
        if( $body_code_toggle ) {

            if( $body_code_content ) {
                echo $body_code_content;
            }

        }  

        if( $header_toggle && !is_404() ) {
            if( $header_type == 'header-01' ) {
                get_template_part( 'template-parts/headers/header', '01' );
            }
        }
    ?>   
    

    
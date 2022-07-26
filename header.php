<?php
    global $post; 
    $page_for_posts = get_queried_object_id(); 
    $post = get_post( $page_for_posts ); 
    setup_postdata( $post ); 

    $company_name = get_field( 'company_name', 'option' );
    $favicon = get_field( 'favicon', 'option' );
    $site_width = get_field( 'site_width', 'option' );

    if( have_rows('custom_header', 'option') ) {
        while( have_rows('custom_header', 'option') ) {
            the_row();
            $header_type = get_sub_field( 'header_type', 'option' );
        } 
    }   

    if( have_rows('site_colors', 'option') ) {
        while( have_rows('site_colors', 'option') ) {
            the_row();
            $primary_color = get_sub_field( 'primary_color', 'option' );
            $secondary_color = get_sub_field( 'secondary_color', 'option' );
            $accent_color = get_sub_field( 'accent_color', 'option' );
            $heading_text_color = get_sub_field( 'heading_text_color', 'option' );
            $body_text_color = get_sub_field( 'body_text_color', 'option' );
        } 
    }  

    $header_code_toggle = get_field( 'header_code_toggle', 'option' );
    $header_code_content = get_field( 'header_code_content', 'option' );
    $body_code_toggle = get_field( 'body_code_toggle', 'option' );
    $body_code_content = get_field( 'body_code_content', 'option' );

    $page_color = get_field( 'page_color' );
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
                echo 'Archive';
            } elseif( is_post_type_archive( 'portfolio' ) ) {
                echo 'Portfolio';
            } elseif( is_404() ) {
                echo 'Page not found';
            } else {
                echo the_title( get_post_format() );
                if( is_front_page() ) { echo ' | ' . $company_name; }
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

    <link rel="preload" as="font">
    <link rel="shortcut icon" type="image/jpg" href="<?php if( $favicon ): echo $favicon; endif; ?>">
    <?php wp_head(); ?>
    
    <style>
        <?php if( $site_width ) : ?>
            .content-limit {
                max-width: <?php if( $site_width ) { echo $site_width; } ?>px;
            }
        <?php endif; ?>

        <?php if( $page_color ): ?>
            html, body {
                background: <?php echo $page_color; ?>
            }
        <?php endif; ?>
            
        <?php if( $primary_color ): ?>
            h1, h2, h3, h4, h5, h6 {
                color: <?php echo $primary_color; ?>;
            }

            #header-01 {
                background: <?php echo $primary_color; ?>;
            }

            #header-01 .header-right nav ul li.featured-link > a:hover {
                color: <?php echo $primary_color; ?>;
            }

            #header-01-mobile-header {
                background: <?php echo $primary_color; ?>;
            }

            .mobile-header__drawer-content nav ul li ul li ul {
                background: <?php echo $primary_color; ?>;
            }

            .mobile-header__drawer-content nav ul li ul li a {
                color: <?php echo $primary_color; ?>;
            }

            .mobile-header__drawer-container {
                background: <?php echo $primary_color; ?>;
            }

            #footer-01 div.subscription-wrapper {
                background: <?php echo $primary_color; ?>;
            }

            #footer-02 div.global-footer__row-01 {
                background-color: <?php echo $primary_color; ?>;
            }

            .socialmedia-wrapper .socialmedia-icons a {
                color: <?php echo $primary_color; ?>;
            }

            .page-content__search-item h2 a {
                color: <?php echo $primary_color; ?>;
            }

            .page-404__right-content__container h3 {
                color: <?php echo $primary_color; ?>;
            }

            .booking-module__wrapper {
                background: <?php echo $primary_color; ?>;
            }

            .booking-module div.ea-bootstrap form .calendar .ui-datepicker-calendar td:hover {
                background-color: <?php echo $primary_color; ?>;
            }

            .booking-module div.ea-bootstrap form .calendar .ui-datepicker-calendar tr.time-row td div.time a.time-value:hover {
                background-color: <?php echo $primary_color; ?>;
            }

            .featured-slider-module__wrapper.swiper-wrapper--right {
                background-color: <?php echo $primary_color; ?>;
            }

            .slider-module__arrow.swiper-button-prev::after,
            .slider-module__arrow.swiper-button-next::after {
                color: <?php echo $primary_color; ?>;
            }

            .tab-module__heading-wrapper li.active {
                border-color: <?php echo $primary_color; ?>;
            }

            .tab-module__content label {
                background-color: <?php echo $primary_color; ?>;
            }

            .accordion-module__content label {
                background-color: <?php echo $primary_color; ?>;
            }

            .wpcf7-form div.contact-us__form input[type=email]:focus,
            .wpcf7-form div.contact-us__form input[type=tel]:focus,
            .wpcf7-form div.contact-us__form input[type=text]:focus,
            .wpcf7-form div.contact-us__form textarea:focus {
                outline-color: <?php echo $primary_color; ?>;
            }
        <?php endif; ?>

        <?php if( $secondary_color ): ?>
            .page-content__search-results__left span strong {
                color: <?php echo $secondary_color; ?>;
            }

            .page-content__search-item span a:hover {
                color: <?php echo $secondary_color; ?>;
            }

            .page-content__search-pagination a {
                color: <?php echo $secondary_color; ?>;
                border-color: <?php echo $secondary_color; ?>;
                color: <?php echo $secondary_color; ?>
            }

            .page-content__search-pagination a:hover {
                background: <?php echo $secondary_color; ?>;
                border-color: <?php echo $secondary_color; ?>;
            }

            .page-404__right-content__quick-links__links ul li a {
                background-color: <?php echo $secondary_color; ?>;
                border-color: <?php echo $secondary_color; ?>;
            }

            .page-404__right-content__quick-links__links ul li a:hover {
                border-color: <?php echo $secondary_color; ?>;
                color: <?php echo $secondary_color; ?>;
            }

            .button-module__wrapper span {
                background: <?php echo $secondary_color; ?>;
                border: 1px solid <?php echo $secondary_color; ?>;
            }

            .button-module__wrapper span:hover {
                color: <?php echo $secondary_color; ?>;
                border-color: <?php echo $secondary_color; ?>;
            }

            .button-module--reverse span {
                background: transparent;
                color: <?php echo $secondary_color; ?>;
            }

            .button-module--reverse span:hover {
                background: <?php echo $secondary_color; ?>;
                color: #fff;
            }
        <?php endif; ?>

        <?php if( $accent_color ): ?>
            a, a:hover {
                color: <?php echo $accent_color; ?>; 
            }

            #header-01 .header-right nav ul li.featured-link > a {
                background-color: <?php echo $accent_color; ?>;
            }

            #header-01 .header-right nav ul li ul li:hover {
                background: <?php echo $accent_color; ?>;
            }

            #header-01 .header-right nav ul li:hover > a {
                border-bottom: 5px solid <?php echo $accent_color; ?>;
            }

            .mobile-header__drawer-content nav ul li ul li {
                color: <?php echo $accent_color; ?>;
            }

            .add-icon {
                color: <?php echo $accent_color; ?>;
            }

            .add-icon-02 {
                color: <?php echo $accent_color; ?>;
            }

            .add-icon-03 {
                color: <?php echo $accent_color; ?>;
            }

            .wpcf7-form div.subscription-form__wrapper input[type=submit] {
                background: <?php echo $accent_color; ?>;
                border-color: <?php echo $accent_color; ?>;
            }

            .wpcf7-form div.subscription-form__wrapper input[type=submit]:hover {
                border-color: <?php echo $accent_color; ?>;
                color: <?php echo $accent_color; ?>;
            }

            #footer-02 div.global-footer__row-02__col-02 div.contact-info a {
                color: <?php echo $accent_color; ?>;
            }

            .page-content__search-results__left span strong {
                color: <?php echo $accent_color; ?>;
            }

            .button-module__wrapper span {
                background: <?php echo $accent_color; ?>;
            }

            .button-module__wrapper span:hover {
                border-color: <?php echo $accent_color; ?>;
                color: <?php echo $accent_color; ?>;
            }

            .booking-module div.bootstrap form .calendar .ui-datepicker-calendar td.ui-datepicker-current-day {
                background-color: <?php echo $accent_color; ?>;
            }

            .booking-module div.bootstrap form .calendar .ui-datepicker-calendar tr.time-row td div.time a.selected-time {
                background-color: <?php echo $accent_color; ?>;
            }

            .booking-module div.ea-bootstrap form div.final div.form-group div.ea-actions-group button.ea-submit {
                background-color: <?php echo $accent_color; ?>;
                border-color: <?php echo $accent_color; ?>;
            }

            .booking-module div.ea-bootstrap form div.final div.form-group div.ea-actions-group button.ea-submit:hover {
                border-color: <?php echo $accent_color; ?>;
                color: <?php echo $accent_color; ?>;
            }

            .booking-module div.ea-bootstrap form div.final div.form-group div.ea-actions-group button.ea-cancel {
                border-color: <?php echo $accent_color; ?>;
                color: <?php echo $accent_color; ?>;
            }

            .booking-module div.ea-bootstrap form div.final div.form-group div.ea-actions-group button.ea-cancel:hover {
                background-color: <?php echo $accent_color; ?>;
            }

            .featured-slider-module__cards.slider-left .text-module h3 span,
            .featured-slider-module__cards.slider-mobile .text-module h3 span {
                background-color: <?php echo $accent_color; ?>;
            }

            .featured-slider-module__cards.slider-right .swiper-scrollbar-drag {
                background: <?php echo $accent_color; ?>;
            }
        <?php endif; ?>

        <?php if( $heading_text_color ): ?>
            h1, h2, h3, h4, h5, h6 {
                color: <?php echo $heading_text_color; ?>;
            }
        <?php endif; ?>

        <?php if( $body_text_color ): ?>
            p, ol, ul, li, span {
                color: <?php echo $body_text_color; ?>;
            }

            .grid-module__cards__card.type-one {
                color: <?php echo $body_text_color; ?>;
            }

            .wpcf7-form div.contact-us__form-footer span.wpcf7-acceptance span.wpcf7-list-item {
                color: <?php echo $body_text_color; ?>;
            }
        <?php endif; ?>
    </style> 
</head>

<body>
    <?php 
        if( $body_code_toggle ) {

            if( $body_code_content ) {
                echo $body_code_content;
            }

        }  

        if( $header_type == 'header-01' ) {
            get_template_part( 'template-parts/headers/header', '01' );
        }
    ?>   
    

    
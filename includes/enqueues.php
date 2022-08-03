<?php

    function site_scripts() {
        //include CSS
        wp_enqueue_style('aosCSS', get_template_directory_uri() . '/dist/css/aos.css');
        wp_enqueue_style('swiperjsCSS', get_template_directory_uri() . '/dist/css/swiper-bundle.min.css');
        wp_enqueue_style('mainCSS', get_template_directory_uri() . '/dist/css/main.css');
        wp_enqueue_style('defaultCSS', get_template_directory_uri() . '/style.css');

        //include JS
        wp_enqueue_script('aosJS', get_theme_file_uri('/dist/js/aos.js'), array( 'jquery' ), '1.0', true);
        wp_enqueue_script('colcadeJS', get_theme_file_uri('/dist/js/colcade.js'), array( 'jquery' ), '1.0', true);
        wp_enqueue_script('swiperJS_js', get_theme_file_uri('/dist/js/swiper-bundle.min.js'), array( 'jquery' ), '1.0', true);
        wp_enqueue_script('customJS', get_theme_file_uri('/dist/js/main.js'), array( 'jquery' ), '1.0', true);
    }

    add_action('wp_enqueue_scripts', 'site_scripts');
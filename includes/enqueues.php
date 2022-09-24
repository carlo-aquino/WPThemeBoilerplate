<?php

    function site_scripts() {
        //include CSS
        wp_enqueue_style('swiperCSS', get_template_directory_uri() . '/dist/css/swiper-bundle.min.css');
        wp_enqueue_style('mainCSS', get_template_directory_uri() . '/dist/css/main.min.css');
        wp_enqueue_style('defaultCSS', get_template_directory_uri() . '/style.css');

        //include JS
        wp_enqueue_script('swiperJS', get_theme_file_uri('/dist/js/swiper-bundle.min.js'), array( 'jquery' ), '1.0', true);
        wp_enqueue_script('mainJS', get_theme_file_uri('/dist/js/main.min.js'), array( 'jquery' ), '1.0', true);
    }

    add_action('wp_enqueue_scripts', 'site_scripts');
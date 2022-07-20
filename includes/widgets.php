<?php

    function header_widget_01_init() {

        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name'          => 'Header Widget 01',
                'id'            => 'header-widget-01',
                'before_widget' => '<li>',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="header-widget-01__title">',
                'after_title'   => '</h2>',
            ) );
        }

    }

    function header_widget_02_init() {

        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name'          => 'Header Widget 02',
                'id'            => 'header-widget-02',
                'before_widget' => '<li>',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="header-widget-02__title">',
                'after_title'   => '</h2>',
            ) );
        }

    }

    function header_widget_03_init() {

        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name'          => 'Header Widget 03',
                'id'            => 'header-widget-03',
                'before_widget' => '<li>',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="header-widget-03__title">',
                'after_title'   => '</h2>',
            ) );
        }

    }

    function footer_widget_01_init() {

        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name'          => 'Footer Widget 01',
                'id'            => 'footer-widget-01',
                'before_widget' => '<li>',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="footer-widget-01__title">',
                'after_title'   => '</h2>',
            ) );
        }

    }

    function footer_widget_02_init() {

        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name'          => 'Footer Widget 02',
                'id'            => 'footer-widget-02',
                'before_widget' => '<li>',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="footer-widget-02__title">',
                'after_title'   => '</h2>',
            ) );
        }

    }

    function footer_widget_03_init() {

        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name'          => 'Footer Widget 03',
                'id'            => 'footer-widget-03',
                'before_widget' => '<li>',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="footer-widget-03__title">',
                'after_title'   => '</h2>',
            ) );
        }

    }

    function footer_widget_04_init() {

        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name'          => 'Footer Widget 04',
                'id'            => 'footer-widget-04',
                'before_widget' => '<li>',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="footer-widget-04__title">',
                'after_title'   => '</h2>',
            ) );
        }

    }

    function copyright_widget_init() {

        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name'          => 'Copyright Widget',
                'id'            => 'copyright-widget',
                'before_widget' => '<li>',
                'after_widget'  => '</li>',
                'before_title'  => '<h2 class="copyright-widget__title">',
                'after_title'   => '</h2>',
            ) );
        }

    }

    add_action( 'widgets_init', 'header_widget_01_init' );
    add_action( 'widgets_init', 'header_widget_02_init' );
    add_action( 'widgets_init', 'header_widget_03_init' );

    add_action( 'widgets_init', 'footer_widget_01_init' );
    add_action( 'widgets_init', 'footer_widget_02_init' );
    add_action( 'widgets_init', 'footer_widget_03_init' );
    add_action( 'widgets_init', 'footer_widget_04_init' );
    add_action( 'widgets_init', 'copyright_widget_init' );
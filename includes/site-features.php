<?php

    function site_features() {
        //register menus
        register_nav_menu('global_menu', 'Global Menu');
        register_nav_menu('footer_menu', 'Footer Menu');
        register_nav_menu('menu_404', '404 Menu');
        register_nav_menu('search_menu', 'Search Menu');
        
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('widgets');

        // deactivate new block editor
        remove_theme_support( 'widgets-block-editor' );
    }

    add_action( 'after_setup_theme', 'site_features' );
    add_post_type_support( 'page', 'excerpt' );

    function globalMenu() {
        $menu = wp_nav_menu( array(
            'theme_location'    => 'global_menu',
            'container'         => 'nav'
        ));

        $menu = str_replace("\n", "", $menu);
        $menu = str_replace("\r", "", $menu);
        echo wp_kses_post($menu);
    }

    function footerMenu() {
        $menu = wp_nav_menu( array(
            'theme_location'    => 'footer_menu',
            'container'         => 'nav'
        ));

        $menu = str_replace("\n", "", $menu);
        $menu = str_replace("\r", "", $menu);
        echo wp_kses_post($menu);
    }

    function menu404() {
        $menu = wp_nav_menu( array(
            'theme_location'    => 'menu_404',
            'container'         => 'nav'
        ));

        $menu = str_replace("\n", "", $menu);
        $menu = str_replace("\r", "", $menu);
        echo wp_kses_post($menu);
    }

    function searchMenu() {
        $menu = wp_nav_menu( array(
            'theme_location'    => 'search_menu',
            'container'         => 'div'
        ));

        $menu = str_replace("\n", "", $menu);
        $menu = str_replace("\r", "", $menu);
        echo wp_kses_post($menu);
    }

    // Image sizes
    add_image_size('theme-xsmall', 425, 425, false);
    add_image_size('theme-small', 640, 640, false);
    add_image_size('theme-medium', 768, 768, false);
    add_image_size('theme-large', 980, 980, false);
    add_image_size('theme-xlarge', 1366, 1366, false);
    add_image_size('theme-full', 1920, 1920, false);
    


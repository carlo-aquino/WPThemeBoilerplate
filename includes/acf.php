<?php

    if( function_exists('acf_add_options_page') ) {
                
        acf_add_options_page( array(
            'page_title' 	=> 'Theme General Settings',
            'menu_title'	=> 'Theme Options',
            'menu_slug' 	=> 'site-general-settings',
            'capability'	=> 'edit_posts',
            'icon_url'      => 'dashicons-admin-tools',
            'redirect'		=> true
        ));
        
        acf_add_options_sub_page( array(
            'page_title' 	=> 'Theme General Settings',
            'menu_title'	=> 'Company Info',
            'parent_slug'	=> 'site-general-settings',
        ));

        acf_add_options_sub_page( array(
            'page_title' 	=> 'Layout Settings',
            'menu_title'	=> 'Layout',
            'parent_slug'	=> 'site-general-settings',
        ));

        acf_add_options_sub_page( array(
            'page_title' 	=> 'Logo & Favicon Settings',
            'menu_title'	=> 'Logo & Favicon',
            'parent_slug'	=> 'site-general-settings',
        ));

        acf_add_options_sub_page( array(
            'page_title' 	=> 'Header Settings',
            'menu_title'	=> 'Header',
            'parent_slug'	=> 'site-general-settings',
        ));

        acf_add_options_sub_page( array(
            'page_title' 	=> 'Footer Settings',
            'menu_title'	=> 'Footer',
            'parent_slug'	=> 'site-general-settings',
        ));
        
        acf_add_options_sub_page( array(
            'page_title' 	=> 'APIs/IDs/Shortcodes Settings',
            'menu_title'	=> 'APIs/IDs/Shortcodes',
            'parent_slug'	=> 'site-general-settings',
        ));

        acf_add_options_sub_page( array(
            'page_title' 	=> 'Social Media Settings',
            'menu_title'	=> 'Social Media',
            'parent_slug'	=> 'site-general-settings',
        ));

        acf_add_options_sub_page( array(
            'page_title' 	=> 'Code Integration',
            'menu_title'	=> 'Integration',
            'parent_slug'	=> 'site-general-settings',
        ));
    }
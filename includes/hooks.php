<?php

    // Contact Form 7: form to Custom DB Hook
    // function contactform7_before_send_mail($form_to_DB) {
    //     if ($form_to_DB->id === 807) {
    //         $mydb = new wpdb( 'db_user', 'db_password', 'db_name', 'localhost' );
    //         $form_to_DB = WPCF7_Submission::get_instance();
    //         if ( $form_to_DB )
    //             $formData = $form_to_DB->get_posted_data();
    //         $name = $formData['your-name'];
    //         $contact = $formData['tel-743'];
    //         $email = $formData['your-email'];
    //         $message = $formData['textarea-474'];
    //         $remote_ip = get_ip_address();

    //         $mydb->insert( 'db_table_name', array( 'name' => $name, 'contact' => $contact, 'email' => $email, 'message' => $message, 'remote_ip' => $remote_ip ), array( '%s' ) );

    //         remove_all_filters( 'wpcf7_before_send_mail' );
    //     }
    // }

    // add_action( 'wpcf7_before_send_mail', 'contactform7_before_send_mail' );

    



    
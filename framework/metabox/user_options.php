<?php

    $cmb = new_cmb2_box( array(
        'id'            => 'user_options',
        'title'         => esc_html__( 'User Options', 'gridos' ),
        'object_types'  => array( 'user'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

    $cmb->add_field( array(
        'name'       => esc_html__( 'User Occupation', 'gridos' ),
        'desc'     => esc_html__( 'Occupation', 'gridos' ),
        'id'         => $prefix . 'occupation',
        'type'       => 'text',
    ) );
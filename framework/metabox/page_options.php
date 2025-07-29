<?php


$cmb = new_cmb2_box( array(
    'id'            => 'page_options',
    'title'         => esc_html__( 'Page Settings', 'gridos' ),
    'object_types'  => array( 'page' ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
) );

$cmb->add_field(
    array(
            'name'     => esc_html__( 'Banner Title', 'gridos' ),
            'desc'     => esc_html__( 'Page Banner Title', 'gridos' ),
            'id'       => $prefix . 'banner_title',
            'type'     => 'text',
            'on_front' => false,
        )
);

$cmb->add_field(
    array(
            'name'     => esc_html__( 'Banner SubTitle', 'gridos' ),
            'desc'     => esc_html__( 'Page Banner SubTittle', 'gridos' ),
            'id'       => $prefix . 'banner_subtitle',
            'type'     => 'text',
            'on_front' => false,
        )
);

$cmb->add_field(
    array(
            'name'     => esc_html__( 'Banner Image', 'gridos' ),
            'desc'     => esc_html__( 'Page Banner SubTittle', 'gridos' ),
            'id'       => $prefix . 'banner_image',
            'type'     => 'file',
            'on_front' => false,
        )
);





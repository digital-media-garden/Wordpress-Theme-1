<?php
function geniuscourses_acf_metaboxes(){

    acf_add_local_field_group(array(
        'key' => 'acf_carsettings',
        'title' => 'Car Settings For ACF from Code',
        'fields' => array(
            array(
                'key' => 'custom_price',
                'label' => 'Car Price',
                'name' => 'custom_price',
                'type' => 'text',
            ),
            array(
                'key' => 'custom_engine_type',
                'label' => 'Car Engine Type',
                'name' => 'custom_engine_type',
                'type' => 'select',
                'choices' => array(
                    'manual' => esc_html__('Manual','geniuscourses'),
                    'automatic' => 'Automatic'
                ),
                'allow_null' => 1,
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'car',
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal', // side | acf_after_title
        'style' => 'default', // seamless
        'label_placement' => 'top', //left
        'instruction_placement' => 'label', //field
        'hode_one_screen' => array(),
    ));
}
add_action('acf/init', 'geniuscourses_acf_metaboxes');
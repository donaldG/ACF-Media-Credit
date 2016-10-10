<?php
if( function_exists('register_field_group') ):

register_field_group(array (
    'key' => 'group_548e1e149b239',
    'title' => 'Media Credit',
    'fields' => array (
        array (
            'key' => 'field_548e1e18a4b85',
            'label' => 'Media Credit',
            'name' => 'media_credit',
            'prefix' => '',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => 'acf_media_credit_admin',
            ),
            'min' => '',
            'max' => '',
            'layout' => 'row',
            'button_label' => 'Add Credit',
            'sub_fields' => array (
                array (
                    'key' => 'field_548e1e21a4b86',
                    'label' => 'Credit',
                    'name' => 'credit',
                    'prefix' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '©iStock.com/user',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ),
                array (
                    'key' => 'field_548e1e28a4b87',
                    'label' => 'Credit Link',
                    'name' => 'credit_link',
                    'prefix' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'http://www.istockphoto.com/user/',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'readonly' => 0,
                    'disabled' => 0,
                ),
            ),
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'attachment',
                'operator' => '==',
                'value' => 'all',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
));

endif;
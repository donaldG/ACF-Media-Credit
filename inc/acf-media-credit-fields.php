<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_media-credit',
		'title' => 'Media Credit',
		'fields' => array (
			array (
				'key' => 'field_548e1e18a4b85',
				'label' => 'Media Credit',
				'name' => 'media_credit',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_548e1e21a4b86',
						'label' => 'Credit',
						'name' => 'credit',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '©iStock.com/user',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_548e1e28a4b87',
						'label' => 'Credit Link',
						'name' => 'credit_link',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'http://www.istockphoto.com/user/',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Credit',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_media',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

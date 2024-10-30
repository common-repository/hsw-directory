<?php

global $wp_customize;

$wp_customize->add_panel( 'hsw_dir_panel', array (
	'priority'       => 5000,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __('HSW Directory', 'hsw-directory'),
	'description'    => __('HSW Directory Panel', 'hsw-directory'),
));

$customizer_Settings = array(
	// global settings
	array (
		'section' => 'hsw_dir_settings',
		'panel' => 'hsw_dir_panel',
		'title' => 'Settings',
		'items' => array (
			// load bootstrap
			array (
				'name' => 'hsw_dir_load_bootstrap',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Load Boostrap Grid',
					'description' => 'Load the Bootstrap 4 Grid CSS?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// load bootstrap
			array (
				'name' => 'hsw_dir_load_font_awesome',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Load Font Awesome 5',
					'description' => 'Load the Font Awesome 5 Icons?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// template to use
			array (
				'name' => 'hsw_dir_template',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'default'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Template',
					'description' => 'Which template would you like to use?',
					'choices' => array(
						'default' => __('default', 'hsw-directory'),
					)
				)
			),
			// load template css
			array (
				'name' => 'hsw_dir_load_css',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Load Template CSS',
					'description' => 'Load this templates CSS?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show filters
			array (
				'name' => 'hsw_dir_show_filters',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show the Filter Box',
					'description' => 'Would you to show the filter box?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show taxonomy 1 filter
			array (
				'name' => 'hsw_dir_show_taxonomy_1_filter',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Taxonomy 1 Filter',
					'description' => 'Would you to show the filter for taxonomy 1?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show taxonomy 2 filter
			array (
				'name' => 'hsw_dir_show_taxonomy_2_filter',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Taxonomy 2 Filter',
					'description' => 'Would you to show the filter for taxonomy 2?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show keyword filter
			array (
				'name' => 'hsw_dir_show_keyword_filter',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Keyword Filter',
					'description' => 'Would you to show the keyword filter?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show page count
			array (
				'name' => 'hsw_dir_show_page_count',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show the Page Count',
					'description' => 'Would you to show the page count?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show top pager
			array (
				'name' => 'hsw_dir_show_top_pager',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show the Top Pager',
					'description' => 'Would you to show the top pager?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show bottom pager
			array (
				'name' => 'hsw_dir_show_bottom_pager',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show the Bottom Pager',
					'description' => 'Would you to show the bottom pager?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show contact form
			array (
				'name' => 'hsw_dir_show_contact_form',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show the Contact Form',
					'description' => 'Would you to show the contact form?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show item short description
			array (
				'name' => 'hsw_dir_show_item_short_description',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Item Short Description',
					'description' => 'Would you to show the short descriptions on the list items?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show item taxonomy 1
			array (
				'name' => 'hsw_dir_show_item_taxonomy_1',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Item Taxonomy 1',
					'description' => 'Would you to show taxonomy 1 on the list items?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show item taxonomy 2
			array (
				'name' => 'hsw_dir_show_item_taxonomy_2',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Item Taxonomy 2',
					'description' => 'Would you to show taxonomy 2 on the list items?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show item phone
			array (
				'name' => 'hsw_dir_show_item_phone_number',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Item Phone Number',
					'description' => 'Would you to show the phone number on the list items?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show item address
			array (
				'name' => 'hsw_dir_show_item_address',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Item Address',
					'description' => 'Would you to show the address on the list items?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show item kv pairs
			array (
				'name' => 'hsw_dir_show_item_key_value_pairs',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Item Key Value Pairs',
					'description' => 'Would you to show the key values pairs on the list items?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show item extra icon
			array (
				'name' => 'hsw_dir_show_item_extra_icon',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Item Extra Dropdown',
					'description' => 'Would you to show the extra dropdown icon on the list items?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show item social icons
			array (
				'name' => 'hsw_dir_show_item_social_icons',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Item Social Icons',
					'description' => 'Would you to show the social icons on the list items?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// show item post content
			array (
				'name' => 'hsw_dir_show_item_post_content',
				'setting' => array (
					'sanitize_callback' => 'hswDirectory::sanitize_select',
					'default' => 'yes'
				),
				'control' => array(
					'type' => 'select',
					'label' => 'Show Item  Post Content',
					'description' => 'Would you to show the list items post content?',
					'choices' => array(
						'yes' => __('Yes', 'hsw-directory'),
						'no' => __('No', 'hsw-directory')
					)
				)
			),
			// items per row
			array (
				'name' => 'hsw_dir_items_per_row',
				'setting' => array (
					'sanitize_callback' => 'absint',
					'default' => 1
				),
				'control' => array(
					'type' => 'number',
					'label' => 'Items Per Row',
					'description' => 'How many items to show per row?',
				)
			),
			// items per page
			array (
				'name' => 'hsw_dir_items_per_page',
				'setting' => array (
					'sanitize_callback' => 'absint',
					'default' => 10
				),
				'control' => array(
					'type' => 'number',
					'label' => 'Items Per Page',
					'description' => 'How many items to show per page?',
				)
			)
		)
),

array(
	'section' => 'hsw_dir_labels',
	'panel' => 'hsw_dir_panel',
	'title' => 'Labels',
	'items' => array (
// send
		array (
			'name' => 'hsw_dir_label_send',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'Send'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Send',
				'description' => 'Various Send labels.',
			)
		),
// tax 1 heading
		array (
			'name' => 'hsw_dir_label_tax_1_filter_heading',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'Taxonomy 1'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Taxonomy 1 Filter Heading',
				'description' => 'Label for the Taxonomy 1 filter?',
			)
		),
// tax 1 all
		array (
			'name' => 'hsw_dir_label_tax_1_filter_select',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'All'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Taxonomy 1 Filter Select',
				'description' => 'Label for the Taxonomy 1 select?',
			)
		),
// tax 2 heading
		array (
			'name' => 'hsw_dir_label_tax_2_filter_heading',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'Taxonomy 2'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Taxonomy 2 Filter Heading',
				'description' => 'Label for the Taxonomy 2 filter?',
			)
		),
// tax 2 all
		array (
			'name' => 'hsw_dir_label_tax_2_filter_select',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'All'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Taxonomy 2 Filter Select',
				'description' => 'Label for the Taxonomy 2 select?',
			)
		),
// keyword heading
		array (
			'name' => 'hsw_dir_label_keyword_heading',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'Keyword'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Keyword Filter Heading',
				'description' => 'Label for the Keyword filter?',
			)
		),
// search button
		array (
			'name' => 'hsw_dir_label_search_button',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'Search'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Search Button',
				'description' => 'Label for the search button?',
			)
		),
// featured tag
		array (
			'name' => 'hsw_dir_label_featured',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'FEATURED'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Featured Tag',
				'description' => 'Label for the featured tag?',
			)
		),
// contact heading
		array (
			'name' => 'hsw_dir_label_contact_heading',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'Send Message'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Contact Form Heading',
				'description' => 'Label for the contact form heading?',
			)
		),
		// contact email
		array (
			'name' => 'hsw_dir_label_your_email',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'Your Email*'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Your Email Placeholder',
				'description' => 'Label for the contact form email?',
			)
		),
// contact email
		array (
			'name' => 'hsw_dir_label_contact_message',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => 'Contact Message*'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Message Placeholder',
				'description' => 'Label for the contact form message?',
			)
		)
	)
),


array (
	'section' => 'hsw_dir_map',
	'panel' => 'hsw_dir_panel',
	'title' => 'Map',
	'items' => array (
		// show map
		array (
			'name' => 'hsw_dir_show_map',
			'setting' => array (
				'sanitize_callback' => 'hswDirectory::sanitize_select',
				'default' => 'no'
			),
			'control' => array(
				'type' => 'select',
				'label' => 'Show Map',
				'description' => 'Show the map?',
				'choices' => array(
					'yes' => __('Yes', 'hsw-directory'),
					'no' => __('No', 'hsw-directory')
				)
			)
		),
		// mapbox access token
		array (
			'name' => 'hsw_dir_mapbox_access_token',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => ''
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Mapbox Access Token',
				'description' => 'Enter you Mapbox Access Token.',
			)
		),
		// default lng
		array (
			'name' => 'hsw_dir_map_dlng',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => '-2.091068'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Default Map Position LNG',
				'description' => 'Where to position the map on first load?',
			)
		),
		// default lat
		array (
			'name' => 'hsw_dir_map_dlat',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => '55.869058'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Default Map Position LAT',
				'description' => 'Where to position the map on first load?',
			)
		),
		// default zoom
		array (
			'name' => 'hsw_dir_map_dzoom',
			'setting' => array (
				'sanitize_callback' => 'absint',
				'default' => 10
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Default Map Zoom',
				'description' => 'Default Zoom Level for the map?',
			)
		),
		// max zoom
		array (
			'name' => 'hsw_dir_map_max_zoom',
			'setting' => array (
				'sanitize_callback' => 'absint',
				'default' => 14
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Max Map Zoom',
				'description' => 'Max Zoom Level for the map?',
			)
		),
		// scroll zoom
		array (
			'name' => 'hsw_dir_map_dscrollzoom',
			'setting' => array (
				'sanitize_callback' => 'hswDirectory::sanitize_select',
				'default' => 'false'
			),
			'control' => array(
				'type' => 'select',
				'label' => 'Allow Scroll Zooming',
				'description' => 'Allow the scroll wheel to zoom the map?',
				'choices' => array(
					'true' => __('Yes', 'hsw-directory'),
					'false' => __('No', 'hsw-directory')
				)
			)
		),
		// enable clusters
		array (
			'name' => 'hsw_dir_map_use_clusters',
			'setting' => array (
				'sanitize_callback' => 'hswDirectory::sanitize_select',
				'default' => 'true'
			),
			'control' => array(
				'type' => 'select',
				'label' => 'Use Clusters',
				'description' => 'Cluster nearby points on the map?',
				'choices' => array(
					'true' => __('Yes', 'hsw-directory'),
					'false' => __('No', 'hsw-directory')
				)
			)
		),
		// cluster max zoom
		array (
			'name' => 'hsw_dir_map_clusters_max_zoom',
			'setting' => array (
				'sanitize_callback' => 'absint',
				'default' => 12
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Uncluster Zoom',
				'description' => 'Uncluster at which zoom level?',
			)
		),
		// cluster radius
		array (
			'name' => 'hsw_dir_map_cluster_radius',
			'setting' => array (
				'sanitize_callback' => 'absint',
				'default' => 20
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Uncluster Radius',
				'description' => 'The cluster catch radius?',
			)
		),
		// cluster color
		array (
			'name' => 'hsw_dir_map_cluster_color',
			'setting' => array (
				'sanitize_callback' => 'sanitize_hex_color',
				'default' => '#cb2027'
			),
			'control' => array(
				'type' => 'color',
				'label' => 'Cluster Color',
				'description' => 'The color for the clusters?',
			)
		),
		// cluster circle radius
		array (
			'name' => 'hsw_dir_map_cluster_circ_radius',
			'setting' => array (
				'sanitize_callback' => 'absint',
				'default' => 20
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Cluster Circle Radius',
				'description' => 'The cluster circle radius?',
			)
		),
		// cluster opacity
		array (
			'name' => 'hsw_dir_map_cluster_circ_opacity',
			'setting' => array (
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default' => '0.5'
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Cluster Opacity',
				'description' => 'Opacity for the clusters?',
			)
		),
		// cluster text size
		array (
			'name' => 'hsw_dir_map_cluster_text_size',
			'setting' => array (
				'sanitize_callback' => 'absint',
				'default' => 16
			),
			'control' => array(
				'type' => 'text',
				'label' => 'Cluster Text Size',
				'description' => 'The cluster text size?',
			)
		),
		// cluster text color
		array (
			'name' => 'hsw_dir_map_cluster_text_color',
			'setting' => array (
				'sanitize_callback' => 'sanitize_hex_color',
				'default' => '#ffffff'
			),
			'control' => array(
				'type' => 'color',
				'label' => 'Cluster Text Color',
				'description' => 'Cluster text color?',
			)
		),
		// sp circle color
		array (
			'name' => 'hsw_dir_map_sp_circle_color',
			'setting' => array (
				'sanitize_callback' => 'sanitize_hex_color',
				'default' => '#cb2027'
			),
			'control' => array(
				'type' => 'color',
				'label' => 'Point Circle Color',
				'description' => 'Color for single point circles?',
			)
		),
		// sp circle stroke color
		array (
			'name' => 'hsw_dir_map_sp_circle_stroke_color',
			'setting' => array (
				'sanitize_callback' => 'sanitize_hex_color',
				'default' => '#ffffff'
			),
			'control' => array(
				'type' => 'color',
				'label' => 'Point Circle Stroke',
				'description' => 'Color for single point strokes?',
			)
		),
		// sp radius
		array (
			'name' => 'hsw_dir_map_sp_circle_radius',
			'setting' => array (
				'sanitize_callback' => 'absint',
				'default' => 10
			),
			'control' => array(
				'type' => 'number',
				'label' => 'Point Circle Radius',
				'description' => 'Radius for single points?',
			)
		),
		// sp stroke width
		array (
			'name' => 'hsw_dir_map_sp_circle_stroke_width',
			'setting' => array (
				'sanitize_callback' => 'absint',
				'default' => 2
			),
			'control' => array(
				'type' => 'number',
				'label' => 'Point Circle Stroke Width',
				'description' => 'Stroke width for single points?',
			)
		),
		// bounds padding
		array (
			'name' => 'hsw_dir_map_bounds_padding',
			'setting' => array (
				'sanitize_callback' => 'absint',
				'default' => 50
			),
			'control' => array(
				'type' => 'number',
				'label' => 'Map Bounds Padding',
				'description' => 'Pad the edges of the map by this amount.',
			)
		),
	)
),


array (
	'section' => 'hsw_dir_branding',
	'panel' => 'hsw_dir_panel',
	'title' => 'Branding',
	'items' => array (
		// primary color
		array (
			'name' => 'hsw_dir_brand_primary',
			'setting' => array (
				'sanitize_callback' => 'sanitize_hex_color',
				'default' => '#cb2027'
			),
			'control' => array(
				'type' => 'color',
				'label' => 'Primary Color',
				'description' => 'Choose the Primary Color',
			)
		),
		// secondary color
		array (
			'name' => 'hsw_dir_brand_secondary',
			'setting' => array (
				'sanitize_callback' => 'sanitize_hex_color',
				'default' => '#a51b20'
			),
			'control' => array(
				'type' => 'color',
				'label' => 'Secondary Color',
				'description' => 'Choose the Secondary Color',
			)
		)
	)
)

);

// loop

foreach ($customizer_Settings as $k => $v) {

	$wp_customize->add_section( $v['section'] , array(
		'title'    => __( $v['title'], 'hsw-directory' ),
		'priority' => 5000 + $k,
		'panel'  => $v['panel'],
	));

	foreach ($v['items'] as $k2 => $v2) {

		$wp_customize->add_setting( $v2['name'] , array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'santize_callback' => $v2['setting']['sanitize_callback'],
			'default' => $v2['setting']['default']
		));

		// text, number control

		if ( ($v2['control']['type'] == 'text') || ($v2['control']['type'] == 'number') ) {

			$wp_customize->add_control( $v2['name'], array(
				'type' => $v2['control']['type'],
				'priority' => 5000 + $k + $k2,
				'section' => $v['section'],
				'label' => __( $v2['control']['label'], 'hsw-directory'),
				'description' => __( $v2['control']['description'], 'hsw-directory' ),
			)); 
		}

		// select control

		if ($v2['control']['type'] == 'select') {

			$wp_customize->add_control( $v2['name'], array(
				'type' => $v2['control']['type'],
				'priority' => 5000 + $k + $k2,
				'section' => $v['section'],
				'label' => __( $v2['control']['label'], 'hsw-directory'),
				'description' => __( $v2['control']['description'], 'hsw-directory' ),
				'choices' => $v2['control']['choices']
			)); 
		}

		// color control

		if ($v2['control']['type'] == 'color') {

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $v2['name'], array(
				'label' => __( $v2['control']['label'], 'hsw-directory'),
				'section' => $v['section'],
				'settings' => $v2['name'],
				'description' => __( $v2['control']['description'], 'hsw-directory' ),
				'priority' => 5000 + $k + $k2
			) ) );

		}
	}
}
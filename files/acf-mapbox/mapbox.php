<?php
if (!class_exists('acf_field_mapbox')) {
	class acf_field_mapbox extends acf_field
	{
		// vars
		var $settings, // will hold info such as dir / path
			$defaults; // will hold default field options

		/*
		*  __construct
		*
		*  Set name / label needed for actions / filters
		*
		*  @since   3.6
		*  @date	23/01/13
		*/

		function __construct()
		{
			
			$this->name = 'mapbox';
			$this->label = __( 'Mapbox','hsw-directory' );
			$this->category = __( 'jQuery', 'hsw-directory' );
			$this->defaults = array(
				'address' => 'Default Address',
				'lat' => (float)get_theme_mod('hsw_dir_map_dlat', 55.869058),
				'lng' => (float)get_theme_mod('hsw_dir_map_dlng', -2.091068)
			);

			// do not delete!
			parent::__construct();

			// settings
			$this->settings = array(
				'path' => apply_filters('acf/helpers/get_path', __FILE__),
				'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
				'version' => '1.0'
			);

		}

		/*
		*  create_field()
		*
		*  Create the HTML interface for your field
		*
		*  @param   $field - an array holding all the field's data
		*
		*  @type	action
		*  @since   3.6
		*  @date	23/01/13
		*/

		function create_field( $field )
		{
			?>

			<?php if (!isset($field['value']['address']) || !isset($field['value']['lat']) || !isset($field['value']['lng'])) {
				$field['value'] = $this->defaults;
			}
			?>

			<?php if ( (get_theme_mod('hsw_dir_show_map', 'no') == 'yes') && get_theme_mod('hsw_dir_mapbox_access_token', '') ) : ?>

				<input style="width: 100%; margin-bottom: 5px;" class="text" id="<?php echo $field['id']; ?>_address" name="<?php echo $field['name']; ?>[address]" value="<?php echo $field['value']['address']; ?>">
				<input type="hidden" id="<?php echo $field['id']; ?>_lng" name="<?php echo $field['name']; ?>[lng]" value="<?php echo $field['value']['lng']; ?>">
				<input type="hidden" id="<?php echo $field['id']; ?>_lat" name="<?php echo $field['name']; ?>[lat]" value="<?php echo $field['value']['lat']; ?>">

				<a class="button button-primary" id="mapbox-get-loc-<?php echo $field['key']; ?>"><?php _e('Set Location', 'hsw-directory'); ?></a>

				<div id="mapbox_<?php echo $field['key']; ?>" style="width: 100%; height: 300px; margin-top: 5px;"></div>

				<script type="text/javascript">
					mapboxgl.accessToken = '<?php echo esc_attr(get_theme_mod('hsw_dir_mapbox_access_token')); ?>';
					var map = new mapboxgl.Map({
						container: 'mapbox_<?php echo $field["key"]; ?>',
						style: 'mapbox://styles/mapbox/streets-v9',
						center: [<?php echo $field['value']['lng']; ?>, <?php echo $field['value']['lat']; ?>],
						zoom: 9
					});
					var marker = new mapboxgl.Marker().setLngLat([<?php echo $field['value']['lng']; ?>, <?php echo $field['value']['lat']; ?>]).addTo(map);

					$('#mapbox-get-loc-<?php echo $field['key']; ?>').on('click', function() {

						$.getJSON('https://api.mapbox.com/geocoding/v5/mapbox.places/'+encodeURIComponent($('#<?php echo $field['id']; ?>_address').val())+'.json?access_token=<?php echo esc_attr(get_theme_mod('hsw_dir_mapbox_access_token'));?>', function(r) {
							if (!$.isEmptyObject(r['features'])) {
								$('#<?php echo $field['id']; ?>_lng').val(r['features'][0].geometry.coordinates[0])
								$('#<?php echo $field['id']; ?>_lat').val(r['features'][0].geometry.coordinates[1])
								var center = r['features'][0].geometry.coordinates;
								map.easeTo({center: center});
								marker.setLngLat(center)
							}
						});
					})
				</script>

			<?php else : ?>

				<?php echo esc_html(__('Show Map and Mapbox Access Token needed for locations.')); ?>				

			<?php endif; ?>

			<?php 

		}

		/*
		*  input_admin_enqueue_scripts()
		*
		*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
		*  Use this action to add css + javascript to assist your create_field() action.
		*
		*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
		*  @type	action
		*  @since   3.6
		*  @date	23/01/13
		*/

		function input_admin_enqueue_scripts()
		{
			wp_register_script('acf-input-mapbox-core-js', 'https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.js', array());
			wp_register_style('acf-input-mapbox-core-css', 'https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.css', array());

			// scripts
			wp_enqueue_script(array(
				'acf-input-mapbox-core-js'
			));

			// styles
			wp_enqueue_style(array(
				'acf-input-mapbox-core-css'
			));
		}

		/*
		*  create_options()
		*
		*  Create extra options for your field. This is rendered when editing a field.
		*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
		*
		*  @type	action
		*  @since   3.6
		*  @date	23/01/13
		*
		*  @param   $field  - an array holding all the field's data
		*/

		function create_options($field)
		{
			// defaults?
			/*
			$field = array_merge($this->defaults, $field);
			*/

			// key is needed in the field names to correctly save the data
			// $key = $field['name'];

			// Create Field Options HTML

			// USER HEADER

			// echo '<tr class="field_option field_option_' . $this->name . '">';
			// echo '<td class="label">';
			// echo '<label>' . __( "Table Header", 'acf-table' ) . '</label>';
			// 		//echo '<p class="description">' . __( "", 'acf' ) . '</p>';
			// echo '</td>';
			// echo '<td>';

			// do_action('acf/create_field', array(
			// 	'type'	=>  'text',
			// 	'name'	=>  'fields[' . $key . '][use_header]',
			// 	'value'   =>  $field['use_header'],
			// 	'choices'   =>  array(
			// 		0   =>  __( "Optional", 'acf-table' ),
			// 		1   =>  __( "Yes", 'acf-table' ),
			// 		2   =>  __( "No", 'acf-table' ),
			// 	),
			// 	'layout'	=>  'horizontal',
			// ));

			// echo '</td>';
			// echo '</tr>';

		}

		/*
		*  format_value()
		*
		*  This filter is appied to the $value after it is loaded from the db and before it is passed to the create_field action
		*
		*  @type	filter
		*  @since   3.6
		*  @date	23/01/13
		*
		*  @param   $value  - the value which was loaded from the database
		*  @param   $post_id - the $post_id from which the value was loaded
		*  @param   $field  - the field array holding all the field options
		*
		*  @return  $value  - the modified value
		*/

		function format_value_for_api( $value, $post_id, $field )
		{
			// $a = json_decode( $value, true );

			// $value = false;

			// // IF BODY DATA

			// if (
			// 	null !== $a['b'] &&
			// 	count( $a['b'] ) > 0
			// ) {

			// 	// IF HEADER DATA

			// 	if ( $a['p']['o']['uh'] === 1 ) {

			// 		$value['header'] = $a['h'];
			// 	}
			// 	else {

			// 		$value['header'] = false;
			// 	}

			// 	// BODY

			// 	$value['body'] = $a['b'];

			// 	// IF SINGLE EMPTY CELL, THEN DO NOT RETURN TABLE DATA

			// 	if (
			// 		count( $a['b'] ) === 1
			// 		AND count( $a['b'][0] ) === 1
			// 		AND trim( $a['b'][0][0]['c'] ) === ''
			// 	) {

			// 		$value = false;
			// 	}
			// }

			return $value;
		}

		/*
		*  update_value()
		*
		*  This filter is appied to the $value before it is updated in the db
		*
		*  @type	filter
		*  @since   3.6
		*  @date	23/01/13
		*
		*  @param   $value - the value which will be saved in the database
		*  @param   $post_id - the $post_id of which the value will be saved
		*  @param   $field - the field array holding all the field options
		*
		*  @return  $value - the modified value
		*/

		function update_value($value, $post_id, $field)
		{
			// $value = urldecode( str_replace( '%5C', '%5C%5C', $value ) );

			return $value;
		}
	}

	// create field
	new acf_field_mapbox();
}

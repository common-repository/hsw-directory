<?php
/*
Plugin Name: HSW Directory
Plugin URI: https://hiresamwright.com/servers/hsw-directory/
Description: A free directory plugin with premium features included.
Version: 0.2.0
Author: Sam Wright
Author URI: https://www.patreon.com/samwrightwebdev
Text Domain: hsw-directory
Domain Path: /languages
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

// remove_theme_mods();

if ( !class_exists('hswDirectory') ) {
	
	add_action( 'plugins_loaded', array( 'hswDirectory', 'init' ));

	class hswDirectory {

		public static function init() {
			$class = __CLASS__;
			new $class;
		}

		public function __construct() {

			if ( !class_exists('acf') ) {

				add_action( 'admin_notices', array($this, 'admin_notices') );

			} else { 

				add_image_size('hsw_dir_1024x1024', 1024, 1024, true);
				add_image_size('hsw_dir_1920x500', 1920, 500, true);

				$this->register_field_group();

				include_once('files/acf-mapbox/mapbox.php' );

				add_action( 'init', array($this, 'register_post_types') );
				
				add_action( 'customize_register', array($this, 'build_customiser') );
				
				add_action( 'wp_ajax_hsw_dir_ajax_get_listings', array($this, 'list_ajax') );
				
				add_action( 'wp_ajax_nopriv_hsw_dir_ajax_get_listings', array($this, 'list_ajax') );

				add_action( 'wp_ajax_hsw_dir_ajax_get_map', array($this, 'get_map') );
				
				add_action( 'wp_ajax_nopriv_hsw_dir_ajax_get_map', array($this, 'get_map') );

				add_action( 'wp_ajax_hsw_dir_ajax_get_pager', array($this, 'get_pager') );
				
				add_action( 'wp_ajax_nopriv_hsw_dir_ajax_get_pager', array($this, 'get_pager') );

				add_action( 'wp_ajax_hsw_dir_ajax_get_listing_modal', array($this, 'modal_ajax') );
				
				add_action( 'wp_ajax_nopriv_hsw_dir_ajax_get_listing_modal', array($this, 'modal_ajax') );

				add_shortcode( 'hsw_directory', array($this, 'shortcode') );

			}
		}

		/*
		*
		*	Show any needed admin notices
		*
		*/

		public function admin_notices() {
			?>
			<div class="notice notice-error">
				<p><?php esc_html_e( 'HSW Directory requires the "Advanced Custom Fields" by Eliot Condon plugin to be useful. Please install if from Plugins > Add New.', 'hsw-directory' ); ?></p>
			</div>
			<?php
		}

		/*
		*
		*	Register the needed field groups
		*
		*/

		public function register_field_group() {
			if ( function_exists("register_field_group") )
			{
				include_once('files/register_field_group.php' );
			}
		}


		/*
		*
		*	Register the post types and taxonomies
		*
		*/

		public function register_post_types() {

			register_post_type( 'hsw_dir_listing', array(
				'label'  		=> __( 'Directory', 'hsw-directory' ),
				'menu_icon'		=> 'dashicons-screenoptions',
				'public' 		=> true,
				'has_archive' 	=> false,
				'supports' 		=> array('title', 'editor', 'thumbnail', 'comments'),
				'rewrite'      	=> array( 'slug' => 'listing' ),
			));

			register_taxonomy( 'hsw_dir_listing_tax_1', 'hsw_dir_listing', array(
				'label'        => __( 'Taxonomy 1', 'hsw-directory' ),
				'hierarchical' => true,
				'show_in_nav_menus' => false
			));

			register_taxonomy( 'hsw_dir_listing_tax_2', 'hsw_dir_listing', array(
				'label'        => __( 'Taxonomy 2', 'hsw-directory' ),
				'hierarchical' => true,
				'show_in_nav_menus' => false
			));

		}

		/*
		*
		*	The file to run on the list ajax requests
		*
		*/

		public function list_ajax() {
			
			if (file_exists(get_stylesheet_directory() . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/list-ajax.php'))
			{
				include_once(get_stylesheet_directory() . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/list-ajax.php');
			} 
			else 
			{
				include_once(WP_PLUGIN_DIR . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/list-ajax.php');
			}

			wp_die();
		}	

		/*
		*
		*	The file to run on the extra ajax requests
		*
		*/

		public function modal_ajax() {
			
			if (file_exists(get_stylesheet_directory() . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/modal-ajax.php'))
			{
				include_once(get_stylesheet_directory() . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/modal-ajax.php');
			} 
			else 
			{
				include_once(WP_PLUGIN_DIR . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/modal-ajax.php');
			}

			wp_die();
		}	


		/*
		*
		*	The shortcode.
		*
		*/

		public function shortcode() {
			
			ob_start();
			
			hswDirectory::load_bootstrap();
			hswDirectory::load_font_awesome();
			hswDirectory::load_modal();
			hswDirectory::load_mapbox();
			hswDirectory::load_template();

			echo ob_get_clean();
		}

		/*
		*
		*	Load the template parent file
		*
		*/

		public static function load_template() {
			if (file_exists(get_stylesheet_directory() . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) .'.php'))
			{
				include_once(get_stylesheet_directory() . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) .'.php');
			} 
			else 
			{
				include_once(WP_PLUGIN_DIR . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '.php');
			}
		}

		/*
		*
		*	Get a template part
		*
		*/

		public static function get_template_part($file_name) {

			$file_name = sanitize_file_name($file_name);

			if (file_exists(get_stylesheet_directory() . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/'. $file_name))
			{
				include(get_stylesheet_directory() . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/' . $file_name);
			}
			else {
				include(WP_PLUGIN_DIR . '/hsw-directory/templates/' . sanitize_file_name(get_theme_mod('hsw_dir_template', 'default')) . '/' . $file_name);
			}
		}

		/*
		*
		*	Add the mods to the customiser
		*
		*/

		public function build_customiser( $wp_customize ) {
			include_once('files/customiser.php');
		}

		/*
		*
		*	echo the bootstrap cdnjs
		*
		*/

		public static function load_bootstrap() {
			if (get_theme_mod('hsw_dir_load_bootstrap', 'yes') == 'yes') {
				echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap-grid.min.css" />';
			}
		}

		/*
		*
		*	echo the fontawesome js
		*
		*/

		public static function load_font_awesome() {
			if (get_theme_mod('hsw_dir_load_font_awesome', 'yes') == 'yes') {
				echo '<script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>';
			}
		}

		/*
		*
		*	echo the modal
		*
		*/

		public static function load_modal() {
			if (get_theme_mod('hsw_dir_load_jquery_modal', 'yes') == 'yes') {
				echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.min.js"></script>';
				echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.min.css" />';
				echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal-default-theme.min.css" />';
			}
		}

		/*
		*
		*	echo the modal
		*
		*/

		public static function load_mapbox() {
			echo '<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.js"></script>';
			echo '<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.css" rel="stylesheet" />';
		}

		/*
		*
		*	Send an email to a listing
		*
		*/

		public static function send_contact_email() {

			$errors = array();
			$sender_email = sanitize_email($_POST['email']);
			$target_email = sanitize_email(get_field('email_address', (int)$_POST['post_id']));
			$message = wp_strip_all_tags($_POST['message']);

			if (!is_email($target_email)) {
				$errors['get_email'] = 1;
			}

			if (!is_email($sender_email)) {
				$errors['email_address'] = 1;
			}

			if (strlen($message) < 5 || strlen($message) > 100) {
				$errors['message'] = 1;
			}

			if ($errors) {
				wp_send_json_error($errors);
			}

			$to = $target_email;
			$subject = 'Directory Listing Contact';
			$body = $message;
			$headers = array(
				'Reply-To: Reply to Sender <'.$sender_email.'>',
			);

			wp_mail( $to, $subject, $body, $headers );

			wp_send_json_success();

		}

		/*
		*
		*	Organize the KV pairs for a listing
		*
		*/

		public static function get_key_value_pairs($post_id) {
			$a1 = explode(PHP_EOL, wp_strip_all_tags(get_field('key_value_pairs', $post_id)));
			$a2 = array();
			if (!$a1[0]) {
				return false;
			}
			foreach ($a1 as $k => $v) {
				$temp = explode(' : ', $v);
				$a2[$k]['key'] = $temp[0];
				$a2[$k]['value'] = $temp[1];
				unset($temp);
			}
			return $a2;
		}

		/*
		*
		*	Prepare the listings for the ajax file output
		*
		*/

		public static function roll_output($listings_posts = array()) {

			if (!$listings_posts) {
				return false;
			}

			foreach ($listings_posts as $k => $v) {

				$out['id'] = $v->ID;

				$out['title'] = $v->post_title;

				if ( $list_phone = get_field('phone_number', $v->ID) ) {

					$out['phone'] = $list_phone;

				}

				if ( $address = get_field('address', $v->ID) ) {

					$out['address'] = $address;

				}

				if ( $short_description = get_field('short_description', $v->ID) ) {

					$out['short_description'] = $short_description;

				}

				$output[] = $out;
				unset($out);
			}

			return $output;

		}

		/*
		*
		*	Sanitize select types from the customiser
		*
		*/

		public function sanitize_select( $input, $setting ){

			$input = sanitize_key($input);

			$choices = $setting->manager->get_control( $setting->id )->choices;

			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                

		}

		/*	
		*
		*	Get paging data
		*
		*/

		public static function get_pager() {
			
			$r = hswDirectory::get_listings();
			
			if ($r['current_page'] > $r['start_page']) {
				$data['backward'] = true;
			} else {
				$data['backward'] = false;
			}

			if ($r['current_page'] < $r['max_pages']) {
				$data['forward'] = true;
			} else {
				$data['forward'] = false;
			}

			$data['max_pages'] = $r['max_pages'];

			wp_send_json_success($data);
		}

		/*	
		*
		*	Use POST data to get listings from the database
		*
		*/

		public static function get_map() {

			$listings = hswDirectory::get_listings();

			if (!$listings) {
				wp_send_json_error('no listings');
			}

			$feature_collection = array();
			$feature_collection['type'] = 'FeatureCollection';
			$feature_collection['features'] = array();

			foreach ($listings['listings']->posts as $k => $v) {

				if ( $location = get_field('location', $v->ID) ) {

					$a['type'] = 'Feature';
					$a['properties']['title'] = get_the_title($v->ID);
					$a['properties']['phone'] = get_field('phone_number', $v->ID);
					$a['properties']['address'] = get_field('address', $v->ID);
					$a['geometry']['type'] = 'Point';
					$a['geometry']['coordinates'] = array($location['lng'], $location['lat']);
					$feature_collection['features'][] = $a;

					unset($a);
				}
			}

			if ($feature_collection['features']) {
				wp_send_json_success($feature_collection);
			} else {
				wp_send_json_error('no features');
			}
		}

		/*	
		*
		*	Use POST data to get listings from the database
		*
		*/

		public static function get_listings() {

			$taxonomy_1 = $_POST['taxonomy_1'];
			$taxonomy_2 = $_POST['taxonomy_2'];
			$keyword = sanitize_title_for_query($_POST['keyword']);
			$paged = absint($_POST['page']);

			if ( ($taxonomy_1 != 'all' && !is_numeric($taxonomy_1)) || ($taxonomy_2 != 'all' && !is_numeric($taxonomy_2)) ) {
				return false;
			}

			if (strlen($keyword) > 50) {
				return false;
			}

			if (!$paged > 0) {
				return false;
			}

			if ($keyword != '') {
				add_filter( 'posts_where', 'hswDirectory::filter_post_where' );
			}

			if ($taxonomy_1 != 'all') {
				$tax_query_temp['relation'] = 'AND';
				$tax_query_temp[] = array(
					'taxonomy' => 'hsw_dir_listing_tax_1',
					'field' => 'id',
					'terms' => array((int)$taxonomy_1),
					'include_children' => $include_children
				);
			}

			if ($taxonomy_2 != 'all') {
				$tax_query_temp['relation'] = 'AND';
				$tax_query_temp[] = array(
					'taxonomy' => 'hsw_dir_listing_tax_2',
					'field' => 'id',
					'terms' => array((int)$taxonomy_2),
					'include_children' => $include_children
				);
			}

			if ($taxonomy_1 == 'all' && $taxonomy_2 == 'all') {
				$tax_query = array();
			} else {
				$tax_query[] = $tax_query_temp;
			}

			$args = array(
				'post_type' => 'hsw_dir_listing',
				'posts_per_page' => absint(get_theme_mod('hsw_dir_items_per_page', 6)),
				'orderby' => 'is_featured date',
				'order' => 'DESC',
				'suppress_filters' => false,
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => 'is_featured',
						'compare' => '1'
					),
					array(
						'key' => 'is_featured',
						'compare' => '0'
					)
				),
				'tax_query' => $tax_query
			);

			if ($paged == 'no') {
				$args['posts_per_page'] = -1;
			} else {
				$args['paged'] = $paged;
			}

			$listings = new WP_Query( $args );

			if ($keyword != '') {
				remove_filter( 'posts_where', 'hswDirectory::filter_post_where' );
			}

			$return['listings'] = $listings;
			$return['output'] =  hswDirectory::roll_output($listings->posts);
			$return['start_page'] = 1;
			$return['current_page'] = $paged;
			$return['max_pages'] = $listings->max_num_pages;
			$return['cols'] = absint(get_theme_mod('hsw_dir_items_per_row', 3));

			return $return;

		}

		/*
		*
		*	Modify the query to search for keywords in the content
		*
		*/

		public static function filter_post_where($where) {
			global $wpdb;
			$keyword = $_POST['keyword'];
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . $wpdb->esc_like($keyword) . '%\'';
			$where .= ' OR ' . $wpdb->posts . '.post_content LIKE \'%' . $wpdb->esc_like($keyword) . '%\'';
			return $where;
		}
	}
}
<?php
/* Custom Post Type Start */
function create_posttype() {
	register_post_type( 'Personalized Content',
	// CPT Options
	array(
	  'labels' => array(
	   'name' => __( 'Personalized Content' ),
	   'singular_name' => __( 'Personalized Content' )
	  ),
	  'public' => true,
	  'has_archive' => false,
	  'rewrite' => array('slug' => 'Personalized Content'),
	 )
	);
	register_post_type( 'Content Data',
	// CPT Options
	array(
	  'labels' => array(
	   'name' => __( 'Content Data' ),
	   'singular_name' => __( 'Content Data' )
	  ),
	  'public' => true,
	  'has_archive' => false,
	  'rewrite' => array('slug' => 'Content Data'),
	 )
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
/* Custom Post Type End */

/*Custom Post type start*/
function cw_post_type_personalized() {
	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	'custom-fields', // custom fields
	'comments', // post comments
	'revisions', // post revisions
	'post-formats', // post formats
	);
	$labels = array(
	'name' => _x('Personalized Content', 'plural'),
	'singular_name' => _x('Personalized Content', 'singular'),
	'menu_name' => _x('Personalized Content', 'admin menu'),
	'name_admin_bar' => _x('Personalized Content', 'admin bar'),
	'add_new' => _x('Add Personalized Content', 'add new'),
	'add_new_item' => __('Add New Personalized Content'),
	'new_item' => __('New Personalized Content'),
	'edit_item' => __('Edit Personalized Content'),
	'view_item' => __('View Personalized Content'),
	'all_items' => __('All Personalized Content'),
	'search_items' => __('Search Personalized Content'),
	'not_found' => __('No Personalized Content found.'),
	);
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'Personalized Content'),
	'has_archive' => true,
	'hierarchical' => false,
	);
	register_post_type('Personalized Content', $args);
}
	add_action('init', 'cw_post_type_personalized');
	/*Custom Post type end*/

  
  
/*Function to add custom menu in admin panel*/
add_action( 'admin_menu', 'import_cities_data_menu' );
function import_cities_data_menu()
{
    add_menu_page(
        'Import cities data',
        'Import Cities',
	    'edit_posts', 
        'import-cities-data',
        'import_cities_data'
    );
   }
   
/*Function to Load the CSV file*/   
function import_cities_data() {	
	if (isset($_POST['submit'])) {
		$csv_file = $_FILES['csv_file'];
		$csv_to_array = array_map('str_getcsv', file($csv_file['tmp_name']));
		foreach ($csv_to_array as $key => $value) {				
			if ($key > 1) {
				$new = array (
					'post_type' => 'Content Data',
					'post_title' => $value[0]. "+" .$value[1]. "+" .$value[2]. "+" .$value[3]. "+" .$value[4]. "+" .$value[5],
					'post_status' => 'publish',
				);
				$post_id = wp_insert_post( $new );
				add_post_meta($post_id, 'city', $value[0], true);
				add_post_meta($post_id, 'stage', $value[1], true);
				add_post_meta($post_id, 'living_status', $value[2], true);
				add_post_meta($post_id, 'age_group', $value[3], true);
				add_post_meta($post_id, 'co_morbidities', $value[4], true);
				add_post_meta($post_id, 'section', $value[5], true);
				add_post_meta($post_id, 'link', $value[6], true);
				add_post_meta($post_id, 'url', $value[7], true);
			}
		}
		if ( $post_id ) {
			echo "<b>Post successfully published!</b>";
        } else {
			echo "Something went wrong, try again.";
		}

    } else {
		echo '<form action="" method="post" enctype="multipart/form-data">';
		echo '<input type="file" name="csv_file">';
		echo '<input type="submit" name="submit" value="submit">';
		echo '</form>';
	}
}
 
/*Custom Post type start*/
function cw_post_type_personalized_data() {
	$supports = array(
	'title', // post title
	'editor', // post content
	'author', // post author
	'thumbnail', // featured images
	'excerpt', // post excerpt
	'custom-fields', // custom fields
	'comments', // post comments
	'revisions', // post revisions
	'post-formats', // post formats
	);
	$labels = array(
	'name' => _x('Content Data', 'plural'),
	'singular_name' => _x('Content Data', 'singular'),
	'menu_name' => _x('Content Data', 'admin menu'),
	'name_admin_bar' => _x('Content Data', 'admin bar'),
	'add_new' => _x('Add Content Data', 'add new'),
	'add_new_item' => __('Add New Content Data'),
	'new_item' => __('New Content Data'),
	'edit_item' => __('Edit Content Data'),
	'view_item' => __('View Content Data'),
	'all_items' => __('All Content Data'),
	'search_items' => __('Search Content Data'),
	'not_found' => __('No Content Data found.'),
	);
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'Content Data'),
	'has_archive' => true,
	'hierarchical' => false,
	);
	register_post_type('Content Data', $args);
}
	add_action('init', 'cw_post_type_personalized_data');
	/*Custom Post type end*/

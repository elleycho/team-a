<?php
/**
* Plugin Name: Archway App for SOWEGA CASA
* Plugin URI: fill in later
* Description: A plugin created to help manage the database needs of SOWEGA CASA.
* Version: 0.01
* Author: MIT TEAM A - Hugh Lacy, Elley Cho, Kevin Brooks, Jason Krause, Mietek Woloszym
* Author URI: mit.terry.edu
* License: A "To be Filled in Later"
*/

// Register the SOWEGA Directory Post Type
// Posts for each agency
 
function register_sowega_directory() {
 
    $labels = array(
        'name' => _x( 'Agency Listings', 'agency_listing' ),
        'singular_name' => _x( 'Agency Listing', 'agency_listing' ),
        'add_new' => _x( 'Add Agency', 'agency_listing' ),
        'add_new_item' => _x( 'Add New Agency Listing', 'agency_listing' ),
        'edit_item' => _x( 'Edit Agency Listing', 'agency_listing' ),
        'new_item' => _x( 'New Agency Listing', 'agency_listing' ),
        'view_item' => _x( 'View Agency Listing', 'agency_listing' ),
        'search_items' => _x( 'Search Agency Listings', 'agency_listing' ),
        'not_found' => _x( 'No Agency Listings found', 'agency_listing' ),
        'not_found_in_trash' => _x( 'No Agency Listings found in Trash', 'agency_listing' ),
        'parent_item_colon' => _x( 'Parent Agency:', 'agency_listing' ),
        'menu_name' => _x( 'Agency Directory', 'agency_listing' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Agency listings filterable by program type and keywords',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'programType','keyword','contact','serviceArea','operation'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'agency_listing_menu',
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book-alt',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'agency_listing', $args );
}
 
add_action( 'init', 'register_sowega_directory' );

//Create Program Type for Agencies
function programType_taxonomy() {
    register_taxonomy(
        'programType',
        'agency_listing',
        array(
            'hierarchical' => true,
            'label' => 'Program Type',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'programType',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'programType_taxonomy');

//Create Keywords for the agencies
function keyword_taxonomy() {
    register_taxonomy(
        'keyword',
        'agency_listing',
        array(
            'hierarchical' => false,
            'label' => 'Keywords',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'keyword',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'keyword_taxonomy');

//Create Contacts for Agencies
function contact_taxonomy() {
    register_taxonomy(
        'contact',
        'agency_listing',
        array(
            'hierarchical' => true,
            'label' => 'Contacts',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'contact',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'contact_taxonomy');

//Create Service Areas for Agencies
function serviceArea_taxonomy() {
    register_taxonomy(
        'serviceArea',
        'agency_listing',
        array(
            'hierarchical' => true,
            'label' => 'Service Area',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'serviceArea',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'serviceArea_taxonomy');

//Create Operation Hoursfor the agencies
function operation_taxonomy() {
    register_taxonomy(
        'operation',
        'agency_listing',
        array(
            'hierarchical' => false,
            'label' => 'Operation Hours',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'operation',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'operation_taxonomy');

//
//                                   Adding additional fields to taxonomies
//

//include the main class file
require_once("Tax-meta-class/Tax-meta-class.php");
if (is_admin()){
  /* 
   * prefix of meta keys, optional
   */
  $prefix = 'arch_';

                              /* CONTACT META FIELDS */
  /* 
   * configure contact meta box
   */
  $config = array(
    'id' => 'contact_meta_box',          // meta box id, unique per meta box
    'title' => 'Contact Meta Box',          // meta box title
    'pages' => array('contact'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  /*
   * Initiate contact meta box
   */
  $contact_meta =  new Tax_Meta_Class($config);
  /*
   * Add fields to contact meta box
   */
  //First Name text field
  $contact_meta->addText($prefix.'text_field_id',array('firstName'=> __('First Name ','tax-meta'),'desc' => 'Enter First Name '));
  //Last Name text field
  $contact_meta->addText($prefix.'text_field_id',array('lastName'=> __('Last Name ','tax-meta'),'desc' => 'Enter Last Name '));
  //Title text field
  $contact_meta->addText($prefix.'text_field_id',array('title'=> __('Title ','tax-meta'),'desc' => 'Enter Title '));
  //Area for notes field
  $contact_meta->addTextarea($prefix.'textarea_field_id',array('notes'=> __('Notes ','tax-meta')));
  //Finish Meta Box Decleration
  $contact_meta->Finish();


                              /* OPERATIONS META FIELDS */
/* 
   * configure contact meta box
   */
  $config_op = array(
    'id' => 'operation_meta_box',          // meta box id, unique per meta box
    'title' => 'Operation Meta Box',          // meta box title
    'pages' => array('operation'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  /*
   * Initiate operation meta box
   */
  $operation_meta =  new Tax_Meta_Class($config_op);
  /*
   * Add fields to operation meta box
   */
  //Recurrence
  $operation_meta->addText($prefix.'text_field_id',array('firstName'=> __('Recurrence ','tax-meta'),'desc' => 'Enter First Name '));
  //Open Holidas
  $operation_meta->addText($prefix.'text_field_id',array('lastName'=> __('Open Holidays? ','tax-meta'),'desc' => 'Enter Last Name '));
  //Area for notes field
  $operation_meta->addTextarea($prefix.'textarea_field_id',array('notes'=> __('Notes ','tax-meta')));
  //Days of the Week
  $operation_meta->addCheckbox($prefix.'checkbox_field_id',array('name'=> 'Days of the Week '));
  //select field
  $repeater_fields[] = $operation_meta->addCheckbox($prefix.'re_checkbox_field_id1',array('name1'=> 'Monday '),true);
  $repeater_fields[] = $operation_meta->addCheckbox($prefix.'re_checkbox_field_id2',array('name2'=> 'Tuesday '),true);
  $repeater_fields[] = $operation_meta->addCheckbox($prefix.'re_checkbox_field_id3',array('name3'=> 'Wednesday '),true);
  $repeater_fields[] = $operation_meta->addTime($prefix.'re_start_time',array('name_time1'=> 'Start Time '),true);
  $repeater_fields[] = $operation_meta->addTime($prefix.'re_end_time',array('name_time2'=> 'End Time '),true);
  $repeater_fields[] = $operation_meta->addCheckbox($prefix.'re_checkbox_field_id4',array('name4'=> 'Thursday '),true);
  $repeater_fields[] = $operation_meta->addCheckbox($prefix.'re_checkbox_field_id5',array('name5'=> 'Friday '),true);
  $repeater_fields[] = $operation_meta->addCheckbox($prefix.'re_checkbox_field_id6',array('name6'=> 'Saturday'),true);
  $repeater_fields[] = $operation_meta->addCheckbox($prefix.'re_checkbox_field_id7',array('name7'=> 'Sunday '),true);
  
  //Start Time
  $operation_meta->addTime($prefix.'start_time',array('name_start'=> 'Start Time  '));
  //End Time
  $operation_meta->addTime($prefix.'end_time',array('name_end'=> 'End Time  '));
  //Repeater block
  $operation_meta->addRepeaterBlock($prefix.'re_',array('inline' => true, 'name8' => 'Days of the Week','fields' => $repeater_fields));
  //Finish Meta Box Decleration
  $operation_meta->Finish();
}

                              /* Next META FIELDS */

// Create options page for manageing resources
/** Step 2 (from text above). */
add_action( 'admin_menu', 'my_plugin_menu');

/** Step 1. */
function my_plugin_menu() {
    add_menu_page( 'SOWEGA', 'SOWEGA', 'manage_options', 'agency_listing_menu', 'my_plugin_options', 'dashicons-book-alt', 4);
    add_submenu_page('agency_listing_menu', 'Listings', 'Listings', 'manage_options', dirname( __FILE__ ) . '/listings.php');
    add_submenu_page('agency_listing_menu', 'Directory', 'Directory', 'manage_options', dirname( __FILE__ ) . '/ec-resource.php');
    add_submenu_page('agency_listing_menu', 'Add Agency', 'Add Agency', 'manage_options', dirname( __FILE__ ) . '/ec-index.php');
    add_submenu_page('agency_listing_menu', 'Program Type', 'Program Type', 'manage_options', 'edit-tags.php?taxonomy=programType');
    add_submenu_page('agency_listing_menu', 'Keywords', 'Keywords', 'manage_options', 'edit-tags.php?taxonomy=keyword');
    add_submenu_page('agency_listing_menu', 'Contacts', 'Contacts', 'manage_options', 'edit-tags.php?taxonomy=contact');
    add_submenu_page('agency_listing_menu', 'Service Area', 'Service Area', 'manage_options', 'edit-tags.php?taxonomy=serviceArea');
    add_submenu_page('agency_listing_menu', 'Operation Hours', 'Operation Hours', 'manage_options', 'edit-tags.php?taxonomy=operation');
    add_submenu_page('agency_listing_menu', 'Resource Dashboard', 'Dashboard', 'manage_options', 'arch_dash', 'arch_plugin_dashboard');
    add_submenu_page('agency_listing_menu', 'Settings', 'Settings', 'manage_options', 'arch_settings', 'arch_plugin_settings');
}

/** Step 3. */
function arch_plugin_dashboard() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    echo '<div class="wrap">';
    echo '<p>This where the Dashboard for resources will appear</p>';
    echo '</div>';
}

function arch_plugin_settings() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    echo '<div class="wrap">';
    echo '<p>This where the Settings for resources directory will appear</p>';
    echo '</div>';
}

  
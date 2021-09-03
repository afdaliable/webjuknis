<?php
/**
Plugin Name: Festinger Vault
description: Festinger vault - The largest plugin market
Version: 2.4.4
Author: Festinger Vault
License: GPLv2 or later
Text Domain: festingervault
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if (!defined('FV_PLUGIN_DIR'))
    define( 'FV_PLUGIN_DIR', dirname(__FILE__) );
if (!defined('FV_PLUGIN_ROOT_PHP'))
    define( 'FV_PLUGIN_ROOT_PHP', dirname(__FILE__).'/'.basename(__FILE__)  );
if(!defined('FV_PLUGIN_ABSOLUTE_PATH'))
    define('FV_PLUGIN_ABSOLUTE_PATH',plugin_dir_url(__FILE__));
    define('FV_PLUGIN_VERSION', '2.4.4');



define('YOUR_LICENSE_SERVER_URL', 'https://engine.festingervault.com/api/'); //Rename this constant name so it is specific to your plugin or theme.

require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
require_once( FV_PLUGIN_DIR.'/functions/ajax_functions.php' );
require_once( FV_PLUGIN_DIR.'/classes/plugin-update-checker.php' );

function get_plugin_name_by_slug($given_slug){

	$all_plugins = get_plugins();

	    if(!empty($all_plugins)){

	        foreach ($all_plugins as $plugin_slug=>$values){

	            $slug=get_plugin_slug_from_data($plugin_slug, $values);
	            if($given_slug == $slug){
	            	return $values['Name'];
	            }
	    	
	        }
	    }
}



function fv_activate(){
            $upload_dir      = wp_upload_dir();
            $fv_plugin_zip_upload_dir=$upload_dir["basedir"]."/fv_auto_update_directory/plugins";
            $fv_plugin_zip_upload_dir_backup=$upload_dir["basedir"]."/fv_auto_update_directory/plugins/backup";

            $fv_theme_zip_upload_dir=$upload_dir["basedir"]."/fv_auto_update_directory/themes";
            $fv_theme_zip_upload_dir_backup=$upload_dir["basedir"]."/fv_auto_update_directory/themes/backup";
            $files = array(
                array(
                    'base' 		=> $fv_plugin_zip_upload_dir,
                    'file' 		=> 'index.html',
                    'content' 	=> ''
                ),
                array(
                    'base' 		=> $fv_plugin_zip_upload_dir_backup,
                    'file' 		=> 'index.html',
                    'content' 	=> ''
                ),
                array(
                    'base' 		=> $fv_theme_zip_upload_dir,
                    'file' 		=> 'index.html',
                    'content' 	=> ''
                ),
                array(
                    'base' 		=> $fv_theme_zip_upload_dir_backup,
                    'file' 		=> 'index.html',
                    'content' 	=> ''
                )
            );
            foreach ( $files as $file ) {
                if ( wp_mkdir_p( $file['base'] ) && ! file_exists( trailingslashit( $file['base'] ) . $file['file'] ) ) {
                    if ( $file_handle = @fopen( trailingslashit( $file['base'] ) . $file['file'], 'w' ) ) {
                        fwrite( $file_handle, $file['content'] );
                        fclose( $file_handle );
                    }
                }
            }

			if(get_option('wl_fv_plugin_wl_enable') == true){
				delete_option('wl_fv_plugin_wl_enable', htmlspecialchars($_POST['fv_plugin_wl_enable']));
			}

			if(get_option('fv_plugin_auto_update_list') == true){
				delete_option('fv_plugin_auto_update_list');
			}


			if(get_option('fv_themes_auto_update_list') == true){
				delete_option('fv_themes_auto_update_list');
			}


            return;
        }

register_activation_hook( __FILE__, 'fv_activate' );




function fv_deactivation(){

	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );

		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'deactivation',
		    'license_v'=> FV_PLUGIN_VERSION,
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'license-deactivation'));
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));

		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}


		delete_option('_data_ls_key_no_id_vf');
		delete_option('_ls_domain_sp_id_vf');
		delete_option('_ls_d_sf');

    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );

		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf_2,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'deactivation',
		    'license_v'=> FV_PLUGIN_VERSION,
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'license-deactivation'));
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}

		delete_option('_data_ls_key_no_id_vf_2');
		delete_option('_ls_domain_sp_id_vf_2');
		delete_option('_ls_d_sf_2');

    }


		
		if(get_option('wl_fv_plugin_agency_author_wl_') == true){
			delete_option('wl_fv_plugin_agency_author_wl_', htmlspecialchars($_POST['agency_author']));
		}
		if(get_option('wl_fv_plugin_author_url_wl_') == true){
			delete_option('wl_fv_plugin_author_url_wl_', htmlspecialchars($_POST['agency_author_url']));
		}
		if(get_option('wl_fv_plugin_slogan_wl_') == true){
			delete_option('wl_fv_plugin_slogan_wl_', htmlspecialchars($_POST['fv_plugin_slogan']));
		}
		if(get_option('wl_fv_plugin_icon_url_wl_') == true){
			delete_option('wl_fv_plugin_icon_url_wl_', htmlspecialchars($_POST['fv_plugin_icon_url']));
		}
		if(get_option('wl_fv_plugin_name_wl_') == true){
			delete_option('wl_fv_plugin_name_wl_', htmlspecialchars($_POST['fv_plugin_name']));
		}
		if(get_option('wl_fv_plugin_description_wl_') == true){
			delete_option('wl_fv_plugin_description_wl_', htmlspecialchars($_POST['fv_plugin_description']));
		}
		if(get_option('wl_fv_plugin_wl_enable') == true){
			delete_option('wl_fv_plugin_wl_enable', htmlspecialchars($_POST['fv_plugin_wl_enable']));
		}


}



register_deactivation_hook( __FILE__, 'fv_deactivation' );



$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://update.festingervault.com/fv-updater/index.php?action=get_metadata&slug=festingervault', 
	__FILE__, 
	'festingervault' 
);




add_filter( 'plugins_api', 'fv_plugin_check_info', 20, 3 );
function fv_plugin_check_info( $obj, $action, $arg ) {
    if ( ( $action == 'query_plugins' || $action == 'plugin_information' ) &&
        isset( $arg->slug ) && $arg->slug === 'festingervault' ) {


		  $obj = new stdClass();
          $obj->slug = 'festingervault';
          $obj->name = get_adm_men_name();
		  $obj->author = get_adm_men_author();
          $obj->requires = '3.0';
          $obj->tested = '3.3.1';
          $obj->last_updated = '2021-07-13';
          $obj->sections = array(
            'description' => get_adm_men_description(),
          );
			
        return $obj;
    }
	

    return $obj;
}


add_filter( 'all_plugins', 'plugins_page' );
function plugins_page( $plugins ) {
	$key = plugin_basename( FV_PLUGIN_DIR . '/festingervault.php' );

		$plugins[ $key ]['Name']= get_adm_men_name();	
		$plugins[ $key ]['Description'] = get_adm_men_description();

		$plugins[ $key ]['Author']     = get_adm_men_author();
		$plugins[ $key ]['AuthorName'] = get_adm_men_author();
	

		$plugins[ $key ]['AuthorURI'] = get_adm_men_author_uri();
		$plugins[ $key ]['PluginURI'] = get_adm_men_author_uri();
	
	return $plugins;
}




function name_change_wl_fv( $translated_text, $text, $domain ) {

	
	if ( 'Festinger Vault' == $text ) {
		$translated_text = get_adm_men_name();
	}

	return $translated_text;
}
add_filter( 'gettext', 'name_change_wl_fv', 20, 3 );	
		


add_action('admin_menu', 'festinger_vault_admin_menu_section');
function festinger_vault_admin_menu_section() {


	add_menu_page(get_adm_men_name(), get_adm_men_name(), 'manage_options','festinger-vault','festinger_vault_plugins_inside', get_adm_men_img(), 99);   
	  
	add_submenu_page(
	    'festinger-vault',               // parent slug
	    'All Plugins',                      // page title
	    'Vault',                      // menu title
	    'manage_options',                   // capability
	    'festinger-vault',               // slug
	    'festinger_vault_plugins_inside' // callback
	); 


	add_submenu_page(
	    'festinger-vault',               // parent slug
	    'Activation',                      // page title
	    'Activation',                      // menu title
	    'manage_options',                   // capability
	    'festinger-vault-activation',               // slug
	    'festinger_vault_activation_function' // callback
	); 

	add_submenu_page(
	    'festinger-vault',               // parent slug
	    'Plugin Updates',                      // page title
	    'Plugin Updates',                      // menu title
	    'manage_options',                   // capability
	    'festinger-vault-updates',               // slug
	    'festinger_vault_plugin_updates_function' // callback
	); 

	add_submenu_page(
	    'festinger-vault',               // parent slug
	    'Theme Updates',                      // page title
	    'Theme Updates',                      // menu title
	    'manage_options',                   // capability
	    'festinger-vault-theme-updates',               // slug
	    'festinger_vault_theme_updates_function' // callback
	); 


	add_submenu_page(
	    'festinger-vault',               // parent slug
	    'History',                      // page title
	    'History',                      // menu title
	    'manage_options',                   // capability
	    'festinger-vault-theme-history',               // slug
	    'festinger_vault_theme_history_function' // callback
	); 


	add_submenu_page(
	    'festinger-vault',               // parent slug
	    'Settings',                      // page title
	    'Settings',                      // menu title
	    'manage_options',                   // capability
	    'festinger-vault-settings',               // slug
	    'festinger_vault_settings_function' // callback
	); 




} 
function remove_under_middle_score($string){
	$rem_dash = str_replace("-"," ",$string);
	$rem_unscore = str_replace("_"," ",$rem_dash);
	return ucfirst($rem_unscore);
}

function festinger_vault_admin_styles($hook){


    $current_screen = get_current_screen();



    if ( strpos($current_screen->base, 'festinger-vault') === false) {
        return;
    } else {

	    wp_enqueue_style( 'pagicss', 'https://pagination.js.org/dist/2.1.4/pagination.css', array(), FV_PLUGIN_VERSION);
	    wp_enqueue_style('fwv_font_style','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
	    wp_enqueue_style( 'fv_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css', array(), FV_PLUGIN_VERSION);
	    wp_enqueue_style('fv_festinger_css', FV_PLUGIN_ABSOLUTE_PATH.'assets/css/wp_festinger_vault.css', array(), FV_PLUGIN_VERSION);
	    wp_enqueue_style( 'custom-alert-css', '//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css', array(), FV_PLUGIN_VERSION);
	    wp_enqueue_style( 'custom-dt-css', 'https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css', array(), FV_PLUGIN_VERSION);
	    wp_enqueue_style( 'roboto-dt-css', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', array(), FV_PLUGIN_VERSION );

	    wp_deregister_script('jquery'); // Deregisters the built-in version of jQuery
		wp_register_script('jquery',  FV_PLUGIN_ABSOLUTE_PATH.'assets/js/jquery-3.4.1.min.js' , false, FV_PLUGIN_VERSION, true); 
    	wp_enqueue_script('jquery'); 


	    wp_enqueue_script( 'custom-alert-js', FV_PLUGIN_ABSOLUTE_PATH.'assets/js/jquery-confirm.min.js' ,array('jquery'), FV_PLUGIN_VERSION);
	    wp_enqueue_script( 'pagi-js', FV_PLUGIN_ABSOLUTE_PATH.'assets/js/pagination.min.js' ,array('jquery'), FV_PLUGIN_VERSION);
	    wp_enqueue_script( 'pagid-js', FV_PLUGIN_ABSOLUTE_PATH.'assets/js/bootstrap.bundle.min.js' ,array('jquery'), FV_PLUGIN_VERSION);
	    wp_enqueue_script( 'dt-js', FV_PLUGIN_ABSOLUTE_PATH.'assets/js/jquery.dataTables.js' ,array('jquery'), FV_PLUGIN_VERSION);

	    $show_title_img_fv_link = 1;
		if(get_option('wl_fv_plugin_wl_enable') == true){
		    $show_title_img_fv_link = 0;
		}

	    wp_enqueue_script( 'script-js', FV_PLUGIN_ABSOLUTE_PATH.'assets/js/scripts.js' ,array('jquery'));
	    wp_localize_script( 'script-js', 'plugin_ajax_object', array( 
	    	'ajax_url' => admin_url( 'admin-ajax.php' ), 
	    	'get_all_active_plugins_js'		 => get_plugin_theme_data('active_plugins') ,
	    	'get_all_inactive_plugins_js'	 => get_plugin_theme_data('inactive_plugins'), 
	    	'get_all_active_themes_js'		 => get_plugin_theme_data('active_themes'),
	    	'get_all_inactive_themes_js'     => get_plugin_theme_data('inactive_themes'),
	    	'show_title_img_fv_link'     	 => $show_title_img_fv_link,
	    	'cdl_allow' 					 => get_all_data_return_fresh('dllimit'),
	    	'get_curr_screen'				 => $current_screen->base
	    ) );




    }


} 
add_action('admin_enqueue_scripts', 'festinger_vault_admin_styles');
add_action('wp_ajax_fv_activation_ajax', 'fv_activation_ajax');
add_action('wp_ajax_nopriv_fv_activation_ajax', 'fv_activation_ajax');

function fv_activation_ajax(){

	$api_params = array(
	    'license_key' => $_POST['licenseKeyInput'],
	    'license_host'=> $_SERVER['HTTP_HOST'],
	    'license_mode'=> 'activation',
	    'license_v'=> FV_PLUGIN_VERSION,
	);


	$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'license-activation'));
	$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));

	if (is_wp_error($response)){
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
		if(is_wp_error($response)){
				echo 'SSLVERIFY ERROR';			
		}
	}

	$license_data = json_decode(wp_remote_retrieve_body($response));
	if($license_data->result == 'valid'){
		if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf') && get_option('_ls_d_sf')){
			add_option('_data_ls_key_no_id_vf_2', $license_data->l_dat);
			add_option('_ls_domain_sp_id_vf_2', $license_data->data_security_dom);
			add_option('_ls_d_sf_2', $license_data->ld_dat);
	    }
	    else {
			add_option('_data_ls_key_no_id_vf', $license_data->l_dat);
			add_option('_ls_domain_sp_id_vf', $license_data->data_security_dom);
			add_option('_ls_d_sf', $license_data->ld_dat);
	    }

		echo json_encode($license_data);
	}else{
		echo json_encode($license_data);
	}

}


add_action('wp_ajax_fv_deactivation_ajax', 'fv_deactivation_ajax');
add_action('wp_ajax_nopriv_fv_deactivation_ajax', 'fv_deactivation_ajax');

function fv_deactivation_ajax(){
	$api_params = array(
	    'license_key' => $_POST['license_key'],
	    'license_d' => $_POST['license_d'],
	    'license_host'=> $_SERVER['HTTP_HOST'],
	    'license_mode'=> 'deactivation',
	    'license_v'=> FV_PLUGIN_VERSION,
	);

	$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'license-deactivation'));
	$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));

	if (is_wp_error($response)){
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
		if(is_wp_error($response)){
				echo 'SSLVERIFY ERROR';			
		}
	}

	$license_data = json_decode(wp_remote_retrieve_body($response));

	if($license_data->result == 'success'){
		if(get_option('_data_ls_key_no_id_vf')){

			delete_option('_data_ls_key_no_id_vf', $license_data->l_dat);
			delete_option('_ls_domain_sp_id_vf', $license_data->data_security_dom);
			delete_option('_ls_d_sf', $license_data->ld_dat);
		}else{
			delete_option('_data_ls_key_no_id_vf_2', $license_data->l_dat);
			delete_option('_ls_domain_sp_id_vf_2', $license_data->data_security_dom);
			delete_option('_ls_d_sf_2', $license_data->ld_dat);
		}

		echo json_encode($license_data);
	}else{
		echo json_encode($license_data);
	}

} 


add_action('wp_ajax_fv_deactivation_ajax_2', 'fv_deactivation_ajax_2');
add_action('wp_ajax_nopriv_fv_deactivation_ajax_2', 'fv_deactivation_ajax_2');
function fv_deactivation_ajax_2(){

	$api_params = array(
	    'license_key' => $_POST['license_key'],
	    'license_d' => $_POST['license_d'],
	    'license_host'=> $_SERVER['HTTP_HOST'],
	    'license_mode'=> 'deactivation',
	    'license_v'=> FV_PLUGIN_VERSION,
	);

	$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'license-deactivation'));
	$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
	
	if (is_wp_error($response)){
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
		if(is_wp_error($response)){
				echo 'SSLVERIFY ERROR';			
		}
	}


	$license_data = json_decode(wp_remote_retrieve_body($response));
	if($license_data->result == 'success'){
		if(get_option('_data_ls_key_no_id_vf_2')){

			delete_option('_data_ls_key_no_id_vf_2', $license_data->l_dat);
			delete_option('_ls_domain_sp_id_vf_2', $license_data->data_security_dom);
			delete_option('_ls_d_sf_2', $license_data->ld_dat);
		}else{
			delete_option('_data_ls_key_no_id_vf', $license_data->l_dat);
			delete_option('_ls_domain_sp_id_vf', $license_data->data_security_dom);
			delete_option('_ls_d_sf', $license_data->ld_dat);
		}
		echo json_encode($license_data);
	}else{
		echo json_encode($license_data);
	}

} 

add_action('wp_ajax_fv_search_ajax_data', 'fv_search_ajax_data');
add_action('wp_ajax_nopriv_fv_search_ajax_data', 'fv_search_ajax_data');
function fv_search_ajax_data(){

	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }

		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
			'datasrc'	=> $_POST['ajax_search'],
		    'license_d' => $_ls_d_sf,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'search_query',
		    'license_v'=> FV_PLUGIN_VERSION,
		    'queryd'=> 'wordpress',
		);

	$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'search-data'));
	$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));

	if (is_wp_error($response)){
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
		if(is_wp_error($response)){
				echo 'SSLVERIFY ERROR';			
		}
	}


	$license_data = (wp_remote_retrieve_body($response));

	echo($license_data);

}



function get_all_data_return_fresh($data = null){


	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';
	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';
	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }

		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'get_all_license_data',
		    'license_v'=> FV_PLUGIN_VERSION,
		    'plugins_and_themes' => get_plugin_theme_data('all_plugins_themes'),
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'get-all-license-data'));
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));

		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}

		$all_license_data = json_decode(wp_remote_retrieve_body($response));
		if($data == 'dllimit'){
			if($all_license_data->license_1->license_data->plan_credit_available == 0 && $all_license_data->license_2->license_data->plan_credit_available == 0){
				if($all_license_data->license_1->license_data->license_type == 'onetime' || $all_license_data->license_2->license_data->license_type == 'onetime'){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 1;
			}
		}
		return $all_license_data;

}


function festinger_vault_activation_function(){

	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }

		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'get_all_license_data',
		    'license_v'=> FV_PLUGIN_VERSION,
		    'plugins_and_themes' => get_plugin_theme_data('all_plugins_themes'),
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'get-all-license-data'));
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
		
		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}


		$all_license_data = json_decode(wp_remote_retrieve_body($response));

		if($all_license_data->license_1->license_data->license_key && $all_license_data->license_1->license_data->license_status == 'notfound'){			
			if(get_option('_data_ls_key_no_id_vf') == $all_license_data->license_1->license_data->license_key){
				delete_option('_data_ls_key_no_id_vf');
				delete_option('_ls_domain_sp_id_vf');
				delete_option('_ls_d_sf');
			}
			if(get_option('_data_ls_key_no_id_vf_2') == $all_license_data->license_1->license_data->license_key){
				delete_option('_data_ls_key_no_id_vf_2');
				delete_option('_ls_domain_sp_id_vf_2');
				delete_option('_ls_d_sf_2');
			}
		}
	

	if($all_license_data->license_2->license_data->license_key && $all_license_data->license_2->license_data->license_status == 'notfound'){

		
		if(get_option('_data_ls_key_no_id_vf') == $all_license_data->license_2->license_data->license_key){
			delete_option('_data_ls_key_no_id_vf');
			delete_option('_ls_domain_sp_id_vf');
			delete_option('_ls_d_sf');
		}
		
		if(get_option('_data_ls_key_no_id_vf_2') == $all_license_data->license_2->license_data->license_key){
			delete_option('_data_ls_key_no_id_vf_2');
			delete_option('_ls_domain_sp_id_vf_2');
			delete_option('_ls_d_sf_2');
		}
		
	}

	if($all_license_data->license_1->options->white_label == 'no' && $all_license_data->license_2->options->white_label=='no'){

		if(get_option('wl_fv_plugin_agency_author_wl_') == true){
			delete_option('wl_fv_plugin_agency_author_wl_', htmlspecialchars($_POST['agency_author']));
		}
		if(get_option('wl_fv_plugin_author_url_wl_') == true){
			delete_option('wl_fv_plugin_author_url_wl_', htmlspecialchars($_POST['agency_author_url']));
		}
		if(get_option('wl_fv_plugin_slogan_wl_') == true){
			delete_option('wl_fv_plugin_slogan_wl_', htmlspecialchars($_POST['fv_plugin_slogan']));
		}
		if(get_option('wl_fv_plugin_icon_url_wl_') == true){
			delete_option('wl_fv_plugin_icon_url_wl_', htmlspecialchars($_POST['fv_plugin_icon_url']));
		}
		if(get_option('wl_fv_plugin_name_wl_') == true){
			delete_option('wl_fv_plugin_name_wl_', htmlspecialchars($_POST['fv_plugin_name']));
		}
		if(get_option('wl_fv_plugin_description_wl_') == true){
			delete_option('wl_fv_plugin_description_wl_', htmlspecialchars($_POST['fv_plugin_description']));
		}
		if(get_option('wl_fv_plugin_wl_enable') == true){
			delete_option('wl_fv_plugin_wl_enable', htmlspecialchars($_POST['fv_plugin_wl_enable']));
		}


	}

	include( FV_PLUGIN_DIR . '/sections/fv_activation.php');

}


function festinger_vault_theme_updates_function(){

    $allThemes = wp_get_themes(); 
    $activeTheme = wp_get_theme();


    $retrive_plugins_data=[];
    $retrive_themes_data=[];
    $all_plugins = get_plugins();

    if(!empty($all_plugins)){

        foreach ($all_plugins as $plugin_slug=>$values){
            $slugArray=explode('/',$plugin_slug);

            $version=getPluginVersionFromRepository($values['Version']);
            $slug=get_plugin_slug_from_data($plugin_slug, $values);
            $retrive_plugins_data[]=['slug'=>$slug,'version'=>$version, 'dl_link'=>''];

        }
    }


    $allThemes = wp_get_themes(); 
    foreach($allThemes as $theme) {
    	$get_theme_slug = $theme->get('TextDomain');
    	if(empty($get_theme_slug)){
    		$get_theme_slug = $theme->template;
    	}
        $retrive_themes_data[]=['slug'=>$get_theme_slug,'version'=>$theme->Version, 'dl_link'=>''];
    }


	
	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }
	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }

		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'all_plugin_list' => $retrive_plugins_data,
		    'all_theme_list' => $retrive_themes_data,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'get_plugins_and_themes_matched_by_vault',
		    'license_v'=> FV_PLUGIN_VERSION,
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'plugin-theme-updater'));
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
		

		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}

		$license_histories = json_decode(wp_remote_retrieve_body($response));

			$fetching_theme_lists = [];
			$fetching_theme_lists_full = [];
			$list_of_plugins = [];

			if(isset($license_histories->result) && ($license_histories->result == 'domainblocked' || $license_histories->result == 'failed')){
				$list_of_plugins = [];
			}else{

				foreach($license_histories->themes as $theme){
					$fetching_theme_lists[] = $theme->slug;
					$fetching_theme_lists_full[] = $theme;
				}
			}


		$is_update_available = 0;

        foreach($allThemes as $theme) {
			if($fetching_theme_lists != null){
				if (in_array($theme->template, $fetching_theme_lists)){
					foreach($fetching_theme_lists_full as $single_p){
						if($single_p->slug == $theme->template && ($single_p->version > $theme['Version'])){
							$is_update_available = 1;

						}
					}

				}
			}
		}

		include( FV_PLUGIN_DIR . '/sections/fv_theme_updates.php');
}





function festinger_vault_plugin_updates_function(){

    $allPlugins = get_plugins(); 
    $activePlugins = get_option('active_plugins');

    $retrive_plugins_data=[];
    $retrive_themes_data=[];
    $all_plugins = get_plugins();

    if(!empty($all_plugins)){

        foreach ($all_plugins as $plugin_slug=>$values){
            $slugArray=explode('/',$plugin_slug);

            $version=getPluginVersionFromRepository($values['Version']);
            $slug=get_plugin_slug_from_data($plugin_slug, $values);
            $retrive_plugins_data[]=['slug'=>$slug,'version'=>$version, 'dl_link'=>''];

        }
    }


    $allThemes = wp_get_themes(); 
    foreach($allThemes as $theme) {
    	$get_theme_slug = $theme->get('TextDomain');
    	if(empty($get_theme_slug)){
    		$get_theme_slug = $theme->template;
    	}
        $retrive_themes_data[]=['slug'=>$get_theme_slug,'version'=>$theme->Version, 'dl_link'=>''];
    }


	
	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }



		$plugin_api_param = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'all_plugin_list' => $retrive_plugins_data,
		    'all_theme_list' => $retrive_themes_data,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'get_plugins_and_themes_matched_by_vault',
		    'license_v'=> FV_PLUGIN_VERSION,
		);

		$query_pl_updater = esc_url_raw(add_query_arg($plugin_api_param, YOUR_LICENSE_SERVER_URL.'plugin-theme-updater'));
		$response_pl_updater = wp_remote_post($query_pl_updater, array('timeout' => 20, 'sslverify' => false));
		
		if (is_wp_error($response_pl_updater)){
			$response_pl_updater = wp_remote_post($query_pl_updater, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response_pl_updater)){
					echo 'SSLVERIFY ERROR';			
			}
		}



			$pluginUpdate_get_data = json_decode(wp_remote_retrieve_body($response_pl_updater));

			$fetching_plugin_lists = [];
			$fetching_plugin_lists_full = [];

			if(isset($pluginUpdate_get_data->result) && ($pluginUpdate_get_data->result == 'domainblocked' || $pluginUpdate_get_data->result == 'failed')){

			}else{
				foreach($pluginUpdate_get_data->plugins as $plugin){
					$fetching_plugin_lists[] = $plugin->slug;
					$fetching_plugin_lists_full[] = $plugin;
				}
				
			}

			$is_update_available = 0;
			$new_version  = '';
			$chk_pkg_type = '';


	        foreach($allPlugins as $key => $value) {

			if($fetching_plugin_lists != null){
				if (in_array(get_plugin_slug_from_data($key, $value), $fetching_plugin_lists)){
						foreach($fetching_plugin_lists_full as $single_p){
							if($single_p->slug == get_plugin_slug_from_data($key, $value) && ($single_p->version > $value['Version'])){
								$is_update_available = 1;
								continue;

							}
						}

					}
				}
			}
			include( FV_PLUGIN_DIR . '/sections/fv_plugin_updates.php');
}


function getPluginVersionFromRepository($slug) {
    $version=preg_replace("/[^0-9.]/", "", $slug);
    return $version;
}


function activeThemesVersions() {
    $allThemes = wp_get_themes();
    $activeTheme = wp_get_theme();
    $retrive_plugins_data=[];
    $retrive_themes_data=[];
    $all_plugins = get_plugins();

    if(!empty($all_plugins)){

        foreach ($all_plugins as $plugin_slug=>$values){
            $slugArray=explode('/',$plugin_slug);

            $version=getPluginVersionFromRepository($values['Version']);
            $slug=get_plugin_slug_from_data($plugin_slug, $values);
            $retrive_plugins_data[]=['slug'=>$slug,'version'=>$version, 'dl_link'=>''];

        }
    }


    $allThemes = wp_get_themes();
    foreach($allThemes as $theme) {
    	$get_theme_slug = $theme->get('TextDomain');
    	if(empty($get_theme_slug)){
    		$get_theme_slug = $theme->template;
    	}
        $retrive_themes_data[]=['slug'=>$get_theme_slug,'version'=>$theme->Version, 'dl_link'=>''];
    }
	
	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }

	if( (!empty( $_ls_domain_sp_id_vf ) && !empty( $_data_ls_key_no_id_vf )) || (!empty( $_ls_domain_sp_id_vf_2 ) && !empty( $_data_ls_key_no_id_vf_2 )) ){

		// API query parameters
		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'all_plugin_list' => $retrive_plugins_data,
		    'all_theme_list' => $retrive_themes_data,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'get_plugins_and_themes_matched_by_vault',
		    'license_v'=> FV_PLUGIN_VERSION,
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'plugin-theme-updater'));
		
	    $response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
		
		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}


		$license_histories = json_decode(wp_remote_retrieve_body($response));
			$fetching_theme_lists = [];
			foreach($license_histories->themes as $theme){
				$fetching_theme_lists[] = $theme->slug;
			}
			
        foreach($allThemes as $theme) {

			if (in_array($theme->template, $fetching_theme_lists)){

        		$active_theme = '';
				if($activeTheme->Name == $theme->Name){
            		$active_theme = "<span class='badge bg-info'>Active</span>";
            	}

                echo '<tr>';
                echo "<td class='plugin_update_width_30'>
                		{$theme->name} <br/>
                	".$active_theme."
                </td>";
                echo "<td class='plugin_update_width_60'>". substr($theme->Description, 0, 180)."...
                	 </td>";
                echo "<td>{$theme->Version}</td>";
                echo "<td>2.0</td>";
                echo "<td><center><input type='checkbox' checked data-toggle='toggle' data-size='xs'></center></td>";
                echo '</tr>';
            }
            
        }

    }


}   


function activePluginsVersions() {
    $allPlugins = get_plugins(); 
    $activePlugins = get_option('active_plugins'); 

    $retrive_plugins_data=[];
    $retrive_themes_data=[];
    $all_plugins = get_plugins();

    if(!empty($all_plugins)){

        foreach ($all_plugins as $plugin_slug=>$values){
            $slugArray=explode('/',$plugin_slug);

            $version=getPluginVersionFromRepository($values['Version']);
            $slug=get_plugin_slug_from_data($plugin_slug, $values);
            $retrive_plugins_data[]=['slug'=>$slug,'version'=>$version, 'dl_link'=>''];

        }
    }


    $allThemes = wp_get_themes();
    foreach($allThemes as $theme) {
    	$get_theme_slug = $theme->get('TextDomain');
    	if(empty($get_theme_slug)){
    		$get_theme_slug = $theme->template;
    	}
        $retrive_themes_data[]=['slug'=>$get_theme_slug,'version'=>$theme->Version, 'dl_link'=>''];
    }


	
	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }


	if( (!empty( $_ls_domain_sp_id_vf ) && !empty( $_data_ls_key_no_id_vf )) || (!empty( $_ls_domain_sp_id_vf_2 ) && !empty( $_data_ls_key_no_id_vf_2 )) ){
		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'all_plugin_list' => $retrive_plugins_data,
		    'all_theme_list' => $retrive_themes_data,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'get_plugins_and_themes_matched_by_vault',
		    'license_v'=> FV_PLUGIN_VERSION,
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'plugin-theme-updater'));
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
		
		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}

		$license_histories = json_decode(wp_remote_retrieve_body($response));

			$fetching_plugin_lists = [];
			foreach($license_histories->plugins as $plugin){
				$fetching_plugin_lists[] = $plugin->slug;
			}
			
	        foreach($allPlugins as $key => $value) {
				if (in_array(get_plugin_slug_from_data($key, $value), $fetching_plugin_lists)){
		            if(in_array($key, $activePlugins)) { 
		                echo '<tr>';
		                echo "<td class='plugin_update_width_30'>
		                		{$value['Name']} <br/>
		                		<span class='badge bg-success'>Active</span> 
		                	 </td>";
		                echo "<td class='plugin_update_width_60'>". substr($value['Description'], 0, 180)."...
		                		<br/>Slug: ".get_plugin_slug_from_data($key, $value)."
		                </td>";
		                echo "<td>{$value['Version']}</td>";

		                $repoVersion = getPluginVersionFromRepository($value['Version']);

		                echo "<td>{$repoVersion}</td>";
		                echo "<td><center><input type='checkbox' checked data-toggle='toggle' data-size='xs'></center></td>";
		                echo '</tr>';
		            }else{

		                echo '<tr>';
		                echo "<td class='plugin_update_width_30'>
		                		{$value['Name']} <br/>
		                		<span class='badge bg-danger'>Deactive</span> 

		                	 </td>";
		                echo "<td class='plugin_update_width_60'>". substr($value['Description'], 0, 180)."...

		                		<br/>Slug: ".get_plugin_slug_from_data($key, $value)."

		                	</td>";
		                echo "<td>{$value['Version']}</td>";
		                $repoVersion = getPluginVersionFromRepository($value['Version']);
		                echo "<td>{$repoVersion}</td>";
		                echo "<td><center><input type='checkbox' checked data-toggle='toggle' data-size='xs'></center></td>";
		                echo '</tr>';
		            }
	        	}
	    	}

    }

}   



function get_plugin_slug_from_data($slug_by_directory, $details_array){
    
    $slug_by_directory = explode('/',$slug_by_directory)[0];
    $final_slug = '';

    if($details_array['TextDomain'] == $slug_by_directory){
    	$final_slug = $details_array['TextDomain'];
    }else{
    	if(empty($details_array['TextDomain'])){
    		$final_slug = $slug_by_directory;
    	}else{
    		$final_slug = $details_array['TextDomain'];
    	}
    }

    return $final_slug;
}


function festinger_vault_theme_history_function(){
	
	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }

	if( (!empty( $_ls_domain_sp_id_vf ) && !empty( $_data_ls_key_no_id_vf )) || (!empty( $_ls_domain_sp_id_vf_2 ) && !empty( $_data_ls_key_no_id_vf_2 )) ){

		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'get_history',
		    'license_v'=> FV_PLUGIN_VERSION,
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'get-license-history'));
		
	    $response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
		
		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}


		$license_histories = json_decode(wp_remote_retrieve_body($response));
		include( FV_PLUGIN_DIR . '/sections/fv_history.php');
	}

}


add_action('wp_ajax_fv_license_refill_ajax', 'fv_license_refill_ajax');
add_action('wp_ajax_nopriv_fv_license_refill_ajax', 'fv_license_refill_ajax');
function fv_license_refill_ajax(){

	$api_params = array(
	    'license_key' => $_POST['license_key'],
	    'refill_key' => $_POST['refill_key'],
	    'license_host'=> $_SERVER['HTTP_HOST'],
	    'license_mode'=> 'refill_history',
	    'license_v'=> FV_PLUGIN_VERSION,
	);

	$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'refill-license'));
	$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
	
	if (is_wp_error($response)){
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
		if(is_wp_error($response)){
				echo 'SSLVERIFY ERROR';			
		}
	}

	$refill_data = json_decode(wp_remote_retrieve_body($response));

	echo json_encode($refill_data);

}


function get_plugin_theme_data($request_list = 'all'){

	$get_inactive_themes = [];
	$get_active_themes = [];

	$get_inactive_plugins = [];
	$get_active_plugins = [];

	$all_plugins_list = [];
	$all_themes_list = [];

    $allPlugins = get_plugins(); 
    $activePlugins = get_option('active_plugins');

    $allThemes = wp_get_themes();
    $activeTheme = wp_get_theme();
        foreach($allThemes as $theme) {
        		$active_theme = '';
				if($activeTheme->Name == $theme->Name){
            		$get_active_themes[] = $theme->get_template();
            		$all_themes_list[] = $theme->get_template();
            	}else{
            		$get_inactive_themes[] = $theme->get_template();
            		$all_themes_list[] = $theme->get_template();
            	}
        }
    
        foreach($allPlugins as $key => $value) {
        	
            if(in_array($key, $activePlugins)) { 
				$all_plugins_list [] = get_plugin_slug_from_data($key, $value);
            	$get_active_plugins[] = get_plugin_slug_from_data($key, $value);

            }else{
				$all_plugins_list [] = get_plugin_slug_from_data($key, $value);
            	$get_inactive_plugins[] = get_plugin_slug_from_data($key, $value);
            }
        }


        if($request_list == 'active_plugins'){
        	return json_encode($get_active_plugins);
        }elseif($request_list == 'inactive_plugins'){
        	return json_encode($get_inactive_plugins);
        }elseif($request_list == 'active_themes'){
        	return json_encode($get_active_themes);
        }elseif($request_list == 'inactive_themes'){
        	return json_encode($get_inactive_themes);
        }elseif( $request_list == 'all_plugins_themes' ){
        	return  json_encode($final_return_list = [
	       		'plugins' => $all_plugins_list,
	       		'themes' => $all_themes_list,
       		]);
        }else{
        	return  json_encode($final_return_list = [
	       		'active_plugins' => $get_active_plugins,
	       		'inactive_plugins' => $get_inactive_plugins,
	       		'active_themes' => $get_active_themes,
	       		'inactive_themes' => $get_inactive_themes,

       		]);
        }

}



function fv_auto_update_download($theme_plugin = null){

    $retrive_plugins_data=[];
    $retrive_themes_data=[];
    $all_plugins = get_plugins();

    if(!empty($all_plugins)){

        foreach ($all_plugins as $plugin_slug=>$values){
            $slugArray=explode('/',$plugin_slug);
            $version=getPluginVersionFromRepository($values['Version']);
            $slug=get_plugin_slug_from_data($plugin_slug, $values);
			if(get_option('fv_plugin_auto_update_list') == true && in_array($slug, get_option('fv_plugin_auto_update_list'))){
				$retrive_plugins_data[]=['slug'=>$slug,'version'=>$version, 'dl_link'=>''];
			}
        }
    }

    $allThemes = wp_get_themes(); 
    foreach($allThemes as $theme) {
    	$get_theme_slug = $theme->get('TextDomain');
    	if(empty($get_theme_slug)){
    		$get_theme_slug = $theme->template;
    	}
		
		if(get_option('fv_themes_auto_update_list') == true && in_array($get_theme_slug, get_option('fv_themes_auto_update_list'))){
			$retrive_themes_data[]=['slug'=>$get_theme_slug,'version'=>$theme->Version, 'dl_link'=>''];
		}

    }

	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }


	if( (!empty( $_ls_domain_sp_id_vf ) && !empty( $_data_ls_key_no_id_vf )) || (!empty( $_ls_domain_sp_id_vf_2 ) && !empty( $_data_ls_key_no_id_vf_2 )) ){

		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'all_plugin_list' => $retrive_plugins_data,
		    'all_theme_list' => $retrive_themes_data,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'up_dl_plugs_thms',
		    'license_v'=> FV_PLUGIN_VERSION,
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'plugin-theme-updater'));
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
		
		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}


		$license_histories = json_decode(wp_remote_retrieve_body($response));

	    require_once(ABSPATH .'/wp-admin/includes/file.php');
	    WP_Filesystem();
	    $upload_dir      = wp_upload_dir();

		if($theme_plugin == null || $theme_plugin == 'theme'){

			if(!empty($license_histories->themes)){

				$get_theme_directory=[];

			    foreach($allThemes as $theme) {
			    	$get_theme_slug = $theme->get('TextDomain');
			    	if(empty($get_theme_slug)){
			    		$get_theme_slug = $theme->template;
			    	}
			        $get_theme_directory[]=['dir'=> $theme->template , 'slug'=>$get_theme_slug,'version'=>$theme->Version];
			    }



	            foreach ($license_histories->themes as $u){
					
					foreach($get_theme_directory as $single_th){
						if($single_th['slug'] == $u->slug && version_compare($u->version, $single_th['version']) > 0){

							$pathInfo=pathinfo($u->slug);
							$fileName=$pathInfo['filename'].'.zip';

							$upload_dir      = wp_upload_dir();
							$fv_theme_zip_upload_dir=$upload_dir["basedir"]."/fv_auto_update_directory/themes/";
			                $tmpfile = download_url( $u->dl_link, $timeout = 300 );

							if(is_wp_error($tmpfile) == true){

								// Initialize the cURL session
								$ch = curl_init($u->dl_link);
								  
								// Use basename() function to return
								// the base name of file 
								$file_name = basename($u->dl_link);
								  
								// Save file into file location
								$save_file_loc = $fv_theme_zip_upload_dir.$fileName;
								  
								// Open file 
								$fp = fopen($save_file_loc, 'wb');
								  
								// It set an option for a cURL transfer
								curl_setopt($ch, CURLOPT_FILE, $fp);
								curl_setopt($ch, CURLOPT_HEADER, 0);
								  
								// Perform a cURL session
								curl_exec($ch);
								  
								// Closes a cURL session and frees all resources
								curl_close($ch);
								  
								// Close file
								fclose($fp);

							}else{
							    copy( $tmpfile, $fv_theme_zip_upload_dir.$fileName );
							    unlink($tmpfile);
							}

							$determine_theme_dir = search_for_plugin_dir_by_slug($u->slug, $get_theme_directory)['dir'];

							$backup_theme_dir =  $upload_dir["basedir"]."/fv_auto_update_directory/themes/backup/";
							$get_all_themes = scandir($backup_theme_dir);
							foreach($get_all_themes as $single_theme){
								if(strpos($single_theme, $u->slug) !== false){
										delete_old_folder($backup_theme_dir.$single_theme);
								}
							}

							$original_theme_dir = get_theme_root().'/'.$determine_theme_dir; 
							$fv_theme_zip_upload_dir_backup=$upload_dir["basedir"]."/fv_auto_update_directory/themes/backup/".$determine_theme_dir.'-v-'.$single_th['version'];

							if(is_dir($original_theme_dir)){
								if(is_dir($fv_theme_zip_upload_dir_backup)){
								}
								fv_fs_recurse_copy( $original_theme_dir, $fv_theme_zip_upload_dir_backup); // copy old version as backup
							}

							$ext = pathinfo($fileName, PATHINFO_EXTENSION);
							if($ext=='zip'){
								$basename=pathinfo($fileName,  PATHINFO_BASENAME);
								$un= unzip_file($fv_theme_zip_upload_dir.'/'.$basename,get_theme_root());

									$api_params_dif = array(
									    'license_key' => $_data_ls_key_no_id_vf,
									    'license_key_2' => $_data_ls_key_no_id_vf_2,
									    'license_d' => $_ls_domain_sp_id_vf,
									    'license_d_2' => $_ls_domain_sp_id_vf_2,
									    'plugin_theme_slug' => $u->slug,
									    'plugin_theme_version' => $u->version,
									    'license_host'=> $_SERVER['HTTP_HOST'],
									    'license_mode'=> 'update_request_load',
									    'license_v'=> FV_PLUGIN_VERSION,
									);

									$query_dif = esc_url_raw(add_query_arg($api_params_dif, YOUR_LICENSE_SERVER_URL.'update-request-load'));
								    $response = wp_remote_post($query_dif, array('timeout' => 20, 'sslverify' => false));
									if (is_wp_error($response)){
										$response = wp_remote_post($query_dif, array('timeout' => 20, 'sslverify' => true));
										if(is_wp_error($response)){
												echo 'SSLVERIFY ERROR';			
										}
									}


									
								if(!is_wp_error($un)){
									unlink($fv_theme_zip_upload_dir.'/'.$basename);
								}

							}
						}
					}

	            }
	        }
		}

	if($theme_plugin == null || $theme_plugin == 'plugin'){


			if(!empty($license_histories->plugins)){
			    $get_plugin_directory=[];

			    if(!empty($all_plugins)){

			        foreach ($all_plugins as $plugin_slug=>$values){
			            $slugArray=explode('/',$plugin_slug);
			            $version=getPluginVersionFromRepository($values['Version']);
			            $slug=get_plugin_slug_from_data($plugin_slug, $values);
			    		$get_plugin_directory[] = [
			    									'dir' 	 => explode('/',$plugin_slug)[0],
			    									'slug'	 => $slug,
			    									'version'=> $version
			    								  ];
			        }
			    }

	            foreach ($license_histories->plugins as $u){
					foreach($get_plugin_directory as $single_pl){
						if($single_pl['slug'] == $u->slug && version_compare($u->version, $single_pl['version']) > 0){
									
			                $pathInfo=pathinfo($u->slug);
			                $fileName=$pathInfo['filename'].'.zip';
			                

			                $upload_dir      = wp_upload_dir();
			                $fv_plugin_zip_upload_dir=$upload_dir["basedir"]."/fv_auto_update_directory/plugins/";

			                $tmpfile = download_url( $u->dl_link, $timeout = 300 );


							if(is_wp_error($tmpfile) == true){

								// Initialize the cURL session
								$ch = curl_init($u->dl_link);

								$file_name = basename($u->dl_link);
								  
								$save_file_loc = $fv_plugin_zip_upload_dir.$fileName;
								  
								// Open file 
								$fp = fopen($save_file_loc, 'wb');
								  
								// It set an option for a cURL transfer
								curl_setopt($ch, CURLOPT_FILE, $fp);
								curl_setopt($ch, CURLOPT_HEADER, 0);
								  
								// Perform a cURL session
								curl_exec($ch);
								  
								// Closes a cURL session and frees all resources
								curl_close($ch);
								  
								// Close file
								fclose($fp);
								  
							}else{
							    copy( $tmpfile, $fv_plugin_zip_upload_dir.$fileName );
							    unlink($tmpfile);
							}


			            	$determine_plugin_dir = search_for_plugin_dir_by_slug($u->slug, $get_plugin_directory)['dir'];
			                $original_plugin_dir = WP_PLUGIN_DIR.'/'.$determine_plugin_dir;
							$fv_plugin_zip_upload_dir_backup=$upload_dir["basedir"]."/fv_auto_update_directory/plugins/backup/".$determine_plugin_dir;
			                
			                if(is_dir($original_plugin_dir)){
								if(is_dir($fv_plugin_zip_upload_dir_backup)){
								}
			                	fv_fs_recurse_copy( $original_plugin_dir, $fv_plugin_zip_upload_dir_backup); // copy old version as backup
			                }

			                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
					        if($ext=='zip'){
								
					            $basename=pathinfo($fileName,  PATHINFO_BASENAME);
								if(is_dir($original_plugin_dir)){
								}
					            $un= unzip_file($fv_plugin_zip_upload_dir.'/'.$basename,WP_PLUGIN_DIR);

								$api_params_dif = array(
								    'license_key' => $_data_ls_key_no_id_vf,
								    'license_key_2' => $_data_ls_key_no_id_vf_2,
								    'license_d' => $_ls_domain_sp_id_vf,
								    'license_d_2' => $_ls_domain_sp_id_vf_2,
								    'plugin_theme_slug' => $u->slug,
								    'plugin_theme_version' => $u->version,
								    'license_host'=> $_SERVER['HTTP_HOST'],
								    'license_mode'=> 'update_request_load',
								    'license_v'=> FV_PLUGIN_VERSION,
								);

								$query_dif = esc_url_raw(add_query_arg($api_params_dif, YOUR_LICENSE_SERVER_URL.'update-request-load'));
							    $res = wp_remote_post($query_dif, array('timeout' => 20, 'sslverify' => false));
															
								if (is_wp_error($res)){
									$res = wp_remote_post($query_dif, array('timeout' => 20, 'sslverify' => true));
									if(is_wp_error($res)){
											echo 'SSLVERIFY ERROR';			
									}
								}


					            if(!is_wp_error($un)){
					                unlink($fv_plugin_zip_upload_dir.'/'.$basename);
					            }
					        }			
						}
					}
							
			    }
			}
		}
	}
}




function download_and_istall_plugin(){

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }else{
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf_2' );
    }

	$api_params = array(
	    'license_d' => $_ls_domain_sp_id_vf,
	    'license_host'=> $_SERVER['HTTP_HOST'],
	    'license_mode'=> 'download',
	    'license_v'=> FV_PLUGIN_VERSION,
	    'plugin_download_hash'=> 'ff4e1b8e4bc36381389eaac20fae1169',
	    'license_key'=> '53fd42a77eb617e31fca2439f4e51fd20bd96754',
	);

	$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'plugin-download'));
	$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
	
	if (is_wp_error($response)){
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
		if(is_wp_error($response)){
				echo 'SSLVERIFY ERROR';			
		}
	}


	$license_data = json_decode(wp_remote_retrieve_body($response));

	echo json_encode($license_data);

}





function delete_old_folder($path)
{
    if (is_dir($path) === true)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($files as $file)
        {
            if (in_array($file->getBasename(), array('.', '..')) !== true)
            {
                if ($file->isDir() === true)
                {
                    rmdir($file->getPathName());
                }

                else if (($file->isFile() === true) || ($file->isLink() === true))
                {
                    unlink($file->getPathname());
                }
            }
        }

        return rmdir($path);
    }

    else if ((is_file($path) === true) || (is_link($path) === true))
    {
        return unlink($path);
    }

    return false;
}

function fv_fs_recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                fv_fs_recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 


function search_for_plugin_dir_by_slug($slug, $array) {
   foreach ($array as $key => $val) {
       if ($val['slug'] === $slug) {
           return $val;
       }
   }
   return null;
}



function fv_auto_update_install(){
    require_once(ABSPATH .'/wp-admin/includes/file.php');
    WP_Filesystem();
    $upload_dir      = wp_upload_dir();
    $fv_plugin_zip_upload_dir=$upload_dir["basedir"]."/fv_auto_update_directory/plugins";
    $files_inside_dir = scandir($fv_plugin_zip_upload_dir);
    foreach($files_inside_dir as $ind_file){
        $ext = pathinfo($ind_file, PATHINFO_EXTENSION);
        if($ext=='zip'){
            $basename=pathinfo($ind_file,  PATHINFO_BASENAME);
            $un= unzip_file($fv_plugin_zip_upload_dir.'/'.$basename,WP_PLUGIN_DIR);
            if(!is_wp_error($un)){
                unlink($fv_plugin_zip_upload_dir.'/'.$basename);
            }

        }
    }
    $fv_theme_zip_upload_dir=$upload_dir["basedir"]."/fv_auto_update_directory/themes";
    $files_inside_dir = scandir($fv_theme_zip_upload_dir);
    foreach($files_inside_dir as $ind_file){
        $ext = pathinfo($ind_file, PATHINFO_EXTENSION);
        if($ext=='zip'){
            $basename=pathinfo($ind_file,  PATHINFO_BASENAME);
            $un= unzip_file($fv_theme_zip_upload_dir.'/'.$basename,WP_CONTENT_DIR.'/themes');
            if(!is_wp_error($un)){
                unlink($fv_theme_zip_upload_dir.'/'.$basename);
            }

        }
    }
}




function festinger_vault_settings_function(){
	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }

		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'get_all_license_data',
		    'license_v'=> FV_PLUGIN_VERSION,
		    'plugins_and_themes' => get_plugin_theme_data('all_plugins_themes'),
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'get-all-license-data'));
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));
		
		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}

		$all_license_data = json_decode(wp_remote_retrieve_body($response));

		if($all_license_data->license_1->options->white_label == 'no' && $all_license_data->license_2->options->white_label=='no'){

			if(get_option('wl_fv_plugin_agency_author_wl_') == true){
				delete_option('wl_fv_plugin_agency_author_wl_', htmlspecialchars($_POST['agency_author']));
			}


			if(get_option('wl_fv_plugin_author_url_wl_') == true){
				delete_option('wl_fv_plugin_author_url_wl_', htmlspecialchars($_POST['agency_author_url']));
			}



			if(get_option('wl_fv_plugin_slogan_wl_') == true){
				delete_option('wl_fv_plugin_slogan_wl_', htmlspecialchars($_POST['fv_plugin_slogan']));
			}


			if(get_option('wl_fv_plugin_icon_url_wl_') == true){
				delete_option('wl_fv_plugin_icon_url_wl_', htmlspecialchars($_POST['fv_plugin_icon_url']));
			}


			if(get_option('wl_fv_plugin_name_wl_') == true){
				delete_option('wl_fv_plugin_name_wl_', htmlspecialchars($_POST['fv_plugin_name']));
			}


			if(get_option('wl_fv_plugin_description_wl_') == true){
				delete_option('wl_fv_plugin_description_wl_', htmlspecialchars($_POST['fv_plugin_description']));
			}


			if(get_option('wl_fv_plugin_wl_enable') == true){
				delete_option('wl_fv_plugin_wl_enable', htmlspecialchars($_POST['fv_plugin_wl_enable']));
			}


		}
		include( FV_PLUGIN_DIR . '/sections/fv_settings.php');
}


function festinger_vault_plugins_inside () {


	$_ls_domain_sp_id_vf ='';
	$_data_ls_key_no_id_vf='';

	$_ls_domain_sp_id_vf_2 ='';
	$_data_ls_key_no_id_vf_2='';

	if(get_option('_data_ls_key_no_id_vf') && get_option('_ls_domain_sp_id_vf')){
		$_ls_domain_sp_id_vf = get_option( '_ls_domain_sp_id_vf' );
		$_data_ls_key_no_id_vf = get_option( '_data_ls_key_no_id_vf' );
    }

	if(get_option('_data_ls_key_no_id_vf_2') && get_option('_ls_domain_sp_id_vf_2')){
		$_ls_domain_sp_id_vf_2 = get_option( '_ls_domain_sp_id_vf_2' );
		$_data_ls_key_no_id_vf_2 = get_option( '_data_ls_key_no_id_vf_2' );
    }


		$api_params = array(
		    'license_key' => $_data_ls_key_no_id_vf,
		    'license_key_2' => $_data_ls_key_no_id_vf_2,
		    'license_d' => $_ls_domain_sp_id_vf,
		    'license_d_2' => $_ls_domain_sp_id_vf_2,
		    'license_host'=> $_SERVER['HTTP_HOST'],
		    'license_mode'=> 'get_all_license_data',
		    'license_v'=> FV_PLUGIN_VERSION,
		    'plugins_and_themes' => get_plugin_theme_data('all_plugins_themes'),
		);

		$query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL.'get-all-license-data'));
		$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => false));

		if (is_wp_error($response)){
			$response = wp_remote_post($query, array('timeout' => 20, 'sslverify' => true));
			if(is_wp_error($response)){
					echo 'SSLVERIFY ERROR';			
			}
		}


		$all_license_data = json_decode(wp_remote_retrieve_body($response));



		if($all_license_data->license_1->options->white_label == 'no' && $all_license_data->license_2->options->white_label=='no'){

			if(get_option('wl_fv_plugin_agency_author_wl_') == true){
				delete_option('wl_fv_plugin_agency_author_wl_', htmlspecialchars($_POST['agency_author']));
			}


			if(get_option('wl_fv_plugin_author_url_wl_') == true){
				delete_option('wl_fv_plugin_author_url_wl_', htmlspecialchars($_POST['agency_author_url']));
			}



			if(get_option('wl_fv_plugin_slogan_wl_') == true){
				delete_option('wl_fv_plugin_slogan_wl_', htmlspecialchars($_POST['fv_plugin_slogan']));
			}


			if(get_option('wl_fv_plugin_icon_url_wl_') == true){
				delete_option('wl_fv_plugin_icon_url_wl_', htmlspecialchars($_POST['fv_plugin_icon_url']));
			}


			if(get_option('wl_fv_plugin_name_wl_') == true){
				delete_option('wl_fv_plugin_name_wl_', htmlspecialchars($_POST['fv_plugin_name']));
			}


			if(get_option('wl_fv_plugin_description_wl_') == true){
				delete_option('wl_fv_plugin_description_wl_', htmlspecialchars($_POST['fv_plugin_description']));
			}


			if(get_option('wl_fv_plugin_wl_enable') == true){
				delete_option('wl_fv_plugin_wl_enable', htmlspecialchars($_POST['fv_plugin_wl_enable']));
			}


		}
		include( FV_PLUGIN_DIR . '/sections/fv_plugins.php');
} 






function get_adm_men_author(){
	if(get_option('wl_fv_plugin_agency_author_wl_') == true){
		return get_option('wl_fv_plugin_agency_author_wl_');
	}else{
		return 'Festinger Vault';
	}
}
function get_adm_men_author_uri(){
	if(get_option('wl_fv_plugin_author_url_wl_') == true){
		return get_option('wl_fv_plugin_author_url_wl_');
	}else{
		return 'https://festingervault.com/';
	}
}

function get_adm_men_name(){
	if(get_option('wl_fv_plugin_name_wl_') == true){
		return get_option('wl_fv_plugin_name_wl_');
	}else{
		return 'Festinger Vault';
	}
}

function get_adm_men_description(){
	if(get_option('wl_fv_plugin_description_wl_') == true){
		return get_option('wl_fv_plugin_description_wl_');
	}else{
		return 'Get access to 5000+ kick-ass premium WordPress themes and plugins. Now directly from your WP dashboard';
	}
}

function get_adm_men_slogan(){

	if(get_option('wl_fv_plugin_slogan_wl_') == true){
		return get_option('wl_fv_plugin_slogan_wl_');
	}else{
		return 'Your WordPress goldmine with over 5000+ premium themes and plugins.';
	}

}



function get_adm_men_img(){
	if(get_option('wl_fv_plugin_icon_url_wl_') == true){
		return get_option('wl_fv_plugin_icon_url_wl_');
	}else{
		return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAATCAYAAACZZ43PAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAC4jAAAuIwF4pT92AAAAB3RJTUUH5AobDzcbnZcV7gAAA5JJREFUOMs1jU2IVlUYgJ/3Pffc+935cX6axmkUsyBEAiMEi1KT0DbVQoMQg5gwRU0JgqAITCpctDLIVUTRQiRKihb9Q4Gm0KYWEYXmH45jjY7z933fvfec87awnv3zPMJ/nNpwhD4FDxIEG3T0pW46VE11L0yeu3K05UftweZ1Nu08gQA/vL8NAAX4bv0RFKgNmQzRcqO/jvaq5bo3BLa2WDKYmbHjqWP//3hk14lbgc8fviVXhkzHaMNOBxqzgwF5KWXaE+CeRLas2+eZ7m2JiMMEwWDjnhOoAAuGXI7JetUN1CaHauNA8K7VJKijFcFJueHma9SecUtxKBXJcAiAtg2mothtKkOV2RuV2b5Q+iJ4R6cTaFep2zht73/yQxCGzdkBCTLi+jMzBd3+2wIDaoNdkzdrY2/IszwUns5izdxMQ7tKZ0MmkxcHCiyz82SyTpwcTp04NDLdh763ut93jRcqY1el6munLM52WJgLzE437Ro5FnK9ueJ6W6zQtnn+xMsEXl68NjqXZ12zBxLsNiEXEazd4LqR5lo9b8HedZl8HGKykIvU/S75TrhhgleR3ap6UrsmO7rG8spgsUnMBFuYnw2fVlWaCE7f2tb5fl5R/rpribkQsFyc5YK23Bhens26Zo/OJ9PryfjHYN7s9FIne+7zMj0a4XjPZk6vH6NTqtCSDGOFAVnhpKLZlF0KaeXZJjAvivkMnExdGsrnLvqMZ/7uMNAYZ9aN4mM0chmyxBoVRUslBcazP1LKFp0iPkOKHJwOlar51EBeH1w9RnZ4OeNfzRByhy6mtRir1CkhMywXtOOzq9rySMtDmWM9xWrrLZb1jC3ljjTN2JkFft2/EUn0WyETlku/lo5KAlYwrXJ7eYrCG7nHygJ6WnfSWz5li5WL94+zcKFmzQcnMyt4zgqekFKwAuosQSE/u5U7J9Bat1jXSgqP9ZVKmd9rfeXV5srI78NbUh4tTuA4hJPBvPA0RJKkOVPezqpNvV+Xo61Pigvh+TQVpPYFsZWPSeHe6V3VrA117LNcnsZY4lCaGIlNhMRnGF/I5l9+5Mbl2RVF0KNF1z3uKieGEiRSW0OQCIAkAxOIZhjfIuwz4Zwbfmwr1ydnZsvB8qcmS3nlw9211mVjjSRLSACpDCqDwA3gI5BXMM6rCJmoMrp8BIJdlEJfNktfomwX5SGLLMNSJjAFnDQ4jvGNibUVBYN/AUgy0nipeFoZAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIwLTEwLTI3VDE1OjU1OjI3LTA0OjAwidlN3AAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMC0xMC0yN1QxNTo1NToyNy0wNDowMPiE9WAAAAAASUVORK5CYII=';
	}
}


if(isset($_POST)){

	if(!empty($_POST['fv_wl_submit']) && $_POST['fv_wl_submit']){
		


			delete_option('wl_fv_plugin_agency_author_wl_', htmlspecialchars($_POST['agency_author']));

			delete_option('wl_fv_plugin_author_url_wl_', htmlspecialchars($_POST['agency_author_url']));

			delete_option('wl_fv_plugin_slogan_wl_', htmlspecialchars($_POST['fv_plugin_slogan']));

			delete_option('wl_fv_plugin_icon_url_wl_', htmlspecialchars($_POST['fv_plugin_icon_url']));

			delete_option('wl_fv_plugin_name_wl_', htmlspecialchars($_POST['fv_plugin_name']));

			delete_option('wl_fv_plugin_description_wl_', htmlspecialchars($_POST['fv_plugin_description']));




		if(get_option('wl_fv_plugin_agency_author_wl_') == true){
			update_option('wl_fv_plugin_agency_author_wl_', htmlspecialchars($_POST['agency_author']));
		}else{
			add_option('wl_fv_plugin_agency_author_wl_', htmlspecialchars($_POST['agency_author']));
		}


		if(get_option('wl_fv_plugin_author_url_wl_') == true){
			update_option('wl_fv_plugin_author_url_wl_', htmlspecialchars($_POST['agency_author_url']));
		}else{
			add_option('wl_fv_plugin_author_url_wl_', htmlspecialchars($_POST['agency_author_url']));
		}



		if(get_option('wl_fv_plugin_slogan_wl_') == true){
			update_option('wl_fv_plugin_slogan_wl_', htmlspecialchars($_POST['fv_plugin_slogan']));
		}else{
			add_option('wl_fv_plugin_slogan_wl_', htmlspecialchars($_POST['fv_plugin_slogan']));
		}


		if(get_option('wl_fv_plugin_icon_url_wl_') == true){
			update_option('wl_fv_plugin_icon_url_wl_', htmlspecialchars($_POST['fv_plugin_icon_url']));
		}else{
			add_option('wl_fv_plugin_icon_url_wl_', htmlspecialchars($_POST['fv_plugin_icon_url']));
		}


		if(get_option('wl_fv_plugin_name_wl_') == true){
			update_option('wl_fv_plugin_name_wl_', htmlspecialchars($_POST['fv_plugin_name']));
		}else{
			add_option('wl_fv_plugin_name_wl_', htmlspecialchars($_POST['fv_plugin_name']));
		}


		if(get_option('wl_fv_plugin_description_wl_') == true){
			update_option('wl_fv_plugin_description_wl_', htmlspecialchars($_POST['fv_plugin_description']));
		}else{
			add_option('wl_fv_plugin_description_wl_', htmlspecialchars($_POST['fv_plugin_description']));
		}

	if(!empty($_POST['fv_plugin_wl_enable'])){

		if(get_option('wl_fv_plugin_wl_enable') == true){
			update_option('wl_fv_plugin_wl_enable', htmlspecialchars($_POST['fv_plugin_wl_enable']));
		}else{
			add_option('wl_fv_plugin_wl_enable', htmlspecialchars($_POST['fv_plugin_wl_enable']));
		}
	}


}

}



if(isset($_POST) && !empty($_POST['fv_admin_notice']) && $_POST['fv_admin_notice']){

	if(!empty($_POST['an_fv_dis_adm_not_hid'])){
		if(get_option('an_fv_dis_adm_not_hid') == false){
			add_option('an_fv_dis_adm_not_hid', 1);
		}
	}else{
		delete_option('an_fv_dis_adm_not_hid');
	}


	if(!empty($_POST['an_fv_all_adm_not_hid'])){
		if(get_option('an_fv_all_adm_not_hid') == false){
			add_option('an_fv_all_adm_not_hid', 1);
		}
	}else{
		delete_option('an_fv_all_adm_not_hid');
	}

}

if(isset($_POST) && !empty($_POST['pluginforceupdate']) && $_POST['pluginforceupdate']){
	add_action( 'init', 'process_post222' );
	function process_post222() {
		fv_auto_update_download('plugin');
		wp_redirect(admin_url('admin.php?page=festinger-vault-updates&force=success'));
	}	


}

if(isset($_POST) && !empty($_POST['themeforceupdate']) && $_POST['themeforceupdate']){
	add_action( 'init', 'process_post_theme' );
	function process_post_theme() {
		fv_auto_update_download('theme');
		wp_redirect(admin_url('admin.php?page=festinger-vault-theme-updates&force=success'));
	}	
}

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}



if(get_option('an_fv_all_adm_not_hid') == true){

	add_action('admin_enqueue_scripts', 'block_dismissable_admin_notices');
	add_action('login_enqueue_scripts', 'block_dismissable_admin_notices');

	function block_dismissable_admin_notices() {
	   echo '<style>.wp-core-ui .notice{ display: none !important; }</style>';
	}

	add_action('admin_enqueue_scripts', 'block_admin_notices');
	add_action('login_enqueue_scripts', 'block_admin_notices');

	function block_admin_notices() {

	    global $wp_filter;

	    if (is_user_admin()) {
	        if (isset($wp_filter['user_admin_notices'])) {
	        }
	    } elseif (isset($wp_filter['admin_notices'])) {
	    }
	}
	  
	add_action( 'init', 'remove_my_action' );
	function remove_my_action()
	{
	global $wp_filter;
	}

	add_action( 'init', 'remove_my_action2' );
	function remove_my_action2()
	{
	global $wp_filter;
	remove_action( 'admin_notices', 'rocket_warning_htaccess_permissions');
	remove_action( 'admin_notices', 'rocket_warning_config_dir_permissions');
	}

}


function get_plugin_basefile_by_slug($given_slug){

	$all_plugins = get_plugins();

	    if(!empty($all_plugins)){

	        foreach ($all_plugins as $plugin_slug=>$values){

	            $slug=get_plugin_slug_from_data($plugin_slug, $values);
	            if($given_slug == $slug){
	            	return $plugin_slug;
	            }
	    	
	        }
	    }
}



function generatePluginActivationLinkUrl($plugin)
{
    if (strpos($plugin, '/')) {
        $plugin = str_replace('/', '%2F', $plugin);
    }

    $activateUrl = sprintf(admin_url('plugins.php?action=activate&plugin=%s&plugin_status=all&paged=1&s'), $plugin);
    $_REQUEST['plugin'] = $plugin;
    $activateUrl = wp_nonce_url($activateUrl, 'activate-plugin_' . $plugin);

    return $activateUrl;
}


if(isset($_GET['actionrun']) && isset($_GET['activeslug'])){
	add_action( 'init', 'action_run_pl_act' );
	function action_run_pl_act() {
		activate_plugin(get_plugin_basefile_by_slug($_GET['activeslug']));
		$returndataurl = admin_url('admin.php?page=festinger-vault&installation=success&slug='.$_GET['activeslug']);
		wp_redirect( $returndataurl );
		header('Location: '.$returndataurl);
		exit;
	}
}

if(get_option('an_fv_dis_adm_not_hid') == true){

	add_action('admin_enqueue_scripts', 'block_dismissable_admin_notices2');
	add_action('login_enqueue_scripts', 'block_dismissable_admin_notices2');

	function block_dismissable_admin_notices2() {
	   echo '<style>.is-dismissible { display: none !important; }</style>';
	}

}

function check_rollback_availability($slug, $version, $plugin_or_theme){

	$upload_dir = wp_upload_dir();

	if($plugin_or_theme == 'plugin'){
		$plugin_base_file_get = get_plugin_basefile_by_slug($slug);
		$backup_plugin_dir =  $upload_dir["basedir"]."/fv_auto_update_directory/plugins/backup/".$plugin_base_file_get;


		if (file_exists($backup_plugin_dir)) {   
			if(version_compare($version,  get_plugin_data($backup_plugin_dir)['Version']) == 1){
		?>
					<form name="plugin_rollback" method="POST" onSubmit="if(!confirm('Are you sure want to rollback?')){return false;}">
						<input type="hidden" name="slug" value="<?= $slug;?>"/>
						<input type="hidden" name="version" value="<?= $version;?>"/>
						<button class="btn btn-sm float-end btn-custom-color" id="pluginrollback" type="submit" name="pluginrollback" value="plugin">Rollback <?= get_plugin_data($backup_plugin_dir)['Version'];?></button>
					</form>
		<?php
			}else{
				echo "<div class='btn non_active_button'>Not Available</div>";
			}
		}else{
			echo "<div class='btn non_active_button'>Not Available</div>";
		}

	}

	if($plugin_or_theme == 'theme'){



		$backup_theme_dir =  $upload_dir["basedir"]."/fv_auto_update_directory/themes/backup/";
		$get_all_themes = scandir($backup_theme_dir);

		foreach($get_all_themes as $single_theme){
			if(strpos($single_theme, $slug) !== false){
			    $theme_full = explode("-v-", $single_theme);
			    $theme_name = $theme_full[0];
			    $theme_version = $theme_full[1];
				if (file_exists($backup_theme_dir.$single_theme)) {   
					if(version_compare($version,  $theme_version) == 1){
				?>
							<form name="theme_rollback" method="POST" onSubmit="if(!confirm('Are you sure want to rollback this theme?')){return false;}">
								<input type="hidden" name="slug" value="<?= $slug;?>"/>
								<input type="hidden" name="version" value="<?= $version;?>"/>
								<button class="btn btn-sm float-end btn-custom-color" id="themerollback" type="submit" name="themerollback" value="plugin">Rollback <?= $theme_version;?></button>
							</form>
				<?php
					}else{
						echo "<div class='btn non_active_button'>Not Available</div>";
					}
				}else{
					echo "<div class='btn non_active_button'>Not Available</div>";
				}
			}	
		}
    }

}



if(isset($_POST) && !empty($_POST['themerollback']) && $_POST['themerollback']){
	add_action( 'init', 'rollback_theme' );
	function rollback_theme() {

		$upload_dir      = wp_upload_dir();
		$backup_theme_dir =  $upload_dir["basedir"]."/fv_auto_update_directory/themes/backup/";
		$get_all_themes = scandir($backup_theme_dir);

		foreach($get_all_themes as $single_theme){
			if(strpos($single_theme, $_POST['slug']) !== false){
			    $theme_full = explode("-v-", $single_theme);
			    $theme_name = $theme_full[0];
			    $theme_version = $theme_full[1];
				if (file_exists($backup_theme_dir.$single_theme)) {   
					if(version_compare($_POST['version'],  $theme_version) == 1){
						$original_theme_dir = get_theme_root().'/'.$_POST['slug'].'/'; 
				        if(is_dir($original_theme_dir)){
				        	fv_fs_recurse_copy($backup_theme_dir.$single_theme.'/', $original_theme_dir); // copy old version as backup
				        }
					}
				}
			}	
		}
		wp_redirect(admin_url('admin.php?page=festinger-vault-theme-updates&rollback=success'));

	}	
}






if(isset($_POST) && !empty($_POST['pluginrollback']) && $_POST['pluginrollback']){
	add_action( 'init', 'rollback_plugin' );
	function rollback_plugin() {

	$upload_dir      = wp_upload_dir();
	$plugin_base_file_get = get_plugin_basefile_by_slug($_POST['slug']);
	$backup_plugin_dir =  $upload_dir["basedir"]."/fv_auto_update_directory/plugins/backup/".$plugin_base_file_get;
	$backup_plugin_only_dir =  $upload_dir["basedir"]."/fv_auto_update_directory/plugins/backup/".$_POST['slug'].'/';
		if (file_exists($backup_plugin_dir)) {   
			if(version_compare($_POST['version'],  get_plugin_data($backup_plugin_dir)['Version']) == 1){
		        $original_plugin_dir = WP_PLUGIN_DIR.'/'.$_POST['slug'].'/';
		        if(is_dir($original_plugin_dir)){
		        	fv_fs_recurse_copy($backup_plugin_only_dir, $original_plugin_dir); // copy old version as backup
		        }
	    	}

		}

		wp_redirect(admin_url('admin.php?page=festinger-vault-updates&rollback=success'));

	}	
}





function auto_update_specific_plugins( $update, $item ) {
  $plugins = array(
    'festingervault',
  );

  if ( in_array( $item->slug, $plugins, true ) ) {

    return true;
  } else {

    return $update;
  }
}
add_filter( 'auto_update_plugin', 'auto_update_specific_plugins', 10, 2 );
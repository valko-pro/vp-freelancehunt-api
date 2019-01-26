<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name:       VP+ Freelancehunt API
 * Plugin URI:        http://valko.pro/plugins/vpp-freelancehunt-api
 * Description:       This plugin allows you to work with API freelancehunt.com
 * Version:           1.0
 * Author:            Oleg Valko
 * Author URI:        http://valko.pro/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vppfa
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

add_action( 'plugins_loaded', 'vppfa_load_plugin_textdomain' );

function vppfa_load_plugin_textdomain() {
  load_plugin_textdomain( 'vppfa', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

// Require files
require_once plugin_dir_path( __FILE__ ) . 'includes/api.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/dashboard.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/options.php';

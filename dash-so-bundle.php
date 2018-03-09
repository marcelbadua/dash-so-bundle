<?php
/*
Plugin Name:       	Dash: SiteOrigin Widget Bundle
Plugin URI:        	https://github.com/marcelbadua/dash-so-bundle
Description:       	Widget by Dash. Requires 'Page Builder by SiteOrigin' and 'SiteOrigin Widgets Bundle' to be installed.
Version:           	2.0.1
Author: 						Marcel Badua
Author URI: 				http://marcelbadua.com/
License: 						GPL3
License URI: 				https://www.gnu.org/licenses/gpl-3.0.txt


*/

/*
Copyright (C) 2018  Marcel Badua  bitterdash@gmail.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'plugins_loaded', array( 'DASH_SO_WIDGET_BUNDLE', 'get_instance' ) );
register_activation_hook( __FILE__, array( 'DASH_SO_WIDGET_BUNDLE', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'DASH_SO_WIDGET_BUNDLE', 'deactivate' ) );
// register_uninstall_hook( __FILE__, array( 'DASH_SO_WIDGET_BUNDLE', 'uninstall' ) );

class DASH_SO_WIDGET_BUNDLE {

	private static $instance = null;

	public static function get_instance() {
		if ( ! isset( self::$instance ) )
			self::$instance = new self;

		return self::$instance;
	}

	private function __construct() {

		require_once( sprintf("%s/inc/required.php", dirname(__FILE__)) );

		add_filter('siteorigin_widgets_widget_folders', array(&$this, 'dash_so_widget_bundle_collection'));

	}

	public function dash_so_widget_bundle_collection($folders){

    	$folders[] = dirname(__FILE__) . '/widgets/';

    	return $folders;
	}

	public static function activate() {}

	public static function deactivate() {}

/*
	public static function uninstall() {
		if ( __FILE__ != WP_UNINSTALL_PLUGIN )
			return;
	}
*/
}

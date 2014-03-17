<?php defined('WPLANG') or die('No direct script access.');
/*!
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA 
 */

/**
 * @package LoginMonitor
 * @version 1.0
 */
/*
Plugin Name: Login Monitor
Plugin URI: http://www.lukeschreur.com/projects/wordpress/login-monitor
Description: Adds functionality to monitor failed log in attempts and sends out an email to the website administrator when ever a failed login attempt occurs.
Author: Luke Schreur
Version: 1.0
Author URI: http://www.lukeschreur.com
*/

define('LOGIN_MONITOR_PLUGIN_DIR', dirname(__FILE__) );
define('LOGIN_MONITOR_PLUGIN_URL', plugin_dir_url(__FILE__) );

if( !function_exists('_wp_filepath') )
{
	/**
	 * This function converts paths with forward-slashes to WordPress system
	 * valid paths that use the DIRECTORY_SEPERATOR constant. E.g. on a
	 * Windows system this seperator is set to a back-slash (\) whereas on 
	 * Unix-like systems this seperator is set to a forward-slash (/).
	 *
	 * @param string $path
	 */
	function _wp_filepath( $path )
	{
		return str_replace("/", DIRECTORY_SEPARATOR, $path );
	}
}

// Functions
require_once( _wp_filepath( LOGIN_MONITOR_PLUGIN_DIR."/functions/_log.php") );
require_once( _wp_filepath( LOGIN_MONITOR_PLUGIN_DIR."/functions/_autoload.php") );
require_once( _wp_filepath( LOGIN_MONITOR_PLUGIN_DIR."/functions/get_real_ip_address.php") );
require_once( _wp_filepath( LOGIN_MONITOR_PLUGIN_DIR."/functions/wp_authenticate.php") );

/*!
 * EOF;
 */

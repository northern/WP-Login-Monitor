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

function _login_monitor_autoloader( $class_name ) 
{
	$class_name = str_replace("_", DIRECTORY_SEPARATOR, strtolower( $class_name ) );
	
	$class_files = array(
		_wp_filepath( LOGIN_MONITOR_PLUGIN_DIR."/classes/$class_name.php" ),
		_wp_filepath( LOGIN_MONITOR_PLUGIN_DIR."/classes/$class_name.php" ),
	);
	
	foreach( $class_files as $class_file )
	{
		if( file_exists( $class_file ) )
		{
			require_once( $class_file );
			break;
		}
		else
		{
			if( function_exists("__autoload") )
			{
				__autoload( $class_name );
			}
		}
	}
}

spl_autoload_register("_login_monitor_autoloader");

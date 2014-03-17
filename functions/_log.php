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

if( !function_exists('_log') )
{
	function _log( $message, $type = "info" ) 
	{
		if( WP_DEBUG === TRUE )
		{
			if( is_array( $message ) || is_object( $message ) )
			{
				error_log( print_r( $message, TRUE ) );
			}
			else
			{
				error_log( $message );
			}
		}
	}
}

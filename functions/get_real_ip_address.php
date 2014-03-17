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

if( ! function_exists('get_real_ip_address') )
{
	function get_real_ip_address()
	{
		$keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
		
		foreach( $keys as $key)
		{
			if( array_key_exists($key, $_SERVER) === TRUE )
			{
				foreach( explode(',', $_SERVER[$key]) as $ip )
				{
					if( filter_var( $ip, FILTER_VALIDATE_IP ) !== FALSE )
					{
						return $ip;
					}
				}
			}
		}
		
		return NULL;
	}
}

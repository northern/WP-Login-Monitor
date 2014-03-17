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

if( ! function_exists('wp_authenticate') )
{
	function wp_authenticate($username, $password)
	{
		$username = sanitize_user($username);
		$password = trim($password);

		$user = apply_filters('authenticate', NULL, $username, $password);

		if( !empty( $username ) AND !empty( $password ) AND is_wp_error( $user ) )
		{
			$email_to = get_bloginfo("admin_email");
			$email_subject = "A failed log in attempt on ".get_bloginfo("name");
			$email_message = "\n".
					"User name: $username\n".
					"Password: $password\n".
					"IP Address: ".get_real_ip_address()."\n";
			$email_headers[] = "From: Website <".get_bloginfo("admin_email").">\n";
			
			wp_mail( $email_to, $email_subject, $email_message, $email_headers );

			do_action('wp_login_failed', $username);
		}

		return $user;
	}
}

<?php
/**
 * groups.php
 *
 * Copyright (c) 2018 "kento" Karim Rahimpur www.itthinx.com
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author Karim Rahimpur
 * @package groups-woocommerce-keep-expired-subscriptions
 * @since 1.0.0
 *
 * Plugin Name: Groups WooCommerce Keep Expired Subscriptions
 * Plugin URI: http://www.itthinx.com/plugins/groups
 * Description: An extension to Groups WooCommerce. With this plugin enabled, when a subscription expires, instead of removing the group membership for the related user account, it will be kept.
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: http://www.itthinx.com
 * Donate-Link: http://www.itthinx.com
 * License: GPLv3
 */

/**
 * Plugin main class.
 */
class Groups_WooCommerce_KES {

	/**
	 * Adds the status update filter.
	 */
	public static function init() {
		add_filter( 'groups_woocommerce_handle_woocommerce_subscription_status_updated', array( __CLASS__, 'updated' ), 10, 4 );
	}

	/**
	 * Acts only when $new_status === 'expired' for subscriptions and returns false to avoid having the group membership removed.
	 * In any other case, $handle is returned as it is.
	 *
	 * @param boolean $handle
	 * @param WC_Subscription $subscription
	 * @param string $new_status
	 * @param string $old_status
	 * @return boolean
	 */
	public static function updated( $handle, $subscription, $new_status, $old_status ) {
		if ( $new_status === 'expired' ) {
			$handle = false;
		}
		return $handle;
	}
}
Groups_WooCommerce_KES::init();

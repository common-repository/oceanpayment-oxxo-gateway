<?php
/*
	Plugin Name: Oceanpayment OXXO Gateway
	Plugin URI: http://www.oceanpayment.com/
	Description: WooCommerce Oceanpayment Konbini Gateway.
	Version: 6.0
	Author: Oceanpayment
	Requires at least: 4.0
	Tested up to: 6.1
    Text Domain: oceanpayment-oxxo-gateway
*/


/**
 * Plugin updates
 */

load_plugin_textdomain( 'wc_oceanoxxo', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );

add_action( 'plugins_loaded', 'woocommerce_oceanoxxo_init', 0 );

/**
 * Initialize the gateway.
 *
 * @since 1.0
 */
function woocommerce_oceanoxxo_init() {

	if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;

	require_once( plugin_basename( 'class-wc-oceanoxxo.php' ) );

	add_filter('woocommerce_payment_gateways', 'woocommerce_oceanoxxo_add_gateway' );

} // End woocommerce_oceanoxxo_init()

/**
 * Add the gateway to WooCommerce
 *
 * @since 1.0
 */
function woocommerce_oceanoxxo_add_gateway( $methods ) {
	$methods[] = 'WC_Gateway_Oceanoxxo';
	return $methods;
} // End woocommerce_oceanoxxo_add_gateway()
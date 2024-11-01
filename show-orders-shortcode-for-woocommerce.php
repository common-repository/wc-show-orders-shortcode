<?php
/*
Plugin Name: Show Orders Shortcode for WooCommerce
Plugin URI: https://wordpress.org/plugins/wc-show-orders-shortcode
Description: Adds a shortcode to display WooCommerce orders. Usage [show_wc_orders] to show all orders - [show_wc_orders order_count=10] to show 10 orders. Replace 10 with x to show x orders.
Author: Con
Author URI: http://conschneider.de/
Version: 1.1.0
*/

defined( 'ABSPATH' ) || exit;

function cssws_show_wc_orders_sc( $atts )
{
    extract( shortcode_atts( array(
        'order_count' => -1
    ), $atts ) );

    if ( is_user_logged_in() ) {

        ob_start();
        wc_get_template( 'myaccount/my-orders.php', array(
            'current_user'  => get_user_by( 'id', get_current_user_id() ),
            'order_count'   => $order_count
        ) );

        return ob_get_clean();

    } else {

        return;

    }
}
add_shortcode('show_wc_orders', 'cssws_show_wc_orders_sc');


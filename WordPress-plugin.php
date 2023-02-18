<?php
/*
Plugin Name: Bitcoin Price Display
Description: Display current Bitcoin price on your website.
Version: 1.0
Author: Abdelnasser Hajihashemabad
Author URI: https://abdelnasser.com
License: GPL2
*/

// Main function for displaying Bitcoin price
function bitcoin_price_display() {
    // Enqueue the CSS file
    wp_enqueue_style( 'bitcoin-price-style', plugin_dir_url( __FILE__ ) . 'css/bitcoin-price-style.css' );

    // Get Bitcoin price data from an API
    $url = 'https://api.coindesk.com/v1/bpi/currentprice.json';
    $response = wp_remote_get( $url );
    $body = wp_remote_retrieve_body( $response );
    $data = json_decode( $body );
    $price = $data->bpi->USD->rate;

    // Display the Bitcoin price
    $html = '<div class="bitcoin-price">';
    $html .= '<div class="title">Bitcoin Price</div>';
    $html .= '<div class="price">' . $price . ' USD</div>';
    $html .= '</div>';

    echo $html;
}

// Add the plugin to the WordPress system
add_action( 'wp_footer', 'bitcoin_price_display' );

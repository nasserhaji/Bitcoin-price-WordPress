function bitcoin_price_add_styles() {
    wp_enqueue_style( 'bitcoin-price-styles', plugin_dir_url( __FILE__ ) . 'css/bitcoin-price.css' );
}

add_action( 'wp_enqueue_scripts', 'bitcoin_price_add_styles' );

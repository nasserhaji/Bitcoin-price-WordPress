# Bitcoin Price Display Plugin for WordPress
The Bitcoin Price Display plugin allows website owners to easily display the current price of Bitcoin on their WordPress website. The plugin uses the Coindesk API to retrieve the current Bitcoin price, and displays it in a styled box at the bottom of all pages of the website.
The Bitcoin Price Display plugin for WordPress allows you to display the current price of Bitcoin on your website. The plugin uses the Coindesk API to retrieve the latest Bitcoin price and displays it in a styled box at the bottom of your website pages. This plugin is useful for websites that provide information or services related to cryptocurrencies or for websites that want to keep their users informed about the current Bitcoin price.

To use this plugin, you simply need to install and activate it on your WordPress website. Once activated, the Bitcoin price will be automatically displayed on all pages of your website.

### Features
* Display current Bitcoin price on website
* Uses the Coindesk API
* Easy to install and use
* Styled box display on bottom of all pages

### Installation
1. Download the plugin files from the GitHub repository.
2. Upload the bitcoin-price-display folder to the /wp-content/plugins/ directory of your WordPress installation.
3. Activate the plugin through the 'Plugins' menu in WordPress.

### Usage
1. Once the plugin is activated, the Bitcoin price will be displayed at the bottom of all pages of the website.
2. To change the style of the box, modify the bitcoin-price-display/css/bitcoin-price-display.css file.

### License
The Bitcoin Price Display plugin is open source software licensed under the MIT License. See the LICENSE file for more information.

### Support
For support, please create an issue on the [GitHub repository](https://github.com/hashemabadi/Bitcoin-price-WordPress).

###Contributions
Contributions are welcome and encouraged! To contribute to the Bitcoin Price Display plugin, please create a pull request on the [GitHub repository](https://github.com/hashemabadi/Bitcoin-price-WordPress).

### Credits
The Bitcoin Price Display plugin was developed by [Abdelnasser Hajihashemabad](https://abdelnasser.com).

### Code
```scss
function get_bitcoin_price() {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.coinbase.com/v2/prices/spot?currency=USD');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);
  $data = json_decode($output);
  return $data->data->amount;
}
```php
<div class="bitcoin-price">
  <p>Bitcoin Price: <?php echo get_bitcoin_price(); ?> USD</p>
</div>
```
```css
.bitcoin-price {
  background-color: #f8f8f8;
  border: 1px solid #ccc;
  padding: 10px;
  margin: 10px 0;
}
```
```php
<?php
/*
Plugin Name: Bitcoin Price Display
Description: Display current Bitcoin price on your website.
Version: 1.0
Author: Abdelnasser Hajihashemabad
Author URI: http://abdelnasser.com
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

```

### Tags
bitcoin, cryptocurrency, WordPress, Coindesk, plugin, open source

Note: Replace "example" with your GitHub username or organization name in the above links.

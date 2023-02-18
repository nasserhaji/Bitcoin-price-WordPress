# Bitcoin-price-WordPress
Bitcoin price in WordPress with Coinbase API

///scss
function get_bitcoin_price() {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.coinbase.com/v2/prices/spot?currency=USD');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);
  $data = json_decode($output);
  return $data->data->amount;
}
///PHP
<div class="bitcoin-price">
  <p>Bitcoin Price: <?php echo get_bitcoin_price(); ?> USD</p>
</div>

///CSS
.bitcoin-price {
  background-color: #f8f8f8;
  border: 1px solid #ccc;
  padding: 10px;
  margin: 10px 0;
}

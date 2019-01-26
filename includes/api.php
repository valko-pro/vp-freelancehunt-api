<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
// Options
$api_token = get_option('vppfa_token_field'); 
$api_secret = get_option('vppfa_secret_key_field');

$url = "https://api.freelancehunt.com/profiles/" . $api_token ;

$params = array(
  'include' => 'reviews',
);

$url =  add_query_arg( $params, $url );
// Signature
$method = "GET";

function sign($api_secret, $url, $method, $post_params = '') {
    return base64_encode(hash_hmac("sha256", $url.$method.$post_params, $api_secret, true));
};

$signature = sign($api_secret, $url, $method); 

// wp_remote_get
$get_options = array(
  'compress' => false,
  'headers' => array(
    'Authorization' => 'Basic ' . base64_encode( $api_token . ':' . $signature ),
  ),
);

$response = wp_remote_get( $url, $get_options );
$return = wp_remote_retrieve_body( $response );
$return = json_decode( $return, true );

define( 'VPPFHAPI', $return );

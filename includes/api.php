<?php
$api_token = get_option('vppfa_token_field'); 
$api_secret = get_option('vppfa_secret_key_field'); 
$url = "https://api.freelancehunt.com/profiles/" . $api_token . "?include=reviews";
$method = "GET";

function sign($api_secret, $url, $method, $post_params = '') {
    return base64_encode(hash_hmac("sha256", $url.$method.$post_params, $api_secret, true));
}

$signature = sign($api_secret, $url, $method); 
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_USERPWD        => $api_token . ":" . $signature,
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_TRANSFERTEXT   => true,
]);

$return = curl_exec($curl);
$return = json_decode($return, true);
define( 'VPPFHAPI', $return );
curl_close($curl);


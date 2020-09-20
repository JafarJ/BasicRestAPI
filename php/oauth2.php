<?php
// IF USING OAUTH2 WITH https://www.okta.com/ THEN USE THIS, IF NOT IGNORE OR DELETE THIS FILE
function http($url, $params=false) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  if($params)
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
  return json_decode(curl_exec($ch));
}
// CHANGE THIS VARIABLES WITH YOUR DATA
$client_id = ' HERE GOES YOUR CLIENT ID ';
$client_secret = ' HERE GOES YOUR CLIENT SECRET ';
$redirect_uri = ' HERE GOES THE URI YOU ADDED CREATING YOUR APPLICATION ';

$metadata_url = ' HERE GOES UR METADATA URL IN AUTORIZATION SERVERS ';
$metadata = http($metadata_url);

if(isset($_GET['code'])) {
	  
   if($_SESSION['state'] != $_GET['state']) {
    $errors[] = 'Authorization server returned an invalid state parameter';           
  }

  if(isset($_GET['error'])) {
    $errors[] = 'Authorization server returned an error: '.htmlspecialchars($_GET['error']);           
  }
  
   $response = http($metadata->token_endpoint, [
    'grant_type' => 'authorization_code',
    'code' => $_GET['code'],
    'redirect_uri' => $redirect_uri,
    'client_id' => $client_id,
    'client_secret' => $client_secret,
  ]);
  
   if(!isset($response->access_token)) {
    $errors[] = 'Error fetching access token';
  }
  
  $token = http($metadata->introspection_endpoint, [
    'token' => $response->access_token,
    'client_id' => $client_id,
    'client_secret' => $client_secret,
  ]);

  if($token->active == 1) {
    $_SESSION['username'] = $token->username;
  }

}else{
$_SESSION['state'] = bin2hex(random_bytes(5));
$authorize_url = $metadata->authorization_endpoint.'?'.http_build_query([
'response_type' => 'code',
'client_id' => $client_id,
'redirect_uri' => $redirect_uri,
'state' => $_SESSION['state'],
'scope' => 'openid',
]);	
header("Location: $authorize_url");
}

?>
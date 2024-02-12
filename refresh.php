<?php

$configFile = 'config.json';

if (file_exists($configFile)) {
    $appConfig = json_decode(file_get_contents($configFile), true);

    if ($appConfig === null) {
        die('Error decoding JSON in config file.');
    }

} else {
    die('Config file not found.');
}

$clientId = $appConfig["clientId"];
$client_secret = $appConfig["clientSecret"];
$grantType = 'refresh_token';
$code = $appConfig["code"];
$refreshToken = $appConfig["refreshToken"];
$userType = $appConfig["userType"];

$getAccessToken = getToken($clientId, $client_secret, $grantType, $code, $refreshToken, $userType);

echo '<pre>';
print_r($getAccessToken);
echo '</pre>';


//function for getting access token 
function getToken($clientId, $client_secret, $grantType, $code, $refreshToken, $userType)
{

    $data = array(
        'client_id' => $clientId,
        'client_secret' => $client_secret,
        'grant_type' => $grantType,
        'code' => $code,
        'refresh_token' => $refreshToken,
        'user_type' => $userType,
    );

    $postData = http_build_query($data);

    $curl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://services.leadconnectorhq.com/oauth/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    );

    curl_setopt_array($curl, $options);

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        die('Curl error: ' . curl_error($curl));
    }

    curl_close($curl);

    $responseData = json_decode($response, true);

    if ($responseData === null) {
        die('Error decoding JSON response');
    }

    return $responseData;

}


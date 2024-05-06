<?php
session_start();

// Ensure the state matches our stored state to mitigate CSRF attack
if (!isset($_GET['state']) || $_SESSION['oauth2state'] !== $_GET['state']) {
    if (isset($_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
    }
    exit('State mismatch');
}

$client_id = '837647042410-75ifg';
$client_secret = 'gbPjA{7T)oH@wcm/*8Lupf]<`wZU2k&Q';
$redirect_uri = 'http://tbl.devlk.com/callback.php';

// Exchange authorization code for an access token
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $token_url = 'https://oauth2.googleapis.com/token';
    $post_fields = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code',
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    $response_data = json_decode($response, true);

    if (isset($response_data['access_token'])) {
        $access_token = $response_data['access_token'];

        // You can now use this access token to call Google's APIs
        $userinfo_url = 'https://www.googleapis.com/oauth2/v3/userinfo';
        $auth_header = "Authorization: Bearer " . $access_token;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $userinfo_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [$auth_header]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $userinfo_response = curl_exec($ch);
        curl_close($ch);

        $user_info = json_decode($userinfo_response, true);
        echo 'Hello, ' . $user_info['name'];
    } else {
        exit('Failed to get access token');
    }
} else {
    exit('No code provided');
}

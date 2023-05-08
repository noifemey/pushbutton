<?php
require 'aweber/autoload.php';

use League\Oauth2\Client\Provider\GenericProvider;

const OAUTH_URL = 'https://auth.aweber.com/oauth2/';
const TOKEN_URL = 'https://auth.aweber.com/oauth2/token';
const CLIENTID = 'K79tbOgaEsBBpTX2txNGHbVfpeea0pqw';
const CLIENTSECRET = 'YH7YF59W3OGr7HuVvt4jNjnLTbYj3FYH';
define( 'REDIRECTURL', base_url('aweber/getAccessToken') );

function getAuthURL(){
   
    $scopes = array(
        'account.read',
        'list.read',
        'list.write',
        'subscriber.read',
        'subscriber.write',
        /*'email.read',
        'email.write',
        'subscriber.read-extended'*/
    );
    // Create a OAuth2 client configured to use OAuth for authentication
    $provider = new \League\OAuth2\Client\Provider\GenericProvider([
        'clientId' => CLIENTID,
        'clientSecret' => CLIENTSECRET,
        'redirectUri' => REDIRECTURL,
        'scopes' => $scopes,
        'scopeSeparator' => ' ',
        'urlAuthorize' => OAUTH_URL . 'authorize',
        'urlAccessToken' => OAUTH_URL . 'token',
        'urlResourceOwnerDetails' => 'https://api.aweber.com/1.0/accounts'
    ]);
    
    $authorizationUrl = $provider->getAuthorizationUrl();
    redirect( $authorizationUrl, 'refresh' );
    exit();
    if (strtoupper($createRefresh) == 'C') {
        
    }elseif(strtoupper($createRefresh) == 'R') {
        $credentials = parse_ini_file('credentials.ini', true);
        if(sizeof($credentials) == 0 ||
        !array_key_exists('clientId', $credentials) ||
        !array_key_exists('clientSecret', $credentials) ||
        !array_key_exists('accessToken', $credentials) ||
        !array_key_exists('refreshToken', $credentials)) {
            echo "No credentials.ini exists, or file is improperly formatted.\n";
            echo "Please create new credentials.";
            exit();
        }
        $client = new GuzzleHttp\Client();
        $clientId = $credentials['clientId'];
        $clientSecret = $credentials['clientSecret'];
        $response = $client->post(
            TOKEN_URL, [
                'auth' => [
                    $clientId, $clientSecret
                ],
                'json' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $credentials['refreshToken']
                ]
            ]
        );
        $body = $response->getBody();
        $newCreds = json_decode($body, true);
        $accessToken = $newCreds['access_token'];
        $refreshToken = $newCreds['refresh_token'];
    }else {
        echo 'Invalid entry. You must enter "c" or "r".';
        exit();
    }
/*$fp = fopen('credentials.ini', 'wt');
fwrite($fp,
"clientId = {$clientId}
clientSecret = {$clientSecret}
accessToken = {$accessToken}
refreshToken = {$refreshToken}");
fclose($fp);
chmod('credentials.ini', 0600);
echo "Updated credentials.ini with your new credentials\n";*/
    return array( 
        'accessToken' => $accessToken,
        'refreshToken' => $refreshToken 
    );
}

function getAccessToken( $code ){
    $scopes = array(
        'list.read',
        'list.write',
        'subscriber.read',
        'subscriber.write'
    );
    $provider = new \League\OAuth2\Client\Provider\GenericProvider([
        'clientId' => CLIENTID,
        'clientSecret' => CLIENTSECRET,
        'redirectUri' => REDIRECTURL,
        'scopes' => $scopes,
        'scopeSeparator' => ' ',
        'urlAuthorize' => OAUTH_URL . 'authorize',
        'urlAccessToken' => OAUTH_URL . 'token',
        'urlResourceOwnerDetails' => 'https://api.aweber.com/1.0/accounts'
    ]);
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $code
    ]);
    
    $accessToken = $token->getToken();
    $expires = $token->getExpires();
    $refreshToken = $token->getRefreshToken();
    return array( 
        'accessToken' => $accessToken,
        'refreshToken' => $refreshToken,
        'expires' => $expires
    );
}

function refreshToken($credentials){
    $client = new GuzzleHttp\Client();
    $clientId = CLIENTID;
    $clientSecret = CLIENTSECRET;
    $response = $client->post(
        TOKEN_URL, [
            'auth' => [
                $clientId, $clientSecret
            ],
            'json' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => $credentials['refreshToken']
            ]
        ]
    );
    $body = $response->getBody();
    $newCreds = json_decode($body, true);
    $accessToken = $newCreds['access_token'];
    $refreshToken = $newCreds['refresh_token'];

    return array( 
        'accessToken' => $accessToken,
        'refreshToken' => $refreshToken 
    );
}

function getAccounts($accessToken){
    $client = new GuzzleHttp\Client();
    $headers = [
        'User-Agent' => 'ezsalaryz',
        'Accept' => 'application/json',
        'Authorization' => "Bearer {$accessToken}"
    ];
    $url = 'https://api.aweber.com/1.0/accounts';
    $response = $client->get($url, ['headers' => $headers]);
    $body = json_decode($response->getBody(), true);
    return $body['entries'][0]['id'];
}
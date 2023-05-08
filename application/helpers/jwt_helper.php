<?php
require "jwt-vendor/autoload.php";
use \Firebase\JWT\JWT;

function jwtEncode($token, $secret_key){
    $jwt = JWT::encode($token, $secret_key);
    return $jwt;
}

function jwtDecode($jwt, $secret_key){

    if($jwt){

        try {    
            JWT::$leeway = 60;
            $decoded = JWT::decode($jwt, $secret_key, array('HS256'));    
            return true;    
        }catch (Exception $e){
            return false;
            //$e->getMessage()
        }
    }

    return false;

}

function checkAuthentication(){

    $headers = getallheaders();
    //print_r($headers);
    $a = json_decode( $headers['Authorization'], true );
    //$access_token = isset($_COOKIE['mhAccessToken']) ? $_COOKIE['mhAccessToken'] : '';
    $access_token = isset($a['access_token']) ? $a['access_token'] : '';
    //if(isset($headers['Origin']) && !empty($access_token) && $headers['Origin'] == ALLOWORIGIN){
    if(!empty($access_token)){
        $secret_key = MHSECRETKEY;
        $jwt = $access_token;
        $r = jwtDecode( $jwt, $secret_key );
        return $r;
    }		

    return false;
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aweber extends CI_Controller {

    function __construct() {
		parent::__construct();
		if(!( $this->session->userdata( 'login' ) && ($this->session->userdata( 'login_type' ) === 'user'))){
			redirect( 'user/dashboard', 'refresh' );
        }
        $this->load->helper('aweber_helper');
	}

    public function index(){
		getAuthURL();
	}

	public function getAccessToken(){
		if(isset($_GET['code'])){
            $r = getAccessToken( $_GET['code'] );
            $r['account_id'] = $this->getAccounts( $r['accessToken'] );
            $userID = $this->session->userdata( 'user_id' );

			$where = array( 'key' => 'AutoresponderSettings', 'user_id' => $userID );
			$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
			$data = array();
			if(!empty($result)){
				$data = json_decode( $result[0]['value'], true );
            }		
            
            $data[] = array( 'name' => 'Aweber', 'value' => $r );

            if(empty($result)){
                $putData = array( 
                    'key' => 'AutoresponderSettings',
                    'user_id' => $userID,
                    'value' => json_encode( $data ), 
                    'isCreated' => date('Y-m-d H:i:s'),
                    'isUpdated' => date('Y-m-d H:i:s'),
                    'status' => 1
                );
                $this->Common_DML->put_data( TBL_USER_SETTINGS, $putData );
            }else{
                $what = array( 'value' => json_encode( $data ), 'isUpdated' => date('Y-m-d H:i:s'), 'status' => 1 );
                $this->Common_DML->set_data( TBL_USER_SETTINGS, $what, $where );
            }
            redirect( 'user/autoresponder' );
		}
    }

    public function getTokenFromDB(){
        $userID = $this->session->userdata( 'user_id' );

        $where = array( 'key' => 'AutoresponderSettings', 'user_id' => $userID );
        $result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
        $data = array();
        if(!empty($result)){
            $data = json_decode( $result[0]['value'], true );
        }	

        $key = searchKey( 'Aweber', 'name', $data );
        $api = $data[$key]['value'];
        return $api;
    }

    public function getAccounts($accessToken){
        //$api = $this->getTokenFromDB();
        //$accessToken = $api['accessToken'];
        // Create a Guzzle client
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

    public function subscriber(){
        try{
            $api = $this->getTokenFromDB();
            $accessToken = $api['accessToken'];
            $accountId = $api['account_id'];
            $client = new GuzzleHttp\Client();
            $email = 'rahul.tiwari@himanshusofttech.com';
            $listId = '5440573';
            $body = [
                'email' => $email,
                'name' => 'RahulTiwari',
                'ip' => $_SERVER['REMOTE_ADDR']
            ];
            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => "Bearer {$accessToken}",
                'User-Agent' => 'ezsalaryz'
            ];
            $url = "https://api.aweber.com/1.0/accounts/{$accountId}/lists/{$listId}/subscribers";
            $response = $client->post($url, ['json' => $body, 'headers' => $headers]);
            echo $response->getHeader('Location')[0];
        }catch(GuzzleHttp\Exception\ClientException $e){
            $r = $e->getMessage();
            print_r($r);
        }
    }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends CI_Controller {

    function __construct() {
		parent::__construct();
        if(!( $this->session->userdata( 'login' ) )){
			redirect( 'authentication', 'refresh' );
			exit();
		}
        $this->load->library('Facebooklib');
        $this->load->helper('jwt_helper');
    }

    public function index(){
		echo $auth_url = $this->facebookbusiness->createAuthorizationURL();
		echo '<br>Access deny.';
    }

    public function redirect(){
        $date = date('Y-m-d H:i:s');
        $userID = $this->session->userdata( 'user_id' );

        $access_token = ''; $userinfo = '';

        $where = array( 
            'user_id' => $userID,
            'key' => 'FacebookAccessToken',
            'status' => 1 
        );
        $result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );

        if(!empty($result)){
            $access_token = json_decode( $result[0]['value'], true );
        }

        $where = array( 
            'user_id' => $userID,
            'key' => 'FacebookUserInfo',
            'status' => 1 
        );
        $result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );

        if(!empty($result)){
            $userinfo = json_decode( $result[0]['value'], true );
        }

        if(!empty($access_token)){
            $this->session->set_userdata( 'FacebookAccessToken', $access_token );
        }
        if(!empty($userinfo)){
            $this->session->set_userdata( 'FacebookUserInfo', $userinfo );
        }

        redirect('user/integrations', 'refresh');
        die();
    }

    public function test(){
        $access_token = $this->session->userdata( 'FacebookAccessToken' );
        $this->facebooklib->setAccessToken($access_token);
        $userinfo = $this->facebooklib->getPages();
        print_r($userinfo);
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->userdata( 'login' )){
			if($this->session->userdata( 'role' ) == 1)
				redirect( 'user/dashboard', 'refresh' );
			if($this->session->userdata( 'role' ) == 2)
				redirect( 'admin/users', 'refresh' );
		}
	}

	public function index(){
		$auth = get_cookie( 'member' );
		$authdata = '';
		
		if( !empty($auth) ){
			$authdata = json_decode( base64_decode( $auth ), true );
		}

		/*if($_SERVER['HTTP_HOST'] != 'pushbutton-vip.com'){
			$domain = '%"domain":"'.$_SERVER['HTTP_HOST'].'"%';

			$sql = "SELECT * FROM ".TBL_USER_SETTINGS." us WHERE us.key = 'whiteLabelDomainSettings' && us.value LIKE '{$domain}'";
			$r = $this->Common_DML->query( $sql );

			if(!empty($r)){

				if(!empty($r)){
					$d = json_decode( $r[0]['value'], true );
					$sdata = array(
						'whiteLabelUser' => 1,
						'logo_url' => $d['logo'],
						'favicon_url' => $d['favicon_url'],
						'site_main_color' => $d['site_main_color'],
						'page_title' => $d['page_title'],
						'parent_id' => $r[0]['user_id']
					);
					$this->session->set_userdata( $sdata );
				}else{
					echo 'Sorry, We can\'t fetch the domain details.';
					die();
				}

			}else{

				$sql = "SELECT * FROM ".TBL_USER_SETTINGS." us WHERE us.key = 'agencyDomainSettings' && us.value LIKE '{$domain}'";
				$r = $this->Common_DML->query( $sql );
		
				if(!empty($r)){
					$d = json_decode( $r[0]['value'], true );
					$sdata = array(
						'agencyUser' => 1,
						'logo_url' => $d['logo'],
						'parent_id' => $r[0]['user_id']
					);
					$this->session->set_userdata( $sdata );
				}else{
					echo 'Sorry, We can\'t fetch the domain details.';
					die();
				}

			}

		}*/


		$data = $authdata;
		$this->load->view('login', $data);
    }
    
    public function sachasignuphyde(){
		$this->load->view('signup');
	}

	public function forgot_password(){
		$this->load->view('forgot');
	}

	public function reset( $id ){
		$user_id = decrypt_id( $id );
		$data['user_id'] = $user_id;
		$this->load->view('reset', $data);
	}

	public function activate_account( $id = '' ){
		if($id === '') redirect( 'authentication', 'refresh' );
		$user_id = decrypt_id( $id );
		$what = array( 'status' => 1 );
		$where = array( 'user_id' => $user_id );
		$this->Common_DML->set_data( TBL_USERS, $what, $where );

		redirect( 'authentication', 'refresh' );
	}

	public function reset_password( $id = '', $code = '' ){
		if($id === '' || $code === '') redirect( 'authentication', 'refresh' );
		$user_id = decrypt_id( $id );
		$where = array( 'user_id' => $user_id, 'key' => 'rcs_reset_password', 'value' => $code, 'status' => 1);
		$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, '*' );
		if(!empty($result) && count($result) == 1){
			$this->session->set_userdata( 'rcsPasswordOTP', $code );
			redirect( 'authentication/reset/'.$id, 'refresh' );
		}else{
			redirect( 'authentication/forgot', 'refresh' );
		}
	}

	public function terms_condition(){
        $this->load->view('terms_condition');
	}
	public function privacy_policy(){
		$this->load->view('privacy_policy');
	}

}

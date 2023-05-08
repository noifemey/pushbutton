<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function __construct() {
		parent::__construct();
		$this->load->helper('jwt_helper');
    }

    public function index(){
		echo 'We are here..';
    }
    
    public function checkUserExistence(){
		$where = array( 'email' => $_POST['email'] );
			
		$result = $this->Common_DML->get_data( TBL_USERS, $where, '*' );
		
		if(!empty($result) && count($result) == 1){
			echo json_encode( array( 'status'=>0, 'msg'=> 'Email is already used, Please use different email.' ) );
			die();
		}

		return $result;
	}

    public function register(){
		if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
            
			$result = $this->checkUserExistence();
			
			$date = date('Y-m-d H:i:s');
			$mdata = array(
				'source' => 'self',
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'contactNumber' => $_POST['country_code'] . " " . $_POST['mobile_number'],
				'password' => md5($_POST['password']),
				'ip' => $_POST['user_ip'],
				'access_level' => json_encode(array(1)),
				'role' => 1,
				'isCreated' => $date,
				'isUpdated' => $date,
				'status' => 0
			);
			$insert_id = $this->Common_DML->put_data( TBL_USERS, $mdata );

			create_directory( $insert_id );

			$aid = urlencode( encrypt_id( $insert_id ) );

			$replaces = array(
				'{member_name}' => $mdata['name'],
				'{login_url}' => base_url(),
				'{member_email}' => $mdata['email'],
				'{member_password}' => $_POST['password'],
				'{activate_link}' => base_url("authentication/activate_account/{$aid}"),
			);

			$htmldata = file_get_contents( ROOTPATH . 'email_template/freereg.txt' );		
			
			////////////////////////////////////////////
			$savemobile =  $this->save_mobile($_POST['name'], $_POST['email'], $_POST['country_code'],$_POST['email']);
			///////////////////////////////////////////
	
			$mail = array(
				'to' => array(
					array('name' => $mdata['name'], 'email' => $mdata['email']) 
				),
				'subject' => 'Account details of Push Buttons',
				'from_email' => FROMMAIL,
				'from_name' => FROMNAME
			);
			simple_mail( $mdata['email'], 'Account details of Push Buttons', $htmldata, $replaces );
			
			echo json_encode( array( 'status' => 1, 'msg' => 'You have registered successfully.', 'url' => base_url() ) );
		}
		die();
	}

	public function checkOrderExistence(){
		$where = array( 'email' => $_POST['email'], 'receipt' => $_POST['receipt']);
		$result = $this->Common_DML->get_data( 'digistore_orders', $where, '*' );
		
		if(empty($result)){
			echo json_encode( array( 'status'=>0, 'msg'=> 'Invalid Email or Receipt number. Please Check your Purchased Product.' ) );
			die();
		}

		return $result;
	}

	public function digiregister(){
		if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['mobile_number'])){
            
			$result = $this->checkUserExistence();
			$order = $this->checkOrderExistence();

			$date = date('Y-m-d H:i:s');
			$mdata = array(
				'source' => 'Digistore24',
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'contactNumber' => $_POST['country_code'] . " " . $_POST['mobile_number'],
				'password' => md5($_POST['password']),
				'ip' => $_POST['user_ip'],
				'access_level' => json_encode(array(1)),
				'role' => 1,
				'isCreated' => $date,
				'isUpdated' => $date,
				'status' => $order[0]['status']
			);
			$insert_id = $this->Common_DML->put_data( TBL_USERS, $mdata );

			////////////////////////////////////////////
			$savemobile =  $this->save_mobile($_POST['name'], $_POST['email'], $_POST['country_code'],$_POST['email']);
			///////////////////////////////////////////
			
			create_directory( $insert_id );

			$aid = urlencode( encrypt_id( $insert_id ) );
			$replaces = array(
				'{member_name}' => $mdata['name'],
				'{login_url}' => base_url(),
				'{member_email}' => $mdata['email'],
				'{member_password}' => $_POST['password'],
				'{activate_link}' => base_url("authentication/activate_account/{$aid}"),
			);

			if(file_exists( ROOTPATH . 'email_template/freereg.txt')){
				$htmldata = file_get_contents( ROOTPATH . 'email_template/freereg.txt' );		
		
				$mail = array(
					'to' => array(
						array('name' => $mdata['name'], 'email' => $mdata['email']) 
					),
					'subject' => 'Account details of Push Button',
					'from_email' => FROMMAIL,
					'from_name' => FROMNAME
				);
				simple_mail( $mdata['email'], 'Account details of Push Button', $htmldata, $replaces );
			}

			echo json_encode( array( 'status' => 1, 'msg' => 'You have registered successfully.', 'url' => base_url() ) );
		}
		die();
	}

	private function save_mobile($name,$email, $country_code, $mobile_number){

		$url = 'https://smsdb.thriivetank.com/api/add';
		//$url = 'http://127.0.0.1:8000/api/add';
		$authorization = "Authorization: Bearer $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
		
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_POST, 1);

		$fields = array(
			'name' => $name,
			'email' => $email,
			'country_code' => $country_code,
			'mobile_number' => $mobile_number,
			'sender' => "pushbutton"
		);
		$fields_string = json_encode($fields);

		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $fields_string);
		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);
		
		$result = json_decode($buffer);

		if(isset($result->success) && $result->success == 'true'){
			return 'User has been updated.';
		}else{
			return 'Something has gone wrong';
		}
	}
	
	public function login(){
		if(!empty($_POST['email']) && !empty($_POST['password'])){
			$this->load->helper('email');
			if(valid_email( $_POST['email'] )){
				if($this->session->userdata( 'whiteLabelUser' )){
					$where = array( 
						'parent_id' => $this->session->userdata( 'parent_id' ),
						'email' => $_POST['email'], 
						'password' => md5($_POST['password']), 
						'role' => 4,
					);
				}elseif($this->session->userdata( 'agencyUser' )){
					$where = array( 
						'parent_id' => $this->session->userdata( 'parent_id' ),
						'email' => $_POST['email'], 
						'password' => md5($_POST['password']), 
						'role' => 3,
					);
				}else{
					$where = array( 
						'email' => $_POST['email'], 
						'password' => md5($_POST['password']), 
					);
				}
				
				$result = $this->Common_DML->get_data( TBL_USERS, $where, 'user_id, email, password, name, name, profilePicture, role, isAgency, isWhiteLabel, access_level, status, isCreated' );
				// echo json_encode($result);
				if(!empty($result) && count($result) == 1){

					if(!$result[0]['status']){
						echo json_encode( array( 'status' => 0, 'msg' => 'Your account is deactivated. Please check your email to activate.' ) );
						die();
					}

					if($_POST['remeber']){
						set_cookie( 
							'member', 
							base64_encode( json_encode( array( 'email' => $_POST['email'], 'password' => $_POST['password'] ) ) ), 
							86400 * 30 
						);
					}

					$pii = ''; $pi = '';

					if(!empty($result[0]['profilePicture'])){
						$pp = json_decode($result[0]['profilePicture'], true);
						if(!empty($pp)){
							$pi = $pp['url'];
							$pii = $pp['file_id'];
						}
					}

					$access_level = array();

					if(!empty($result[0]['access_level'])){
						$access_level = json_decode( $result[0]['access_level'], true );
					}
					
					$sdata = array(
						'login' => true,
						'login_type' => 'user',
						'user_id' => $result[0]['user_id'],
						'email' => $result[0]['email'],
						'name' => $result[0]['name'],
						'profile_img' => $pi,
						'profile_img_id' => $pii,
						'short_nm' => $result[0]['name'],
						'access_level' => $access_level,
						'isAgency' => $result[0]['isAgency'],
						'isWhiteLabel' => $result[0]['isWhiteLabel'],
						'role' => $result[0]['role'],
						'isCreated' => $result[0]['isCreated']
					);
					
					$url = '';
					/*if($result[0]['role'] == 1 || $result[0]['role'] == 3){
						$url = base_url() . 'user/welcome';
						$sdata['login_type'] = 'user';
					}*/

					$where = array( 'key' => 'AffiliateID', 'user_id' => $result[0]['user_id'] );
					$afresult = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
                    
				    $expireDate = date('Y-m-d H:i:s', strtotime($result[0]['isCreated']. ' + 7 days'));
				    $dateNow = date("Y-m-d H:i:s");
				    
				    if($expireDate >= $dateNow) {
				        $url = base_url() . 'user/welcome';
				    } else {
				        if(!empty($afresult)){
    						$url = base_url() . 'user/dashboard';
    					}else{
    						//$url = base_url() . 'user/integrations';
    						$url = base_url() . 'user/welcome-new';
    					}
				    }
					
					if($result[0]['role'] == 2){
						$url = base_url() . 'admin/users';
						$sdata['login_type'] = 'admin';
					}				
					
					$secret_key = MHSECRETKEY;
					$issuer_claim = $_SERVER['HTTP_HOST']; // this can be the servername
					$issuedat_claim = time(); // issued at
					$notbefore_claim = $issuedat_claim + 10; //not before in seconds
					$expire_claim = $issuedat_claim + 3600 * 24; // expire time in seconds
					$token = array(
						"iss" => $issuer_claim,
						"iat" => $issuedat_claim,
						"nbf" => $notbefore_claim,
						"exp" => $expire_claim,
						"data" => $sdata
					);
					
					$jwt = jwtEncode($token, $secret_key);
					
					set_cookie( 
						'rcsAccessToken', 
						$jwt, 
						3600 * 24
					);

					$access_token = ''; $userinfo = '';

					$where = array( 
						'user_id' => $result[0]['user_id'],
						'key' => 'FacebookAccessToken',
						'status' => 1 
					);
					$fat = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );

					if(!empty($fat)){
						$access_token = json_decode( $fat[0]['value'], true );
					}

					$where = array( 
						'user_id' => $result[0]['user_id'],
						'key' => 'FacebookUserInfo',
						'status' => 1 
					);
					$fui = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );

					if(!empty($fui)){
						$userinfo = json_decode( $fui[0]['value'], true );
					}

					if(!empty($access_token)){
						$sdata['FacebookAccessToken'] = $access_token;
					}
					if(!empty($userinfo)){
						$sdata['FacebookUserInfo'] = $userinfo;
					}

					$this->session->set_userdata( $sdata );

					echo json_encode( array(
						'status' => 1,
						'msg' => 'Logged in successfully!',
						'url' => $url 
					) );
				}else{
					echo json_encode( array( 'status'=>0, 'msg'=>'You have entered incorrect details.' ) );
				}
				
			}else{
				echo json_encode( array( 'status'=>0, 'msg'=>'You have entered an invalid email address!' ) );
			}
		}else{
			echo json_encode( array( 'status'=>0, 'msg'=>'Username and Password shouldn\'t be empty.' ) );
		}

		die();
	}

	public function forgot(){
		if(!empty($_POST['email'])){
			$date = date('Y-m-d H:i:s');
			$where = array( 'email' => trim($_POST['email']));
			$result = $this->Common_DML->get_data( TBL_USERS, $where, 'user_id,name,email,status' );
			if(!empty($result) && count($result) == 1){
				if($result[0]['status'] == 1){

					$date30min = date('Y-m-d H:i:s', strtotime("-30 minutes"));

					$sql = "SELECT * FROM ".TBL_USER_SETTINGS." WHERE `user_id` = {$result[0]['user_id']} AND isCreated BETWEEN '{$date30min}' AND '{$date}'";
					$sendalready = $this->Common_DML->query( $sql );

					if(empty($sendalready)){
						$aid = urlencode( encrypt_id( $result[0]['user_id'] ) );
						$code = getRnadomNumber();
						$replaces = array(
							'{member_name}' => $result[0]['name'],
							'{reset_url}' => base_url("authentication/reset_password/{$aid}/{$code}")
						);
			
						$htmldata = file_get_contents( ROOTPATH . 'email_template/forgot.txt' );		
				
						$mail = array(
							'to' => array(
								array('name' => $result[0]['name'], 'email' => $result[0]['email']) 
							),
							'subject' => 'Reset Password of Push Buttons',
							'from_email' => FROMMAIL,
							'from_name' => FROMNAME
						);
						//send_mail_mandrill( $htmldata, $mail, array(), '', $replaces, MANDRILLAPIKEY );
						simple_mail( $result[0]['email'], 'Reset Password of Push Buttons', $htmldata, $replaces );
	
						$data = array(
							'user_id' => $result[0]['user_id'],
							'key' => 'rcs_reset_password',
							'value' => $code,
							'isCreated' => $date,
							'isUpdated' => $date,
							'status' => 1
						);
	
						$this->Common_DML->put_data( TBL_USER_SETTINGS, $data );
	
						echo json_encode( array( 'status' => 1, 'msg' => 'We have sent a confirmation email on your Id, Please check your email.' ) );
					}else{
						echo json_encode( array( 'status' => 0, 'msg' => 'We have sent you email already, Please check your email or try after 30 min.' ) );
					}

				}else{
					echo json_encode( array( 'status' => 0, 'msg' => 'Your account is deactivated, please contact to support.' ) );
				}

			}else{
				echo json_encode( array( 'status' => 0, 'msg' => 'This email is not registered with us.' ) );
			}
		}else{
			echo json_encode( array( 'status' => 0, 'msg' => 'Email is required.' ) );
		}
		die();
	}

	public function reset_password(){
		if(empty($_POST['code'])){
			echo json_encode( array( 'status' => 0, 'msg' => 'Something went wrong.' ) );
			die();
		}
		if(!empty($_POST['npassword']) && $_POST['npassword'] == $_POST['cpassword'] && $this->session->userdata( 'rcsPasswordOTP' ) == $_POST['code']){
			$where = array( 'user_id' => $_POST['user_id'] );
			$result = $this->Common_DML->get_data( TBL_USERS, $where, '*' );
			if(!empty($result) && count($result) == 1){
				$updateData = array( 'password' => md5( $_POST['npassword'] ) );
				$this->Common_DML->set_data( TBL_USERS, $updateData, $where );
				$this->Common_DML->set_data( TBL_USER_SETTINGS, array('status' => 0), array( 'user_id' => $_POST['user_id'], 'value' => $_POST['code'] ) );
				echo json_encode( array( 'status' => 1, 'msg' => 'Password has been changed successfully, you may login now.', 'url' => base_url() ) );
			}else{
				echo json_encode( array( 'status' => 0, 'msg' => 'We can\'t fount the account' ) );
			}
		}
		die();	
	}

	public function updateProfile(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$date = date('Y-m-d H:i:s');
			$what['name'] = $_POST['fullname'];
			$where = array( 'user_id' => $userID, 'status' => 1 );
			if(!empty($_POST['password'])){
				if(empty($_POST['old_password'])){
					echo json_encode( array( 'status' => 0, 'msg' => 'Old password is required.' ) );
					die();
				}
			}
			if(!empty($_POST['create_password'])){
				if($_POST['create_password'] == $_POST['confirm_password']){
					$what['password'] =  md5($_POST['create_password']);
				}else{
					echo json_encode( array( 'status' => 0, 'msg' => 'Password & confirm password doesn\'t match.' ) );
					die();
				}
			}
			$pii = '';
			$pi = '';
			if(!empty($_POST['image_id'])){
				$what['profilePicture'] = json_encode(array(
					'file_id' => $_POST['image_id'],
					'url' => $_POST['image_url']
				));
				$pi = $_POST['image_url'];
				$pii = $_POST['image_id'];
			}
			$this->Common_DML->set_data( TBL_USERS, $what, $where );
			$this->session->set_userdata( 'name', $what['name'] );
			$this->session->set_userdata( 'short_nm', get_first_letter($what['name']) );
			$this->session->set_userdata( 'profile_img', $pi );
			$this->session->set_userdata( 'profile_img_id', $pii );
			$uswhat = array();
			if(isset($_POST['website'])){
				$uswhat['website'] = $_POST['website'];
			}
			if(isset($_POST['fburl'])){
				$uswhat['fburl'] = $_POST['fburl'];
			}
			if(isset($_POST['instaurl'])){
				$uswhat['instaurl'] = $_POST['instaurl'];
			}
			if(isset($_POST['twitterurl'])){
				$uswhat['twitterurl'] = $_POST['twitterurl'];
			}
			if(isset($_POST['linkedinurl'])){
				$uswhat['linkedinurl'] = $_POST['linkedinurl'];
			}
			if(isset($_POST['yturl'])){
				$uswhat['yturl'] = $_POST['yturl'];
			}
			if(isset($_POST['aboutyou'])){
				$uswhat['aboutyou'] = $_POST['aboutyou'];
			}
			if(isset($_POST['disclaimer'])){
				$uswhat['disclaimer'] = $_POST['disclaimer'];
			}
			$where = array('key' => 'AuthorGeneralSettings', 'user_id' => $userID);
			$us = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, '*' );
			if(empty($us)){
				$data = array(
					'key' => 'AuthorGeneralSettings',
					'user_id' => $userID,
					'value' => json_encode($uswhat),
					'isCreated' => $date,
					'isUpdated' => $date,
					'status' => 1
				);
				$this->Common_DML->put_data( TBL_USER_SETTINGS, $data );
			}else{
				$what = array(
					'value' => json_encode( $uswhat ),
					'isUpdated' => $date
				);
				$this->Common_DML->set_data( TBL_USER_SETTINGS, $what, $where );
			}
			echo json_encode( array('status' => 1, 'msg' => 'Profile have updated successfully.') );
			die();
		}
	}

	public function uploadProfilePic(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$what = array( 'profilePicture' => json_encode($_POST) );
			$where = array( 'user_id'=>$userID );
			$this->Common_DML->set_data( TBL_USERS, $what, $where );
			$this->session->set_userdata( 'profile_img', $_POST['url'] );
			$this->session->set_userdata( 'profile_img_id', $_POST['file_id'] );
			echo json_encode( array( 'status' => 1, 'msg' => 'Profile picture has been uploaded successfully.' ) );
		}
		die();
	}

	public function deleteProfilePic(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$what = array( 'profilePicture' => json_encode(array()) );
			$where = array( 'user_id'=>$userID );
			$this->Common_DML->set_data( TBL_USERS, $what, $where );
			$this->session->set_userdata( 'profile_img', '' );
			$this->session->set_userdata( 'profile_img_id', '' );
			echo json_encode( array( 'status' => 1, 'msg' => 'Profile picture has been uploaded successfully.' ) );
		}
		die();
	}
	
	public function addUser(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$date = date('Y-m-d H:i:s');
			if(!empty($_POST['admin_user_id'])){
				$user_id = $_POST['admin_user_id'];
				$what = array(
					'name' => $_POST['name'],
					'email' => $_POST['email'],
					'access_level' => json_encode($_POST['access_level']),
					'isUpdated' => $date
				);
				if(!empty($_POST['password'])){
					$what['password'] = md5($_POST['password']);
				}
				$where = array( 'user_id' => $user_id );
				$this->Common_DML->set_data( TBL_USERS, $what, $where );
				$msg = 'We have updated a user successfully.';
				if($_POST['SendMailCheckbox']){
					$replaces = array(
						'{member_name}' => $_POST['name'],
						'{login_url}' => base_url(),
						'{member_email}' => $_POST['email'],
						'{member_password}' => !empty($_POST['password']) ? $_POST['password'] : 'Password is not updated, you can use the previous password',
						/*'{activate_link}' => base_url("authentication/activate_account/{$aid}"),*/
					);
		
					$htmldata = file_get_contents( ROOTPATH . 'email_template/modify.txt' );	
					simple_mail( $_POST['email'], 'Update Account details of Push Buttons', $htmldata, $replaces );
				}
			}else{
				$result = $this->checkUserExistence();
				
				$data = array(
					'parent_id' => 0,
					'name' => $_POST['name'],
					'email' => $_POST['email'],
					'password' => md5($_POST['password']),
					'role' => 1,
					'source' => 'Admin',
					'access_level' => json_encode($_POST['access_level']),
					'isCreated' => $date,
					'isUpdated' => $date,
					'status' => 1
				);
				$user_id = $this->Common_DML->put_data( TBL_USERS, $data );

				create_directory( $user_id );

				if($_POST['SendMailCheckbox']){
					$replaces = array(
						'{member_name}' => $_POST['name'],
						'{login_url}' => base_url(),
						'{member_email}' => $_POST['email'],
						'{member_password}' => $_POST['password'],
						/*'{activate_link}' => base_url("authentication/activate_account/{$aid}"),*/
					);
		
					$htmldata = file_get_contents( ROOTPATH . 'email_template/reg.txt' );	
					simple_mail( $_POST['email'], 'Account details of Push Buttons', $htmldata, $replaces );
				}

				$msg = 'We have added a user successfully.';
			}
			echo json_encode( array( 'status' => 1, 'msg' => $msg ) );
		}
		die();
	}

	public function getUser(){
		if(checkAuthentication()){
			$id = $_POST['id'];
			$where = array( 'user_id' => $id, 'parent_id' => 0 );
			$result = $this->Common_DML->get_data( TBL_USERS, $where );
			if(empty($result)){
				echo json_encode( array( 'status' => 0, 'msg' => 'We can\'t found in our database.' ) );
				die();
			}else{
				$user = $result[0];
			}
			echo json_encode( array('status' => 1, 'msg' => '', 'data' => $user) );
		}
		die();
	}
	
	public function updateUserStatus(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$date = date('Y-m-d H:i:s');
			$id = $_POST['user_id'];
			$where = array( 'user_id' => $id, 'role' => 1, 'parent_id' => 0 );
			$what = array( 'status' => $_POST['status'], 'isUpdated' => $date );
			$this->Common_DML->set_data( TBL_USERS, $what, $where );
			$msg = $_POST['status'] == 1 ? 'We have activated the user.' : 'We have deactivated the user.';
			echo json_encode( array('status' => 1, 'msg' => $msg) );
		}
		die();
	}
	
	public function deleteUser(){
		if(checkAuthentication()){			
			$userID = $this->session->userdata( 'user_id' );
			$id = $_POST['id'];

			$where = array( 'user_id' => $id );
			$siteData = $this->Common_DML->get_data( TBL_SITES, $where );
			for ($i=0; $i <count($siteData) ; $i++) { 

				if(!empty($siteData)){
					$sub_domain = $site[$i]['sub_domain'];
					$custom_domain = $site[$i]['custom_domain'];
		
					if(!empty($sub_domain)){
					$checksubDomain = removeSubdomain( $sub_domain );
					}
					
					if(!empty($custom_domain)){
						$checkcustomDomain = removeAddonDomain( $custom_domain, $sub_domain );
					}
				}
				if($checksubDomain['status'] == 0){
					echo json_encode( array( 'status' => 1, 'msg' => $checksubDomain['msg'] ) );
				}

				$site_where = array( 's_id' => $siteData[$i]['s_id'] );
				$this->Common_DML->delete_data( TBL_SITES_ARTICLE, $site_where );				
				$this->Common_DML->delete_data( TBL_ANALYTICS, $site_where );
			}
		
			$this->Common_DML->delete_data( TBL_PAGES, $where );
			$this->Common_DML->delete_data( TBL_LEAD_GENERATION, $where );
			$this->Common_DML->delete_data( TBL_SITE_SCHEDULE_ARTICLES, $where );
			$this->Common_DML->delete_data( AUTOMATION, $where ) ;
			$this->Common_DML->delete_data( TBL_MEDIA, $where );
			$this->Common_DML->delete_data( TBL_SITES, $where );
						
			$where = array( 'user_id' => $id );
			$this->Common_DML->delete_data( TBL_USER_SETTINGS, $where );
			$this->Common_DML->delete_data( TBL_USERS, $where );
			remove_directory( ROOTPATH . 'uploads/user_'.$id );
			echo json_encode( array( 'status' => 1, 'msg' => 'We have deleted a user successfully.' ) );
		}
		die();
	}
	
	public function searchUser($page = 1){
		if(checkAuthentication()){
			
			$pagination = array();

			$userID = $this->session->userdata( 'user_id' );
			$pagination['currentPage'] = $page;
			$pagination['PAGINATIONNUMBER'] = PAGINATIONNUMBER;

			$start = ($page - 1) * PAGINATIONNUMBER;
			$end = PAGINATIONNUMBER;
			$text = $_POST['text'];

			$rcsProducts = $this->Common_DML->get_data( TBL_RCS_PRODUCT );
			$where = array( 'parent_id' => 0, 'role' => 1);
			$total_users = $this->Common_DML->get_data( TBL_USERS, $where, 'count(user_id) total_user');		
			
			$sql = "SELECT * FROM ".TBL_USERS." WHERE parent_id = 0 && role = 1 && (name LIKE '%{$text}%' || email LIKE '%{$text}%') ORDER BY user_id DESC LIMIT ".$start.",".$end." ";
			$searchUsers = $this->Common_DML->query( $sql );
			
			$sql = "SELECT count(user_id) total FROM ".TBL_USERS." WHERE parent_id = 0 && role = 1 && (name LIKE '%{$text}%' || email LIKE '%{$text}%')";
			$total = $this->Common_DML->query( $sql );
			
			echo json_encode( array('status' => 1, 'msg' => '', 'data' => isset($searchUsers) ? $searchUsers : array(), 'total' => $total[0]['total'], 'product' =>$rcsProducts, 'total_users' =>$total_users[0]['total_user'], 'pagination' => $pagination ) );
		}
		die();
	}
	
	public function addArticle(){
		
		$userID = $this->session->userdata( 'user_id' );
		$date = date('Y-m-d H:i:s');
		if(!empty($_POST['a_id'])){
			$a_id = $_POST['a_id'];
			$what = array(
				'title' 		=> $_POST['title'],
				'content' 		=> $_POST['content'],
				'category_id' 	=> $_POST['category_id'],
				'm_id' 			=> $_POST['image_id'],
				'isUpdated' 	=> $date
			);
			$where = array( 'a_id' => $a_id );
			$this->Common_DML->set_data( TBL_ARTICLES , $what, $where );
			$msg = 'We have updated a article successfully.';
			echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('admin/articles') ) );	
		}else{
			$data = array(
				'title' 		=> $_POST['title'],
				'content' 		=> $_POST['content'],
					'category_id' 	=> $_POST['category_id'],
					'm_id' 			=> $_POST['image_id'],
					'isCreated' 	=> $date,
					'isUpdated' 	=> $date,
					'status' 		=> 1
				);
				$user_id = $this->Common_DML->put_data( TBL_ARTICLES , $data );
				
				create_directory( $user_id );
				
				$msg = 'We have added a article successfully.';
				echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('admin/articles') ) );
		}
	}

	public function deleteArticle(){
		if(checkAuthentication()){			
			$userID = $this->session->userdata( 'user_id' );
			$id = $_POST['a_id'];
			$where = array( 'a_id' => $id );
			$this->Common_DML->delete_data( TBL_ARTICLES, $where );
			echo json_encode( array( 'status' => 1, 'msg' => 'We have deleted a article successfully.', 'url' => base_url('admin/articles') ) );
		}
		die();
	}

	public function searchArticle(){

		$userID = $this->session->userdata( 'user_id' );
		$text = $_POST['text'];
		$where = array( 'status' => 1);
		$categories = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where);

		$sql = "SELECT * FROM ".TBL_ARTICLES." WHERE status = 1 && (title LIKE '%{$text}%') ORDER BY a_id DESC ";
		$searchArticle = $this->Common_DML->query( $sql );

		$sql = "SELECT count(a_id) total FROM ".TBL_ARTICLES." WHERE status = 1 && (title LIKE '%{$text}%')";
		$total_article = $this->Common_DML->query( $sql );

		echo json_encode( array('status' => 1, 'msg' => '', 'data' => isset($searchArticle) ? $searchArticle : array(), 'total' => $total_article[0]['total'], 'category' =>$categories) );
	}

	public function autoresponder(){
		if(checkAuthentication()){

			$userID = $this->session->userdata( 'user_id' );

			$where = array( 'key' => 'AutoresponderSettings', 'user_id' => $userID );
			$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
			$data = array();
			if(!empty($result)){
				$data = json_decode( $result[0]['value'], true );
			}		

			if($_POST['gowith'] == 'fetchDB'){
				$adata = array();
				for($i=0;$i<count($data);$i++){
					$adata[$data[$i]['name']] = $data[$i]['value'];
				}
				echo json_encode( array( 'status' => 1, 'msg' => '', 'data' => $adata ) );
				die();
			}		

			if($_POST['gowith'] == 'connect'){
				if(isset($_POST['eraser']) && $_POST['eraser'] == 1){
					$key = searchKey( $_POST['responder'], 'name', $data );
					unset( $data[$key] );
					$data = array_values( $data );
					$what = array( 'value' => json_encode( $data ), 'isUpdated' => date('Y-m-d H:i:s'), 'status' => 1 );
					$this->Common_DML->set_data( TBL_USER_SETTINGS, $what, $where );
					echo json_encode( array( 'status'=> 1, 'msg'=>'Autoresponder disconnect successfully.' ) );
					die();
				}			

				$data[] = array( 'name' => $_POST['responder'], 'value' => $_POST['apikey'] );
				$connect = autoreponderConnect( $_POST );
				if($connect['status']){
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

					echo json_encode( array( 'status'=> 1, 'msg'=>'Settings are saved.', 'url' => $this->session->userdata( 'autoresponder_site_redirect__' ) ? $this->session->userdata( 'autoresponder_site_redirect__' ) : '' ) );
				}else{
					echo json_encode( array( 'status'=> 0, 'msg'=> 'An error occurred while getting your list.' ) );
				}
			}elseif($_POST['gowith'] == 'list'){
				if(isset($_POST['responder'])){
					$key = searchKey( $_POST['responder'], 'name', $data );
					if($key !== false){
						$api = $data[$key]['value'];
						$listData = autoreponderGetList($api , $_POST['responder']);
						echo json_encode( $listData );
					}
					else{
						echo json_encode( array('status'=>1, 'list' => array()) );
					}
				}else{
					echo json_encode( array('status'=>1, 'list' => array()) );
				}

			}

		}

		die();
	}

	public function disconnectFacebook(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$this->Common_DML->delete_data( TBL_USER_SETTINGS, array( 'user_id' => $userID, 'key' => 'FacebookUserInfo' ) );
			$this->Common_DML->delete_data( TBL_USER_SETTINGS, array( 'user_id' => $userID, 'key' => 'FacebookAccessToken' ) );
			$this->session->unset_userdata( 'FacebookAccessToken' );
            $this->session->unset_userdata( 'FacebookUserInfo' );
			echo json_encode( array( 'status' => 1, 'msg' => 'Facebook Connection is destroy.' ) );
		}
		die();
	}

	public function saveIntegration(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$date = date('Y-m-d H:i:s');
			$where = array( 'key' => 'AffiliateID', 'user_id' => $userID );
			$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
			$data = array(
				'ClickBank' => '',
				'WarriorPlus' => '',
				'DigiStore24' => '',
			);
			if(!empty($result)){
				$data = json_decode( $result[0]['value'], true );
			}	
			if(isset($_POST['ClickBank'])){
				$data['ClickBank'] = $_POST['ClickBank'];
			}	
			if(isset($_POST['WarriorPlus'])){
				$data['WarriorPlus'] = $_POST['WarriorPlus'];
			}	
			if(isset($_POST['DigiStore24'])){
				$data['DigiStore24'] = $_POST['DigiStore24'];
			}	
			if(empty($result)){
				$putData = array( 
					'key' => 'AffiliateID',
					'user_id' => $userID,
					'value' => json_encode( $data ), 
					'isCreated' => $date,
					'isUpdated' => $date,
					'status' => 1
				);
				$this->Common_DML->put_data( TBL_USER_SETTINGS, $putData );
			}else{
				$what = array( 'value' => json_encode( $data ), 'isUpdated' => $date, 'status' => 1 );
				$this->Common_DML->set_data( TBL_USER_SETTINGS, $what, $where );
			}
			echo json_encode( array( 'status' => 1, 'msg' => 'We have saved your affiliate ID.' ) );
		}
	}
	
    public function createSite(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$date = date('Y-m-d H:i:s');
			
			if(!empty($_POST['s_id'])){
				$s_id = $_POST['s_id'];

				/*$sub_domain_name = $_POST['sub_domain_name'];
				$where = array( 'sub_domain' => $sub_domain_name, 's_id !=' => $s_id );
				$check_domain = $this->Common_DML->get_data( TBL_SITES, $where, '*' );
				
				if(!empty($check_domain) && count($check_domain) == 1){
				   $msg = 'Sub Domain already used, Please use different sub domain.';
				   echo json_encode( array( 'status'=>0, 'msg'=> $msg ) );
				   die();
				}
				
				$check_domain = $this->Common_DML->get_data( TBL_SITES, array( 's_id' => $s_id, 'user_id' => $userID ), '*' );

				if(!empty($check_domain[0]['sub_domain']) && $check_domain[0]['sub_domain'] != $_POST['sub_domain_name']){
					$sub_domain = createSubdomain( $_POST['sub_domain_name'] );
					if(!$sub_domain['status']){
						echo json_encode( $sub_domain );
						die();
					}
					removeSubdomain( $check_domain[0]['sub_domain'] );
				}

				if(!empty($_POST['domain_name'])){
					if(!empty($check_domain[0]['custom_domain']) && $check_domain[0]['custom_domain'] != $_POST['domain_name']){
						$custom_domain = createAddonDomain( $_POST['domain_name'], $_POST['sub_domain_name'] );
						if(!$custom_domain['status']){
							echo json_encode( $custom_domain );
							die();
						}
						removeAddonDomain( $check_domain[0]['custom_domain'], $check_domain[0]['sub_domain'] );
					}
			   }*/


				$what = array(
					'site_name' 	=> $_POST['site_name'],
					'category_id' 	=> $_POST['category_id'],
					'custom_domain' => $_POST['domain_name'],
					'sub_domain' 	=> $_POST['sub_domain_name'],
					'isUpdated' 	=> $date
				);
				$where = array( 's_id' => $s_id );
				$this->Common_DML->set_data( TBL_SITES , $what, $where );
				$msg = 'We have updated a site successfully.';
				echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/site_header/'.$s_id) ) );	
			}else{
				$sub_domain_name = $_POST['sub_domain_name'];
				$where = array( 'sub_domain' => $sub_domain_name );
				$check_domain = $this->Common_DML->get_data( TBL_SITES, $where, '*' );
				
				if(!empty($check_domain) || count($check_domain) == 1){
				   $msg = 'Sub Domain already used, Please use different sub domain.';
				   echo json_encode( array( 'status'=>0, 'msg'=> $msg ) );
				   die();
				}
				
				/*$sub_domain = createSubdomain( $_POST['sub_domain_name'] );
				if(!$sub_domain['status']){
				 	echo json_encode( $sub_domain );
				 	die();
				}
				if(!empty($_POST['domain_name'])){
				 	$custom_domain = createAddonDomain( $_POST['domain_name'], $_POST['sub_domain_name'] );
				 	if(!$custom_domain['status']){
				 		echo json_encode( $custom_domain );
				   		die();
				 	}
				}*/
				
				$data = array(
					'user_id' 		=> $userID,
					'site_name' 	=> $_POST['site_name'],
					'category_id' 	=> $_POST['category_id'],
					'custom_domain' => $_POST['domain_name'],
					'sub_domain' 	=> $_POST['sub_domain_name'],
					'social_links' 	=> '',
					'autoresponder' => '',
					'banners' 		=> '',
					'isCreated' 	=> $date,
					'isUpdated' 	=> $date,
					'status' 		=> 1
				);
				$s_id = $this->Common_DML->put_data( TBL_SITES , $data );

				$analytics_data = array(
					's_id' 				=> $s_id,
					'page_view' 		=> 0,
					'unique_page_view' 	=> 0,
					'isCreated' 		=> $date,
					'isUpdated' 		=> $date,
					'status' 			=> 1
					
				);
				$analytics = $this->Common_DML->put_data( TBL_ANALYTICS, $analytics_data );

				
				/*$data = array(
					's_id' => $s_id,
					'user_id' => $userID,
					'page_name' => 'Pages',
					'content' => 'cool',
					'isCreated' => $date,
					'isUpdated' => $date,
					'status' => 1,
					'not_delete' => 0
				);
				$page_id = $this->Common_DML->put_data( TBL_PAGES, $data );*/
				
				$str = getPrivacyPolicyContent($_POST['site_name'], !empty($_POST['domain_name']) ? $_POST['domain_name'] : $_POST['sub_domain_name']);
				$data = array(
					's_id' => $s_id,
					'user_id' => $userID,
					'page_name' => 'Privacy Policy',
					'content' => $str,
					'isCreated' => $date,
					'isUpdated' => $date,
					'status' => 1,
					'not_delete' => 1
				);
				$page_id = $this->Common_DML->put_data( TBL_PAGES, $data );

				$str = getTermsConditionsContent($_POST['site_name'], !empty($_POST['domain_name']) ? $_POST['domain_name'] : $_POST['sub_domain_name']);
				$data = array(
					's_id' => $s_id,
					'user_id' => $userID,
					'page_name' => 'Terms and Conditions',
					'content' => $str,
					'isCreated' => $date,
					'isUpdated' => $date,
					'status' => 1,
					'not_delete' => 1
				);
				$page_id = $this->Common_DML->put_data( TBL_PAGES, $data );
				
				$msg = 'We have created a site successfully.';
				echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/site_header/'.$s_id)) );
			}
		}
	}

	public function deleteSite(){
		$userID = $this->session->userdata( 'user_id' );
		$s_id = $_POST['s_id'];
		$where = array( 's_id' => $s_id, 'user_id' => $userID );
		$site = $this->Common_DML->get_data( TBL_SITES, $where );

		if(!empty($site)){
			$sub_domain = $site[0]['sub_domain'];
			$custom_domain = $site[0]['custom_domain'];

			if(!empty($sub_domain)){
				$checksubDomain = removeSubdomain( $sub_domain );
			}
			
			if(!empty($custom_domain)){
				$checkcustomDomain = removeAddonDomain( $custom_domain, $sub_domain );
			}
		}
		if($checksubDomain['status'] == 1){

			$this->Common_DML->delete_data( TBL_SITE_SCHEDULE_ARTICLES, $where );
			$this->Common_DML->delete_data( TBL_SITES, $where );
			$this->Common_DML->delete_data( TBL_PAGES, $where );
			$this->Common_DML->delete_data( TBL_LEAD_GENERATION, $where );
			$where = array( 's_id' => $s_id);
			$this->Common_DML->delete_data( TBL_ANALYTICS, $where );
			$this->Common_DML->delete_data( TBL_SITES_ARTICLE, array( 's_id' => $s_id ) );
			echo json_encode( array( 'status' => 1, 'msg' => 'We have deleted a site successfully.', 'url' => base_url('user/dashboard') ) );
		}else{
		 	echo json_encode( array( 'status' => 0, 'msg' => $checksubDomain['msg'] ) );
		}		

	}

	public function site_header(){
		$userID = $this->session->userdata( 'user_id' );
		$date = date('Y-m-d H:i:s');

		if(isset($_POST['site_id'])){
			$s_id = $_POST['site_id'];
	
		    $design = array(
				'heading' => $_POST['heading'],
				'subheading' => $_POST['subheading'],
				'textcolor' => $_POST['textcolor'],
				'subtextcolor' => $_POST['subtextcolor'],
				'headingtextfontfamily' => $_POST['headingtextfontfamily'],
				'subtextfontfamily' => $_POST['subtextfontfamily'],
				'image_id' => $_POST['image_id'],
				'image_url' => $_POST['image_url']
			);
		    $designs = json_encode($design);
		    
		    $what = array('header' => $designs);
			$where = array( 's_id' => $s_id );
			
			$this->Common_DML->set_data( TBL_SITES , $what, $where );
			$msg = 'We have updated a site header successfully.';
			echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/site_design/'.$s_id)) );	
		}
	}
	
	public function site_design(){
		// print_r($_POST);
		// die;
		$userID = $this->session->userdata( 'user_id' );
		$date = date('Y-m-d H:i:s');

		if(isset($_POST['data']['s_id'])){
			$s_id = $_POST['data']['s_id'];
			
			$HeaderFont = array(
    		    'headerfontWeight'  => $_POST['data']['headerfontWeight'],
                'headerfontStyle'   => $_POST['data']['headerfontStyle'],
                'headerfontFamily'  => $_POST['data']['headerfontFamily'],
                'headerfontColor'   => $_POST['data']['headerfontColor']
		    );
		  	
		  	$NormalFont = array(
    		    'normalfontWeight'  => $_POST['data']['normalfontWeight'],
                'normalfontStyle'   => $_POST['data']['normalfontStyle'],
                'normalfontFamily'  => $_POST['data']['normalfontFamily'],
                'normalfontColor'   => $_POST['data']['normalfontColor']
		    );
		    if(isset($_POST['image_data']['bg_image_id'])){
				$SiteBanner = array(
					'bg_image_id'   => $_POST['image_data']['bg_image_id'],
					'bg_image_url'   => $_POST['image_data']['bg_image_url'],
					'sitebannerColor'   => $_POST['data']['sitebannerColor']
				);
			}else{
				$SiteBanner = array(
					'sitebannerColor'   => $_POST['data']['sitebannerColor']
				);
			}

			if(!empty($_POST['image_data']['logo_image_id'])){
				$SiteLogo = array(
					'logo_image_id'   => $_POST['image_data']['logo_image_id'],
					'logo_image_url'   => $_POST['image_data']['logo_image_url']
				);
			}else{
				$SiteLogo = array();
			}
		        

			if(!empty($_POST['image_data']['footer_image_id'])){
				$footer_image_id  = $_POST['image_data']['footer_image_id'];
		        $footer_image_url  = $_POST['image_data']['footer_image_url'];
			}else{
				$footer_image_id  = '';
		        $footer_image_url  = '';
			}
			$Footer = array(
				'footerBgColor' 	 	=> $_POST['data']['footerBgColor'],
				'footerfontColor'  		=> $_POST['data']['footerfontColor'],
				'sociallinkfontColor'  	=> $_POST['data']['sociallinkfontColor'],
				'sociallinkBgColor'  	=> $_POST['data']['sociallinkBgColor'],
				'footer_image_id'   	=> $footer_image_id,
		        'footer_image_url'   	=> $footer_image_url,
				'copyright_text' 		=> $_POST['data']['copyright_text']
			);
			$ReadMoreButton = array(
				'button_text'  => $_POST['data']['button_text'],
				'buttonfontColor'  => $_POST['data']['buttonfontColor'],
				// 'buttonBgColor'  => $_POST['data']['buttonBgColor']
			);
			$SiteTitle = array(
				'site_title'  => $_POST['data']['site_title']
			);
	
		    $design = array(
				'headerFont' 		=> $HeaderFont,
				'normalFont' 		=> $NormalFont,
				'siteBanner' 		=> $SiteBanner,
				'site_title' 		=> $SiteTitle,
				'siteLogo' 	 		=> $SiteLogo,
				'footer' 			=> $Footer,
				'readmoreButton' 	=> $ReadMoreButton
			);
		    $designs = json_encode($design);
		    
		    $what = array('designs' => $designs);
			$where = array( 's_id' => $s_id );
			
			$this->Common_DML->set_data( TBL_SITES , $what, $where );
			$msg = 'We have updated a site design successfully.';
			echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/site_article/'.$s_id)) );	
		}
	}
	
	public function site_article(){
		$userID = $this->session->userdata( 'user_id' );
		$date = date('Y-m-d H:i:s');
		
		if(isset($_POST['n_id']) && empty($_POST['nc_id']) && empty($_POST['nsc_id']) && empty($_POST['np_id']) ){
		    
		    $n_id = $_POST['n_id'];
			$where = array( 'n_id' => $_POST['n_id'] , 'parent_id' => 0  );
    		$categories = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where);
    		
			echo json_encode( array( 'status' => 1, 'data' => $categories) );	
		}
		
		if(isset($_POST['n_id']) && isset($_POST['nc_id']) && empty($_POST['nsc_id']) && empty($_POST['np_id']) ){
		    
		    $n_id = $_POST['n_id'];
		    $nc_id = $_POST['nc_id'];
			$where = array( 'n_id' => $n_id ,'parent_id' => $nc_id);
			$parent_category = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where);
    	
    		echo json_encode( array( 'status' => 1, 'data' => $parent_category) );	
		}
		
		if(isset($_POST['n_id']) && isset($_POST['nc_id']) && isset($_POST['nsc_id']) && empty($_POST['np_id']) ){
		    
		    $n_id = $_POST['n_id'];
		    $nc_id = $_POST['nsc_id'];
		    
			$where = array( 'n_id' => $n_id , 'nc_id' => $nc_id );
    		$products = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where);

			echo json_encode( array( 'status' => 1, 'data' => $products) );	
		}
		
		if(isset($_POST['nc_id']) && isset($_POST['n_id']) && isset($_POST['nsc_id']) && isset($_POST['np_id']) ){
			$n_id = $_POST['n_id'];
			$nc_id = $_POST['nsc_id'];
			$np_id = $_POST['np_id'];
			
			$where = array( 'nc_id' => $nc_id ,'n_id' => $n_id ,'np_id' => $np_id );
			$product = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where);
			
			$where = array( 'key' => 'AffiliateID', 'user_id' => $userID );
			$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );

			if(!empty($result)){

				$AffiliateID = json_decode( $result[0]['value'], true );
				
				if($n_id == 1){
					$product_url = str_replace('userid',$AffiliateID['ClickBank'], $product[0]['product_url']);
				}
				if($n_id == 2){
					$product_url = str_replace('userid',$AffiliateID['WarriorPlus'], $product[0]['product_url']);
				}
				if($n_id == 3){
					$product_url = str_replace('userid',$AffiliateID['DigiStore24'], $product[0]['product_url']);
				}
			}else{
				$product_url = $product[0]['product_url'];
			}
			echo json_encode( array( 'status' => 1, 'data' => $product, 'product_url' => $product_url) );	
		}

		if(isset($_POST['a_id']) ){
		   
			$a_id = $_POST['a_id'];
			$where = array( 'a_id' => $a_id , 'status' => 1);
			$articles = $this->Common_DML->get_data( TBL_ARTICLES , $where);
			
			$image_url = "SELECT `media`.`file`, `articles`.`m_id` AS image_url FROM (`media`) LEFT OUTER JOIN `articles` ON `media`.`m_id` = `articles`.`m_id` WHERE `media`.`m_id` = ".$articles[0]['m_id']."";
			$image_url = $this->Common_DML->query( $image_url );
		
			echo json_encode( array( 'status' => 1, 'data' => $articles, 'image_url' => $image_url) );	
		}
		
	}
	
	public function site_product(){
		// print_r($_POST);
		// die;
		$userID = $this->session->userdata( 'user_id' );
		$s_id = $_POST['data']['s_id'];
		$sa_id = $_POST['data']['sa_id'];
	    $n_id = $_POST['n_id'];
		$nc_id = $_POST['nsc_id'];
		$np_id = $_POST['np_id'];
		
		$where = array( 'nc_id' => $nc_id ,'n_id' => $n_id ,'np_id' => $np_id );
		$product = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where);
		
		$where = array( 'key' => 'AffiliateID', 'user_id' => $userID );
		$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
		
		if(!empty($result)){

			$AffiliateID = json_decode( $result[0]['value'], true );
			
			if($n_id == 1){
				$product_url = str_replace('userid',$AffiliateID['ClickBank'], $product[0]['product_url']);
			}
			if($n_id == 2){
				$product_url = str_replace('userid',$AffiliateID['WarriorPlus'], $product[0]['product_url']);
			}
			if($n_id == 3){
				$product_url = str_replace('userid',$AffiliateID['DigiStore24'], $product[0]['product_url']);
			}
		}else{
			$product_url = $product[0]['product_url'];
		}

		if(!empty($sa_id)){

			$date = date('Y-m-d H:i:s');
			$product_data = array(
				's_id' => $s_id,
				'n_id' => $_POST['n_id'],
				'nc_id' => $_POST['nc_id'],
				'np_id' => $_POST['np_id'],
				'nsc_id' => $_POST['nsc_id'],
				'product_name' => $product[0]['name'],
				'product_description' => $product[0]['description'],
				'product_commission' => $product[0]['commission'],
				'product_url' => $product_url,
				'isUpdated' => $date,
			);
			$where = array('status' => 1, 'sa_id'=> $sa_id );
			$product = $this->Common_DML->set_data( TBL_SITES_ARTICLE, $product_data, $where );
			$insert_id = $sa_id;
			$msg = 'We have Updated a product successfully..';

		}else{
			
			$date = date('Y-m-d H:i:s');
			$product_data = array(
				's_id' => $s_id,
				'n_id' => $_POST['n_id'],
				'nc_id' => $_POST['nc_id'],
				'np_id' => $_POST['np_id'],
				'nsc_id' => $_POST['nsc_id'],
				'product_name' => $product[0]['name'],
				'product_description' => $product[0]['description'],
				'product_commission' => $product[0]['commission'],
				'product_url' => $product_url,
				'isCreated' => $date,
				'isUpdated' => $date,
				'status' => 1
			);
			$insert_id = $this->Common_DML->put_data( TBL_SITES_ARTICLE, $product_data );
			$msg = 'You have add product successfully.';
		}
				
		echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/create_article/'.$s_id.'/'.$insert_id ) ) );

	}
	
	public function addsiteArticle(){
		// print_r($base64);
		//die;
        global $insert_id;
		$s_id = $_POST['data']['s_id'];
        $videoLocation = $_POST['data']['videoLocation'];
		//		if( (empty($_POST['data']['sa_id']) && !empty($_POST['n_id']))) {
		//
		//			$n_id = $_POST['n_id'];
		//			$product_name = $_POST['product_name'];
		//			$product_url = $_POST['product_url'];
		//
		//			$date = date('Y-m-d H:i:s');
		//			$product_data = array(
		//				's_id' => $s_id,
		//				'n_id' => $_POST['n_id'],
		//				'product_name' => $product_name,
		//				'product_url' => $product_url,
		//				'isCreated' => $date,
		//				'isUpdated' => $date,
		//				'status' => 1
		//			);
		//            $insert_id = $this->Common_DML->put_data( TBL_SITES_ARTICLE, $product_data );
		//			$this->Common_DML->put_data( TBL_SITES_ARTICLE, $product_data );
		//			//echo $this->db->last_query();
		//		}
				// && ($_POST['n_id'] == 2)
		//		if( (!empty($_POST['n_id']) && !empty($_POST['data']['sa_id'])) ){
		//
		//				$n_id = $_POST['n_id'];
		//				$product_name = $_POST['product_name'];
		//				$product_url = $_POST['product_url'];
		//
		//				$date = date('Y-m-d H:i:s');
		//				$product_data = array(
		//					's_id' => $s_id,
		//					'n_id' => $_POST['n_id'],
		//					'product_name' => $product_name,
		//					'product_url' => $product_url,
		//					'isUpdated' => $date,
		//					'status' => 1
		//				);
		//				$where = array( 'sa_id'=> $_POST['data']['sa_id'], 's_id'=> $s_id  );
		//				$Update_data = $this->Common_DML->set_data( TBL_SITES_ARTICLE, $product_data, $where );
		//				// echo $this->db->last_query();
		//
		//		}
		
		$video = '';
		// if ( 0 < $_FILES['upload_source']['error'] || $_FILES['upload_source']['error'] != UPLOAD_ERR_OK) {
			// echo 'Error: ' . $_FILES['file']['error'] . '<br>';
		// } else {
			
			// $userID = $this->session->userdata( 'user_id' );
			
			// $name = 'video'.date('Ymdtms').'.mp4';
			// $upload_path = 'uploads/user_'.$userID.'/videos/';
			// $fileTmpLoc = $_FILES["upload_source"]["tmp_name"];
			// if(!$fileTmpLoc){
				// echo "ERROR: Please browse for a file before clicking the upload button.";
			// }
			
			// $video = 'uploads/user_'.$userID.'/videos/'.$_FILES['file']['video'];
		// }
		//		if(empty($_POST['data']['sa_id'])){
		//			$sa_id = $insert_id;
		//		}else{
		//			$sa_id = $_POST['data']['sa_id'];
		//		}

		if($_POST['data']['vid-url'] != null){
			$video = $_POST['data']['vid-url'];
            $videoLocation = $_POST['data']['videoLocation'];
		}

        $sa_id = $_POST['data']['sa_id'];



		if(empty($_POST['article_id'])){
			$article_id = 0;
		}else{
			$article_id = $_POST['article_id'];
		}
		if(empty($_POST['data']['image_url'])){
			$article_image_url = 0;
			$article_image_id = 0;
		}else{
			$article_image_url = $_POST['data']['image_url'];
			$article_image_id = $_POST['data']['image_id'];
		}
		
		if($video != ''){
			$what = array(
				'article_id' 		=> $article_id,
				'article_name' 		=> $_POST['data']['title'],
				'article_content' 	=> $_POST['data']['content'],
				'article_image_url' => $article_image_url,
				'article_image_id' 	=> $article_image_id,
				'button_text' 		=> $_POST['data']['button_text'],
				'button_text_family'=> $_POST['data']['buttontextfontfamily'],
				'button_text_color' => $_POST['data']['buttontextcolor'],
				'button_color' 		=> $_POST['data']['buttoncolor'],
				'social_share' 		=> $_POST['data']['social_share'],
				'article_video' 	=> $video,
                'video_position'    => $videoLocation,
			);
		} else {
			$what = array(
				'article_id' 		=> $article_id,
				'article_name' 		=> $_POST['data']['title'],
				'article_content' 	=> $_POST['data']['content'],
				'article_image_url' => $article_image_url,
				'article_image_id' 	=> $article_image_id,
				'button_text' 		=> $_POST['data']['button_text'],
				'button_text_family'=> $_POST['data']['buttontextfontfamily'],
				'button_text_color' => $_POST['data']['buttontextcolor'],
				'button_color' 		=> $_POST['data']['buttoncolor'],
				'social_share' 		=> $_POST['data']['social_share'],
                'video_position'    => $videoLocation,
			);
		}

        if( !empty($_POST['data']['sa_id']) ){
            $where = array( 'sa_id'=> $sa_id );
            $this->Common_DML->set_data( TBL_SITES_ARTICLE, $what, $where );
            echo json_encode( array( 'status' => 1, 'msg' => 'You have updated site article successfully.', 'url' => base_url('user/site_article/'.$s_id) ) );
        }
        if( empty($_POST['data']['sa_id']) ){
            $date = date('Y-m-d H:i:s');
            $product_data = array(
                's_id' => $_POST['data']['s_id'],
                'n_id' => $_POST['n_id'],
                'article_name' 		=> $_POST['data']['title'],
                'article_content' 	=> $_POST['data']['content'],
                'product_name' => isset($_POST['product_name']) ? $_POST['product_name'] : $_POST['data']['product_name'],
                'product_url' => isset($_POST['product_url']) ? $_POST['product_url'] : $_POST['data']['product_url'],
                'isCreated' => $date,
                'isUpdated' => $date,
                'article_id' 		=> $article_id,
                'article_image_url' => $article_image_url,
                'article_image_id' 	=> $article_image_id,
                'button_text' 		=> $_POST['data']['button_text'],
                'button_text_family'=> $_POST['data']['buttontextfontfamily'],
                'button_text_color' => $_POST['data']['buttontextcolor'],
                'button_color' 		=> $_POST['data']['buttoncolor'],
                'social_share' 		=> $_POST['data']['social_share'],
                'status' => 1
            );
            $query = $this->Common_DML->put_data( TBL_SITES_ARTICLE, $product_data );
            if ($query !== FALSE) {
                echo json_encode( array( 'status' => 1, 'msg' => 'You have add site article successfully.', 'url' => base_url('user/site_article/'.$s_id) ) );
            }
            else {
                $this->Common_DML->error();
            }

        }
	}

	public function deleteSiteArticle(){

		$userID = $this->session->userdata( 'user_id' );
		$sa_id = $_POST['sa_id'];
		$s_id = $_POST['s_id'];
		$where = array( 'sa_id' => $sa_id );
		$this->Common_DML->delete_data( TBL_SITES_ARTICLE, $where );
		echo json_encode( array( 'status' => 1, 'msg' => 'We have deleted a article successfully.', 'url' => base_url('user/site_article/'.$s_id) ) );
	}
	
	public function addPage(){
	    $date = date('Y-m-d H:i:s');
	    $userID = $this->session->userdata( 'user_id' );
	    $s_id = $_POST['data']['s_id'];
	    
		if( isset($_POST['data']['page_id']) ){

			$what = array(
				'user_id' => $userID,
				'page_name' => $_POST['data']['title'],
				'content' => base64_decode($_POST['content']),
				'isUpdated' => $date,
				'status' => 1
			);
			$where = array( 'p_id'=> $_POST['data']['page_id'] );
		    $this->Common_DML->set_data( TBL_PAGES, $what, $where );
			
			$msg = 'We have Updated a page successfully.';

		}
		if(empty($_POST['data']['page_id'])){
			$data = array(
				's_id' => $s_id,
				'user_id' => $userID,
				'page_name' => $_POST['data']['title'],
				'content' => base64_decode($_POST['content']),
				'isCreated' => $date,
				'isUpdated' => $date,
				'status' => 1
			);
			$page_id = $this->Common_DML->put_data( TBL_PAGES, $data );

			$msg = 'We have added a page successfully.';
		}
		echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/site_pages/'.$s_id) ) );

	}

	public function getPage(){
		if(checkAuthentication()){
			$p_id = $_POST['id'];
			$where = array( 'p_id' => $p_id, 'status' => 1 );
			$result = $this->Common_DML->get_data( TBL_PAGES, $where );
			if(empty($result)){
				echo json_encode( array( 'status' => 0, 'msg' => 'We can\'t found in our database.' ) );
				die();
			}else{
				$page = $result[0];
			}
			echo json_encode( array('status' => 1, 'msg' => '', 'data' => $page) );
		}
		die();
	}
	
	public function deletePage(){
		if(checkAuthentication()){			
			$userID = $this->session->userdata( 'user_id' );
			$s_id = $this->uri->segment(3);
			$id = $_POST['id'];
			$where = array( 'p_id' => $id );
			$this->Common_DML->delete_data( TBL_PAGES, $where );
			$msg = 'We have deleted a page successfully.';
			echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/site_pages/'.$s_id) ) );
		}
		die();
	}
	
	public function site_banner(){
		// $r = base64_decode($_POST['top_banner_google_ads']);
		// print_r($r);
		// die;
		$userID = $this->session->userdata( 'user_id' );
		$date = date('Y-m-d H:i:s');

		if(isset($_POST['s_id'])  ){
			$s_id = $_POST['s_id'];
			
			if(isset($_POST['top_banner_id'])  ){
				$topBanner = array(
					'logo_image_id'   	=> $_POST['top_banner_id'],
					'logo_image_url'  	=> $_POST['top_banner_url'],
					'top_banner_link'   => $_POST['data']['top_banner_link']
				);
			}else{
				$topBanner = 0;
			}

			if(isset($_POST['bottom_banner_id'])  ){
				$bottomBanner = array(
					'logo_image_id'   		=> $_POST['bottom_banner_id'],
					'logo_image_url'   		=> $_POST['bottom_banner_url'],
					'bottom_banner_link'  	=> $_POST['data']['bottom_banner_link']
				);

			}else{
				$bottomBanner = 0;
			}
			
			if(isset($_POST['side_banner_id'])  ){
				$sideBanner = array(
					'logo_image_id'   		=> $_POST['side_banner_id'],
					'logo_image_url'   		=> $_POST['side_banner_url'],
					'sidebar_banner_link'   => $_POST['data']['sidebar_banner_link']
				);
			}else{
				$sideBanner = 0;
			}

			if(isset($_POST['top_banner_google_ads'])){
				$topBanner['top_banner_google_ads'] = base64_decode($_POST['top_banner_google_ads']);
			}
			if(isset($_POST['bottom_banner_google_ads'])){
				$bottomBanner['bottom_banner_google_ads'] = base64_decode($_POST['bottom_banner_google_ads']);
			}
			if(isset($_POST['sidebar_banner_google_ads'])){
				$sideBanner['sidebar_banner_google_ads'] = base64_decode($_POST['sidebar_banner_google_ads']);
			}
	
		    $Banner = array(
				'topBanner' => $topBanner,
				'bottomBanner' => $bottomBanner,
				'sideBanner' => $sideBanner
			);
		    $Banners = json_encode($Banner);
		    
		    $what = array('banners' => $Banners);
			$where = array( 's_id' => $s_id );
			
			$this->Common_DML->set_data( TBL_SITES , $what, $where );
			$msg = 'We have updated a site banner successfully.';
			echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/site_banner/'.$s_id)) );	
		}
		
	}
	
	public function site_autoresponder(){
		
		$userID = $this->session->userdata( 'user_id' );
		$s_id = $_POST['data']['s_id'];
			
		if(isset($s_id)){

			if(isset($_POST['sidebar_image_id'])){
				$sidebar_image_id  = $_POST['sidebar_image_id'];
				$sidebar_image_url = $_POST['sidebar_image_url'];

			}else{
				$sidebar_image_id  = '';
				$sidebar_image_url = '';

			}
			if(isset($_POST['sliding_image_id'])){
				$sliding_image_id  = $_POST['sliding_image_id'];
				$sliding_image_url = $_POST['sliding_image_url'];

			}else{
				$sliding_image_id  = '';
				$sliding_image_url = '';

			}
			if(!empty($_POST['sliding_checkbox'])){
				$sliding_checkbox  = $_POST['sliding_checkbox'];

			}else{
				$sliding_checkbox = '';

			}
			if(!empty($_POST['sidebar_checkbox'])){
				$sidebar_checkbox  = $_POST['sidebar_checkbox'];

			}else{
				$sidebar_checkbox = '';

			}

			if(isset($_POST['header_image_id'])){
				$header_image_id  = $_POST['header_image_id'];
				$header_image_url = $_POST['header_image_url'];

			}else{
				$header_image_id  = '';
				$header_image_url = '';

			}

			if(!empty($_POST['header_checkbox'])){
				$header_checkbox  = $_POST['header_checkbox'];

			}else{
				$header_checkbox = '';

			}
			if (isset($_POST['mailing_list_id'])) {
				$mailing_list_id = $_POST['mailing_list_id'];
			}else{
				$mailing_list_id = '';

			}
			if (isset($_POST['mailing_list_name'])) {
				$mailing_list_name = $_POST['mailing_list_name'];
			}else{
				$mailing_list_name = '';

			}
			
				$autoresponder = array(
					'autoresponder_name' 	    => $_POST['autoresponder_name'],
					'mailing_list_id' 	        => $mailing_list_id,
					'mailing_list_name' 	    => $mailing_list_name,
					
					'sliding_checkbox'          => $sliding_checkbox,
					'sliding_image_id'          => $_POST['sliding_image_id'],
					'sliding_image_url'         => $_POST['sliding_image_url'],
					
					'sliding_headline_text' 	=> $_POST['data']['sliding_headline_text'],
					'sliding_sub_headline_text' => $_POST['data']['sliding_sub_headline_text'],
					'sliding_button_text' 	    => $_POST['data']['sliding_button_text'],
					'sliding_button_text_color' => $_POST['data']['sliding_button_text_color'],
					'sliding_button_color' 	    => $_POST['data']['sliding_button_color'],
					'sliding_thankyou_message' 	=> $_POST['data']['sliding_thankyou_message'],
					'sliding_btn_redirect_link' => $_POST['data']['sliding_btn_redirect_link'],
					
					'sidebar_checkbox'	        => $sidebar_checkbox,
					'sidebar_image_id'	        => $sidebar_image_id,
					'sidebar_image_url'         => $sidebar_image_url,
					
					'sidebar_headline_text'     => $_POST['data']['sidebar_headline_text'],
					'sidebar_sub_headline_text' => $_POST['data']['sidebar_sub_headline_text'],
					'sidebar_button_text' 	    => $_POST['data']['sidebar_button_text'],
					'sidebar_button_text_color' => $_POST['data']['sidebar_button_text_color'],
					'sidebar_button_color' 	    => $_POST['data']['sidebar_button_color'],
					'sidebar_thankyou_message' 	=> $_POST['data']['sidebar_thankyou_message'],
					'sidebar_btn_redirect_link' => $_POST['data']['sidebar_btn_redirect_link'],
					
					'header_checkbox'	        => $header_checkbox,
					'header_image_id'	        => $header_image_id,
					'header_image_url'         => $header_image_url,
					
					'header_headline_text'     => $_POST['data']['header_headline_text'],
					'header_sub_headline_text' => $_POST['data']['header_sub_headline_text'],
					'header_button_text' 	    => $_POST['data']['header_button_text'],
					'header_button_text_color' => $_POST['data']['header_button_text_color'],
					'header_button_color' 	    => $_POST['data']['header_button_color'],
					'header_thankyou_message' 	=> $_POST['data']['header_thankyou_message'],
					'header_btn_redirect_link' => $_POST['data']['header_btn_redirect_link']
				);
			

			$social_link = array(
					'facebook_link'    =>   $_POST['data']['facebook_link'], 
					'twitter_link'     =>   $_POST['data']['twitter_link'], 
					'pinterest_link'   =>   $_POST['data']['pinterest_link'], 
					'linkedin_link'    =>   $_POST['data']['linkedin_link'], 
					'whatsapp_link'    =>   $_POST['data']['whatsapp_link'], 
					'reddit_link'      =>   $_POST['data']['reddit_link'], 
					'tumblr_link'      =>   $_POST['data']['tumblr_link'], 
					'buffer_link'      =>   $_POST['data']['buffer_link'], 
					'digg_link'        =>   $_POST['data']['digg_link'],
					'flipboard_link'   =>   $_POST['data']['flipboard_link'], 
					'meneame_link'     =>   $_POST['data']['meneame_link'],
					'blogger_link'     =>   $_POST['data']['blogger_link'], 
					'evernote_link'    =>   $_POST['data']['evernote_link'], 
					'instapaper_link'  =>   $_POST['data']['instapaper_link'], 
					'pocket_link'      =>   $_POST['data']['pocket_link'], 
					'telegram_link'    =>   $_POST['data']['telegram_link'], 
					'wordpress_link'   =>   $_POST['data']['wordpress_link'], 
					'bibsonomy_link'   =>   $_POST['data']['bibsonomy_link'], 
					'mix_link'         =>   $_POST['data']['mix_link'], 
					'care2_link'       =>   $_POST['data']['care2_link'], 
					'blogmarks_link'   =>   $_POST['data']['blogmarks_link'], 
					'livejournal_link' =>   $_POST['data']['livejournal_link'], 
					'folkd_link'       =>   $_POST['data']['folkd_link'], 
					'myspace_link'     =>   $_POST['data']['myspace_link'], 
					'plurk_link'       =>   $_POST['data']['plurk_link'], 
					'symbaloo_link'    =>   $_POST['data']['symbaloo_link'], 
					'vk_link'          =>   $_POST['data']['vk_link']
			);
		}
			
			$autoresponders = json_encode($autoresponder);
			$social_link = json_encode($social_link);
			
			$what = array('autoresponder' => $autoresponders, 'social_links' => $social_link );
			$where = array( 's_id' => $s_id );
			$social_share = '';
			if(isset($_POST['data']['social_share']) && $_POST['data']['social_share']){
				$social_share = json_encode( array(
					'social_share' => $_POST['data']['social_share'],
					'data' => isset($_POST['data']['social_share_data']) ? $_POST['data']['social_share_data'] : ''
				) );
			}
			$what['social_share'] = $social_share; 
			
			$this->Common_DML->set_data( TBL_SITES , $what, $where );
			$msg = 'We have updated a site autoresponder successfully.';
			echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/dashboard')) );	
		
	}
	
	public function create_dfySite(){
		//		print_r($_POST);
		//		die;
		$userID = $this->session->userdata( 'user_id' );
		$date = date('Y-m-d H:i:s');

		$sub_domain_name = $_POST['data']['sub_domain_name'];
		$where = array( 'sub_domain' => $sub_domain_name );
		$check_domain = $this->Common_DML->get_data( TBL_SITES, $where, '*' );

		if(!empty($check_domain) && count($check_domain) == 1){
			$msg = 'Sub Domain already used, Please use different sub domain.';
			echo json_encode( array( 'status'=>0, 'msg'=> $msg ) );
			die();
		 }

		 /*$sub_domain = createSubdomain( $sub_domain_name);
		 if(!$sub_domain['status']){
			  echo json_encode( $sub_domain );
			  die();
		 }
		 if(!empty($_POST['domain_name'])){
			  $custom_domain = createAddonDomain( $_POST['data']['domain_name'], $sub_domain_name );
			  if(!$custom_domain['status']){
				  echo json_encode( $custom_domain );
					die();
			  }
		 }*/

		if(isset($_POST['autoresponder_name'])){
			$autoresponder_name = $_POST['autoresponder_name'];
		}else{
			$autoresponder_name = "";
		}
		if(isset($_POST['mailing_list_id'])){
			$mailing_list_id = $_POST['mailing_list_id'];
		}else{
			$mailing_list_id = "";
		}
		
		$n_id = $_POST['n_id'];

		if($n_id == 2){

			$where = array( 'wc_id' => $_POST['data']['category_id'] );
			$category_name = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where, '*' );
			
			$articles = get7article($category_name[0]['ezine_name']);
			
			$imagesrt = getSiteHeader($category_name[0]['ezine_name']);
			
			$designData = json_decode('{"headerFont":{"headerfontWeight":"300","headerfontStyle":"normal","headerfontFamily":"Abril Fatface","headerfontColor":"#717091"},"normalFont":{"normalfontWeight":"300","normalfontStyle":"normal","normalfontFamily":"Abril Fatface","normalfontColor":"#a1a3ce"},"siteBanner":{"sitebannerColor":"#f1f6f9"},"site_title":{"site_title":""},"siteLogo":{"logo_image_id":"11","logo_image_url":"uploads\/user_50\/images\/3e80a253.png"},"footer":{"footerBgColor":"#4169e1","footerfontColor":"#ffffff","sociallinkfontColor":"#4169e1","sociallinkBgColor":"#ffffff","copyright_text":"\u00a9 Copyright 2021. All rights reserved"},"readmoreButton":{"button_text":"Read More","buttonfontColor":"#1469e1"}}'); //,"buttonBgColor":"#4169e1"

			if(isset($_POST['data']['image_id'])){

				$SiteLogo = array(
					'logo_image_id'   => $_POST['data']['image_id'],
					'logo_image_url'   => $_POST['data']['image_url']
				);
			}else{
				$SiteLogo = array();
			}
			
			$design = array(
				'headerFont' 		=> $designData->headerFont,
				'normalFont' 		=> $designData->normalFont,
				'siteBanner' 		=> $designData->siteBanner,
				'site_title' 		=> $designData->site_title,
				'siteLogo' 	 		=> $SiteLogo,
				'footer' 			=> $designData->footer,
				'readmoreButton' 	=> $designData->readmoreButton
			);
			$designs = json_encode($design);

			$Data = array(
				'user_id' 		=> $userID,
				'site_name' 	=> $_POST['data']['site_name'],
				'category_id' 	=> $_POST['data']['category_id'],
				'custom_domain' => $_POST['data']['domain_name'],
				'sub_domain' 	=> $_POST['data']['sub_domain_name'],
				'designs' 		=> $designs,
				'banners' 		=> json_encode(array(
					'topBanner' => array(
						'logo_image_id' => $imagesrt[1]['m_id'],
						'logo_image_url' => $imagesrt[1]['url'],
						'top_banner_link' => base_url()
					),
					'bottomBanner' => array(
						'logo_image_id' => $imagesrt[2]['m_id'],
						'logo_image_url' => $imagesrt[2]['url'],
						'bottom_banner_link' => base_url()
					),
					'sideBanner' => array(
						'logo_image_id' => $imagesrt[3]['m_id'],
						'logo_image_url' => $imagesrt[3]['url'],
						'sidebar_banner_link' => base_url()
					)
				)),
				'header' 		=> json_encode(array(
					'heading' => 'here is banner heading text',
					'subheading' => 'here is banner sub heading text',
					'textcolor' => '#717091',
					'subtextcolor' => '#717091',
					'headingtextfontfamily' => 'Abril Fatface',
					'subtextfontfamily' => 'Abril Fatface',
					'image_id' => $imagesrt[0]['m_id'],
					'image_url' => $imagesrt[0]['url']
				)),
				'social_links' 	=> '',
				'autoresponder' => '{"autoresponder_name":"'.$autoresponder_name.'","mailing_list_id":"'.$mailing_list_id.'","mailing_list_name":"'.$_POST['mailing_list_name'].'","sliding_checkbox":"","sliding_image_id":"","sliding_image_url":"","sliding_headline_text":"","sliding_sub_headline_text":"","sliding_button_text":"","sliding_button_text_color":"","sliding_button_color":"","sliding_thankyou_message":"","sliding_btn_redirect_link":"","sidebar_checkbox":"1","sidebar_image_id":"","sidebar_image_url":"","sidebar_headline_text":"Sidebar Heading","sidebar_sub_headline_text":"Sidebar Subheading","sidebar_button_text":"Subscribe","sidebar_button_text_color":"#ffffff","sidebar_button_color":"#1469e1","sidebar_thankyou_message":"Thank You","sidebar_btn_redirect_link":"","header_checkbox":"","header_image_id":"","header_image_url":"","header_headline_text":"Header Heading","header_sub_headline_text":"Header Subheading","header_button_text":"Subscribe Now","header_button_text_color":"#ffffff","header_button_color":"#1469e1","header_thankyou_message":"Thank You","header_btn_redirect_link":""}',
				'isCreated' 	=> $date,
				'isUpdated' 	=> $date,
				'status' 		=> 1
			);

			$site_insert_id = $this->Common_DML->put_data( TBL_SITES, $Data );

			$analytics_data = array(
				's_id' 				=> $site_insert_id,
				'page_view' 		=> 0,
				'unique_page_view' 	=> 0,
				'isCreated' 		=> $date,
				'isUpdated' 		=> $date,
				'status' 			=> 1
				
			);
			$analytics = $this->Common_DML->put_data( TBL_ANALYTICS, $analytics_data );

			for ($i=0; $i<count($articles) ; $i++) { 
				$product_data = array(
					's_id' 					=> $site_insert_id,
					'n_id' 					=> $_POST['n_id'],
					'product_name' 			=> $_POST['data']['product_name'],
					'product_url' 			=> $_POST['data']['product_url'],	
					'article_id' 			=> $articles[$i]['article_id'],
					'article_name' 			=> $articles[$i]['article_name'],
					'article_content' 		=> $articles[$i]['article_content'],
					'article_image_url' 	=> $articles[$i]['article_image_url'],
					'article_image_id' 		=> $articles[$i]['article_image_id'],
					'button_text' 			=> 'Get Access Now',
					'button_text_family'	=> 'Abril Fatface',
					'button_text_color' 	=> '#fffff',
					'button_color' 			=> '#4169e1',
					'isCreated' 			=> $date,
					'isUpdated' 			=> $date,
					'status' 				=> 1
				);
				$insert_id = $this->Common_DML->put_data( TBL_SITES_ARTICLE, $product_data);
			}
		}else{

			$n_id = $_POST['n_id'];
			$nc_id = $_POST['nsc_id'];
			$np_id = $_POST['np_id'];
					
			$where = array( 'nc_id' => $nc_id ,'n_id' => $n_id ,'np_id' => $np_id );
			$product = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where);

			$where = array( 'wc_id' => $_POST['data']['category_id'] );
			$category_name = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where, '*' );
			
			$articles = get7article($category_name[0]['ezine_name']);
			$imagesrt = getSiteHeader($category_name[0]['ezine_name']);

			$where = array( 'key' => 'AffiliateID', 'user_id' => $userID );
			$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
			if(!empty($result)){

				$AffiliateID = json_decode( $result[0]['value'], true );
				
				if($n_id == 1){
					$product_url = str_replace('userid',$AffiliateID['ClickBank'], $product[0]['product_url']);
				}
				if($n_id == 2){
					$product_url = str_replace('userid',$AffiliateID['WarriorPlus'], $product[0]['product_url']);
				}
				if($n_id == 3){
					$product_url = str_replace('userid',$AffiliateID['DigiStore24'], $product[0]['product_url']);
				}
			}else{
				$product_url = $product[0]['product_url'];
			}

			$designData = json_decode('{"headerFont":{"headerfontWeight":"300","headerfontStyle":"normal","headerfontFamily":"Abril Fatface","headerfontColor":"#717091"},"normalFont":{"normalfontWeight":"300","normalfontStyle":"normal","normalfontFamily":"Abril Fatface","normalfontColor":"#a1a3ce"},"siteBanner":{"sitebannerColor":"#f1f6f9"},"site_title":{"site_title":""},"siteLogo":{"logo_image_id":"11","logo_image_url":"uploads\/user_50\/images\/3e80a253.png"},"footer":{"footerBgColor":"#4169e1","footerfontColor":"#ffffff","sociallinkfontColor":"#4169e1","sociallinkBgColor":"#ffffff","copyright_text":"\u00a9 Copyright 2021. All rights reserved"},"readmoreButton":{"button_text":"Read More","buttonfontColor":"#1469e1"}}'); //,"buttonBgColor":"#4169e1"

			if(isset($_POST['data']['image_id'])){
				$SiteLogo = array(
					'logo_image_id'   => $_POST['data']['image_id'],
					'logo_image_url'   => $_POST['data']['image_url']
				);
			}else{
				$SiteLogo = array();
			}

			$design = array(
				'headerFont' 		=> $designData->headerFont,
				'normalFont' 		=> $designData->normalFont,
				'siteBanner' 		=> $designData->siteBanner,
				'site_title' 		=> $designData->site_title,
				'siteLogo' 	 		=> $SiteLogo,
				'footer' 			=> $designData->footer,
				'readmoreButton' 	=> $designData->readmoreButton
			);
			$designs = json_encode($design);

			$Data = array(
				'user_id' 		=> $userID,
				'site_name' 	=> $_POST['data']['site_name'],
				'category_id' 	=> $_POST['data']['category_id'],
				'custom_domain' => $_POST['data']['domain_name'],
				'sub_domain' 	=> $_POST['data']['sub_domain_name'],
				'designs' 		=> $designs,
				'banners' 		=> json_encode(array(
					'topBanner' => array(
						'logo_image_id' => $imagesrt[1]['m_id'],
						'logo_image_url' => $imagesrt[1]['url'],
						'top_banner_link' => base_url()
					),
					'bottomBanner' => array(
						'logo_image_id' => $imagesrt[2]['m_id'],
						'logo_image_url' => $imagesrt[2]['url'],
						'bottom_banner_link' => base_url()
					),
					'sideBanner' => array(
						'logo_image_id' => $imagesrt[3]['m_id'],
						'logo_image_url' => $imagesrt[3]['url'],
						'sidebar_banner_link' => base_url()
					)
				)),
				'header' 		=> json_encode(array(
					'heading' => 'here is banner heading text',
					'subheading' => 'here is banner sub heading text',
					'textcolor' => '#717091',
					'image_id' => $imagesrt[0]['m_id'],
					'image_url' => $imagesrt[0]['url']
				)),
				'social_links' 	=> '',
				'autoresponder' => '{"autoresponder_name":"'.$autoresponder_name.'","mailing_list_id":"'.$mailing_list_id.'","mailing_list_name":"'.$_POST['mailing_list_name'].'","sliding_checkbox":"","sliding_image_id":"","sliding_image_url":"","sliding_headline_text":"","sliding_sub_headline_text":"","sliding_button_text":"","sliding_button_text_color":"","sliding_button_color":"","sliding_thankyou_message":"","sliding_btn_redirect_link":"","sidebar_checkbox":"1","sidebar_image_id":"","sidebar_image_url":"","sidebar_headline_text":"Sidebar Heading","sidebar_sub_headline_text":"Sidebar Subheading","sidebar_button_text":"Subscribe","sidebar_button_text_color":"#ffffff","sidebar_button_color":"#1469e1","sidebar_thankyou_message":"Thank You","sidebar_btn_redirect_link":"","header_checkbox":"1","header_image_id":"","header_image_url":"","header_headline_text":"Header Heading","header_sub_headline_text":"Header Subheading","header_button_text":"Subscribe Now","header_button_text_color":"#ffffff","header_button_color":"#1469e1","header_thankyou_message":"Thank You","header_btn_redirect_link":""}',
				'isCreated' 	=> $date,
				'isUpdated' 	=> $date,
				'status' 		=> 1
			);

			$site_insert_id = $this->Common_DML->put_data( TBL_SITES, $Data );

			$analytics_data = array(
				's_id' 				=> $site_insert_id,
				'page_view' 		=> 0,
				'unique_page_view' 	=> 0,
				'isCreated' 		=> $date,
				'isUpdated' 		=> $date,
				'status' 			=> 1
				
			);
			$analytics = $this->Common_DML->put_data( TBL_ANALYTICS, $analytics_data );


            $json_url_dfy = "http://pushbutton-vip.com/DFYSitesContents/";
            $json_dfy = file_get_contents($json_url_dfy);
            $data_dfy = json_decode($json_dfy,1);

            $categoryID = $_POST['data']['category_id'];
            $expected = array_values(array_filter($data_dfy, function ($var) use ($categoryID) {
                return ($var['category_id'] == $categoryID);
            }));


			for ($i=0; $i<count($expected) ; $i++) {
				$product_data = array(
					's_id' 					=> $site_insert_id,
					'n_id' 					=> $_POST['n_id'],
					'nc_id' 				=> $_POST['nc_id'],
					'np_id' 				=> $_POST['np_id'],
					'nsc_id' 				=> $_POST['nsc_id'],
					'product_name' 			=> $product[0]['name'],
					'product_description'	=> $product[0]['description'],
					'product_commission' 	=> $product[0]['commission'],
					'product_url' 			=> $product_url,	
					'article_id' 			=> $expected[$i]['article_id'],
					'article_name' 			=> $expected[$i]['article_name'],
					'article_content' 		=> $expected[$i]['article_content'],
					//					'article_image_url' 	=> $articles[$i]['article_image_url'],
					//					'article_image_id' 		=> $articles[$i]['article_image_id'],
					'button_text' 			=> 'Get Access Now',
					'button_text_family'	=> 'Abril Fatface',
					'button_text_color' 	=> '#fffff',
					'button_color' 			=> '#4169e1',
					'isCreated' 			=> $date,
					'isUpdated' 			=> $date,
					'status' 				=> 1
				);
				$insert_id = $this->Common_DML->put_data( TBL_SITES_ARTICLE, $product_data);
			}
		}	

		
		/*$data = array(
			's_id' => $site_insert_id,
			'user_id' => $userID,
			'page_name' => 'Pages',
			'content' => 'cool',
			'isCreated' => $date,
			'isUpdated' => $date,
			'status' => 1,
			'not_delete' => 0
		);
		$page_id = $this->Common_DML->put_data( TBL_PAGES, $data );*/
		
		$str = getPrivacyPolicyContent($_POST['data']['site_name'], !empty($_POST['data']['domain_name']) ? $_POST['data']['domain_name'] : $_POST['data']['sub_domain_name']);
		$data = array(
			's_id' => $site_insert_id,
			'user_id' => $userID,
			'page_name' => 'Privacy Policy',
			'content' => $str,
			'isCreated' => $date,
			'isUpdated' => $date,
			'status' => 1,
			'not_delete' => 1
		);
		$page_id = $this->Common_DML->put_data( TBL_PAGES, $data );

		$str = getTermsConditionsContent($_POST['data']['site_name'], !empty($_POST['data']['domain_name']) ? $_POST['data']['domain_name'] : $_POST['data']['sub_domain_name']);		
		$data = array(
			's_id' => $site_insert_id,
			'user_id' => $userID,
			'page_name' => 'Terms and Conditions',
			'content' => $str,
			'isCreated' => $date,
			'isUpdated' => $date,
			'status' => 1,
			'not_delete' => 1
		);
		$page_id = $this->Common_DML->put_data( TBL_PAGES, $data );
			
		$msg = 'We have created a site successfully.';
		echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => base_url('user/dashboard')) );
	}

	public function getScheduleSiteArticles(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$date = date('Y-m-d H:i:s');

			$where = array( 's_id' => $_POST['site_id'] , 'user_id' => $userID );
			$checkMailschedule = $this->Common_DML->get_data( AUTOMATION, $where, '*' );
			
			$where = array( 'key' => 'AutoresponderSettings', 'user_id' => $userID );
			$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
			$data = array();
			if(!empty($result)){
				$data = json_decode( $result[0]['value'], true );
			}		
			
			if(!empty($data) && !empty($checkMailschedule) ){
				$key = searchKey( $checkMailschedule[0]['autoresponder_name'], 'name', $data );
				$api = $data[$key]['value'];
				$listData = autoreponderGetList($api , $checkMailschedule[0]['autoresponder_name']);
				// echo json_encode( $listData );
				foreach ($listData['list'] as $key => $value) {
					if($checkMailschedule[0]['ar_list_id'] == $value['list_value'] ){
						$automailList['list_value'] = $value['list_value'];
						$automailList['list_name'] = $value['list_name'];
					}
				}
			}else{
				$automailList['list_value'] = 0;
				$automailList['list_name'] = 0;
			}
			
			if(!empty($checkMailschedule)){
				$emailData = json_decode($checkMailschedule[0]['email_data']);
			}else{
				$emailData = 0;
			}
			
			$where = array( 'user_id' => $userID, 's_id' => $_POST['site_id'], 'status' => 1  );
			$site = $this->Common_DML->get_data( TBL_SITES, $where, 'site_name');

			$schedule_articles = $this->Common_DML->get_data( TBL_SITE_SCHEDULE_ARTICLES, $where, 'ssa_id, article_title, article_content, DATE_FORMAT(schedule_date, \'%b %d, %Y\') schedule_date, DATE_FORMAT(schedule_time, \'%h:%i %p\') schedule_time, share_facebook, facebook_page_id, status');

			echo json_encode( array( 'status' => 1, 'msg' => '', 'schedule_articles' => $schedule_articles, 'site' => $site, 'checkMailschedule' => $checkMailschedule, 'emailData' => $emailData, 'automailList' => $automailList ) );
		}
		die();
	}

	public function getAdminArticles(){
		if(checkAuthentication()){
			$page = $_POST['page'];
			$category_id = $_POST['category_id'];
			$start = ($page - 1) * PAGINATIONNUMBER;
			$end = PAGINATIONNUMBER;
			// $where = array( 'category_id' => $category_id, 'status' => 1 );
			// $articles = $this->Common_DML->get_data( TBL_ARTICLES, $where, 'a_id, m_id, title, content', array($start, $end));
			$sql = "SELECT a_id, articles.m_id, title, content, media.m_id,  file FROM media INNER JOIN articles ON articles.m_id = media.m_id WHERE articles.m_id = media.m_id AND articles.category_id = ".$category_id." AND articles.status = 1 LIMIT ".$start.",".$end." ";
			$articles = $this->Common_DML->query( $sql );
			echo json_encode( array( 'status' => 1, 'msg' => '', 'articles' => $articles ) );
		}
		die();
	}

	public function getEzineArticles(){
		if(checkAuthentication()){
			$page = $_POST['page'];
			$start = ($page - 1) * PAGINATIONNUMBER;
			$end = PAGINATIONNUMBER;
			$category_name = urlencode($_POST['category_name']);

			// $pixabayAPIKEY = '20579593-4873d31d034f0a6adc36ba5b4';
			// $url = "https://pixabay.com/api/?key={$pixabayAPIKEY}&response_group=high_resolution&q={$category_name}&pretty=true&safesearch=true&page={$start}&per_page={$end}";
			// $images = file_get_contents_curl( $url );
			// $img = json_decode($images, true);

			$query = "https://api.ezinearticles.com/api.php?search=articles&page={$start}&limit={$end}&response_format=json&category={$category_name}&key=".EZINEAPIKEY;
			$articles = file_get_contents($query);
			echo json_encode( array( 'status' => 1, 'msg' => '', 'articles' => $articles ) );
		}
		die();
	}

	public function setScheduleArticle(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			if(!empty($_POST['schedule_article_id'])){
				$what = array(
					'article_title' => $_POST['title'],
					'article_content' => $_POST['content'],
					'schedule_date' => date('Y-m-d', strtotime($_POST['date'])),
					'schedule_time' => date('H:i:s', strtotime($_POST['time'])),
					'share_facebook' => isset($_POST['facebook']) ? $_POST['facebook'] : 0,
					'facebook_page_id' => isset($_POST['facebook_page_id']) ? $_POST['facebook_page_id'] : '',
					'isUpdated' => date('Y-m-d H:i:s'),
					'status' => 1
				);
				$this->Common_DML->set_data( TBL_SITE_SCHEDULE_ARTICLES, $what, array(
					'user_id' => $userID,
					'ssa_id' => $_POST['schedule_article_id']
				));
				echo json_encode( array( 'status' => 1, 'msg' => 'Your article scheduled is updated.' ) );
			}else{
				$sd = array(
					'user_id' => $userID,
					's_id' => $_POST['site_id'],
					'article_id' => $_POST['article_id'],
					'article_title' => $_POST['title'],
					'article_content' => $_POST['content'],
					'schedule_date' => date('Y-m-d', strtotime($_POST['date'])),
					'schedule_time' => date('H:i:s', strtotime($_POST['time'])),
					'share_facebook' => isset($_POST['facebook']) ? $_POST['facebook'] : 0,
					'facebook_page_id' => isset($_POST['facebook_page_id']) ? $_POST['facebook_page_id'] : '',
					'isCreated' => date('Y-m-d H:i:s'),
					'isUpdated' => date('Y-m-d H:i:s'),
					'status' => 1
				);
				$this->Common_DML->put_data( TBL_SITE_SCHEDULE_ARTICLES, $sd);
				echo json_encode( array( 'status' => 1, 'msg' => 'Your article is scheduled.' ) );
			}
		}
		die();
	}

	public function deleteScheduleArticle(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$schedule_article_id = $_POST['schedule_article_id'];
			$this->Common_DML->delete_data( TBL_SITE_SCHEDULE_ARTICLES, array( 'ssa_id' => $schedule_article_id, 'user_id' => $userID ) );
			echo json_encode( array( 'status' => 1, 'msg' => 'Your scheduled article is deleted.' ) );
		}
		die();
	}

	public function goAutoresponderPageToconnection(){
		if(checkAuthentication()){
			$site_id = $_POST['site_id'];
			$this->session->set_userdata( 'autoresponder_site_redirect__', base_url('user/site-autoresponder/'.$site_id) );
			echo json_encode( array( 'status' => 1, 'url' => base_url('user/integrations') ) );
		}
	}

	public function analytics_page(){
		$data = array();
		$userID = $this->session->userdata( 'user_id' );
		$s_id = $_POST['s_id'];
		$page = $_POST['page'];
	
		$pagination['PAGINATIONNUMBER'] = PAGINATIONNUMBER;
		$pagination['currentPage'] = $page;
		$pagination['start'] = ($page - 1) * PAGINATIONNUMBER;
		$pagination['end'] = PAGINATIONNUMBER;
		
		$sql = "SELECT s.*, a.*, COUNT(l.s_id) AS num_leads FROM sites s LEFT JOIN analytics a ON (a.s_id = s.s_id) LEFT JOIN leads_generation l ON l.s_id = s.s_id WHERE s.status = 1 AND s.s_id = $s_id AND s.user_id = $userID GROUP BY s.s_id ORDER BY s.s_id DESC";
		$siteData = $this->Common_DML->query( $sql );

		$where = array( 'status' => 1, 's_id' =>$s_id, 'user_id' => $userID);
		$total_subs = $this->Common_DML->get_data( TBL_LEAD_GENERATION, $where, 'count(lg_id) total');
		// $subsData = $this->Common_DML->get_data( TBL_LEAD_GENERATION, $where);
		
		$where = array( 'status' => 1, 's_id' =>$s_id, 'user_id' => $userID);
		$limit = array( $pagination['start'] , $pagination['end']);
		$order = array( 's_id' , 'desc');
		$subsData = $this->Common_DML->get_data( TBL_LEAD_GENERATION, $where ,'lg_id, s_id, user_id, name, email,DATE_FORMAT(isCreated, \'%b %d, %Y\') isCreated, DATE_FORMAT(isUpdated, \'%b %d, %Y\') isUpdated, status', $limit, $order);
		$count_subs = count($subsData);

		$data = array(
			'siteData' => $siteData[0],
			'total_subs' => $total_subs[0],
			'subsData' => $subsData,
			'count_subs' => $count_subs
		);

		echo json_encode( array( 'status' => 1, 'msg' => '', 'data' => $data, 'pagination' =>$pagination ) );
	}

	public function automation(){
		$userID = $this->session->userdata( 'user_id' );
		$site_id = $_POST['schedule_time']['s_id'];

		if(!empty($site_id) && !empty($userID) ){
			$where = array( 's_id' => $site_id , 'user_id' => $userID );
			$result = $this->Common_DML->get_data( AUTOMATION, $where, '*' );

			if(!empty($result) && count($result) == 1){
                echo json_encode( array( 'status'=>0, 'msg'=> 'Email is already used, Please use different email.','url' => '' ) );
                die();
            }else{
				$where = array( 'user_id' => $userID, 's_id' => $site_id );
				$site = $this->Common_DML->get_data( TBL_SITES, $where, 'site_name, category_id');
				$category = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, array('wc_id' => $site[0]['category_id']), 'ezine_name');
				$scheduleEmails = $this->Common_DML->get_data( TBL_SITE_SCHEDULE_EMAILS, array('wc_id' => $site[0]['category_id'], 'user_id' => 0, 's_id' => 0), 'subject,content');
				
				$email_data = json_encode($scheduleEmails);

				$sd = array(
					'user_id' => $userID,
					's_id' => $site_id,
					'autoresponder_name' => $_POST['autoresponder'],
					'ar_list_id' => $_POST['autoresponse'],
					'email_data' => $email_data,
					'schedule_interval' => $_POST['schedule_time']['time'],
					'isCreated' => date('Y-m-d H:i:s'),
					'isUpdated' => date('Y-m-d H:i:s'),
					'status' => 1
				);
				$this->Common_DML->put_data( AUTOMATION, $sd);
				echo json_encode( array( 'status' => 1, 'msg' => 'Your Email is scheduled.' ) );
			}

		}

		
	}

	public function test(){
		//echo $aid = urlencode( encrypt_id( 49 ) );

		$aid = urlencode( encrypt_id( 4 ) );

		$replaces = array(
			'{member_name}' => "sample",
			'{login_url}' => base_url(),
			'{member_email}' => "noifemey@thriivetank.com",
			'{member_password}' => "123456789",
			'{activate_link}' => base_url("authentication/activate_account/{$aid}"),
		);

			$htmldata = file_get_contents( ROOTPATH . 'pushbutton/email_template/freereg.txt' );		
			
			////////////////////////////////////////////
			//$savemobile =  $this->save_mobile($_POST['name'], $_POST['email'], $_POST['country_code'],$_POST['email']);
			///////////////////////////////////////////
	
			$mail = array(
				'to' => array(
					array('name' => "sample", 'email' => "noifemey@thriivetank.com") 
				),
				'subject' => 'Account details of Push Buttons',
				'from_email' => FROMMAIL,
				'from_name' => FROMNAME
			);
			simple_mail( "noifemey@thriivetank.com", 'Account details of Push Buttons', $htmldata, $replaces );
			
			echo json_encode( array( 'status' => 1, 'msg' => 'You have registered successfully.', 'url' => base_url() ) );
		
	}

	public function download_pixabay() {
		$userID = $this->session->userdata( 'user_id' );
		$imageUrl = $_POST['image_url'];
		$rootpath = $_SERVER['DOCUMENT_ROOT'];
		$name = random_generator();
		$name .= '.png';
		$path = 'uploads/user_'.$userID.'/images/'.$name;
		$data = file_get_contents( $imageUrl );
		
		$upload = file_put_contents( $path, $data);
		if($upload){
			$fileurl = 'uploads/user_'.$userID.'/images/'.$name;
			$original_name = basename($imageUrl);

			$resize = array();
			$resize['image_library'] = 'gd2';
			$resize['source_image'] = $path;
			$resize['create_thumb'] = TRUE;
			$resize['maintain_ratio'] = FALSE;
			$resize['width']     = 226;
			$resize['height']   = 140;
			$resize['new_image'] = $path;	

			$this->load->library('image_lib');
			$this->image_lib->clear();
			$this->image_lib->initialize($resize);
			if ( ! $this->image_lib->resize()){
				$result = array('status' => 0, 'msg' => $this->image_lib->display_errors());
			}

			$thumb_name = filename_withoutext( $name );	
			$thumb_url = 'uploads/user_'.$userID.'/images/' .$thumb_name . '_thumb.png';
			//$thumburl = base_url($thumb_url);
			$thumburl = $thumb_url;

			$idata = array(
				'user_id' => $userID,
				'name' => $original_name,
				'thumb' => $thumburl,
				'file' => $fileurl,
				'datetime' => date('Y-m-d h:i:s'),
				'status' => 1
			);

			$m_id = $this->Common_DML->put_data( TBL_MEDIA, $idata );
			$article_images[] = array(
				'm_id' => $m_id,
				'url' => $fileurl
			);

			$resHtm = '<div class="rcs_col rcs_col4">
			<div class="rcs_image_lib_box">
				<div class="rcs_select_image">
					<img src="'.base_url($thumb_url).'" alt="">
					<div class="rcs_image_lib_button" data-file="'.$fileurl.'" data-image_id="'.$m_id.'">
						<a href="javascript:;" class="rcs_use_image">use</a>
						<a href="'.base_url($fileurl).'" target="_blank" class="rcs_view_image rcs_img_view">view</a>
						<a href="javascript:;" class="rcs_delete_image">delete</a>
					</div>
				</div>
				<p>'.$original_name.'</p>
			</div>
		</div>';

			echo json_encode( array( 'status' => 1, 'msg' => 'Success', 'resHtm' => $resHtm ) );
		}else {
			echo json_encode( array( 'status' => 0, 'msg' => 'Something went wrong.', ) );
		}
	}

	public function createDomainForSite(){
		if(checkAuthentication()){
			$sub_domain = createSubdomain( $_POST['sub_domain_name'] );
			if(!$sub_domain['status']){
				echo json_encode( $sub_domain );
				die();
			} 
			if(!empty($_POST['domain_name'])){
				$custom_domain = createAddonDomain( $_POST['domain_name'], $_POST['sub_domain_name'] );
				if(!$custom_domain['status']){
					echo json_encode( $custom_domain );
					die();
				}
			}
			echo json_encode( array( 'status' => 1, 'msg' => '' ) );
		}else {
			echo json_encode( array( 'status' => 0, 'msg' => 'Something went wrong.', ) );
		}
	}


	public function add_mobile(){

		$id = $_POST['user_id'];
		$name = $_POST['user_name'];
		$email = $_POST['user_email'];
		$country_code = $_POST['country_code'];
		$mobile_number = $_POST['mobile_number'];

		$where = array( 'user_id' => $id );
		$updateData = array( 'contactNumber' => $country_code . " " . $mobile_number );
		$this->Common_DML->set_data( TBL_USERS, $updateData, $where );
	
		////////////////////////////////////////////
		$savemobile =  $this->save_mobile($name, $email, $country_code ,$mobile_number);
		///////////////////////////////////////////

		return true;
	}

	public function test_create(){
		$subDomainName = "healthTest";
		$check_domain = "pushbutton-vip.com";
		$cpaneluser = CPANEL_USERNAME;
		$cpanelpass = CPANEL_PASSWORD;
		
		$dataArray = ['domain' => $subDomainName, 'rootdomain' => $check_domain, 'dir' => "/pushbutton-vip.com/customer",'disallowdot' => 0];
		$data = http_build_query($dataArray);
		$getUrl = "https://premium203.web-hosting.com:2083/cpsess3811617208/execute/SubDomain/addsubdomain";
		$getUrl .= '?' . $data;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET' );
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_URL, $getUrl);
		//curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 3000);
		curl_setopt($ch, CURLOPT_USERPWD, $cpaneluser . ":" . $cpanelpass);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		
		$return = curl_exec($ch);
		var_dump($return);

		if (curl_errno($ch)) {
			$error_msg = curl_error($ch);
			die($error_msg);
		}
		curl_close($ch);

		$response = json_decode($return);
		print_r("<br><br>");

		print_r($response);

		print_r("<br><br>");

		if($response->status == 1){
			$msg = 'Your domain added successfully.';    
			$s = 1;
		}else{
			$s = 0;
			$msg  =  $response->errors;
		}

		return array(
			'status' => $s,
			'msg' => $msg
		);

	}
}
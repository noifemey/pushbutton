<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
    function __construct() {
		parent::__construct();
		/*if(!( $this->session->userdata( 'login' ) && ($this->session->userdata( 'login_type' ) === 'user'))){
			redirect( 'authentication', 'refresh' );
		}*/
		if(!( $this->session->userdata( 'login' ) )){
			redirect( 'authentication', 'refresh' );
			exit();
		}
		$this->load->helper('jwt_helper');
	}
	
	public function index(){
		echo 'We are here';
	}
    
    public function upload(){
		if(checkAuthentication()){
			$filename = $_FILES['mediaFile']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$ext = empty($ext) ? 'jpg' : $ext;
			$name = random_generator();
			$name .= '.'.$ext;
			$userID = $this->session->userdata( 'user_id' );
			$rootpath = ROOTPATH;
			if(!$userID) return false;
			$path = ROOTPATH . 'uploads/user_'.$userID.'/images/';
			$config['upload_path']  	= $path;
			$config['file_name']  	= $name;
			$config['allowed_types']  = $_POST['allowType'];
			$config['max_size']       = 1024*10;
			
			$this->load->library('upload', $config);
			$this->load->library('image_lib');
			$this->upload->initialize($config);

			$s3key = $drivekey = $dropboxkey = array();
			$fileurl = $thumburl = $original_name = '';
			
			if ( ! $this->upload->do_upload('mediaFile')){
				$result = array('status' => 0, 'msg' => $this->upload->display_errors());
			}else{

				if($_POST['server'] == 'profile'){
					$file = $rootpath . 'uploads/user_'.$userID.'/images/' . $name;
					$profilefile = $rootpath . 'uploads/user_'.$userID.'/profile.jpg';
					rename($file, $profilefile);
					$profilefileimg = base_url( 'uploads/user_'.$userID.'/profile.jpg' );
					echo json_encode( array( 'status' => 1, 'msg' => 'Profile Image uploaded successfully.', 'file_id' => 0, 'url' => $profilefileimg ) );
					die();
				}

				$original_name = filename_withoutext( $filename );
				$file = 'uploads/user_'.$userID.'/images/' . $name;
				if(strstr($_FILES['mediaFile']['type'], '/', true) == 'image'){
					$resize = array();
					$resize['image_library'] = 'gd2';
					$resize['source_image'] = $path.'/'.$name;
					$resize['create_thumb'] = TRUE;
					$resize['maintain_ratio'] = FALSE;
					$resize['width']     = 226;
					$resize['height']   = 140;
					$resize['new_image'] = $path.'/'.$name;	

					$this->image_lib->clear();
					$this->image_lib->initialize($resize);
					if ( ! $this->image_lib->resize()){
						$result = array('status' => 0, 'msg' => $this->image_lib->display_errors());
					}

					$thumb_name = filename_withoutext( $name );							
					$thumb_url = 'uploads/user_'.$userID.'/images/' .$thumb_name . '_thumb.' . $ext;
					//$thumburl = base_url($thumb_url);
					$thumburl = $thumb_url;
				}
				//$fileurl = base_url($file);
				$fileurl = $file;
			}
			if(isset($result)){
				echo json_encode( $result );
				die();
			}

			$idata = array(
				'user_id' => $userID,
				'name' => $original_name,
				'thumb' => $thumburl,
				'file' => $fileurl,
				'datetime' => date('Y-m-d H:i:s'),
				'status' => 1
			);

			$m_id = $this->Common_DML->put_data( TBL_MEDIA, $idata );

			echo json_encode( array( 'status' => 1, 'msg' => 'File uploaded successfully.', 'file_id' => $m_id, 'url' => $fileurl, 'thumb' => $thumburl, 'name' => $original_name ) );
			die();
		}
	}

	public function delete(){
		if(checkAuthentication()){
			$m_id = $_POST['file_id'];
			$userID = $this->session->userdata( 'user_id' );
			$where = array( 'm_id' => $m_id, 'user_id' => $userID );
			$media = $this->Common_DML->get_data( TBL_MEDIA, $where, 'thumb, file' );
			if(!empty($media)){
				//$thumb = str_replace( base_url(), ROOTPATH, $media[0]['thumb'] );
				//$file = str_replace( base_url(), ROOTPATH, $media[0]['file'] );
				if( !empty($thumb) ) unlink( ROOTPATH . $media[0]['thumb'] );
				unlink( ROOTPATH . $media[0]['file'] );
				$this->Common_DML->delete_data( TBL_MEDIA, $where );
				echo json_encode( array( 'status' => 1, 'msg' => 'File is deleted successfully.' ) );
			}else{
				echo json_encode( array( 'status' => 0, 'msg' => 'File is not deleted.' ) );
			}
			die();
		}
	}

	public function uploadImageURL(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$rootpath = $_SERVER['DOCUMENT_ROOT'];
			$name = random_generator();
			$name .= '.png';
			$path = 'uploads/user_'.$userID.'/images/'.$name;
			$data = file_get_contents( $_POST['imageurl'] );
			$upload = file_put_contents( ROOTPATH . $path, $data);
			if($upload){
				$fileurl = base_url( $path );
				$original_name = basename($_POST['imageurl']);
				$idata = array(
					'user_id' => $userID,
					'name' => $original_name,
					'thumb' => '',
					'file' => $fileurl,
					'datetime' => date('Y-m-d h:i:s'),
					'status' => 1
				);
	
				$m_id = $this->Common_DML->put_data( TBL_MEDIA, $idata );
				echo json_encode( array('status' => 1, 'data' => array( 'file_id' => $m_id, 'url' => $fileurl )) );
			}else{
				echo json_encode( array('status' => 0, 'msg' => 'File can not downloaded due to the server error' ) );
			}
		}
	}

	public function getImages(){
		if(checkAuthentication()){
			$userID = $this->session->userdata( 'user_id' );
			$where = array( 'user_id' => $userID, 'status' => 1 );
			$order = array( 'm_id' , 'desc');
			$media = $this->Common_DML->get_data( TBL_MEDIA, $where,'m_id, name, thumb, file','', $order );
			echo json_encode( array( 'status' => 1, 'msg' => '', 'data' => $media ) );
		}
		die();
	}
	
}
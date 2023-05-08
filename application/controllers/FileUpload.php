<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileUpload extends CI_Controller {
	
	function __construct() {
		parent::__construct();

		$this->load->helper('jwt_helper');
	}
	
	public function index(){
		echo 'We are here';
	}
	
	public function uploadVideo(){

		$filename = $_FILES['upload_source']['name'];
        $videoLocation = $_POST['data']['videoLocation'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$ext = empty($ext) ? 'mp4' : $ext;
		$name = random_generator();
		$name .= '.'.$ext;
		$userID = $this->session->userdata( 'user_id' );
		 
		if(!$userID) return false;
		$path = 'uploads/user_'.$userID.'/videos/';
		$config['upload_path'] = $path;
		$config['file_name'] = $name;
		$config['allowed_types'] = 'mp4';
		$config['max_size'] = '0';
		$config['max_filename'] = '255';
		$config['encrypt_name'] = FALSE;
		
		if(!is_dir($path)) chmod($path, 0777);
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		$fileurl = '';
		
		if (!$this->upload->do_upload('upload_source')){
			$result = array('status' => 0, 'msg' => $this->upload->display_errors());

			echo json_encode( array( 'status' => 0, 'msg' => $this->upload->display_errors(), 'url' => base_url('user/site_article/'.$s_id) ) );
		}else{
			$fileurl = $config['upload_path'] . $name;
			$data = ['upload_data' => $this->upload->data()];
			$file = $data['upload_data']['full_path'];
			chmod($zfile,0777);
		}
		
		$where = array('sa_id' => $_POST['sa_id']);
		
		$data = array(
			'article_video' => $fileurl,
            'video_position'    => $videoLocation,
		); 
		
		$query = $this->Common_DML->set_data( TBL_SITES_ARTICLE, $data, $where);
		
		if($query !== FALSE){
			echo json_encode( array( 'status' => 1, 'msg' => 'You have upload video to site article successfully.', 'url' => base_url('user/site_article/'.$s_id.$_POST['sa_id']) ) );
		}
	}
}
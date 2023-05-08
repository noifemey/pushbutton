<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $header;
		
	function __construct() {
		parent::__construct();
		$this->load->library("pagination");
		if(!( $this->session->userdata( 'login' ) && $this->session->userdata( 'role' ) == 2 )){
			redirect( 'authentication', 'refresh' );
			exit();
		}
		$header = array();
		$header['name'] = $this->session->userdata( 'name' );
		$header['short_nm'] = $this->session->userdata( 'short_nm' );
		$header['profile_img'] = $this->session->userdata( 'profile_img' );
		$this->header = $header;
	}
	
	public function index(){
		redirect( 'admin/user', 'refresh' );
    }

    public function users($page = 1){
        $data = array();
		$header = $this->header;
		$header['title'] = 'Users';
		$header['menu'] = 'admin_user';
		$data['name'] = $this->session->userdata( 'name' );
		$data['currentPage'] = $page;

		$start = ($page - 1) * PAGINATIONNUMBER;
		$end = PAGINATIONNUMBER;

		if(isset($_POST['search_user'])){
			$searchWhere = "parent_id = 0 && role = 1  && (name LIKE '%{$_POST['search_user']}%' || email LIKE '%{$_POST['search_user']}%')";
			$sql = "SELECT * FROM " . TBL_USERS . " WHERE " . $searchWhere . " ORDER BY user_id DESC LIMIT {$start},{$end}";
			$countSql = "SELECT count(user_id) as total FROM " . TBL_USERS . " WHERE " . $searchWhere;

			$data['userData'] = $this->Common_DML->query( $sql );
			$data['total_users'] = $this->Common_DML->query( $countSql );
			$data['search_user'] = 1;
		}else{
			$where = array( 'parent_id' => 0, 'role' => 1);
			$limit = array( $start , $end);
			$order = array( 'user_id' , 'desc');
			$data['userData'] = $this->Common_DML->get_data( TBL_USERS, $where ,'', $limit, $order);
			$data['total_users'] = $this->Common_DML->get_data( TBL_USERS, $where, 'count(user_id) total');
		}

		
		$data['rcsProducts'] = $this->Common_DML->get_data( TBL_RCS_PRODUCT );
		$footer['scripts'] = array('admin.js');
		
        $this->load->view('common/admin_header', $header);
		$this->load->view('admin/users', $data);
		$this->load->view('common/admin_footer', $footer);
	}

	public function articles($page = 1){
		$data = array();
		$header = $this->header;
		$header['title'] = 'Articles';
		$header['menu'] = 'articles';
		$data['name'] = $this->session->userdata( 'name' );
		$data['currentPage'] = $page;

		$start = ($page - 1) * PAGINATIONNUMBER;
		$end = PAGINATIONNUMBER;

		if(isset($_POST['search_articles'])){
			$searchWhere = "a.status = 1  && (a.title LIKE '%{$_POST['search_articles']}%' || a.content LIKE '%{$_POST['search_articles']}%')";
			$sql = "SELECT a.a_id,a.title,a.content,m.file,a.category_id FROM " . TBL_ARTICLES . " a LEFT JOIN ". TBL_MEDIA ." m ON a.m_id = m.m_id WHERE " . $searchWhere . " ORDER BY a.a_id DESC LIMIT {$start},{$end}";
			$countSql = "SELECT count(a_id) as total FROM " . TBL_ARTICLES . " a WHERE " . $searchWhere;

			$data['articles'] = $this->Common_DML->query( $sql );
			$data['total_article'] = $this->Common_DML->query( $countSql );
			$data['search_articles'] = 1;
		}else{
			$where = array( 'a.status' => 1);
			$limit = array( $start, $end) ;
			$order = array( 'a.a_id' , 'DESC' ) ;
			$data['articles'] = $this->Common_DML->get_multijoin_data( 
				TBL_ARTICLES .' a', 
				array( TBL_MEDIA . ' m' => 'a.m_id = m.m_id'),
				$where, 
				'a.a_id,a.title,a.content,m.file,a.category_id', 
				'LEFT',
				'',
				$order,
				$limit 
			);
			$where = array( 'status' => 1);
			$data['total_article'] = $this->Common_DML->get_data( TBL_ARTICLES, $where, 'count(a_id) total');
		}

		$where = array( 'status' => 1);
		$data['categories'] = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where);

		$footer['scripts'] = array('admin.js');

		$this->load->view('common/admin_header', $header);
		$this->load->view('admin/articles', $data);
		$this->load->view('common/admin_footer', $footer);
	}

	public function create_article(){
		$data = array();
		$header = $this->header;
		$header['menu'] = 'articles';
		if(!empty($this->uri->segment(3))){
			$header['title'] = 'Update Article';
			$data['name'] = $this->session->userdata( 'name' );

			$a_id = $this->uri->segment(3);
			$where = array('a_id'=>$a_id, 'status' => 1);
			$articles = $this->Common_DML->get_data( TBL_ARTICLES, $where);
			$data['articles'] = $articles;
			$image_url = "SELECT `media`.`file`, `articles`.`m_id` AS image_url FROM (`media`) LEFT OUTER JOIN `articles` ON `media`.`m_id` = `articles`.`m_id` WHERE `media`.`m_id` = ".$articles[0]['m_id']."";
			$data['image_url'] = $this->Common_DML->query( $image_url );
			$where = array( 'status' => 1);
			$data['categories'] = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where);
			$content = $articles[0]['content'];
			//$footer['customScriptAfter'][] = "setTimeout(()=>{window.editor.setData('$content')}, 1000);";
		}else{
			$header['title'] = 'Create Article';
			$data['name'] = $this->session->userdata( 'name' );
			$where = array( 'status' => 1);
			$data['categories'] = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where);
		}
		$footer['scripts'] = array('ckeditor/node_modules/ckeditor4/ckeditor.js','admin.js');
		$footer['customScriptBefore'][] = 'let imageSelectAction = \'\'';

		$this->load->view('common/admin_header', $header);
		$this->load->view('admin/create_article', $data);
		$this->load->view('common/admin_footer', $footer);
	}

	public function profile(){
		$userID = $this->session->userdata( 'user_id' );
		$header = $data = $footer = array();
		$header = $this->header;
		$header['title'] = 'Profile Settings';
		$header['menu'] = 'profile';

		$footer['scripts'] = array('plugin/magnific-popup-min.js');
		$footer['customScriptBefore'][] = 'let imageSelectAction = \'\'';

		$this->load->view('common/admin_header', $header);
		$this->load->view('profile', $data);
		$this->load->view('common/admin_footer', $footer);
	}

	public function logout(){
		$array_items = array( 'user_id', 'email', 'login', 'login_type' );
		$this->session->unset_userdata( $array_items );
		$this->session->sess_destroy();
		if(isset($_COOKIE['rcsAccessToken'])) delete_cookie('rcsAccessToken');
		redirect( 'authentication', 'refresh' );
	}

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $header;
		
	function __construct() {
		parent::__construct();
		if(!( $this->session->userdata( 'login' ) && $this->session->userdata( 'role' ) == 1 )){
			redirect( 'authentication', 'refresh' );
			exit();
		}
		$fmember = $this->Common_DML->get_data( TBL_USERS, array( 'email' => $this->session->userdata('email') ), 'access_level, user_id' );
		$this->session->unset_userdata('access_level');
		$this->session->set_userdata('access_level', json_decode($fmember[0]['access_level'], true));
		$header = array();
		$header['name'] = $this->session->userdata( 'name' );
		$header['short_nm'] = $this->session->userdata( 'short_nm' );
		$header['profile_img'] = $this->session->userdata( 'profile_img' );
		$this->header = $header;
	}
	
	public function index(){
		redirect( 'user/dashboard', 'refresh' );
	}
	
	public function logout(){
		$array_items = array( 'user_id', 'email', 'login', 'login_type' );
		$this->session->unset_userdata( $array_items );
		$this->session->sess_destroy();
		if(isset($_COOKIE['lrsAccessToken'])) delete_cookie('lrsAccessToken');
		redirect( 'authentication', 'refresh' );
	}
	
	public function welcome(){
		$data = array();
		$header = $this->header;
		$header['title'] = 'Welcome';
		$header['menu'] = 'welcome';
		$data['name'] = $this->session->userdata( 'name' );
		$userID = $this->session->userdata( 'user_id' );
			
		$this->load->view('common/header', $header);
		$this->load->view('user/welcome');
		$this->load->view('common/footer');
	}
	
	public function welcome_new(){
		$data = array();
		$header = $this->header;
		$header['title'] = 'Welcome';
		$header['menu'] = 'welcome';
		$data['name'] = $this->session->userdata( 'name' );
		$userID = $this->session->userdata( 'user_id' );
			
		$this->load->view('common/header', $header);
		$this->load->view('user/welcome-new');
		$this->load->view('common/footer');
	}

	public function dashboard($page = 1){
		
		$data = array();
		$header = $this->header;
		$header['title'] = 'dashboard';
		$header['menu'] = 'dashboard';
		$data['name'] = $this->session->userdata( 'name' ); 
		$userID = $this->session->userdata( 'user_id' );

		$data['currentPage'] = $page;
		$start = ($page - 1) * PAGINATIONNUMBER;
		$end = PAGINATIONNUMBER;	
				
		if(isset($_POST['search_site'])){
			
			$searchWhere = " sites.status = 1  && sites.user_id = $userID && (sites.site_name LIKE '%{$_POST['search_site']}%')";

			$sql = "SELECT sites.*, analytics.*, COUNT(leads_generation.s_id) AS num_leads FROM sites LEFT JOIN analytics ON (analytics.s_id = sites.s_id) LEFT JOIN leads_generation ON leads_generation.s_id = sites.s_id WHERE $searchWhere GROUP BY sites.s_id ORDER BY sites.s_id DESC LIMIT {$start},{$end}";
			$data['sites'] = $this->Common_DML->query( $sql );


			// $sql = "SELECT * FROM " . TBL_SITES . " WHERE " . $searchWhere . " ORDER BY s_id DESC LIMIT {$start},{$end}";
			$countSql = "SELECT count(user_id) as total FROM " . TBL_SITES . " WHERE " . $searchWhere;

			// SELECT * FROM sites LEFT JOIN analytics ON `analytics`.`s_id` = sites.s_id 
			
			$data['sites'] = $this->Common_DML->query( $sql );
			$data['total_sites'] = $this->Common_DML->query( $countSql );
		}else{
			$sql = "SELECT sites.*, analytics.*, COUNT(leads_generation.s_id) AS num_leads FROM sites LEFT JOIN analytics ON (analytics.s_id = sites.s_id) LEFT JOIN leads_generation ON leads_generation.s_id = sites.s_id WHERE sites.status = 1 AND sites.user_id = $userID GROUP BY sites.s_id ORDER BY sites.s_id DESC LIMIT {$start},{$end}";
			$data['sites'] = $this->Common_DML->query( $sql );
			
			$where = array( 'status' => 1, 'user_id' => $userID);
			$data['total_sites'] = $this->Common_DML->get_data( TBL_SITES, $where, 'count(s_id) total');
			$where = array( 'status' => 1);
			$data['categories'] = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where);
			
		}
 				
		$this->load->view('common/header', $header);
		$this->load->view('user/dashboard', $data);
		$this->load->view('common/footer');
	}
	
	public function chiBonus(){
		$data = array();
		$header = $this->header;
		$header['title'] = 'Click Home Income Bonus';
		$header['menu'] = 'chi_bonus';
		$data['name'] = $this->session->userdata( 'name' );
		$userID = $this->session->userdata( 'user_id' );
			
		$this->load->view('common/header', $header);
		$this->load->view('user/chi_bonus');
		$this->load->view('common/footer');
	}
	
	public function profile(){
		$userID = $this->session->userdata( 'user_id' );
		$header = $data = $footer = array();
		$header = $this->header;
		$header['title'] = 'Profile Settings';
		$header['menu'] = 'profile';
		
		$footer['scripts'] = array('plugin/magnific-popup-min.js');
		$footer['customScriptBefore'][] = 'let imageSelectAction = \'\'';

		$where = array('key' => 'AuthorGeneralSettings', 'user_id' => $userID);
		$us = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, '*' );

		if(!empty($us)){
			$data['settings'] = json_decode( $us[0]['value'], true );
		}

		$this->load->view('common/header', $header);
		$this->load->view('profile', $data);
		$this->load->view('common/footer', $footer);
	}
	
	public function integrations(){
		$userID = $this->session->userdata( 'user_id' );
		$data = array();
		$header = $this->header;
		$header['title'] = 'integration';
		$header['menu'] = 'integrations';
		$data['name'] = $this->session->userdata( 'name' );

		$fauth_url = base_url('/api/authFacebook?url='.base_url().'&user_id='.$userID);	

		$facebook_access_token = $this->session->userdata( 'FacebookAccessToken' );
		$facebook_users = $this->session->userdata( 'FacebookUserInfo' );

		if(empty($facebook_access_token)){
			$data['facebook_auth_url'] = $fauth_url;
		}else{
			$data['facebook_auth_url'] = '';
		}
		$data['facebook_users'] = $facebook_users;
		$data['facebook_other_auth'] = $fauth_url;

		$where = array( 'key' => 'AutoresponderSettings', 'user_id' => $userID );
		$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
		$data['list'] = array(
			'Aweber',	
			'GetResponse',	
			'Mailchimp',	
		);
		$data['selected'] = array();
		if(!empty($result)){
			$r = json_decode( $result[0]['value'], true );
			$data['selected'] = array_column($r, 'name');
		}	
		
		$where = array( 'key' => 'AffiliateID', 'user_id' => $userID );
		$result = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value' );
		if(!empty($result)){
			$r = json_decode( $result[0]['value'], true );
			$data['affiliate'] = $r;
		}

		$this->load->view('common/header', $header);
		$this->load->view('user/integration', $data);
		$this->load->view('common/footer');
	}
	
	public function create_site(){
		$userID = $this->session->userdata( 'user_id' );
		$where = array( 'status' => 1, 'user_id' => $userID);
		$total_sites = $this->Common_DML->get_data( TBL_SITES, $where, 'count(s_id) total');
		if( $this->uri->segment(3) == ''){
			if(in_array(2, $this->session->userdata( 'access_level' )) || (in_array(1, $this->session->userdata( 'access_level' )) && $total_sites[0]['total'] < 1)){
			}else{
				redirect('user/dashboard');
				die();
			}
		}
		$data = array();
		$header = $this->header;
		$header['title'] = 'dashboard';
		$header['menu'] = 'dashboard';
		$data['name'] = $this->session->userdata( 'name' );

		if( $this->uri->segment(3) != ''){
			$s_id = $this->uri->segment(3);
			$where = array('s_id' => $s_id,  'user_id' => $userID, 'status' => 1);
			$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			if(empty($site_data)){
				redirect( 'user/dashboard' );
				exit();
			}
		}	
		
		$s_id = $this->uri->segment(3);
		
		if(!empty($s_id)){
			$where = array('s_id' => $s_id, 'status' => 1);
			$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			$data['site_data'] = $site_data; 
		}
		$where = array( 'status' => 1);
		$data['categories'] = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where);

		$footer['customScriptBefore'][] = 'let sitePreviewData = {
			siteCreate: {
				site_name: { text: "'.(isset($site_data[0]['site_name']) ? $site_data[0]['site_name'] : "Site Name").'",}
			}
		};';
		$footer['customScriptAfter'][] = 'sitePreview("siteCreate");';

		$this->load->view('common/header', $header);
		$this->load->view('user/site/create', $data);
		$this->load->view('common/footer', $footer);
	}
	public function site_header(){
		$userID = $this->session->userdata( 'user_id' );
	    if($this->uri->segment(3) == ''){
			redirect( 'user/dashboard' );
			exit();
		}
		if( $this->uri->segment(3) != ''){
			$s_id = $this->uri->segment(3);
			$where = array('s_id' => $s_id,  'user_id' => $userID, 'status' => 1);
    		$site_data = $this->Common_DML->get_data( TBL_SITES, $where, 'header');
			if(empty($site_data)){
				redirect( 'user/dashboard' );
				exit();
			}
		}
		
		$header = $this->header;
		$header['title'] = 'dashboard';
		$header['menu'] = 'dashboard';
		$header['font_family'] = 'font_family';
		$data['name'] = $this->session->userdata( 'name' );
		$siteheader = json_decode($site_data[0]['header'], true);
		$data['siteheader'] = $siteheader;
		$s_id = $this->uri->segment(3);

		
	    $footer['scripts'] = array('plugin/color-picker.min.js');
	    $footer['customScriptBefore'][] = 'let imageSelectAction = \'\'; let site_id = '.$s_id.';let preview = false;';
		$footer['customScriptBefore'][] = 'let sitePreviewData = {
			siteHeader: {
				banner_heading: {
					text: "'.(isset($siteheader['heading']) ? $siteheader['heading'] : "We care for your health & fitness").'",
					colorp: "'.(isset($siteheader['textcolor']) ? $siteheader['textcolor'] : "#717091").'",
					font: "'.(isset($siteheader['headingtextfontfamily']) ? $siteheader['headingtextfontfamily'] : "Abril Fatface").'"
				},
				banner_sub_heading: {
					text: "'.(isset($siteheader['subheading']) ? $siteheader['subheading'] : "We Provide Best Health & Fitness Tips").'",
					colorp: "'.(isset($siteheader['subtextcolor']) ? $siteheader['subtextcolor'] : "#717091").'",
					font: "'.(isset($siteheader['subtextfontfamily']) ? $siteheader['subtextfontfamily'] : "Abril Fatface").'"
				},
				background_image: "'.(isset($siteheader['image_url']) ? base_url($siteheader['image_url']) : 'https://pushbutton-vip.com/uploads/user_70/images/d9647e14.jpg').'"
			}
		};';
		$footer['customScriptAfter'][] = 'sitePreview("siteHeader");';
	    
		$this->load->view('common/header', $header);
		$this->load->view('user/site/site_header', $data);
		$this->load->view('common/footer',$footer);
	}
	
	public function site_design(){
		$userID = $this->session->userdata( 'user_id' );
	    if($this->uri->segment(3) == ''){
			redirect( 'user/dashboard' );
			exit();
		}
		if( $this->uri->segment(3) != ''){
			$s_id = $this->uri->segment(3);
			$where = array('s_id' => $s_id,  'user_id' => $userID, 'status' => 1);
    		$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			if(empty($site_data)){
				redirect( 'user/dashboard' );
				exit();
			}else{

				$data = array();
				$header = $this->header;
				$header['title'] = 'dashboard';
				$header['menu'] = 'dashboard';
				$header['font_family'] = 'font_family';
				$data['name'] = $this->session->userdata( 'name' );
				
				$s_id = $this->uri->segment(3);
				
				/*if(!empty($s_id)){
					$where = array('s_id' => $s_id, 'status' => 1);
					$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
				}*/
				$design_Data = json_decode($site_data[0]['designs'],true);
				$data['design_Data'] = $design_Data;
				$siteheader = json_decode($site_data[0]['header'], true);
				$data['siteheader'] = $siteheader;

				
				
				$footer['scripts'] = array('plugin/magnific-popup-min.js', 'plugin/color-picker.min.js');
				$footer['customScriptBefore'][] = 'let imageSelectAction = \'\';';
				$footer['customScriptBefore'][] = 'let sitePreviewData = {
					siteDesign: {
						copy_right: {
							text: "'.(isset($design_Data['footer']['copyright_text']) ? $design_Data['footer']['copyright_text'] : "Copyright 2021. All rights reserved.").'",
							colorp: "'.(isset($design_Data['footer']['footerfontColor']) ? $design_Data['footer']['footerfontColor'] : "#ffffff").'"
						},
						logo:  "'.(isset($design_Data['siteLogo']['logo_image_url']) ? base_url($design_Data['siteLogo']['logo_image_url']) : "").'",
						site_name: "'.(isset($site_data[0]['site_name']) ? $site_data[0]['site_name'] : "Site Name").'",
						body_bg_image:  "'.(isset($design_Data['siteBanner']['bg_image_url']) ? base_url($design_Data['siteBanner']['bg_image_url']) : "").'",

						body_bg_color: {
							colorp : "'.(isset($design_Data['siteBanner']['sitebannerColor']) ? $design_Data['siteBanner']['sitebannerColor'] : "#f1f6f9").'"
						},

						readmoreButton: {
							text: "'.(isset($design_Data['readmoreButton']['button_text']) ? $design_Data['readmoreButton']['button_text'] : "Read More").'",
							colorp: "'.(isset($design_Data['readmoreButton']['buttonfontColor']) ? $design_Data['readmoreButton']['buttonfontColor'] : "#ffffff").'"
						},
						
						
						footer_image_url:  "'.(!empty($design_Data['footer']['footer_image_url']) ? base_url($design_Data['footer']['footer_image_url']) : "").'",

						footerBgColor: {
							colorp : "'.(isset($design_Data['footer']['footerBgColor']) ? $design_Data['footer']['footerBgColor'] : "#f1f6f9").'"
						},
					
						header_font: {
							weight: "'.(isset($design_Data['headerFont']['headerfontWeight']) ? $design_Data['headerFont']['headerfontWeight'] : "300").'",
							style: "'.(isset($design_Data['headerFont']['headerfontStyle']) ? $design_Data['headerFont']['headerfontStyle'] : "normal").'",
							font: "'.(isset($design_Data['headerFont']['headerfontFamily']) ? $design_Data['headerFont']['headerfontFamily'] : "Abril Fatface").'",
							colorp: "'.(isset($design_Data['headerFont']['headerfontColor']) ? $design_Data['headerFont']['headerfontColor'] : "#ffffff").'"
						},
						
						normal_header_font: {
							weight: "'.(isset($design_Data['normalFont']['normalfontWeight']) ? $design_Data['normalFont']['normalfontWeight'] : "300").'",
							style: "'.(isset($design_Data['normalFont']['normalfontStyle']) ? $design_Data['normalFont']['normalfontStyle'] : "normal").'",
							font: "'.(isset($design_Data['normalFont']['normalfontFamily']) ? $design_Data['normalFont']['normalfontFamily'] : "Abril Fatface").'",
							colorp: "'.(isset($design_Data['normalFont']['normalfontColor']) ? $design_Data['normalFont']['normalfontColor'] : "#ffffff").'"
						},
						
						social_link_font_Color: { 
							colorp : "'.(isset($design_Data['footer']['sociallinkfontColor']) ? $design_Data['footer']['sociallinkfontColor'] : "#ffffff").'"
						},

						social_link_Bg_Color: { 
							colorp : "'.(isset($design_Data['footer']['sociallinkBgColor']) ? $design_Data['footer']['sociallinkBgColor'] : "#4169e1").'"
						},
						
					},
					siteHeader: {
						banner_heading: {
							text: "'.(isset($siteheader['heading']) ? $siteheader['heading'] : "We care for your health & fitness").'",
							colorp: "'.(isset($siteheader['textcolor']) ? $siteheader['textcolor'] : "#717091").'",
							font: "'.(isset($siteheader['headingtextfontfamily']) ? $siteheader['headingtextfontfamily'] : "Abril Fatface").'"
						},
						banner_sub_heading: {
							text: "'.(isset($siteheader['subheading']) ? $siteheader['subheading'] : "We Provide Best Health & Fitness Tips").'",
							colorp: "'.(isset($siteheader['subtextcolor']) ? $siteheader['subtextcolor'] : "#717091").'",
							font: "'.(isset($siteheader['subtextfontfamily']) ? $siteheader['subtextfontfamily'] : "Abril Fatface").'"
						},
						background_image: "'.(isset($siteheader['image_url']) ? base_url($siteheader['image_url']) : 'https://pushbutton-vip.com/uploads/user_70/images/d9647e14.jpg').'"
					}
				};';
				$footer['customScriptAfter'][] = 'sitePreview("siteDesign");';
				$footer['customScriptAfter'][] = 'sitePreview("siteHeader");';
				
			}

		}

		$this->load->view('common/header', $header);
		$this->load->view('user/site/design', $data);
		$this->load->view('common/footer',$footer);
	}
	
	public function site_article(){
		$userID = $this->session->userdata( 'user_id' );
	    if($this->uri->segment(3) == ''){
			redirect( 'user/dashboard' );
			exit();
		}	
		if( $this->uri->segment(3) != ''){
			$s_id = $this->uri->segment(3);
			$where = array('s_id' => $s_id,  'user_id' => $userID, 'status' => 1);
    		$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			if(empty($site_data)){
				redirect( 'user/dashboard' );
				exit();
			}
		}
		$page = $this->uri->segment(4);
		if(empty($page)) $page = 1;
	    $data = array();
		$header = $this->header;
		$header['title'] = 'dashboard';
		$header['menu'] = 'dashboard';
		$header['font_family'] = 'font_family';

		$data['name'] = $this->session->userdata( 'name' );
		$s_id = $this->uri->segment(3);

		$data['currentPage'] = $page;
		$start = ($page - 1) * PAGINATIONNUMBER;
		$end = PAGINATIONNUMBER;

		if(isset($_POST['search_article'])){

			$searchWhere = "status = 1  && (article_name LIKE '%{$_POST['search_article']}%')";
			$sql = "SELECT * FROM " . TBL_SITES_ARTICLE . " WHERE " . $searchWhere . " ORDER BY sa_id DESC LIMIT {$start},{$end}";
			$countSql = "SELECT count(sa_id) as total FROM " . TBL_SITES_ARTICLE . " WHERE " . $searchWhere;

			$articles = $this->Common_DML->query( $sql );
			$data['articles'] = $articles;
			$data['total_article'] = $this->Common_DML->query( $countSql );

			if(isset($articles[0]['n_id'])){
				$where = array( 'status' => 1, 'n_id' => $articles[0]['n_id']);
				$data['network'] = $this->Common_DML->get_data( TBL_NETWORK, $where);
			}else{
				$data['network'] = array();
			}
				$where = array( 'status' => 1 );
				$data['categories'] = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where);

		}else{

			$where = array( 'status' => 1, 's_id' => $s_id );
			$limit = array( $start , $end);
			$order = array( 'sa_id' , 'desc');
			$articles = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where,'', $limit, $order);
			// $articles = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
			$data['articles'] = $articles;

			$data['total_article'] = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where, 'count(sa_id) total');			
			
			$where = array( 'status' => 1 );
			$data['network'] = $this->Common_DML->get_data( TBL_NETWORK, $where);
	
			$where = array( 'status' => 1 );
			$data['categories'] = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where);
		}
        $footer['scripts'] = array('ckeditor/node_modules/ckeditor4/ckeditor.js','admin.js', 'plugin/color-picker.min.js', 'automation.js?q='.time());
		$this->load->view('common/header', $header);
		$this->load->view('user/site/articles', $data);
		$this->load->view('common/footer', $footer);
	}
	
	public function create_article(){
		$userID = $this->session->userdata( 'user_id' );
		$where = array( 'status' => 1, 's_id' => $this->uri->segment(3) );
		$total_article = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where, 'count(sa_id) total');	
		if( $this->uri->segment(4) == ''){
			if((in_array(2, $this->session->userdata( 'access_level' )) && $total_article[0]['total'] < 7) || (in_array(1, $this->session->userdata( 'access_level' )) && $total_article[0]['total'] < 7)){
			}else{
				redirect('user/site-article/'.$this->uri->segment(3));
				die();
			}
		}
		if( $this->uri->segment(3) != ''){
			$s_id = $this->uri->segment(3);
			$where = array('s_id' => $s_id,  'user_id' => $userID, 'status' => 1);
    		$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			if(empty($site_data)){
				redirect( 'user/dashboard' );
				exit();
			}
		}

		$data = array();
		$header = $this->header;
		$header['title'] = 'dashboard';
		$header['menu'] = 'dashboard';
		$header['font_family'] = 'font_family';

		$s_id = $this->uri->segment(3);
		$sa_id = $this->uri->segment(4);
		//$data['products'] = [];


		if(!empty($this->uri->segment(4))){
			
			$where = array( 'status' => 1);
			$data['network'] = $this->Common_DML->get_data( TBL_NETWORK, $where);
			
			$where = array( 'status' => 1, 'sa_id' => $sa_id);
			$data['products'] = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
			$article_list = $data['products'][0];
							
			$where = array( 'status' => 1, 'n_id' => $article_list['n_id'], 'parent_id' => 0 );
			$data['categories'] = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where);
									
			$where = array( 'status' => 1,'n_id' => $article_list['n_id'], 'parent_id' => $article_list['nc_id'] );
			$data['subcategory'] = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where);
					
			$where = array( 'status' => 1, 'n_id' => $article_list['n_id'], 'nc_id' => $article_list['nsc_id']);
			$data['product_list'] = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where);
			
			$where = array( 'status' => 1, 'n_id' => $article_list['n_id'], 'np_id' => $article_list['np_id'] );
			$data['product_data'] = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where);

			if(!empty($data['product_data'])){
				$data['product_url'] = str_replace('userid',$data['product_data'][0]['n_id'],$data['product_data'][0]['product_url']);
			}

			$where = array('s_id' => $s_id, 'status' => 1, 'user_id' => $userID);
			$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			//print_r($site_data);
			$category_id = $site_data[0]['category_id'];
			
			$where = array( 'status' => 1 , 'category_id' => $site_data[0]['category_id']);
			$articles = $this->Common_DML->get_data( TBL_ARTICLES, $where);
			$data['articles'] = $articles;

			$category = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, array('wc_id' => $category_id), 'ezine_name');
			$ezine_name = $category[0]['ezine_name'];
			//print_r($articles);
			if(!empty($articles)){
				$image_url = "SELECT `media`.`file`, `articles`.`m_id` AS image_url FROM (`media`) LEFT OUTER JOIN `articles` ON `media`.`m_id` = ".$articles[0]['m_id']." WHERE `media`.`m_id` = ".$articles[0]['m_id']."";			
				$data['image_url'] = $this->Common_DML->query( $image_url );
			}


			
		}else{

			$where = array( 'status' => 1);
			$data['network'] = $this->Common_DML->get_data( TBL_NETWORK, $where);

			$where = array('s_id' => $s_id, 'status' => 1);
			$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			
			if(isset($site_data[0]['category_id'])){
				$where = array( 'status' => 1 , 'category_id' => $site_data[0]['category_id'] );
				$data['articles'] = $this->Common_DML->get_data( TBL_ARTICLES, $where);
				$category_id = $site_data[0]['category_id'];
				$category = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, array('wc_id' => $category_id), 'ezine_name');
				$ezine_name = $category[0]['ezine_name'];
			}else{
				$data['articles'] = array();
				$category_id = 0;
			}


		}
		$footer['scripts'] = array('ckeditor/node_modules/ckeditor4/ckeditor.js','admin.js', 'plugin/color-picker.min.js', 'automation.js?q='.time());
		$footer['customScriptBefore'][] = 'let imageSelectAction = \'\';';
		$footer['customScriptAfter'][] = "let amt = new Automation({site_id: {$s_id}, category_id: {$category_id}, ezine_cat_name: '{$ezine_name}',storeArticle:[],automation:false});";

		$this->load->view('common/header', $header);
		$this->load->view('user/site/create_article', $data);
		$this->load->view('common/footer', $footer);
	}
	
	public function site_pages(){
		$userID = $this->session->userdata( 'user_id' );
	    if($this->uri->segment(3) == ''){
			redirect( 'user/dashboard' );
			exit();
		}
		if( $this->uri->segment(3) != ''){
			$s_id = $this->uri->segment(3);
			$where = array('s_id' => $s_id,  'user_id' => $userID, 'status' => 1);
    		$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			if(empty($site_data)){
				redirect( 'user/dashboard' );
				exit();
			}
		}
		
		$header = $this->header;
		$header['title'] = 'dashboard';
		$header['menu'] = 'dashboard'; 
		$data['name'] = $this->session->userdata( 'name' );
		$s_id = $this->uri->segment(3);
		
		$url_sql = "SELECT * FROM sites WHERE s_id = $s_id LIMIT 1";
		$data['sites'] = $this->Common_DML->query($url_sql);

		if(isset($_POST['search_page'])){

			$searchWhere = "status = 1 && s_id = $s_id && (page_name LIKE '%{$_POST['search_page']}%' )";
			$sql = "SELECT * FROM " . TBL_PAGES . " WHERE " . $searchWhere . " ORDER BY p_id DESC ";
			$countSql = "SELECT count(p_id) as total FROM " . TBL_PAGES . " WHERE " . $searchWhere;
			$data['pages'] = $this->Common_DML->query( $sql );
			$data['total_page'] = $this->Common_DML->query( $countSql );
		
		}else{
			
			$where = array( 'status' => 1, 's_id' => $s_id);
			$order = array( 'p_id' , 'desc');
			$data['pages'] = $this->Common_DML->get_data( TBL_PAGES, $where ,'','', $order);
			$data['total_page'] = $this->Common_DML->get_data( TBL_PAGES, $where, 'count(p_id) total');
		}

		
	    $footer['scripts'] = array('ckeditor/node_modules/ckeditor4/ckeditor.js','admin.js');
	    $footer['customScriptBefore'][] = 'let imageSelectAction = \'\'';
	    
		$this->load->view('common/header', $header);
		$this->load->view('user/site/pages', $data);
		$this->load->view('common/footer',$footer);
	}
	
	public function site_banner(){
		$userID = $this->session->userdata( 'user_id' );
	    if($this->uri->segment(3) == ''){
			redirect( 'user/dashboard' );
			exit();
		}
		if( $this->uri->segment(3) != ''){
			$s_id = $this->uri->segment(3);
			$where = array('s_id' => $s_id,  'user_id' => $userID, 'status' => 1);
    		$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			if(empty($site_data)){
				redirect( 'user/dashboard' );
				exit();
			}
		}
	    $data = array();
		$header = $this->header;
		$header['title'] = 'dashboard';
		$header['menu'] = 'dashboard';
		$data['name'] = $this->session->userdata( 'name' );
		$s_id = $this->uri->segment(3);
		
		if(isset ($s_id)){
		    $where = array('s_id' => $s_id, 'status' => 1);
    		$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
    		
    		$data['banner_Data'] = json_decode($site_data[0]['banners']);
		}
	    
	    $footer['customScriptBefore'][] = 'let imageSelectAction = \'\'';
		
		$this->load->view('common/header', $header);
		$this->load->view('user/site/banner', $data);
		$this->load->view('common/footer',$footer);
	}
	public function site_autoresponder(){
		$userID = $this->session->userdata( 'user_id' );
		$this->session->unset_userdata( 'autoresponder_site_redirect__' );
	    if($this->uri->segment(3) == ''){
			redirect( 'user/dashboard' );
			exit();
		}
		if( $this->uri->segment(3) != ''){
			$s_id = $this->uri->segment(3);
			$where = array('s_id' => $s_id,  'user_id' => $userID, 'status' => 1);
    		$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
			if(empty($site_data)){
				redirect( 'user/dashboard' );
				exit();
			}
		}

	    $data = array();
		$header = $this->header;
		$header['title'] = 'dashboard';
		$header['menu'] = 'dashboard';
		$data['name'] = $this->session->userdata( 'name' );
		$s_id = $this->uri->segment(3);
		
		if(isset($s_id)){

		    $where = array('user_id' => $userID, 'key' => 'AutoresponderSettings');
    		$site_data = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where);

			if(!empty($site_data)){
				
				$autoresponder_data = json_decode($site_data[0]['value'], true);
				$data['autoresponder_data'] = $autoresponder_data;
	
				$where = array('s_id' => $s_id, 'status' => 1);
				$site_data = $this->Common_DML->get_data( TBL_SITES, $where);
				
				$data['autoresponder'] = json_decode($site_data[0]['autoresponder']);
				$data['social_links'] = json_decode($site_data[0]['social_links']);
				$data['social_share'] = json_decode($site_data[0]['social_share'], true);

			}

		}

		$footer['scripts'] = array('plugin/magnific-popup-min.js', 'plugin/color-picker.min.js');
		$footer['customScriptBefore'][] = 'let imageSelectAction = \'\'; let site_id = '.$s_id.';';
		if(isset($data['autoresponder']->mailing_list_id)){
			$footer['customScriptAfter'][] = 'setMailList(\''.$data['autoresponder']->mailing_list_id.'\');';
		}
		$this->load->view('common/header', $header);
		$this->load->view('user/site/autoresponder', $data);
		$this->load->view('common/footer', $footer);
	}

	public function automation(){
		//if(in_array(4, $this->session->userdata( 'access_level' ))){
			$userID = $this->session->userdata( 'user_id' );
			$data = array();
			$header = $this->header;
			$header['title'] = 'Automation';
			$header['menu'] = 'automation';
			$data['name'] = $this->session->userdata( 'name' );

			$where = array( 'user_id' => $userID );
			$sites =  $this->Common_DML->get_data( TBL_SITES, $where, 's_id, site_name');
			$data['sites'] = $sites;

			$facebook_token = $this->session->userdata( 'FacebookAccessToken' );
			if(!empty($facebook_token)){
				$this->load->library('Facebooklib');
				$this->facebooklib->setAccessToken($facebook_token);
				$pages = $this->facebooklib->getPages();
				$data['facebook_pages'] = $pages;
			}

			$footer['scripts'] = array('ckeditor/node_modules/ckeditor4/ckeditor.js', 'automation.js?q='.time());
			$footer['customScriptAfter'][] = 'let amt = new Automation({});';

			// var_dump($data);
			// die();

			$this->load->view('common/header', $header);
			$this->load->view('user/automation/list', $data);
			$this->load->view('common/footer', $footer);
		// }else{
		// 	redirect('user/dashboard');
		// }
	}

	public function schedule(){

        if(!in_array(4, $this->session->userdata( 'access_level' ))){
            redirect('user/dashboard');
        }
		if($this->uri->segment(3) == ''){
			redirect( 'user/automation' );
			exit();
		}
		$userID = $this->session->userdata( 'user_id' );
		$site_id = $this->uri->segment(3);

		$data = array();
		$header = $this->header;
		$header['title'] = 'Automation';
		$header['menu'] = 'automation';
		$data['name'] = $this->session->userdata( 'name' );

		$where = array( 'user_id' => $userID, 's_id' => $site_id );
		$site = $this->Common_DML->get_data( TBL_SITES, $where, 'site_name, category_id');
		$category = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, array('wc_id' => $site[0]['category_id']), 'ezine_name');
		$scheduleArticles = $this->Common_DML->get_data( TBL_SITE_SCHEDULE_ARTICLES, $where, 'article_id');
		$category_id = $site[0]['category_id'];
		$ezine_name = $category[0]['ezine_name'];

		$data['site'] = $site;

		if(!empty($scheduleArticles)){
			$scheduleArticles = json_encode( array_column($scheduleArticles, 'article_id') );
		}else{
		}
		$scheduleArticles = json_encode( array() );

		$facebook_token = $this->session->userdata( 'FacebookAccessToken' );
		if(!empty($facebook_token)){
			$this->load->library('Facebooklib');
			$this->facebooklib->setAccessToken($facebook_token);
			$pages = $this->facebooklib->getPages();
			$data['facebook_pages'] = $pages;
		}

		$footer['scripts'] = array('ckeditor/node_modules/ckeditor4/ckeditor.js', 'automation.js?q='.time());
		$footer['customScriptAfter'][] = "let amt = new Automation({site_id: {$site_id}, category_id: {$category_id}, ezine_cat_name: '{$ezine_name}', storeArticle: {$scheduleArticles}, automation:true});";

		$this->load->view('common/header', $header);
		$this->load->view('user/automation/automation', $data);
		$this->load->view('common/footer', $footer);
	}

	public function dfy_page(){
		if(in_array(3, $this->session->userdata( 'access_level' ))){
			$data = array();
			$header = $this->header;
			$header['title'] = 'dfy';
			$header['menu'] = 'dfy';
			$data['name'] = $this->session->userdata( 'name' );
			$userID = $this->session->userdata( 'user_id' );

			$sa_id = $this->uri->segment(3);
			if(isset($sa_id)){
				$where = array( 'status' => 1);
				$data['categories'] = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where);
				$data['network'] = $this->Common_DML->get_data( TBL_NETWORK, $where);

				$where = array( 'status' => 1 , 'sa_id' => $sa_id);
				$data['product'] = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
				
			}else{
				$where = array( 'status' => 1);
				$data['categories'] = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where);
				$data['network'] = $this->Common_DML->get_data( TBL_NETWORK, $where);
			}

			$where = array('user_id' => $userID, 'key' => 'AutoresponderSettings');
    		$site_data = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where);

			if(!empty($site_data)){
				
				$autoresponder_data = json_decode($site_data[0]['value'], true);
				$data['autoresponder_data'] = $autoresponder_data; 

			}

			$footer['customScriptBefore'][] = 'let imageSelectAction = \'\'';

			$this->load->view('common/header', $header);
			$this->load->view('user/dfy_page', $data);
			$this->load->view('common/footer', $footer);
		}else{
			redirect('user/dashboard');
		}
	}

	public function schedule_emails(){
		if($this->uri->segment(3) == ''){
			redirect( 'user/automation' );
			exit();
		}
		$userID = $this->session->userdata( 'user_id' );
		$site_id = $this->uri->segment(3);

		$data = array();
		$header = $this->header;
		$header['title'] = 'Automation';
		$header['menu'] = 'automation';
		$data['name'] = $this->session->userdata( 'name' );

		$where = array( 'user_id' => $userID, 's_id' => $site_id );
		$site = $this->Common_DML->get_data( TBL_SITES, $where, 'site_name, category_id');
		$category = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, array('wc_id' => $site[0]['category_id']), 'ezine_name, name');
		$scheduleEmails = $this->Common_DML->get_data( TBL_SITE_SCHEDULE_EMAILS, array('wc_id' => $site[0]['category_id'], 'user_id' => 0, 's_id' => 0), 'sse_id,content,subject');
		$category_id = $site[0]['category_id'];
		$ezine_name = $category[0]['ezine_name'];

		$where = array('user_id' => $userID, 'key' => 'AutoresponderSettings');
		$site_data = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where);
		$autoresponder_data = json_decode($site_data[0]['value'], true);
		$data['autoresponder_data'] = $autoresponder_data;

		$data['site'] = $site;
		$data['scheduleEmails'] = $scheduleEmails;
		$data['category'] = $category;

		$footer['scripts'] = array('ckeditor/node_modules/ckeditor4/ckeditor.js', 'automation.js?q='.time());
		$footer['customScriptAfter'][] = "let amt = new Automation({site_id: {$site_id}, category_id: {$category_id}, ezine_cat_name: '{$ezine_name}', storeArticle: [], automation:false});";
		$footer['customScriptAfter'][] = "let scheduleEmails = ". json_encode( $scheduleEmails );

		$this->load->view('common/header', $header);
		$this->load->view('user/automation/emails', $data);
		$this->load->view('common/footer', $footer);
	}

	public function analytics($page = 1){
		
		$data = array();
		$header = $this->header;
		$header['title'] = 'analytics';
		$header['menu'] = 'analytics';
		$data['name'] = $this->session->userdata( 'name' );
		$userID = $this->session->userdata( 'user_id' );

		$data['currentPage'] = $page;
		$start = ($page - 1) * PAGINATIONNUMBER;
		$end = PAGINATIONNUMBER;

		$sql = "SELECT s.s_id, s.user_id, s.site_name, a.page_view, a.unique_page_view, COUNT(l.s_id) AS num_leads FROM sites s LEFT JOIN analytics a ON (a.s_id = s.s_id) LEFT JOIN leads_generation l ON l.s_id = s.s_id WHERE s.status = 1 AND s.user_id = {$userID} GROUP BY s.s_id ORDER BY s.s_id DESC";
		$data['sites'] = $this->Common_DML->query( $sql );
	
		$where = array( 'status' => 1, 'user_id' => $userID);
		$data['total_sites'] = $this->Common_DML->get_data( TBL_SITES, $where, 'count(s_id) total');

		$where = array( 'status' => 1);
		$data['categories'] = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, $where);
				
		$this->load->view('common/header', $header);
		$this->load->view('user/analytics', $data);
		$this->load->view('common/footer');
	}

	public function multipleStreamsIncome($page = 1){
		if(in_array(9, $this->session->userdata( 'access_level' ))){
			$data = array();
			$header = $this->header;
			$header['title'] = 'multiple_streams_income';
			$header['menu'] = 'multiple_streams_income';
			$data['name'] = $this->session->userdata( 'name' );
			$userID = $this->session->userdata( 'user_id' );

			$data['currentPage'] = $page;
			$start = ($page - 1) * PAGINATIONNUMBER;
			$end = PAGINATIONNUMBER;

			if(isset($_POST['search_product'])){

				$searchWhere = "status = 1  && (product_name LIKE '%{$_POST['search_product']}%')";
				$sql = "SELECT * FROM " . MULTIPLE_STREAMS . " WHERE " . $searchWhere . " ORDER BY ms_id DESC LIMIT {$start},{$end}";
				$countSql = "SELECT count(ms_id) as total FROM " . MULTIPLE_STREAMS . " WHERE " . $searchWhere;

				$product = $this->Common_DML->query( $sql );
				$data['products'] = $product;
				$data['total_product'] = $this->Common_DML->query( $countSql );

			}else{	

				$where = array( 'status' => 1);
				$limit = array( $start , $end);
				$order = array( 'ms_id' , 'desc');
				$product = $this->Common_DML->get_data( MULTIPLE_STREAMS, $where,'', $limit, $order);
				// $articles = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
				$data['products'] = $product;
				$data['total_product'] = $this->Common_DML->get_data( MULTIPLE_STREAMS, $where, 'count(ms_id) total');

			}

				
			$this->load->view('common/header', $header);
			$this->load->view('user/multiple_streams_income', $data);
			$this->load->view('common/footer');
		}else{
			redirect('user/dashboard');
		}
	}

	public function recurringPassiveIncome($page = 1){
		if(in_array(8, $this->session->userdata( 'access_level' ))){
			$data = array();
			$header = $this->header;
			$header['title'] = 'recurring_passive_income';
			$header['menu'] = 'recurring_passive_income';
			$data['name'] = $this->session->userdata( 'name' );
			$userID = $this->session->userdata( 'user_id' );

			$data['currentPage'] = $page;
			$start = ($page - 1) * PAGINATIONNUMBER;
			$end = PAGINATIONNUMBER;

			if(isset($_POST['search_product'])){

				$searchWhere = "status = 1  && (product_name LIKE '%{$_POST['search_product']}%')";
				$sql = "SELECT * FROM " . RECURRING_PASSIVE . " WHERE " . $searchWhere . " ORDER BY rp_id DESC LIMIT {$start},{$end}";
				$countSql = "SELECT count(rp_id) as total FROM " . RECURRING_PASSIVE . " WHERE " . $searchWhere;

				$product = $this->Common_DML->query( $sql );
				$data['products'] = $product;
				$data['total_product'] = $this->Common_DML->query( $countSql );

			}else{	

				$where = array( 'status' => 1);
				$limit = array( $start , $end);
				$order = array( 'rp_id' , 'desc');
				$product = $this->Common_DML->get_data( RECURRING_PASSIVE, $where,'', $limit, $order);
				// $articles = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
				$data['products'] = $product;
				$data['total_product'] = $this->Common_DML->get_data( RECURRING_PASSIVE, $where, 'count(rp_id) total');

			}
				
			$this->load->view('common/header', $header);
			$this->load->view('user/recurring_passive_income', $data);
			$this->load->view('common/footer');
		}else{
			redirect('user/dashboard');
		}
	}

	public function resellerRights($page = 1){
		if(in_array(7, $this->session->userdata( 'access_level' ))){
			$data = array();
			$header = $this->header;
			$header['title'] = 'reseller_rights';
			$header['menu'] = 'reseller_rights';
			$data['name'] = $this->session->userdata( 'name' );
			$userID = $this->session->userdata( 'user_id' );

			$data['currentPage'] = $page;
			$start = ($page - 1) * PAGINATIONNUMBER;
			$end = PAGINATIONNUMBER;
				
			$this->load->view('common/header', $header);
			$this->load->view('user/reseller_rights', $data);
			$this->load->view('common/footer');
		}else{
			redirect('user/dashboard');
		}
	}
	
	public function training(){
		$data = array();
		$header = $this->header;
		$header['title'] = 'Training';
		$header['menu'] = 'training';
		$data['name'] = $this->session->userdata( 'name' );
		$userID = $this->session->userdata( 'user_id' );
			
		$this->load->view('common/header', $header);
		$this->load->view('user/training');
		$this->load->view('common/footer');
	}

    public function training_videos(){
        $data = array();
        $header = $this->header;
        $header['title'] = 'Training Videos';
        $header['menu'] = 'training Videos';
        $data['name'] = $this->session->userdata( 'name' );
        $userID = $this->session->userdata( 'user_id' );

        $this->load->view('common/header', $header);
        $this->load->view('user/training-videos');
        $this->load->view('common/footer');
    }

    public function training_pdf(){
        $data = array();
        $header = $this->header;
        $header['title'] = 'Training PDF';
        $header['menu'] = 'training PDF';
        $data['name'] = $this->session->userdata( 'name' );
        $userID = $this->session->userdata( 'user_id' );

        $this->load->view('common/header', $header);
        $this->load->view('user/training-pdf');
        $this->load->view('common/footer');
    }

	public function bonuses(){
		$data = array();
		$header = $this->header;
		$header['title'] = 'Bonuses';
		$header['menu'] = 'bonuses';
		$data['name'] = $this->session->userdata( 'name' );
		$userID = $this->session->userdata( 'user_id' );
			
		$this->load->view('common/header', $header);
		$this->load->view('user/bonuses');
		$this->load->view('common/footer');
	}

	public function high_ticket_maximizer(){
		if(in_array(6, $this->session->userdata( 'access_level' ))){
			$data = array();
			$header = $this->header;
			$header['title'] = 'High Ticket Maximizer';
			$header['menu'] = 'high_ticket_maximizer';
			$data['name'] = $this->session->userdata( 'name' );
			$userID = $this->session->userdata( 'user_id' );
				
			$this->load->view('common/header', $header);
			$this->load->view('user/high-ticket-maximizer');
			$this->load->view('common/footer');
		}else{
			redirect( 'user/dashboard', 'refresh' );
		}
	}

	public function traffic_booster(){
		if(in_array(5, $this->session->userdata( 'access_level' ))){
			$data = array();
			$header = $this->header;
			$header['title'] = 'Traffic Booster';
			$header['menu'] = 'traffic_booster';
			$data['name'] = $this->session->userdata( 'name' );
			$userID = $this->session->userdata( 'user_id' );
				
			$this->load->view('common/header', $header);
			$this->load->view('user/traffic-booster');
			$this->load->view('common/footer');
		}else{
			redirect( 'user/dashboard', 'refresh' );
		}
	}
	
	public function upgrade(){
		$data = array();
		$header = $this->header;
		$header['title'] = 'upgrade';
		$header['menu'] = 'upgrade';
		$data['name'] = $this->session->userdata( 'name' );
		$userID = $this->session->userdata( 'user_id' );
		$this->load->view('common/header', $header);
		$this->load->view('user/upgrade');
		$this->load->view('common/footer');
	}
	
	public function uploadVideo(){
		
	}
	
	public function content_spinner(){
		$data = array();
		$header = $this->header;
		$header['title'] = 'Spinner';
		$header['menu'] = 'content_spinner';
		$data['name'] = $this->session->userdata( 'name' );
		$userID = $this->session->userdata( 'user_id' );

		$this->load->view('common/header', $header);
		$this->load->view('user/content_spinner');
		$this->load->view('common/footer');
	}
	
	public function create_article_clone(){
        $userID = $this->session->userdata( 'user_id' );
        $where = array( 'status' => 1, 's_id' => $this->uri->segment(3) );
        $total_article = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where, 'count(sa_id) total');
        if( $this->uri->segment(4) == ''){
            if((in_array(2, $this->session->userdata( 'access_level' )) && $total_article[0]['total'] < 7) || (in_array(1, $this->session->userdata( 'access_level' )) && $total_article[0]['total'] < 7)){
            }else{
                redirect('user/site-article/'.$this->uri->segment(3));
                die();
            }
        }
        if( $this->uri->segment(3) != ''){
            $s_id = $this->uri->segment(3);
            $where = array('s_id' => $s_id,  'user_id' => $userID, 'status' => 1);
            $site_data = $this->Common_DML->get_data( TBL_SITES, $where);
            if(empty($site_data)){
                redirect( 'user/dashboard' );
                exit();
            }
        }

        $data = array();
        $header = $this->header;
        $header['title'] = 'dashboard';
        $header['menu'] = 'dashboard';
        $header['font_family'] = 'font_family';

        $s_id = $this->uri->segment(3);
        $sa_id = $this->uri->segment(4);


        if(!empty($this->uri->segment(4))){

            $where = array( 'status' => 1);
            $data['network'] = $this->Common_DML->get_data( TBL_NETWORK, $where);

            $where = array( 'status' => 1, 'sa_id' => $sa_id);
            $data['products'] = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
            $article_list = $data['products'][0];

            $where = array( 'status' => 1, 'n_id' => $article_list['n_id'], 'parent_id' => 0 );
            $data['categories'] = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where);

            $where = array( 'status' => 1,'n_id' => $article_list['n_id'], 'parent_id' => $article_list['nc_id'] );
            $data['subcategory'] = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where);

            $where = array( 'status' => 1, 'n_id' => $article_list['n_id'], 'nc_id' => $article_list['nsc_id']);
            $data['product_list'] = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where);

            $where = array( 'status' => 1, 'n_id' => $article_list['n_id'], 'np_id' => $article_list['np_id'] );
            $data['product_data'] = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where);

            if(!empty($data['product_data'])){
                $data['product_url'] = str_replace('userid',$data['product_data'][0]['n_id'],$data['product_data'][0]['product_url']);
            }

            $where = array('s_id' => $s_id, 'status' => 1, 'user_id' => $userID);
            $site_data = $this->Common_DML->get_data( TBL_SITES, $where);
            //print_r($site_data);
            $category_id = $site_data[0]['category_id'];

            $where = array( 'status' => 1 , 'category_id' => $site_data[0]['category_id']);
            $articles = $this->Common_DML->get_data( TBL_ARTICLES, $where);
            $data['articles'] = $articles;

            $category = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, array('wc_id' => $category_id), 'ezine_name');
            $ezine_name = $category[0]['ezine_name'];
            //print_r($articles);
            if(!empty($articles)){
                $image_url = "SELECT `media`.`file`, `articles`.`m_id` AS image_url FROM (`media`) LEFT OUTER JOIN `articles` ON `media`.`m_id` = ".$articles[0]['m_id']." WHERE `media`.`m_id` = ".$articles[0]['m_id']."";
                $data['image_url'] = $this->Common_DML->query( $image_url );
            }



        }else{

            $where = array( 'status' => 1);
            $data['network'] = $this->Common_DML->get_data( TBL_NETWORK, $where);

            $where = array('s_id' => $s_id, 'status' => 1);
            $site_data = $this->Common_DML->get_data( TBL_SITES, $where);

            if(isset($site_data[0]['category_id'])){
                $where = array( 'status' => 1 , 'category_id' => $site_data[0]['category_id'] );
                $data['articles'] = $this->Common_DML->get_data( TBL_ARTICLES, $where);
                $category_id = $site_data[0]['category_id'];
                $category = $this->Common_DML->get_data( TBL_WEBSITE_CATEGORY, array('wc_id' => $category_id), 'ezine_name');
                $ezine_name = $category[0]['ezine_name'];
            }else{
                $data['articles'] = array();
                $category_id = 0;
            }


        }
        $footer['scripts'] = array('ckeditor/node_modules/ckeditor4/ckeditor.js','admin.js', 'plugin/color-picker.min.js', 'automation.js?q='.time());
        $footer['customScriptBefore'][] = 'let imageSelectAction = \'\';';
        $footer['customScriptAfter'][] = "let amt = new Automation({site_id: {$s_id}, category_id: {$category_id}, ezine_cat_name: '{$ezine_name}',storeArticle:[],automation:false});";

        $this->load->view('common/header', $header);
		$this->load->view('user/site/create_article_clone', $data);
		$this->load->view('common/footer', $footer);
	}

    public function test_dev(){
        $data = array();
        $header = $this->header;
        $header['title'] = 'Test Dev';
        $header['menu'] = 'test_dev';
        $data['name'] = $this->session->userdata( 'name' );
        $userID = $this->session->userdata( 'user_id' );

        $footer['scripts'] = array('ckeditor/node_modules/ckeditor4/ckeditor.js');
        $this->load->view('common/header', $header);
        $this->load->view('user/test-dev');
        $this->load->view('common/footer', $footer);
    }

	public function commission_streams(){
		
		if(in_array(2, $this->session->userdata( 'access_level' ))){
			$data = array();
			$header = $this->header;
			$header['title'] = '20 Commissions Streams';
			$header['menu'] = '20 Commissions Streams';
			$data['name'] = $this->session->userdata( 'name' );
			$userID = $this->session->userdata( 'user_id' );
				
			$this->load->view('common/header', $header);
			$this->load->view('user/commission_streams');
			$this->load->view('common/footer');
		}else{
			redirect('user/dashboard');
		}
	}
}
?>
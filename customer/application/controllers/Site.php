<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	private $header;
		
	function __construct() {
		parent::__construct();
	}
	
	public function index(){

		if(isset($_POST['search_article'])){
			$subDomain = str_replace('.pushbutton-vip.com', '' , $_SERVER['HTTP_HOST']);
			$where = array( 'status' => 1, 'sub_domain' => $subDomain );
			$sites = $this->Common_DML->get_data( TBL_SITES, $where);
			$data['sites'] = $sites;
			$s_id = $sites[0]['s_id'];
			$user_id = $sites[0]['user_id'];

			$page = $_POST['page'];
			if (!empty($page)) {
				$page = $_POST['page'];
				$start = ($page) * PAGINATIONNUMBER;
			}else{
				$page = 0;
				$start = 0;
			}
			$end = PAGINATIONNUMBER;
			$data['limit'] = PAGINATIONNUMBER;

			$sql = "SELECT * FROM ".TBL_SITES_ARTICLE." WHERE status = 1 AND s_id = $s_id AND (article_name LIKE '%{$_POST['search_article']}%') LIMIT $start,$end";
			$articles = $this->Common_DML->query( $sql );
			
			$data['articles'] = $articles;
			$sql = "SELECT count(s_id) totalArticle FROM ".TBL_SITES_ARTICLE." WHERE status = 1 AND s_id = $s_id AND (article_name LIKE '%{$_POST['search_article']}%')";
			$totalArticle = $this->Common_DML->query( $sql );
			$data['totalArticle'] = $totalArticle[0]['totalArticle'];

			// $sql = "SELECT * FROM " . TBL_SITES_ARTICLE . " WHERE " . $searchWhere . " ORDER BY sa_id DESC ";
			// $articles = $this->Common_DML->query( $sql );
			// $data['articles'] = $articles;

			$data['social_links'] 	= json_decode($sites[0]['social_links'], true);
			$data['sheader'] 		= json_decode($sites[0]['header'], true);
			$data['designs'] 		= json_decode($sites[0]['designs'], true);
			$data['banners'] 		= json_decode($sites[0]['banners'], true);
			$data['autoresponder'] 	= json_decode($sites[0]['autoresponder'], true);
			$header['autoresponder'] 	= json_decode($sites[0]['autoresponder'], true);

			$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'] );
			$pages = $this->Common_DML->get_data( TBL_PAGES, $where);
			$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'], 'not_delete' => 1 );
			$footerpages = $this->Common_DML->get_data( TBL_PAGES, $where);

			$sql = "UPDATE " . TBL_ANALYTICS . " SET page_view = page_view + 1 WHERE s_id = {$s_id}";
			$this->Common_DML->query( $sql, false );
			$header['site_name'] = $sites[0]['site_name'];
			if(!empty($data['designs']['siteBanner']['bg_image_url'])){
				$site_body_img = $data['designs']['siteBanner']['bg_image_url'];
			}

			$header['site_body_color'] = $data['designs']['siteBanner']['sitebannerColor'] ?? null;
			$header['pages'] = $pages;
			$header['logo'] = !empty($data['designs']['siteLogo']) ? $data['designs']['siteLogo']['logo_image_url'] : '';
			$header['font_family'] = 'font_family';
			$footer['footerpages'] = $footerpages;
			$footer['customScriptAfter'][] = "let site_id = {$s_id}, user_id = {$user_id};";
			
			$this->load->view('common/header',$header);
			$this->load->view('blog',$data);
			$this->load->view('common/footer',$footer);

		}else{

			$subDomain = str_replace('.pushbutton-vip.com', '' , $_SERVER['HTTP_HOST']);
			$where = array( 'status' => 1, 'sub_domain' => $subDomain );
			$sites = $this->Common_DML->get_data( TBL_SITES, $where);
			$data['sites'] = $sites;
			$s_id = $sites[0]['s_id'];
			$user_id = $sites[0]['user_id'];

			$page =  $this->uri->segment(3);
			if (!empty($page)) {
				$page = $this->uri->segment(3);
				$start = ($page - 1) * PAGINATIONNUMBER;
			}else{
				$page = 0;
				$start = 0;
			}
			$end = PAGINATIONNUMBER;
			$data['limit'] = PAGINATIONNUMBER;

			$sql = "SELECT * FROM site_article WHERE status = 1 AND s_id = $s_id LIMIT $start,$end";
			$articles = $this->Common_DML->query( $sql );
			$data['articles'] = $articles;
			$where = array( 'status' => 1, 's_id' => $s_id);
			$totalArticle = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where, 'count(s_id) totalArticle');
			$data['totalArticle'] = $totalArticle[0]['totalArticle'];
			// $where = array( 'status' => 1, 's_id' => $s_id);
			// $articles = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
			// $data['articles'] = $articles;
			// echo $this->db->last_query();

			$data['social_links'] 	= json_decode($sites[0]['social_links'], true);
			$data['sheader'] 		= json_decode($sites[0]['header'], true);
			$data['designs'] 		= json_decode($sites[0]['designs'], true);
			$data['banners'] 		= json_decode($sites[0]['banners'], true);
			$data['autoresponder'] 	= json_decode($sites[0]['autoresponder'], true);
			$header['autoresponder'] 	= json_decode($sites[0]['autoresponder'], true);

			$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'], 'not_delete' => 0 );
			$order = array( 'p_id' , 'desc');
			$pages = $this->Common_DML->get_data( TBL_PAGES, $where, '', '', $order);
			$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'], 'not_delete' => 1 );
			$footerpages = $this->Common_DML->get_data( TBL_PAGES, $where);

			$sql = "UPDATE " . TBL_ANALYTICS . " SET page_view = page_view + 1 WHERE s_id = {$s_id}";
			$this->Common_DML->query( $sql, false );

			if(isset($data['designs']['siteBanner']['bg_image_url'])){
				$header['site_body_img'] = $data['designs']['siteBanner']['bg_image_url'];
			}
			$header['site_body_color'] = (isset($data['designs']['siteBanner']['sitebannerColor'])) ?? null ;
			$header['site_name'] = $sites[0]['site_name'];
			$header['pages'] = $pages;
			
			$footer['footerpages'] = $footerpages;
			$header['logo'] = !empty($data['designs']['siteLogo']) ? $data['designs']['siteLogo']['logo_image_url'] : '';
			$header['font_family'] = 'font_family';
			$footer['customScriptAfter'][] = "let site_id = {$s_id}, user_id = {$user_id};";
			$this->load->view('common/header',$header);
			$this->load->view('blog',$data);
			$this->load->view('common/footer',$footer);
		}	
	}

	public function article(){
		$header = $this->header;
		$subDomain = str_replace('.pushbutton-vip.com', '' , $_SERVER['HTTP_HOST']);

		$where = array( 'status' => 1, 'sub_domain' => $subDomain );
		$sites = $this->Common_DML->get_data( TBL_SITES, $where);
		$data['sites'] = $sites;

		if(!empty($sites[0]['social_share'])){
			$data['social_share'] = json_decode( $sites[0]['social_share'], true );
			$header['social_share'] = json_decode( $sites[0]['social_share'], true );
		}
		
		$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'] );
		$articles = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
		$data['articles'] = $articles;
		
		$data['social_links'] 	= json_decode($sites[0]['social_links'], true);
		$data['designs'] 		= json_decode($sites[0]['designs'], true);
		$data['banners'] 		= json_decode($sites[0]['banners'], true);
		$data['autoresponder'] 	= json_decode($sites[0]['autoresponder'], true);
		
		$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'], 'not_delete' => 0 );
		$pages = $this->Common_DML->get_data( TBL_PAGES, $where);
		$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'], 'not_delete' => 1 );
		$footerpages = $this->Common_DML->get_data( TBL_PAGES, $where);
		
		$sa_id = $this->uri->segment(3);
		
		$where = array( 'status' => 1, 'sa_id' => $sa_id );
		$sitesArticle = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
		$data['sitesArticle'] = $sitesArticle[0];
		$header['sitesArticle'] = $sitesArticle[0];
		
		$header['sitesArticle'] = $sitesArticle[0];
		$header['title'] = $sitesArticle[0]['article_name'];
		
		$sql = "UPDATE " . TBL_ANALYTICS . " SET page_view = page_view + 1 WHERE s_id = {$sites[0]['s_id']}";
    	$this->Common_DML->query( $sql, false );

		if(isset($data['designs']['siteBanner']['bg_image_url'])){
			$header['site_body_img'] = $data['designs']['siteBanner']['bg_image_url'];
		}

		$header['site_body_color'] = $data['designs']['siteBanner']['sitebannerColor'];
		$header['site_name'] = $sites[0]['site_name'];
		$header['pages'] = $pages;
		$footer['footerpages'] = $footerpages;
		$header['logo'] = !empty($data['designs']['siteLogo']) ? $data['designs']['siteLogo']['logo_image_url'] : '';
		$header['font_family'] = 'font_family';
		$footer['customScriptAfter'][] = "let site_id = {$sites[0]['s_id']}, user_id = {$sites[0]['user_id']};";

		$where = array( 'status' => 1, 'user_id' => $sites[0]['user_id'] );
		$Author = $this->Common_DML->get_data( TBL_USERS, $where, 'name,profilePicture, name as short_nm, email');
		$where = array('key' => 'AuthorGeneralSettings', 'user_id' => $sites[0]['user_id']);
		$getAutherSettings = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, 'value');
		if(!empty($getAutherSettings)){
			$data['settings'] = json_decode($getAutherSettings[0]['value'], true);
		}
		$data['author'] = $Author[0];
		if(!empty($Author[0]['profilePicture'])){
			$pp = json_decode($Author[0]['profilePicture'], true);
			if(!empty($pp)){
				$data['author_img'] = $pp['url'];
			}
		}
		
		$this->load->view('common/header', $header);
		$this->load->view('blog_single', $data);
		$this->load->view('common/footer',$footer);
	}

	public function page(){

		$subDomain = str_replace('.pushbutton-vip.com', '' , $_SERVER['HTTP_HOST']);

		$where = array( 'status' => 1, 'sub_domain' => $subDomain );
		$sites = $this->Common_DML->get_data( TBL_SITES, $where);
		$data['sites'] = $sites;
		
		$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'] );
		$articles = $this->Common_DML->get_data( TBL_SITES_ARTICLE, $where);
		$data['articles'] = $articles;
		
		$data['social_links'] 	= json_decode($sites[0]['social_links'], true);
		$data['designs'] 		= json_decode($sites[0]['designs'], true);
		$data['banners'] 		= json_decode($sites[0]['banners'], true);
		$data['autoresponder'] 	= json_decode($sites[0]['autoresponder'], true);
				
		$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'], 'not_delete' => 0 );
		$pages = $this->Common_DML->get_data( TBL_PAGES, $where);
		$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'], 'not_delete' => 1 );
		$footerpages = $this->Common_DML->get_data( TBL_PAGES, $where);
		
		$p_id = $this->uri->segment(3);
		
		$where = array( 'status' => 1, 'p_id' => $p_id);
		$sitesPage = $this->Common_DML->get_data( TBL_PAGES, $where);
		$data['sitesPage'] = $sitesPage[0];
		$header['title'] = $sitesPage[0]['page_name'];

			
		$sql = "UPDATE " . TBL_ANALYTICS . " SET page_view = page_view + 1 WHERE s_id = {$sites[0]['s_id']}";
    	$this->Common_DML->query( $sql, false );

		if(isset($data['designs']['siteBanner']['bg_image_url'])){
			$header['site_body_img'] = $data['designs']['siteBanner']['bg_image_url'];
		}

		$header['site_body_color'] = $data['designs']['siteBanner']['sitebannerColor'];
		
		$header['site_name'] = $sites[0]['site_name'];
		$header['logo'] = !empty($data['designs']['siteLogo']) ? $data['designs']['siteLogo']['logo_image_url'] : '';
		$header['pages'] = $pages;
		$footer['footerpages'] = $footerpages;
		
		$header['font_family'] = 'font_family'; 
		$footer['customScriptAfter'][] = "let site_id = {$sites[0]['s_id']}, user_id = {$sites[0]['user_id']};";

		$this->load->view('common/header', $header);
		$this->load->view('page', $data);
		$this->load->view('common/footer',$footer);
	}

	public function privacy_policy(){

		$subDomain = str_replace('.pushbutton-vip.com', '' , $_SERVER['HTTP_HOST']);

		$where = array( 'status' => 1, 'sub_domain' => $subDomain );
		$sites = $this->Common_DML->get_data( TBL_SITES, $where);
		$data['sites'] = $sites;
		$s_id = $sites[0]['s_id'];
		$user_id = $sites[0]['user_id'];

		$data['social_links'] 	= json_decode($sites[0]['social_links'], true);
		$data['designs'] 		= json_decode($sites[0]['designs'], true);
		$data['banners'] 		= json_decode($sites[0]['banners'], true);
		$data['autoresponder'] 	= json_decode($sites[0]['autoresponder'], true);

		$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'] );
		$pages = $this->Common_DML->get_data( TBL_PAGES, $where);

		$header['site_name'] = $sites[0]['site_name'];
		$header['title'] = 'Privacy Policy';
		$header['site_body_color'] = $data['designs']['siteBanner']['sitebannerColor'];
		$header['pages'] = $pages;
		$header['logo'] = !empty($data['designs']['siteLogo']) ? $data['designs']['siteLogo']['logo_image_url'] : '';
		$header['font_family'] = 'font_family';

		$footer['customScriptAfter'][] = "let site_id = {$s_id}, user_id = {$user_id};";
		$footer['designs'] = json_decode($sites[0]['designs'], true);
		
		$this->load->view('common/header',$header);
		$this->load->view('privacy_policy',$data);
		$this->load->view('common/footer',$footer);
	}
	
	public function terms_condition(){
		$subDomain = str_replace('.pushbutton-vip.com', '' , $_SERVER['HTTP_HOST']);

		$where = array( 'status' => 1, 'sub_domain' => $subDomain );
		$sites = $this->Common_DML->get_data( TBL_SITES, $where);
		$data['sites'] = $sites;
		$s_id = $sites[0]['s_id'];
		$user_id = $sites[0]['user_id'];

		$data['social_links'] 	= json_decode($sites[0]['social_links'], true);
		$data['designs'] 		= json_decode($sites[0]['designs'], true);
		$data['banners'] 		= json_decode($sites[0]['banners'], true);
		$data['autoresponder'] 	= json_decode($sites[0]['autoresponder'], true);

		$where = array( 'status' => 1, 's_id' => $sites[0]['s_id'] );
		$pages = $this->Common_DML->get_data( TBL_PAGES, $where);

		$header['site_name'] = $sites[0]['site_name'];
		$header['title'] = 'Terms Condition';
		$header['site_body_color'] = $data['designs']['siteBanner']['sitebannerColor'];
		$header['pages'] = $pages;
		$header['logo'] = !empty($data['designs']['siteLogo']) ? $data['designs']['siteLogo']['logo_image_url'] : '';
		$header['font_family'] = 'font_family';

		$footer['customScriptAfter'][] = "let site_id = {$s_id}, user_id = {$user_id};";
		$footer['designs'] = json_decode($sites[0]['designs'], true);

		$this->load->view('common/header', $header);
		$this->load->view('terms_condition', $data);
		$this->load->view('common/footer',$footer);
	}
	
}
?>
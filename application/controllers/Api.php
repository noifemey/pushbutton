<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

class Api extends CI_Controller {

    function __construct() {
		parent::__construct();
    }

    public function index(){
		echo 'We are here..';
    }

    public function clickBankProduct(){
        include APPPATH . 'third_party/simple_html_dom.php';

        $url = "https://support.clickbank.com/hc/en-us/articles/220376547-Marketplace-Feed";

        $data = file_get_contents_curl($url);
        $dom = new simple_html_dom();
        $dom->load($data, true, true);

        if(!empty($dom)) {
            $aZipFile = $dom->find(".article .article-info .article-content .article-body [href]")[0];
            preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $aZipFile, $zipFile);
            $downloadZip = ROOTPATH . "temp/clickbank.zip";
            if(copy($zipFile[2][0], $downloadZip)){
                $zip = new ZipArchive;
                $res = $zip->open($downloadZip);
                if ($res === TRUE) {
                    $extractpath = ROOTPATH . "temp/";
                    $zip->extractTo($extractpath);
                    $zip->close();

                    $xmlFile = ROOTPATH . "temp/marketplace_feed_v2.xml";

                    $xml = simplexml_load_file($xmlFile);

                    $category = simpleXmlToArray($xml);

                    $category = $category['Category'];
                    for($i=0;$i<count($category);$i++){
                        if(!empty($category[$i]['Name'])){
                            $where = array( 'n_id' => 1, 'name' => $category[$i]['Name'] );
                            $result = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where, '*' );

                            if(!empty($result) && count($result) == 1){
                                $nc_parent_id = $result[0]['nc_id'];
                            }else{
                                $c = array(
                                    'n_id' => 1,
                                    'parent_id' => 0,
                                    'name' => $category[$i]['Name'],
                                    'isCreated' => date('Y-m-d H:i:s'),
                                    'isUpdated' => date('Y-m-d H:i:s'),
                                    'status' => 1
                                );
        
                                $nc_parent_id = $this->Common_DML->put_data( TBL_NETWORK_CATEGORY, $c );
                            }


                            $subcategory = $category[$i]['Category'];
                            for($j=0;$j<count($subcategory);$j++){
                                if(!empty($subcategory[$j]['Name'])){
                                    $where = array( 'n_id' => 1, 'name' => $subcategory[$j]['Name'] );
                                    $result = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where, '*' );
            
                                    if(!empty($result) && count($result) == 1){
                                        $nc_id = $result[0]['nc_id'];
                                    }else{
                                        $sc = array(
                                            'n_id' => 1,
                                            'parent_id' => $nc_parent_id,
                                            'name' => $subcategory[$j]['Name'],
                                            'isCreated' => date('Y-m-d H:i:s'),
                                            'isUpdated' => date('Y-m-d H:i:s'),
                                            'status' => 1
                                        );
                                        $nc_id = $this->Common_DML->put_data( TBL_NETWORK_CATEGORY, $sc );
                                    }
        
        
                                    $products = empty($subcategory[$j]['Site']) ? array() : $subcategory[$j]['Site'];
        
                                    for($k=0;$k<count($products);$k++){
                                        if(!empty($products[$k]['Id'])){
                                            $where = array( 'product_id' => $products[$k]['Id'] );
                                            $result = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where, '*' );
                    
                                            if(!empty($result) && count($result) == 1){
                                                continue;
                                            }
            
                                            $product = array(
                                                'n_id' => 1,
                                                'nc_id' => $nc_id,
                                                'product_id' => $products[$k]['Id'],
                                                'name' => $products[$k]['Title'],
                                                'description' => $products[$k]['Description'],
                                                'image_url' => '',
                                                'product_url' => 'http://userid.'.strtolower($products[$k]['Id']).'.hop.clickbank.net/',
                                                'commission' => $products[$k]['Commission'],
                                                'isCreated' => date('Y-m-d H:i:s'),
                                                'isUpdated' => date('Y-m-d H:i:s'),
                                                'status' => 1
                                            );
            
                                            $this->Common_DML->put_data( TBL_NETWORK_PRODUCT, $product );
                                        }
                                    }                                
                                }
                            }

                        }

                    }

                    remove_directory(ROOTPATH . 'temp', false);

                } else {
                    echo 'Zip Extract Error';
                }
            }
        }
    }

    public function warriorPlusProduct(){

    }

    public function digiStoreProduct(){
        include APPPATH . 'third_party/simple_html_dom.php';

        $url = "https://www.digistore24.com/en/home/marketplace/";

        $data = file_get_contents_curl($url);

        $dom = new simple_html_dom();
        $dom->load($data, true, true);
        
        if(!empty($dom)) {
            foreach ($dom->find("#leftMenu #accordion .panel.no-radius") as $divClass) {
                $parentCategory = $divClass->find('.panel-heading .panel-title')[0];
                $where = array( 'n_id' => 3, 'name' => $parentCategory->innertext );
                $result = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where, '*' );

                if(!empty($result) && count($result) == 1){
                    $nc_parent_id = $result[0]['nc_id'];
                }else{
                    $c = array(
                        'n_id' => 3,
                        'parent_id' => 0,
                        'name' => $parentCategory->innertext,
                        'isCreated' => date('Y-m-d H:i:s'),
                        'isUpdated' => date('Y-m-d H:i:s'),
                        'status' => 1
                    );

                    $nc_parent_id = $this->Common_DML->put_data( TBL_NETWORK_CATEGORY, $c );
                }

                foreach ($divClass->find(".panel-collapse ul li") as $subCategory) {
                    preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>(.*)<\/a>~', $subCategory, $matches);
                    
                    $where = array( 'n_id' => 3, 'name' => $matches[4][0] );
                    $result = $this->Common_DML->get_data( TBL_NETWORK_CATEGORY, $where, '*' );

                    if(!empty($result) && count($result) == 1){
                        $nc_id = $result[0]['nc_id'];
                    }else{
                        $sc = array(
                            'n_id' => 3,
                            'parent_id' => $nc_parent_id,
                            'name' => $matches[4][0],
                            'isCreated' => date('Y-m-d H:i:s'),
                            'isUpdated' => date('Y-m-d H:i:s'),
                            'status' => 1
                        );
                        $nc_id = $this->Common_DML->put_data( TBL_NETWORK_CATEGORY, $sc );
                    }

                    $url = "https://www.digistore24.com{$matches[2][0]}";

                    $product_data = file_get_contents_curl($url);
                    $dom_product = new simple_html_dom();
                    $dom_product->load($product_data, true, true);


                    $products = array();
                    if(!empty($dom_product)) {
                        $total = isset($dom_product->find(".resultCount .count")[0]) ? $dom_product->find(".resultCount .count")[0]->innertext : '';
                        //echo $matches[4][0],'----https://www.digistore24.com',$matches[2][0],'----',$total,'</br>';
                        if(!empty($total)){
                            $count = (int) $total / 5;
                            $i = 1;
                            do{
                                if($i != 1){
                                    $text = file_get_contents_curl("{$url}?page={$i}");
                                    $dom_product = new simple_html_dom();
                                    $dom_product->load($text, true, true);
                                    if(empty($dom_product)) {
                                        break;
                                    }
                                }
                                foreach($dom_product->find(".affiliation_not_requested_container") as $divClass) {
                                    $product = array(
                                        'n_id' => 3,
                                        'nc_id' => $nc_id,
                                        'product_id' => '',
                                        'name' => '',
                                        'description' => '',
                                        'image_url' => '',
                                        'product_url' => '',
                                        'commission' => '',
                                        'isCreated' => date('Y-m-d H:i:s'),
                                        'isUpdated' => date('Y-m-d H:i:s'),
                                        'status' => 1
                                    );
                                    foreach($divClass->find(".helBold") as $title) {
                                        $product['name'] = str_replace('*Net per sale', '', $title->plaintext);
                                    }
                                    foreach($divClass->find(".rightColumn .pieContainer .innerText") as $commission) {
                                        $product['commission'] = str_replace('<span class="h6"><br />Commission</span>', '', $commission->innertext);
                                    }
                                    foreach($divClass->find(".promo_button_container [href]") as $href) {
                                        preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $href, $matches);
                                        $product_id = str_replace('https://www.digistore24.com/signup/', '', $matches[2][0]);
                                        $product_id = str_replace('/', '', $product_id);
                                        $product_url = "https://www.digistore24.com/redir/{$product_id}/userid/";
                                        $product['product_url'] = $product_url;
                                        $product['product_id'] = $product_id;
                                    }
                                    foreach($divClass->find(".productImg") as $img) {
                                        preg_match_all('~<img.*?src=["\']+(.*?)["\']+~', $img->innertext, $matches);
                                        $product_image = $matches[1][0];
                                        $product['image_url'] = $product_image;
                                    }
                                    foreach($divClass->find(".productText") as $description) {
                                        $product['description'] = $description->outertext;
                                    }

                                    $where = array( 'product_id' => $product['product_id'] );
                                    $result = $this->Common_DML->get_data( TBL_NETWORK_PRODUCT, $where, '*' );
            
                                    if(!empty($result) && count($result) == 1){
                                        continue;
                                    }
                                    
                                    $this->Common_DML->put_data( TBL_NETWORK_PRODUCT, $product );


                                }
                                $i++;
                            }while($i<=$count);
                        }
                    }

                    
                }               

            }
        }
    }

    public function authFacebook(){
        $this->load->library('Facebooklib');
        $this->session->set_userdata( 'facebook_domain', $_GET['url'] );
        $this->session->set_userdata( 'user_id', $_GET['user_id'] );
        $auth_url = $this->facebooklib->createAuthorizationURL();
        redirect($auth_url);
    }

    public function redirectOnFacebookToGetAccessToken(){
        $this->load->library('Facebooklib');
        if(isset($_GET['code'])){
            $date = date('Y-m-d H:i:s');
            $userID = $this->session->userdata( 'user_id' );
            $result = $this->facebooklib->generateAccessToken( $_GET['code'] );
            /* Store in database */
            if($result['status']){
                $access_token = $result['token'];
                $data = array( 
                    'user_id' => $userID,
                    'key' => 'FacebookAccessToken', 
                    'value' => json_encode($access_token), 
                    'isCreated' => $date,
                    'isUpdated' => $date,
                    'status' => 1 
                );
                $this->Common_DML->put_data( TBL_USER_SETTINGS, $data );
                
                $this->facebooklib->setAccessToken($access_token);
                $userinfo = $this->facebooklib->getUserInfo();
                $data = array( 
                    'user_id' => $userID,
                    'key' => 'FacebookUserInfo', 
                    'value' => json_encode($userinfo), 
                    'isCreated' => $date,
                    'isUpdated' => $date,
                    'status' => 1 
                );
                $this->Common_DML->put_data( TBL_USER_SETTINGS, $data );
            }

            $domain = $this->session->userdata( 'facebook_domain' );

            redirect($domain . 'facebook/redirect');

        }else{
            echo 'Access deny';
        }
    }

    public function scheduleArticle(){
        $where = array( 'status' => 1, 'schedule_date' => date('Y-m-d'), 'schedule_time <=' => date('H:i:00') );
        $schedule_sites = $this->Common_DML->get_data( TBL_SITE_SCHEDULE_ARTICLES, $where, '*' );
        if(!empty($schedule_sites)){
            foreach ($schedule_sites as $site) {
                $date = date('Y-m-d H:i:s');
                $arr = array(
                    's_id' => $site['s_id'],
                    'article_id' => $site['article_id'],
                    'article_name' => $site['article_title'],
                    'article_content' => $site['article_content'],
                    'isCreated' => $date,
                    'isUpdated' => $date,
                    'status' => 1
                );
                $this->Common_DML->put_data( TBL_SITES_ARTICLE, $arr );

                $what = array( 'status' => 0 );
                $where = array( 'ssa_id' => $site['ssa_id'] );
                $this->Common_DML->set_data( TBL_SITE_SCHEDULE_ARTICLES, $what, $where );

                if($site['share_facebook']){
                    $this->load->library('Facebooklib');
                    $userID = $site['user_id'];
                    $where = array(
                        'user_id' => $userID,
                        'key' => 'FacebookAccessToken',
                        'status' => 1
                    );
                    $facebook = $this->Common_DML->get_data( TBL_USER_SETTINGS, $where, '*' );
                    if(!empty($facebook)){
                        $page_id = $site['facebook_page_id'];
                        $access_token = json_decode( $facebook[0]['value'], true );
                        $this->facebooklib->setAccessToken($access_token);
                        $pageToken = $this->facebooklib->getPageAccessToken($page_id);
                        $share = $this->facebooklib->createPost($page_id, $pageToken, array(
                            'message' => strip_tags($site['article_title'].' - '.$site['article_content'])
                        ));

                    }
                }
            }
        }
    }

    public function scheduleSendEmail(){
        $userEmail = 'support@pushbutton-vip.com';
        echo $date = date('Y-m-d H:i:s');
        $sql = "SELECT * FROM `follow_up_mail` WHERE send_status = 0 AND send_time <= '{$date}'";
        $email = $this->Common_DML->query( $sql );
        $recipient_emails = array();
        for ($i=0; $i <count($email) ; $i++) {            
            $recipient_emails[] = $email[$i]['sub_email'];
            $subject = $email[$i]['subject'];
            $content = $email[$i]['content'];               
        }
        //print_r($recipient_emails);
        if(!empty($recipient_emails)){
            $this->load->helper( 'aws_helper' );
            global $amazonKey, $amazonSecretKey, $amazonRegion;
            $amazonKey = 'AKIAXOVXXFBHN5NZGZGG';
            $amazonSecretKey = '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';
            $amazonRegion = 'us-west-2';
            $r = sendMailAws($userEmail, $recipient_emails, $subject, $content);
            print_r($r);          
        } 
    }

    public function unsubscribeemails($email = ''){
        if($email == ''){
            redirect(base_url());
            die();
        }
        $email = urldecode($email);
        $sub_email = base64_decode($email);
        $where = array( 'sub_email' => $sub_email );
        $this->Common_DML->delete_data( FOLLOW_UP_MAIL, $where );
        $this->load->view('unsubscribe');        
    }


}
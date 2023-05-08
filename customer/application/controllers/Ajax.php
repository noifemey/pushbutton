<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function __construct() {
		parent::__construct();
    }

    public function index(){
		echo 'We are here..';
    }
    
    public function analytics(){
        if(!empty($_POST['site_id']) && !empty($_POST['user_id'])){
          $sql = "UPDATE " . TBL_ANALYTICS . " SET unique_page_view = unique_page_view + 1 WHERE s_id = {$_POST['site_id']}";
          $articles = $this->Common_DML->query( $sql, false );
          echo json_encode( array( 'status' => 1, 'msg' => '' ) );
        }
    }
    
    public function load_more_articles(){
        $subDomain = str_replace('.pushbutton-vip.com', '' , $_SERVER['HTTP_HOST']);
        $where = array( 'status' => 1, 'sub_domain' => $subDomain );
        $sites = $this->Common_DML->get_data( TBL_SITES, $where);
        $data['sites'] = $sites;
        $s_id = $sites[0]['s_id'];

        if(isset($_POST['page'])){
            $page =  $_POST['page'];
            if (!empty($page)) {
                $page = $_POST['page'];
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
            $html = '';
            $html .= '<div class="col-lg-12 col-md-12">
                        <div class="rcs_blog_box">
                                                <div class="rcs_blog_img">
                            <a href="base_url().site/article/"><img src="uploads/user_60/images/95bc4508.png" alt=""></a>
                        </div>
                        
                        <div class="rcs_blog_content">
                            <a href="https://dfykuldeep.pushbutton-vip.com/site/article/307" style="font-weight: 300;font-family: Abril Fatface ;color: #717091;font-style: normal;" class="rcs_post_title">3 Reasons Why Forgiveness Can Seem Impossible</a>

                            <div class="rcs_blog_des" style="font-weight: 300;font-family: Abril Fatface;color: #a1a3ce;font-style: normal;">WE may wonder why forgiveness is so hard, and there are many reasons why. But there are some reasonable reasons why forgiveness becomes improbable....</div> 
                                <a href="https://dfykuldeep.pushbutton-vip.com/site/article/307" class="rcs_read_more" style="color: #e51b1b" ;="">Read More<i class="fas fa-caret-right"></i></a>
                                
                            </div>
                        </div>
                    </div>';

        }

        echo json_encode( array( 'status' => 1, 'msg' => '' ) );
    }
      
    public function leads(){
        if(!empty($_POST['name']) && !empty($_POST['email'])){
            
            $where = array( 'email' => $_POST['email'], 'user_id' => $_POST['user_id'], 's_id' => $_POST['site_id'] );
            $result = $this->Common_DML->get_data( TBL_LEAD_GENERATION, $where, '*' );
            // echo $this->db->last_query();
            // print_r($_POST);
            // die;
            
            if(!empty($result) && count($result) == 1){
                echo json_encode( array( 'status'=>0, 'msg'=> 'Email is alrdfgsdfgsdfeady used, Please use different email.','url' => '' ) );
                die();
            }

            $where = array( 'status' => 1, 's_id' => $_POST['site_id'], 'user_id' => $_POST['user_id'] );
            $sites = $this->Common_DML->get_data( TBL_SITES, $where);
            $data['sites'] = $sites;
    
            $autoresponder = json_decode($sites[0]['autoresponder'], true);
            $msg = ''; $url = '';

            if($_POST['form'] == 'sidebar'){
                if(!empty($autoresponder['sidebar_thankyou_message'])){
                    $msg = $autoresponder['sidebar_thankyou_message'];
                }
                if(!empty($autoresponder['sidebar_btn_redirect_link'])){
                    $url = $autoresponder['sidebar_btn_redirect_link'];
                }
            }else if($_POST['form'] == 'header'){
                if(!empty($autoresponder['header_thankyou_message'])){
                    $msg = $autoresponder['header_thankyou_message'];
                }
                if(!empty($autoresponder['header_btn_redirect_link'])){
                    $url = $autoresponder['header_btn_redirect_link'];
                }
            }else{
                if(!empty($autoresponder['sliding_thankyou_message'])){
                    $msg = $autoresponder['sliding_thankyou_message'];
                }
                if(!empty($autoresponder['sliding_btn_redirect_link'])){
                    $url = $autoresponder['sliding_btn_redirect_link'];
                }
            }    

            addListInAutoresponder( $_POST['user_id'], array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'autoresponder' => $autoresponder['autoresponder_name'],
                'listID' => $autoresponder['mailing_list_id'],
            ) );

            $date = date('Y-m-d H:i:s');
            $mdata = array(          
                's_id' => $_POST['site_id'],
                'user_id' => $_POST['user_id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'isCreated' => date('Y-m-d H:i'),
                'isUpdated' => $date,
                'status' => 1
            );
            $lead_id = $this->Common_DML->put_data( TBL_LEAD_GENERATION , $mdata );
            $insert_id = $lead_id;
            if(!empty($lead_id)){
                $s_id = $_POST['site_id'];
                $user_id = $_POST['user_id'];
                $sub_email = $_POST['email'];

                $where = array('lg_id' => $lead_id, 'sub_email' => $sub_email );
                $checkMail = $this->Common_DML->get_data( FOLLOW_UP_MAIL, $where, '*' );

                if(!empty($result) && count($result) == 1){
                    echo json_encode( array( 'status'=>0, 'msg'=> 'This Email is already schedule, Please use different email.','url' => '' ) );
                    die();
                }else{

                    $where = array( 'wc_id' => $sites[0]['category_id'] );
                    $result = $this->Common_DML->get_data( TBL_SITE_SCHEDULE_EMAILS, $where, '*' );
                    $date = date('Y-m-d H:i:s');
                    for ($i=0; $i<count($result) ; $i++) {
                        $mdata = array(          
                            'am_id' => 0,
                            'lg_id' =>  $insert_id,
                            'sub_email' => $_POST['email'],
                            'subject' => $result[$i]['subject'],
                            'content' =>  $result[$i]['content'],
                            'send_time' => $date, 
                            'send_status' => 0, 
                            'isCreated' => $date,
                            'isUpdated' => $date,
                            'status' => 1
                        );
                        $lead_id = $this->Common_DML->put_data( FOLLOW_UP_MAIL , $mdata );
                    }

                    // $where = array( 's_id' => $s_id , 'user_id' => $user_id );
                    // $result = $this->Common_DML->get_data( AUTOMATION, $where, '*' );
                
                    // if(empty($result) && count($result) == 0){
                    //     echo json_encode( array( 'status'=>0, 'msg'=> 'This site mail automation not schedule, Please schedule mail.','url' => '' ) );
                    //     die();
                    // }else{

                    //     $mailData = json_decode($result[0]['email_data'], true);
                    //     $t = $result[0]['schedule_interval'];
                    //     $date = date('Y-m-d H:i:s');
                    //     $my_date_time = '';
                    //     for ($i=0; $i<count($mailData) ; $i++) {

                    //         if($i == 0){
                    //             $my_date_time = $date;
                    //         }else{
                    //             $my_date_time = date('Y-m-d H:i:s', strtotime($my_date_time.'+'.$t.' hour'));
                    //         }                            
                    //         $mdata = array(          
                    //             'am_id' => $result[0]['am_id'],
                    //             'lg_id' =>  $insert_id,
                    //             'sub_email' => $_POST['email'],
                    //             'subject' => $mailData[$i]['subject'],
                    //             'content' =>  $mailData[$i]['content'],
                    //             'send_time' => $my_date_time, 
                    //             'send_status' => 0, 
                    //             'isCreated' => $date,
                    //             'isUpdated' => $date,
                    //             'status' => 1
                    //         );
                    //         $lead_id = $this->Common_DML->put_data( FOLLOW_UP_MAIL , $mdata );
                    //     }
                    // }
                }
            }
            
            echo json_encode( array( 'status' => 1, 'msg' => $msg, 'url' => $url) ); 
            die();
        }
    }

}    

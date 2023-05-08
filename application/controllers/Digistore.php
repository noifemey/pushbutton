<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
define( 'IPN_PASSPHRASE', '9fpX0[Y]?e9(**942' );
define("Gmember",true);

class Digistore extends CI_Controller {

    function __construct() {
		parent::__construct();
		$this->load->database();
    }

    public function index(){

        //Log Values

        $mylogs = "digistore_logs.txt";
        $post_json = json_encode($_POST);
        $get_json = json_encode($_GET);
        file_put_contents($mylogs, "POST Values: " . $post_json.PHP_EOL, FILE_APPEND);
        file_put_contents($mylogs, "GET Values: " . $get_json.PHP_EOL, FILE_APPEND);

        $order_array = $_POST;
        $received_signature = empty($_POST[ 'sha_sign' ]) ? '' : $_POST[ 'sha_sign' ];
        $expected_signature = $this->digistore_signature( IPN_PASSPHRASE, $order_array);
        $sha_sign_valid = $received_signature == $expected_signature;

        if (!$sha_sign_valid){
            file_put_contents($mylogs, "ERROR: We could not verify your order.", FILE_APPEND);
            die('ERROR: We could not verify your order.');
        } 

        $myFile = "ds_debug_sale.txt"; 
        if($order_array['event'] == "on_payment"){
            if($order_array['pay_sequence_no'] > 1){
                $myFile = "ds_debug_rebill.txt";
            }else{
                $myFile = "ds_debug_sale.txt";
            }
        }

        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, "[".$post_json . ",".$get_json."]");
        fclose($fh);

        
        $itemID = isset($_GET['item']) ? $_GET['item'] : "";
        $email = isset($order_array['buyer_email']) ? $order_array['buyer_email'] : "";
        $receipt = isset($order_array['order_id']) ? $order_array['order_id'] : "";
        $name = isset($order_array['buyer_first_name']) ? $order_array['buyer_first_name'] . " " . $order_array['buyer_last_name'] : "";
        $amount = isset($order_array['transaction_amount']) ? $order_array['transaction_amount'] : "";
        $productTitle = isset($order_array['product_name']) ? $order_array['product_name'] : "";
        $transactionID = isset($order_array['transaction_id']) ? $order_array['transaction_id'] : "";
        $purchaseID = isset($order_array['purchase_key']) ? $order_array['purchase_key'] : "";
        $affiliate = isset($order_array['affiliate_id']) ? $order_array['affiliate_id'] : "";


        $status = 1;
        $transactionType = "";

        if(isset($order_array['event'])){
            if($order_array['event'] == "on_payment"){
                if($order_array['pay_sequence_no'] > 1){
                    $transactionType = "BILL";
                }else{
                    $transactionType = "SALE";
                }
                $status = 1;
            }elseif($order_array['event'] == "on_rebill_resumed"){
                $transactionType = "SALE";
                $status = 1;
            }elseif($order_array['event'] == "on_rebill_cancelled"){
                $transactionType = "CNCL";
                $status = 0;
            }elseif($order_array['event'] == "on_refund"){
                $transactionType = "RFND";
                $status = 0;
            }elseif($order_array['event'] == "on_payment_missed"){
                $transactionType = "on_payment_missed";
                $status = 0;
            }elseif($order_array['event'] == "on_chargeback"){
                $transactionType = "CHBK";
                $status = 0;
            }else{
                $transactionType = $order_array['event'];
                $status = 1;
            }
        }
        //check if already exist
		$result = $this->Common_DML->get_data( TBL_USERS, array( 'email' => $email ), '*' );
		$date = date('Y-m-d H:i:s');
        $userID = 0;
        if($result){
            $userID = $result[0]['user_id'];
        }

        $order_data = array(
            'userID' => $userID,
            'name' => $name,
            'email' => $email,
            'receipt' => $receipt,
            'item' => $itemID,
            'time' => time(),
            'amount' => $amount,
            'status' => $status,
            'action' => $transactionType,
            'merchant' => 'Digistore24',
            'affiliate' => $affiliate,
            'transactionID' => $transactionID,
            'purchaseID' => $purchaseID,
            'details' => $post_json,
            'isCreated' => $date,
            'isUpdated' => $date
        );
        file_put_contents($mylogs, "Order DATA: " . json_encode($order_data).PHP_EOL, FILE_APPEND);
        
        try {

            $order_id = $this->Common_DML->put_data( 'digistore_orders', $order_data );
            
            //$this->db->trans_start(FALSE);
            //$this->db->insert('digistore_orders',$order_data);
            //$this->db->trans_complete();

            $str = $this->db->last_query();
            file_put_contents($mylogs, "Order ID: " . $order_id.PHP_EOL, FILE_APPEND);
            file_put_contents($mylogs, "Last Query: " . $str.PHP_EOL, FILE_APPEND);
            
            // $db_error = $this->db->error();
            // if (!empty($db_error)) {
            //     file_put_contents($mylogs, 'Database error! [' . json_encode($db_error) . ']' .PHP_EOL, FILE_APPEND);
            //     return false; // unreachable retrun statement !!!
            // }else{
            //     //$order_id = $this->db->insert_id();
            // }
            
            //return TRUE;
            die("OK");
                            // die( "OK
                            //     thankyou_url: 'http://pushbutton-vip.com/digistore/typage'
                            //     reciept: $receipt" );
                            
        } catch (Exception $e) {
            file_put_contents($mylogs, 'error: ' . $e->getMessage().PHP_EOL, FILE_APPEND);
            die( "OK");
        }
    }


    private function digistore_signature( $sha_passphrase, $parameters, $convert_keys_to_uppercase = false, $do_html_decode=false ){

        $algorythm           = 'sha512';
        $sort_case_sensitive = true;
        if (!$sha_passphrase){
            return 'no_signature_passphrase_provided';
        }
        unset( $parameters[ 'sha_sign' ] );
        unset( $parameters[ 'SHASIGN' ] );
        if ($convert_keys_to_uppercase){
            $sort_case_sensitive = false;
        }

        $keys = array_keys($parameters);
        $keys_to_sort = array();
        foreach ($keys as $key){
            $keys_to_sort[] = $sort_case_sensitive
                ? $key
                : strtoupper( $key );
        }

        array_multisort( $keys_to_sort, SORT_STRING, $keys );
        $sha_string = "";

        foreach ($keys as $key){

            $value = $parameters[$key];
            if ($do_html_decode) {
                $value = html_entity_decode( $value );
            }
            $is_empty = !isset($value) || $value === "" || $value === false;
            if ($is_empty){
                continue;
            }
            $upperkey = $convert_keys_to_uppercase
                ? strtoupper( $key )
                : $key;
            $sha_string .= "$upperkey=$value$sha_passphrase";
        }

        $sha_sign = strtoupper( hash( $algorythm, $sha_string) );
        return $sha_sign;
    }


    public function signup(){
		$this->load->view('digisignup');
    }

    
    public function typage(){
        $mylogs = "ty_logs.txt";
        $post_json = json_encode($_POST);
        $get_json = json_encode($_GET);
        file_put_contents($mylogs, "POST Values: " . $post_json.PHP_EOL, FILE_APPEND);
        file_put_contents($mylogs, "GET Values: " . $get_json.PHP_EOL, FILE_APPEND);
        
        $email = $_GET["buyer_email"];
        
		$result = $this->Common_DML->get_data( "digistore_orders", array( 'email' => $email ), '*', array(0,1), array('order_id' => 'DESC') );
		
        $data["result"] = $result;
        $data["get_json"] = $get_json;
		
		$this->load->view('digitypage', $data );
    }
    

    public function test(){
		$date = date('Y-m-d H:i:s');
		$data = '{"add_url":"https:\/\/www.digistore24.com\/order\/add\/4393FDQJ\/FPXFDVCY","address_city":"","address_company":"","address_country":"PH","address_country_name":"Philippines","address_first_name":"Noifemey","address_id":"25444657","address_last_name":"W","address_mobile_no":"","address_phone_no":"","address_salutation":"","address_salutation_name":"","address_state":"","address_street":"","address_street2":"","address_street_name":"","address_street_number":"","address_tax_id":"","address_title":"","address_zipcode":"2600","affiliate_id":"","affiliate_name":"","amount":"127.00","amount_affiliate":"0.00","amount_brutto":"127.00","amount_credited":"0.00","amount_fee":"0.00","amount_main_affiliate":"0.00","amount_netto":"127.00","amount_partner":"0.00","amount_payout":"115.97","amount_provider":"11.03","amount_vat":"0.00","amount_vendor":"115.97","api_mode":"test","billing_city":"","billing_company":"","billing_country":"PH","billing_first_name":"Noifemey","billing_id":"25444657","billing_last_name":"W","billing_mobile_no":"","billing_phone_no":"","billing_salutation":"","billing_salutation_name":"","billing_state":"","billing_status":"completed","billing_street":"","billing_street2":"","billing_street_name":"","billing_street_number":"","billing_tax_id":"","billing_title":"","billing_type":"single_payment","billing_zipcode":"2600","buyer_address_city":"","buyer_address_company":"","buyer_address_country":"PH","buyer_address_id":"25444657","buyer_address_mobile_no":"","buyer_address_phone_no":"","buyer_address_state":"","buyer_address_street":"","buyer_address_street2":"","buyer_address_tax_id":"","buyer_address_zipcode":"2600","buyer_email":"noifemey6@gmail.com","buyer_first_name":"Noifemey","buyer_id":"21715782","buyer_language":"en","buyer_last_name":"W","campaignkey":"","click_id":"","country":"PH","currency":"USD","custom":"","custom_key":"21715782-2l9G4wcJTdgn","customer_affiliate_name":"user21715782","customer_affiliate_promo_url":"https:\/\/www.digistore24.com\/redir\/461820\/user21715782\/","email":"noifemey6@gmail.com","first_amount":"127.00","first_vat_amount":"0.00","has_custom_forms":"N","invoice_url":"https:\/\/www.digistore24.com\/invoice\/4393FDQJ\/0\/FPXFDVCY.pdf","ipn_config_id":"195651","ipn_config_product_ids":"all","ipn_version":"1.6","is_gdpr_country":"N","is_payment_planned":"N","item_count":"1","language":"en","language_name":"English","license_accessdata_keys":"","merchant_id":"1956173","merchant_name":"thriivetank","monthly_amount":"0.00","monthly_vat_amount":"0.00","newsletter_choice":"none","newsletter_choice_msg":"No entry","number_of_installments":"1","order_date":"2022-11-16","order_date_time":"2022-11-16 07:34:58","order_details_url":"https:\/\/www.digistore24-app.com\/vendor\/reports\/transactions\/order\/4393FDQJ","order_id":"4393FDQJ","order_item_id":"38489774","order_time":"07:34:58","order_type":"regular","orderform_id":"","other_amounts":"0.00","other_vat_amounts":"0.00","parent_transaction_id":"","pay_method":"test","pay_sequence_no":"0","payment_id":"PAYID-34-T60875822","payplan_id":"921204","product_amount":"127","product_delivery_type":"digital","product_id":"461820","product_language":"en","product_name":"OPS Automation","product_name_intern":"UP 3 - OPS Automation","product_netto_amount":"127","product_shipping_amount":"0","product_txn_amount":"127","product_txn_netto_amount":"127","product_txn_shipping":"0","product_txn_vat_amount":"0","product_vat_amount":"0","purchase_key":"FPXFDVCY","quantity":"1","rebill_stop_noted_at":"","rebilling_stop_url":"","receipt_url":"https:\/\/www.digistore24.com\/receipt\/461820\/4393FDQJ\/FPXFDVCY","refund_days":"60","renew_url":"https:\/\/www.digistore24.com\/renew\/4393FDQJ\/FPXFDVCY","request_refund_url":"https:\/\/www.digistore24.com\/order\/cancel\/4393FDQJ\/W6MV2Z36","salesteam_id":"","salesteam_name":"","support_url":"https:\/\/www.digistore24.com\/support\/4393FDQJ\/FPXFDVCY","switch_pay_interval_url":"https:\/\/www.digistore24.com\/order\/switch\/4393FDQJ\/FPXFDVCY","tag":"","tags":"","trackingkey":"","transaction_amount":"127.00","transaction_currency":"USD","transaction_date":"2022-11-16","transaction_id":"60875822","transaction_time":"07:34:59","transaction_type":"payment","transaction_vat_amount":"0.00","upgrade_key":"o8ol4KfIuYEg","upsell_no":"0","upsell_path":"","vat_amount":"0.00","vat_rate":"0.00","voucher_code":"","function_call":"on_payment","event":"on_payment","event_label":"payment","sha_sign":"4F90B37C6DCF2E980C89A68DE3A48CA9308F8662BF179858E45C1407F82FBB71B07AE35947FB8AEAFDEE1BFDF45E908E4F45F93AA16D4946DF45F8CE23E4E445"}';

        $order_data = array(
            'userID' => 0,
            'name' => "Noifemey W",
            'email' => "noifemey6@gmail.com",
            'receipt' => "4393FDQJ",
            'item' => 0,
            'time' => time(),
            'amount' => "127.00",
            'status' => 1,
            'action' => "SALE",
            'merchant' => 'Digistore24',
            'affiliate' => "",
            'transactionID' => "60875822",
            'purchaseID' => "FPXFDVCY",
            'details' => $data,
            'isCreated' => $date,
            'isUpdated' => $date
        );

        file_put_contents($mylogs, "Order DATA: " . json_encode($order_data).PHP_EOL, FILE_APPEND);
        
        try {
            $order_id = $this->Common_DML->put_data( 'digistore_orders', $order_data );
            
            //$this->db->trans_start(FALSE);
            //$this->db->insert('digistore_orders',$order_data);
            //$this->db->trans_complete();

            $db_error = $this->db->error();
            if (!empty($db_error)) {
                file_put_contents($mylogs, 'Database error! [' . json_encode($db_error) . ']' .PHP_EOL, FILE_APPEND);
                return false; // unreachable retrun statement !!!
            }else{
                //$order_id = $this->db->insert_id();
                $str = $this->db->last_query();
                file_put_contents($mylogs, "Order ID: " . $order_id.PHP_EOL, FILE_APPEND);
                file_put_contents($mylogs, "Last Query: " . $str.PHP_EOL, FILE_APPEND);
            }
            return TRUE;
        } catch (Exception $e) {
            file_put_contents($mylogs, 'error: ' . $e->getMessage().PHP_EOL, FILE_APPEND);
            return false;
        }

    }

}
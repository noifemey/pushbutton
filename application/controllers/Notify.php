<?php
class Notify extends CI_Controller{
    public function index(){
		$this->load->view('welcome_message');
    }

    public function warriorplus(){

        //print_r($_POST);
        if(isset($_POST['WP_BUYER_EMAIL'])){
            $product_id = $_POST['WP_ITEM_NUMBER'];
            $email = $_POST['WP_BUYER_EMAIL'];
            $name = $_POST['WP_BUYER_NAME'];
			
            // $product_id = 'wso_b4dvq2';
            // $email = 'sheenlight216@gmail.com';
            // $name = 'Sheen Galaroza';

            $fmember = $this->Common_DML->get_data( TBL_USERS, array( 'email' => $email ), 'access_level, user_id' );
            $ot_product = $this->Common_DML->get_data( TBL_RCS_PRODUCT, array( 'wp_product_id LIKE' => "%{$product_id}%" ), '*' );
			// print_r($ot_product[0]['rp_id']);
			// die();
            if(empty($ot_product)){
                echo 'Product Not found';
                die();
            }

            $date = date('Y-m-d H:i:s');

            $ur_data = array(
                'recdata' => json_encode($_POST),
                'payment' => isset($_POST['WP_SALE_AMOUNT']) ? $_POST['WP_SALE_AMOUNT'] : '0',
                'product_id' => $product_id,
                'recdate' => $date,
                'recsource' => 'warriorplus'
            );

            $this->Common_DML->put_data( 'user_records', $ur_data );

            $products = array( $ot_product[0]['rp_id'] );
            $mail_conten = $ot_product[0]['mail_content'];
            
            //$randPwd = random_generator(0, 6);
            $randPwd = 'PUSH-Bu770n$!';
            $fullname = trim($name) != '' ? $name : explode('@',$email)[0];
            
            
            $mdata = array(
                'parent_id' => 0,
                'source' => 'WarriorPlus',
                'name' => $fullname,
                'email' => $email,
                'password' => md5($randPwd),
                'access_level' => json_encode( $products ),
                'role' => 1,
                'isCreated' => $date,
                'isUpdated' => $date,
                'status' => 1
            );
            
            $replaces = array(
                '{member_name}' => $mdata['name'],
                '{login_url}' => 'http://pushbutton-vip.com/',
                '{member_email}' => $mdata['email'],
                '{member_password}' => $randPwd
            );

            if(!empty($fmember)){
                //update OTO
                if(!empty($fmember[0]['access_level'])){
                    $fop = json_decode($fmember[0]['access_level'], true);
                    if(!is_array($fop)) $fop = array( $fop );
                    if(!empty($fop)){
                        $products = array_merge( $products, $fop );
                    }
                }
                $udata = array(
                    'access_level' => json_encode( $products ),
                    'isUpdated' => $date
                );
                $userID = $fmember[0]['user_id'];
                $uwhere = array( 'user_id' => $userID );
                $this->Common_DML->set_data( TBL_USERS, $udata, $uwhere );
                $replaces['{member_password}'] = 'Password is not updated, you can use the previous password';
                $subject = 'Your Upgrade '.$ot_product[0]['product_name'].' Is Ready'; 
            }else{
                //Create User and set OTO
				$userID = $this->Common_DML->put_data( TBL_USERS, $mdata );
                create_directory($userID);   
                $subject = 'Welcome to Push Buttons';                            
            }

            $htmldata = file_get_contents( ROOTPATH . 'email_template/'.$mail_conten );

            simple_mail( $mdata['email'], $subject, $htmldata, $replaces );

            echo 'Yeah';

        }
    }

    public function explodely(){
        if(isset($_POST['customerEmail'])){
            $product_id = $_POST['productId'];
            $email = $_POST['customerEmail'];
            $name = $_POST['customerName'];
            $contactNumber = $_POST['customerPhone'];
			
            $fmember = $this->Common_DML->get_data( TBL_USERS, array( 'email' => $email ), 'access_level, user_id' );
            $ot_product = $this->Common_DML->get_data( TBL_RCS_PRODUCT, array( 'wp_product_id LIKE' => "%{$product_id}%" ), '*' );

            if(empty($ot_product)){
                echo 'Product Not found';
                die();
            }

            $date = date('Y-m-d H:i:s');

            $ur_data = array(
                'recdata' => json_encode($_POST),
                'payment' => isset($_POST['amount']) ? $_POST['amount'] : '0',
                'product_id' => $product_id,
                'recdate' => $date,
                'recsource' => 'explodely'
            );

            $this->Common_DML->put_data( 'user_records', $ur_data );

            $products = array( $ot_product[0]['access_level'] );
            $mail_conten = $ot_product[0]['mail_content'];
            
            //$randPwd = random_generator(0, 6);
            $randPwd = 'PUSH-Bu770n$!';
            $fullname = trim($name) != '' ? $name : explode('@',$email)[0];
            
            
            $mdata = array(
                'parent_id' => 0,
                'source' => 'Explodely',
                'name' => $fullname,
                'email' => $email,
                'contactNumber' => $contactNumber,
                'password' => md5($randPwd),
                'access_level' => json_encode( $products ),
                'role' => 1,
                'isCreated' => $date,
                'isUpdated' => $date,
                'status' => 1
            );
            
            $replaces = array(
                '{member_name}' => $mdata['name'],
                '{login_url}' => 'http://pushbutton-vip.com/',
                '{member_email}' => $mdata['email'],
                '{member_password}' => $randPwd
            );

            $userID = 0;
            if(!empty($fmember)){
                //update OTO
                if(!empty($fmember[0]['access_level'])){
                    $fop = json_decode($fmember[0]['access_level'], true);
                    if(!is_array($fop)) $fop = array( $fop );
                    if(!empty($fop)){
                        $products = array_merge( $products, $fop );
                    }
                }
                $udata = array(
                    'access_level' => json_encode( $products ),
                    'isUpdated' => $date
                );
                $userID = $fmember[0]['user_id'];
                $uwhere = array( 'user_id' => $userID );
                $this->Common_DML->set_data( TBL_USERS, $udata, $uwhere );
                $replaces['{member_password}'] = 'Password is not updated, you can use the previous password';
                $subject = 'Your Upgrade '.$ot_product[0]['product_name'].' Is Ready'; 
            }else{
                //Create User and set OTO
				$userID = $this->Common_DML->put_data( TBL_USERS, $mdata );
                create_directory($userID);   
                $subject = 'Welcome to Push Buttons';                            
            }


            //Save Order
            $order_data = array(
                'userID' => $userID,
                'name' => $_POST['customerName'],
                'email' => $_POST['customerEmail'],
                'receipt' => $_POST['orderid'],
                'item' => $_POST['type'],
                'time' => $_POST['saletimestamp'],
                'amount' => $_POST['amount'],
                'status' => 1,
                'action' => $_POST['type'],
                'merchant' => 'Explodely',
                'affiliate' => $_POST['affiliate'],
                'transactionID' => $_POST['orderid'],
                'purchaseID' => $_POST['productId'],
                'details' => json_encode( $_POST ),
                'isCreated' => $date,
                'isUpdated' => $date
            );
		    $orderID = $this->Common_DML->put_data( "orders", $order_data );

            $htmldata = file_get_contents( ROOTPATH . 'email_template/'.$mail_conten );

            simple_mail( $mdata['email'], $subject, $htmldata, $replaces );

            echo 'Yeah';

        }
    }

    function split_name($name) {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
        return array($first_name, $last_name);
    }

    public function clickbank(){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $DB_CONNECTION='mysqli';
        $DB_HOST='localhost';
        $DB_DATABASE='thriqyju_pushbutton';
        $DB_USERNAME='thriqyju_pushbutton';
        $DB_PASSWORD='y,UGL%6aI?id';

        $connection = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

        $productList = '[{"productID":2,"webinars":"","itemID":"1","productPrice":"67","productTitle":"Click Home Income Unlimited","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":6,"webinars":"","itemID":"2","productPrice":"67","productTitle":"Click Home Income DFY","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":7,"webinars":"","itemID":"3","productPrice":"47","productTitle":"Job Hunter Pro Upgrade","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":8,"webinars":"","itemID":"4","productPrice":"47","productTitle":"Multiple Streams of Income Mastereclass","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":9,"webinars":"","itemID":"5","productPrice":"47","productTitle":"Passive Income Masterclass","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":10,"webinars":"","itemID":"6","productPrice":"97","productTitle":"Click Home Income Reseller","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":11,"webinars":"","itemID":"1d","productPrice":"37","productTitle":"Click Home Income Unlimited (SAVE $30)","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":12,"webinars":"","itemID":"2d","productPrice":"37","productTitle":"Click Home Income DFY (SAVE $30)","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":13,"webinars":"","itemID":"3d","productPrice":"37","productTitle":"Job Hunter Pro Upgrade (SAVE $10)","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":14,"webinars":"","itemID":"4d","productPrice":"37","productTitle":"Multi Streams of Income Masterclass (SAVE $10)","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":15,"webinars":"","itemID":"5d","productPrice":"37","productTitle":"Passive Income Masterclass (SAVE $10)","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":16,"webinars":"","itemID":"6d","productPrice":"47","productTitle":"Click Home Income Reseller (SAVE $50)","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":17,"webinars":"","itemID":"fe-17","productPrice":"17","productTitle":"Click Home Income Main Membership","productSalesPage":"","productThanyouPage":"","productType":1,"productStatus":"active"},{"productID":18,"webinars":"","itemID":"fe-12","productPrice":"12","productTitle":"Click Home Income Main Membership (SAVE $5)","productSalesPage":"","productThanyouPage":"","productType":1,"productStatus":"active"},{"productID":19,"webinars":"","itemID":"8","productPrice":"17","productTitle":"Click Home Income Main Membership","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":20,"webinars":"","itemID":"8d","productPrice":"12","productTitle":"Click Home Income Main Membership (SAVE $5)","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"},{"productID":21,"webinars":"","itemID":"9","productPrice":"16.95","productTitle":"12 x Multiple Home Income Streams Masterclass Bundle Pack","productSalesPage":"","productThanyouPage":"","productType":0,"productStatus":"active"}]';
        $sanitizedData = '{
            "transactionTime":"20200913T120536-0700",
            "receipt":"123456789",
            "transactionType":"TEST_SALE",
            "vendor":"perpincome",
            "affiliate":"like2live",
            "role":"VENDOR",
            "totalAccountAmount":3.64,
            "paymentMethod":"VISA",
            "totalOrderAmount":9.56,
            "totalTaxAmount":0.56,
            "totalShippingAmount":0.00,
            "currency":"USD","orderLanguage":
            "EN","trackingCodes":["9_vsl_fe"],
            "lineItems":[{"itemNo":"3","productTitle":"Unlimited Sites & Features","shippable":false,"recurring":true,"accountAmount":3.64,"quantity":1,"paymentPlan":{"rebillStatus":"CANCELED","rebillFrequency":"MONTHLY","rebillAmount":47.00,"paymentsProcessed":2,"paymentsRemaining":997,"nextPaymentDate":"20201125T120536-0800"},
            "downloadUrl":"",
            "lineItemType":"ORIGINAL",
            "productPrice":9.00,
            "productDiscount":0.00,
            "affiliatePayout":3.64,
            "taxAmount":0.56,
            "shippingAmount":0.00,
            "shippingLiable":false}],
            "customer":{"shipping":{"firstName":"Cara","lastName":"Doskocil","fullName":"Cara Doskocil","email":"gualbertor60@gmail.com","address":{"county":"MILAM","state":"TX","postalCode":"76520","country":"US"}},"billing":{"firstName":"Cara","lastName":"Doskocil","fullName":"Cara Doskocil","email":"gualbertor60@gmail.com","address":{"state":"TX","postalCode":"76520","country":"US"}}},"upsell":{"upsellFlowId":44874,"upsellSession":"QTBI6NYZYX"},"version":7.0,"attemptCount":1,"vendorVariables":{"iv":"RkQwNTZBMDNDREQ1OTRGRQ%3D%3D","params":"iROUsyIWynOAxuvvB1g%2FXkt%2Fy%2FCX2cYlSKQyqV6ImZsp5Up4ZI6ptskHKr7Sp3xoj3HC%2Fa8sPGZa2visBVu%2FvxILeNLbj%2BDgAiKsMpkpPZY3SXPL6%2F4GYqwyorSLYgxsHFjzg3GqVAGTNu%2BNoIPGPBHGfq8EhamBamofs6dzHgTibwbzBfoB1bcBxK4VDw%2FI2svuISjtG9lgexY4uSQDoqtuta%2FKxcTROV7SNmav2bA9iQCmw7M15%2B%2FNrRr3ecsC4%2FThM%2FMWh83ymIvA2Tg5CD2Y0juKIvlFJDDuvxvoRlho0ZuvMIs1Qs0rtyGLHzEECZ2KUakqaqFnYtplt9FI0%2FN4zQIX%2B9TjnQMNN8JM5lk%3D"}
        }';
        $order = json_decode($sanitizedData);
        $customer = $order->customer;
        $email = $customer->billing->email;
        $receipt = $order->receipt;
        $name = $customer->billing->firstName . " " . $customer->billing->lastName;
        $amount = $order->totalOrderAmount;
        $transactionType = $order->transactionType;
        $roll = $order->role;
        $lineItems = $order->lineItems;
        //$itemNo = $order->lineItems->itemNo;
        // $password = md5($receipt);
        $password = "OP$ites321";
        $passwordHash = md5($password);
        $full_name = $customer->billing->fullName;
        $last_name = $customer->billing->lastName;
        $first_name = $customer->billing->firstName;

        if(!empty($order->affiliate)){
            $affiliate = $order->affiliate;
        }else{
            $affiliate = "";
        }
        $allowedTransactions = array("BILL","SALE","TEST_BILL","TEST_SALE","ABANDONED_ORDER","CANCEL-REBILL","CANCEL-TEST-REBILL");
        date_default_timezone_set('Asia/Singapore');
        if($transactionType == "ABANDONED_ORDER"){
            die();
        }
        //INSERTING USERS
        $users = mysqli_query($connection,"
		SELECT * FROM `users` WHERE `email`='".($email)."' 
		LIMIT 1") or die(mysqli_error($connection));
        if(mysqli_num_rows($users) == 0){
            mysqli_query($connection,"
            INSERT INTO `users` (`name`,`email`,`password`,`isCreated`,`status`,`role`,`source`,`access_level`) 
            VALUES ('".($full_name)."','".($email)."', 
            '".($passwordHash)."','" . date("Y-m-d H:i:s") . "','1','1','ClickBank','".json_encode(['1'])."')
            ") or die(mysqli_error($connection));

            $users = mysqli_query($connection,"
            SELECT * FROM `users` WHERE `email`='".($email)."' 
            LIMIT 1") or die(mysqli_error($connection));
            $user = mysqli_fetch_array($users);
            $userID = $user['id'];
        }else{
            $users = mysqli_query($connection, "
            SELECT * FROM `users` WHERE `email`='" . ($email) . "'
            LIMIT 1") or die(mysqli_error($connection));
            $user = mysqli_fetch_array($users);
            $userID = $user['user_id'];
            mysqli_query($connection, "
            UPDATE `users` SET `status`='1' WHERE `user_id`='$userID'
            ") or die(mysqli_error($connection));
        }
        //INSERTING ITEMS
        foreach($lineItems as $items => $item){

            $users = mysqli_query($connection,"
			SELECT * FROM `users` WHERE `email`='".($email)."'
			 LIMIT 1") or die(mysqli_error($connection));

            if(is_object($lineItems[$items])){
                $itemID = $lineItems[$items]->itemNo;

                $products = mysqli_query($connection,"
                    SELECT * FROM product_list  
                    WHERE `itemID`='$itemID' 
                    LIMIT 1
                ") or die(mysqli_error($connection));
            }

            $product = mysqli_fetch_array($products);
            $productTitle = $lineItems[$items]->productTitle;

            $orders = mysqli_query($connection,"
                SELECT * FROM `product_list` WHERE `itemID`='$itemID' LIMIT 1
                ") or die(mysqli_error($connection));

            if(
                $transactionType == "SALE" or
                $transactionType == "TEST_SALE" or
                $transactionType == "BILL" or
                $transactionType == "TEST_BILL" or
                $transactionType == "TEST"
            ){
                $status = "active";
            }else{
                $status = "inactive";
            }

            $user = mysqli_fetch_array($users);
            $userID = $user['user_id'];

            $usersProduct = mysqli_query($connection,"
                SELECT * FROM `users` WHERE `user_id`='".($userID)."' AND `access_level` LIKE '%".($itemID)."%'") or die(mysqli_error($connection));

            $productUser = mysqli_fetch_array($usersProduct);

            $userInfos = $this->Common_DML->query("SELECT * FROM users WHERE user_id = '".($userID)."'");

            $accessLevel = json_decode($userInfos[0]['access_level']);
            //BUY
            if($status == "active"){
                if(strpos($productUser['access_level'], $itemID) === false){
                    echo "Product not on User";
                    array_push($accessLevel, $itemID);
                    print_r(json_encode($accessLevel));
                    mysqli_query($connection,"
					UPDATE `users` SET `access_level` = '".json_encode($accessLevel)."' WHERE `user_id` = '".$userID."'
					") or die(mysqli_error($connection));
                }else{
                    echo "Product is on User";
                }
                /*if(strpos($productUser['access_level'], 5) === false){
                    echo "No 5";
                }else{
                    echo "Yes 5";
                }*/
            }
            //REFUND
            if($transactionType == "RFND" || $transactionType == "TEST_RFND"){

                if (($key = array_search($itemID, $accessLevel)) !== false) {
                    unset($accessLevel[$key]);
                }
                mysqli_query($connection,"
				UPDATE `users` SET `access_level` = '".json_encode($accessLevel)."' WHERE `user_id` = '".$userID."'
				") or die(mysqli_error($connection));
            }
        }
    }

    public function modifyTestAccount(){
        $DB_CONNECTION='mysqli';
        $DB_HOST='localhost';
        $DB_DATABASE='thriqyju_pushbutton';
        $DB_USERNAME='thriqyju_pushbutton';
        $DB_PASSWORD='y,UGL%6aI?id';

        $connection = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
        mysqli_query($connection,"
            UPDATE `users` SET `status` = '1', `role` = '1', `source` = 'ClickBank', `access_level` = '".json_encode(['1','2'])."'
            WHERE `email` = 'gualbertor60@gmail.com'
            ") or die(mysqli_error($connection));
    }

    public function checkTable(){
        $host = 'localhost';
        $user = 'thriqyju_pushbutton';
        $pass = 'y,UGL%6aI?id';
        $db = 'thriqyju_pushbutton';

        $mysqli = new mysqli($host, $user, $pass, $db);

        //show tables
        $result = $mysqli->query("SHOW TABLES from thriqyju_pushbutton");
        //print_r($result);
        while($tableName = mysqli_fetch_row($result))
        {
            $table = $tableName[0];
            echo '<h3>' ,$table, '</h3>';
            $result2 = $mysqli->query("SHOW COLUMNS from ".$table.""); //$result2 = mysqli_query($table, 'SHOW COLUMNS FROM') or die("cannot show columns");
            if(mysqli_num_rows($result2))
            {
                echo '<table cellpadding = "0" cellspacing = "0" class "db-table">';
                echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>';
                while($row2 = mysqli_fetch_row($result2))
                {
                    echo '<tr>';
                    foreach ($row2 as $key=>$value)
                    {
                        echo '<td>',$value, '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table><br />';
            }
        }
    }

    public function insertTable(){
        /*        $this->load->dbforge();
        // switch over to Library DB
        $this->db->query('use digiyebl_rcs');

        // define table fields
        $fields = array(
            'productID' => array(
                'type' => 'INT',
                'constraint' => 9,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'productPrice' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            ),
            'productTitle' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            ),
            'productSalesPage' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            ),
            'productThanyouPage' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            ),
            'productType' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            ),
            'productStatus' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            )
        );

        $field = array(
            'itemID' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            )
        );
        $this->dbforge->add_column('product_list', $field);*/
        //        $this->dbforge->add_field($fields);
        //
        //        // create table
        //        $this->dbforge->create_table('product_list');
    }

    public function selectAll(){
        $query = $this->Common_DML->query("SELECT * FROM product_list");
        print_r($query);

    }

    public function selectUser(){
        $query = $this->Common_DML->query("SELECT * FROM users WHERE email = 'gualbertor60@gmail.com'");
        print_r($query);
        echo $query[0]['email'];
    }

    public function testMail(){
        $to = 'imajayt@gmail.com';
        $subject = 'Welcome to Push Buttons';  
        $htmldata = file_get_contents( ROOTPATH . 'email_template/frontend.txt' );

        simple_mail( $to, $subject, $htmldata, array() );    
    }
}
?>
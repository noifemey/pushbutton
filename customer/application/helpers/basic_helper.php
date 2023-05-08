<?php
function getRnadomNumber(){
	$digits = 5;
	return rand(pow(10, $digits-1), pow(10, $digits)-1);
}

function isUrl($url){
	$regex = "((https?|ftp)\:\/\/)?"; // SCHEME
	$regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass
	$regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP
	$regex .= "(\:[0-9]{2,5})?"; // Port
	$regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path
	$regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query
	$regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor
	if(preg_match("/^$regex$/", $url)){
		return true;
	}else{
		return false;
	}
}

function remove_http($url) {
   $disallowed = array('http://', 'https://');
   foreach($disallowed as $d) {
      if(strpos($url, $d) === 0) {
         return str_replace($d, '', $url);
      }
   }
   return $url;
}

function random_generator($s = 0, $e = 8){
	$now = substr( md5(time().uniqid()), $s, $e );
	return $now;
}

function filename_withoutext( $filename ){
	$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
	return $withoutExt;
}

function super_unique($array){
  $result = array_map("unserialize", array_unique(array_map("serialize", $array)));
  return $result;
}

function get_first_letter( $str ){
	$acronym = "";
	if(!empty($str)){
		$words = explode(" ", $str);
	
		foreach ($words as $w) {
			$acronym .= isset($w[0]) ? $w[0] : '';
		}
	}
	return $acronym;
}

function remove_directory($directory, $folder = true){
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            remove_directory($file);
        } else {
            unlink($file);
        }
    }
    if($folder) rmdir($directory);
}

function file_get_contents_curl($url){
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

function create_directory( $insert_id ){
	$folder = 'user_'.$insert_id;
	if (!is_dir('uploads/'.$folder)) {
		mkdir('./uploads/' . $folder, 0777, TRUE);
		mkdir('./uploads/' . $folder . '/images', 0777, TRUE);
		//mkdir('./uploads/' . $folder . '/upload_video', 0777, TRUE);
		//mkdir('./uploads/' . $folder . '/upload_video/thumb', 0777, TRUE);
		//mkdir('./uploads/' . $folder . '/videos', 0777, TRUE);
	}
}

function getUserIpAddr(){
    $ipaddress = '';
	if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
		$ipaddress =  $_SERVER['HTTP_CF_CONNECTING_IP'];
	} else if (isset($_SERVER['HTTP_X_REAL_IP'])) {
		$ipaddress = $_SERVER['HTTP_X_REAL_IP'];
	}
	else if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if(isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';

	return $ipaddress;
}

/*
$mail = array(
	'to' => array(
		array('name' => $fullname, 'email' => $to) 
	),
	'subject' => $subject,
	'from_email' => $from_email,
	'from_name' => $from_name,
);
$attachments[] = array(
	'type' => $attachment['type'],
	'name' => $attachment['filename'],
	'content' => base64_encode( file_get_contents( $attachment['url'] ) )
);
*/
function send_mail_mandrill( $htmldata, $mail, $attachments = array(), $template_name = '', $replaces = array(), $api_key = '' ){
	include_once('mandrill/Mandrill.php');
	try {
		$mandrill = new Mandrill( $api_key );
		
		$message = array();
		
		if($htmldata == ''){
			$htmldata = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/email_template/' . $template_name );		
		}

		if(!empty($replaces)){
			foreach($replaces as $k=>$v){
				$htmldata = str_replace( $k, $v, $htmldata );
			}
		}
		
		$message = array(
			'html' => $htmldata,
			'subject' => $mail['subject'],
			'from_email' => $mail['from_email'],
			'from_name' => $mail['from_name'],
			'to' => $mail['to'],
			'headers' => array('Reply-To' => $mail['from_email'])
		);
		
		if(!empty($attachments)){
			
			foreach($attachments as $attachment){
				$mail_attachments[] = array(
					'type' => $attachment['type'],
					'name' => $attachment['filename'],
					'content' => base64_encode( file_get_contents( $attachment['url'] ) )
				);
			}
			
			$message['attachments']=$mail_attachments;
		}
		$async = true;
		$ip_pool = 'Main Pool';
		$send_at = null;
		$result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
		
		if(isset($result[0]['status']) && $result[0]['status'] == 'sent'){
			return $result[0]['email'];
		}else{
			return $result;
		}
	} catch(Mandrill_Error $e) {
		// Mandrill errors are thrown as exceptions
		return 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		// A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
		throw $e;
	}
}

function send_mail_smtp( $htmldata, $mail, $attachments = array(), $data, $replaces = array() ){
	try{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => $data['host'],
			'smtp_port' => $data['port'], //25,
			'smtp_timeout' => '20',
		);
		$config['smtp_user']=$data['username'];
		$config['smtp_pass']=$data['password'];
		$config['smtp_crypto']=$data['encryption'];
		$config['mailtype']="html";
		$config['charset'] = "utf-8";
		$config['newline'] = "\r\n";
	
	
		if(!empty($replaces)){
			foreach($replaces as $k=>$v){
				$htmldata = str_replace( $k, $v, $htmldata );
			}
		}
		
		$CI = get_instance();
		$CI->load->library('email');
		$CI->email->initialize($config);
		$CI->email->from($data['from_email'], $data['from_name']);
		$CI->email->to($mail['email']);
		$CI->email->subject($mail['subject']);
		$CI->email->message($htmldata);
		
		if(!empty($attachments)){
				
			foreach($attachments as $attachment){
				$CI->email->attach($attachment['url']);
			}
		}
		
		return $CI->email->send();	
	}catch(Exception $e){
		return false;	
	}
} 

function date_diffrence( $d1, $d2 ){
	$now = strtotime( $d1 ); // or your date as well
	$your_date = strtotime( $d2 );
	$datediff = $now - $your_date;

	return round($datediff / (60 * 60 * 24));
}

function dateTimeDiffrence($date1, $date2 = '' ){
	$date1 = strtotime($date1);
	$date2 = empty($date2) ? time() : strtotime($date2);
	// Formulate the Difference between two dates 
	$diff = abs($date2 - $date1);  	
	
	// To get the year divide the resultant date into 
	// total seconds in a year (365*60*60*24) 
	$years = floor($diff / (365*60*60*24));  	
	if($years) return $years.' Year ago';
	// To get the month, subtract it with years and 
	// divide the resultant date into 
	// total seconds in a month (30*60*60*24) 
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));  	
	if($months) return $months.' Months ago';
	
	// To get the day, subtract it with years and  
	// months and divide the resultant date into 
	// total seconds in a days (60*60*24) 
	$days = floor(($diff - $years * 365*60*60*24 -  $months*30*60*60*24)/ (60*60*24)); 	
	if($days) return $days.' Days ago';
	
	// To get the hour, subtract it with years,  
	// months & seconds and divide the resultant 
	// date into total seconds in a hours (60*60) 
	$hours = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24) / (60*60));  
	if($hours) return $hours.' Hours ago';	
	
	// To get the minutes, subtract it with years, 
	// months, seconds and hours and divide the  
	// resultant date into total seconds i.e. 60 
	$minutes = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24  - $hours*60*60)/ 60);  
	if($minutes) return $minutes.' Minutes ago';	
	
	// To get the minutes, subtract it with years, 
	// months, seconds, hours and minutes  
	$seconds = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));  
	if($seconds) return $seconds.' Seconds ago';

	return 'Few seconds ago';
}

function converTimeToSeonds( $str_time ){
	$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);

	sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

	$time_seconds = $hours * 3600 + $minutes * 60 + $seconds;

	return $time_seconds;
}

function encrypt_id($id = null){
	if(empty($id)){
		return 0;
	}
	$enc_id = $id*786;
	return rtrim(strtr(base64_encode($enc_id), '+/', '-_'), '=');
	//return base64_encode($enc_id);
}

function decrypt_id($id = null){
	if(empty($id)){
		return 0;
	}
	//$dec_id = base64_decode($id);
	$dec_id = base64_decode(str_pad(strtr($id, '-_', '+/'), strlen($id) % 4, '=', STR_PAD_RIGHT));
	$dec_id = $dec_id/786;
	return $dec_id;
}

function autoreponderConnect( $data ){
	require_once 'subscriber/subscriber.php';
	try{
		$subscriber = new xs_subscriber();
		$list = $subscriber->switch_responder($data['apikey'], 'getList', $data['responder']);
		if(!isset($list['error'])){
			$apidetails = $data['apikey'];
			if($data['responder'] == 'Aweber'){
				$apidetails = $list['data'];
			}
			return array( 'status' => 1, 'apidetails' => $apidetails );
		}else{
			return array( 'status' => 0, 'apidetails' => '' );
		}
	}catch( Exception $e ){
		return array( 'status' => 0, 'apidetails' => '' );
	}
}

function autoreponderGetList( $api, $responder ){
	require_once 'subscriber/subscriber.php';	
	$subscriber = new xs_subscriber();
	$list = $subscriber->switch_responder($api, 'getList', $responder);
	if(!isset($list['error'])){
		$listarray = array();
		foreach($list['list'] as $k=>$v){
			$listarray[] = array( 'list_name' => $v, 'list_value' => $k );		}
		
		return array( 'status' => 1, 'list' => $listarray );
	}else{
		return array( 'status' => 0, 'list' => '' );
	}
}

function autoreponderSubscribe( $api, $data ){
	require_once 'subscriber/subscriber.php';

	$_POST['name'] = $data['name'];
	$_POST['email'] = $data['email'];
	$_POST['listid'] = $data['listid'];
	
	$subscriber = new xs_subscriber();
	$list = $subscriber->switch_responder($api, 'subsCribe', $data['responder']);
	//echo json_encode($list);
	return $list;
}

function searchKey($id, $index, $array) {
	foreach ($array as $key => $val) {
		if ($val[$index] === $id) {
			return $key;
		}
	}
	return null;
}

function addListInAutoresponder($userID, $data){
	$CI = get_instance();
	$us = $CI->Common_DML->get_data( TBL_USER_SETTINGS, array(
		'key' => 'AutoresponderSettings',
		'user_id' => $userID
	), 'value' );

	if(!empty($us)){
		$api = json_decode( $us[0]['value'], true );
		$apiname = array_column($api, 'name');
		$listid = $data['listID'];
		$responder = $data['autoresponder'];
		$sendData = array(
			'name' => $data['name'],
			'email' => $data['email'],
			'listid' => $listid,
			'responder' => $responder
		); 
		$key = array_search( $responder, $apiname );
		if($key !== false && isset($api[$key])){
			$apivalue = $api[$key]['value'];
			autoreponderSubscribe( $apivalue, $sendData ); 
		}
	}
}

function sendDataToWebHook( $webhook, $data ){
	if(!empty($webhook)){
		$curl = curl_init();

		curl_setopt_array($curl, array(
				CURLOPT_URL => $webhook,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $data
			)
		);

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}
}

function simpleXmlToArray($xmlObject){
    $array = [];
        
	foreach ($xmlObject->children() as $node) {
		$attributes = [];

		if ($node->attributes()) {
			foreach ($node->attributes() as $name => $value) {
				$attributes[$name] = (string)$value;
			}
		}

		if ($node->children()->count() > 0) {
			$data = array_merge($attributes, simpleXmlToArray($node));

			if (isset($array[$node->getName()])) {
				if (!isset($array[$node->getName()][0])) {
					$entry = $array[$node->getName()];
					$array[$node->getName()] = [];
					$array[$node->getName()][] = $entry;
				}
				
				$array[$node->getName()][] = $data;
			} else {
				$array[$node->getName()] = $data;
			}
		} else {
			$array[$node->getName()] = (string)$node;
		}
	}
	
	return $array;
}

function createSubdomain( $subDomainName ){
	$check_domain = 'pushbutton-vip.com';
	$subdomain_url = $subDomainName;
	
	$cpaneluser = CPANEL_USERNAME;
	$cpanelpass = CPANEL_PASSWORD;
	$cpanel_skin = 'paper_lantern';
	$request = "/frontend/paper_lantern/subdomain/doadddomain.html?domain=".$subdomain_url."&rootdomain=".$check_domain."&dir=/pushbutton-vip.com/customer";	
	$result = '';
	$host = 'localhost';
	$sock = fsockopen($host,2082);
	$authstr = "$cpaneluser:$cpanelpass";
	$pass = base64_encode($authstr);
	$in = "GET $request\r\n";
	$in .= "HTTP/1.0\r\n";
	$in .= "Host:$host\r\n";
	$in .= "Authorization: Basic $pass\r\n";
	$in .= "\r\n";

	fputs($sock, $in);
	while (!feof($sock)) {
		$result .= fgets ($sock,128);
	}
	fclose( $sock );
	if( count(explode('has been created.',$result)) > 1 ) {
        $msg = 'Your domain added successfully.';    
		$s = 1;
    }else{
		$s = 0;
        if( count(explode('nameserver IP addresses',$result)) > 1 ){
            $msg  =  'We can\'t determine the nameserver IP addresses of this domain. Please make sure that the domain is registered with a valid domain registrar.';
        }else{
            $msg  =  'Please, update the A Record before adding the domain.';
        }
    }

    return array(
        'status' => $s,
        'msg' => $msg
    );
}

function removeSubdomain( $subdomain ){
	$cpaneluser=CPANEL_USERNAME;
	$cpanelpass=CPANEL_PASSWORD;
	$cpanel_skin = 'paper_lantern';
	$subdomain .= '_pushbutton-vip.com';
	//$request = "/frontend/paper_lantern/subdomain/dodeldomain.html?domain=".$subdomain;
	$request = "/frontend/paper_lantern/subdomain/dodeldomain.html?domain=".$subdomain;
									
	$result = '';
	$host = 'localhost';
	$sock = fsockopen($host,2082);
	$authstr = "$cpaneluser:$cpanelpass";
	$pass = base64_encode($authstr);
	$in = "GET $request\r\n";
	$in .= "HTTP/1.0\r\n";
	$in .= "Host:$host\r\n";
	$in .= "Authorization: Basic $pass\r\n";
	$in .= "\r\n";

	fputs($sock, $in);
	while (!feof($sock)) {
		$result .= fgets ($sock,128);
	}
	fclose( $sock );

	$q_res = explode('has been removed.',$result);

	if( count($q_res) > 1 ) {
        $output = array(
            'status'=>1,
            'msg'=>'Congratulations! You have removed the domain successfully.'
        );
    }else{
        $output = array(
            'status' => 0,
            'msg'=>'There is some internal error. We are not able to add the domain.'
        );
    }
    
    return $output;
}

function createAddonDomain( $Domain, $subDomainName ){
	$SubDomain = $subDomainName;
	$host = 'localhost';
	$cpaneluser = CPANEL_USERNAME;
	$cpanelpass = CPANEL_PASSWORD;

    $request = "/frontend/paper_lantern/addon/doadddomain.html?domain=".$Domain."&subdomain=".$SubDomain."&dir=/pushbutton-vip.com/customer";
    $result = '';
    
    $sock = fsockopen($host,2082);
    $authstr = "{$cpaneluser}:{$cpanelpass}";
    $pass = base64_encode($authstr);
    $in = "GET $request\r\n";
    $in .= "HTTP/1.0\r\n";
    $in .= "Host:{$host}\r\n";
    $in .= "Authorization: Basic $pass\r\n";
    $in .= "\r\n";
    fputs($sock, $in);
    while (!feof($sock)) {
        $result .= fgets ($sock,128);
    }
    fclose( $sock );
        //  print_r($result);die;
		$res_string = explode('has been created.', $result);
		$response = explode('HTTP/1.0 200 OK', $result);
		
    if( count($res_string) > 1 || count($response) > 1) {
        $msg = 'Your domain added successfully.';    
		$s = 1;
    }else{
		$s = 0;
        if( count(explode('nameserver IP addresses',$result)) > 1 ){
            $msg  =  'We can\'t determine the nameserver IP addresses of this domain. Please make sure that the domain is registered with a valid domain registrar.';
        }else{
            $msg  =  'Please, update the A Record before adding the domain.';
        }
    }

    return array(
        'status' => $s,
        'msg' => $msg
    );
}

function removeAddonDomain( $Domain, $subDomainName ){
    $SubDomain = $subDomainName . '.digitaldollarempire.com';
    $SubDomain_ = $subDomainName. '_digitaldollarempire.com';
    $host = 'localhost';
	$cpaneluser = CPANEL_USERNAME;
	$cpanelpass = CPANEL_PASSWORD;
    $request = "/frontend/paper_lantern/addon/dodeldomain.html?domain=".$Domain."&subdomain=".$SubDomain_."&fullsubdomain=".$SubDomain;
    $result = '';
   
    $sock = fsockopen($host,2082);
    $authstr = "$cpaneluser:$cpanelpass";
    $pass = base64_encode($authstr);
    $in = "GET $request\r\n";
    $in .= "HTTP/1.0\r\n";
    $in .= "Host:{$host}\r\n";
    $in .= "Authorization: Basic $pass\r\n";
    $in .= "\r\n";

    fputs($sock, $in);
    while (!feof($sock)) {
        $result .= fgets ($sock,128);
    }
    fclose( $sock );
    
    $q_res = explode('has been removed.',$result);
    
    if( count($q_res) > 1 ) {
        $output = array(
            'status'=>1,
            'msg'=>'Congratulations! You have removed the domain successfully.'
        );
    }else{
        $output = array(
            'status' => 0,
            'msg'=>'There is some internal error. We are not able to add the domain.'
        );
    }
    
    return $output;
}
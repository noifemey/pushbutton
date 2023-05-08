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

function simple_mail($to, $subject, $message, $replaces){

	if(!empty($replaces)){
		foreach($replaces as $k=>$v){
			$message = str_replace( $k, $v, $message );
		}
	}
	
	//$header = "From:".FROMMAIL." \r\n";
	$header = "From:".FROMNAME." <".FROMMAIL."> \r\n";
	$header .= "Reply-To: ".FROMMAIL."\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";
	
	$retval = mail ($to,$subject,$message,$header);
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
	return false;
}

function addListInAutoresponder($userID, $data){
	$CI = get_instance();
	$us = $CI->Common_DML->get_data( TBL_USER_SETTINGS, array(
		'key' => 'AutoresponderSettings',
		'user_id' => $userID
	), 'value' );

	if(!empty($us)){
		$api = json_decode( $us[0]['value'], true );
		$a__ = json_decode( $data['autoresponder'], true );
		$apiname = array_column($api, 'name');
		for($i=0;$i<count($a__);$i++){
			$listid = $a__[$i]['listID'];
			$responder = $a__[$i]['responder'];
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
// 	$check_domain = 'pushbutton-vip.com';
// 	$subdomain_url = $subDomainName;
	
// 	$cpaneluser = CPANEL_USERNAME;
// 	$cpanelpass = CPANEL_PASSWORD;
// 	$cpanel_skin = 'paper_lantern';
// 	$request = "/frontend/paper_lantern/subdomain/doadddomain.html?domain=".$subdomain_url."&rootdomain=".$check_domain."&dir=/pushbutton-vip.com/customer";	
// 	$result = '';
// 	$host = 'localhost';
// 	$sock = fsockopen($host,2082);
// 	$authstr = "$cpaneluser:$cpanelpass";
// 	$pass = base64_encode($authstr);
// 	$in = "GET $request\r\n";
// 	$in .= "HTTP/1.0\r\n";
// 	$in .= "Host:$host\r\n";
// 	$in .= "Authorization: Basic $pass\r\n";
// 	$in .= "\r\n";

// 	fputs($sock, $in);
// 	while (!feof($sock)) {
// 		$result .= fgets ($sock,128);
// 	}
// 	fclose( $sock );
// 	if( count(explode('has been created.',$result)) > 1 ) {
//         $msg = 'Your domain added successfully.';    
// 		$s = 1;
//     }else{
// 		$s = 0;
//         if( count(explode('nameserver IP addresses',$result)) > 1 ){
//             $msg  =  'We can\'t determine the nameserver IP addresses of this domain. Please make sure that the domain is registered with a valid domain registrar.';
//         }else{
//             // $msg  =  'You can\'t add domain as a sub-domain.';
//             $msg  =  'Please, Enter the valid Subdomain name.';
//         }
//     }

//     return array(
//         'status' => $s,
//         'msg' => $msg
//     );

    $check_domain = "pushbutton-vip.com";
	$cpaneluser = CPANEL_USERNAME;
	$cpanelpass = CPANEL_PASSWORD;
    
    $dataArray = ['domain' => $subDomainName, 'rootdomain' => $check_domain, 'dir' => "/pushbutton-vip.com/customer",'disallowdot' => 0];
    $data = http_build_query($dataArray);
    $getUrl = "https://premium203.web-hosting.com:2083/cpsess3811617208/execute/SubDomain/addsubdomain";
    $getUrl .= '?' . $data;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET' );
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_URL, $getUrl);
    //curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3000);
    curl_setopt($ch, CURLOPT_USERPWD, $cpaneluser . ":" . $cpanelpass);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    
    $return = curl_exec($ch);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        die($error_msg);
    }
    curl_close($ch);

    $response = json_decode($return);

    if($response->status == 1){
        $msg = 'Your domain added successfully.';    
		$s = 1;
    }else{
		$s = 0;
        $msg  =  $response->errors;
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
	$subdomain = strtolower($subdomain);
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
	//print_r($result);
	$q_res = explode('has been successfully removed.',$result);
	$q_res1 = explode('There was a problem removing the subdomain',$result);

	if( count($q_res) > 1 || count($q_res1) > 1 ) {
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

function get7article($category_name){

	$CI = get_instance($category_name);

	$page = 1;
	$start = $page;
	$end = 7;
	$category_name = urlencode($category_name);

	$query = "https://api.ezinearticles.com/api.php?search=articles&page={$start}&limit={$end}&response_format=json&category={$category_name}&key=".EZINEAPIKEY;
	$articles = file_get_contents($query);
	$ar = json_decode($articles, true);		

	$start = rand(1,$ar['response_info']['pages'] > 100 ? 100 : $ar['response_info']['pages'] );
	$end = 7;
	$category_name = urlencode($category_name);
	$query = "https://api.ezinearticles.com/api.php?search=articles&page={$start}&limit={$end}&response_format=json&category={$category_name}&key=".EZINEAPIKEY;
	$articles = file_get_contents($query);
	$ar = json_decode($articles, true);
	
	$pixabayAPIKEY = '20579593-4873d31d034f0a6adc36ba5b4';
	$page = 1;
	$start = $page;
	$end = 8;
	$url = "https://pixabay.com/api/?key={$pixabayAPIKEY}&response_group=high_resolution&q={$category_name}&pretty=true&safesearch=true&page={$start}&per_page={$end}";
	$images = file_get_contents_curl( $url );
	$img = json_decode($images, true);		

	$start = rand(1, (int) $img['totalHits'] / 8);
	$end = 8;
	$url = "https://pixabay.com/api/?key={$pixabayAPIKEY}&response_group=high_resolution&q={$category_name}&category={$category_name}&pretty=true&safesearch=true&page={$start}&per_page={$end}";
	$images = file_get_contents_curl( $url );
	$img = json_decode($images, true);		
	
	$article_images = array();
	for($i=0;$i<count($img['hits']);$i++){

		$userID = $CI->session->userdata( 'user_id' );
		$rootpath = $_SERVER['DOCUMENT_ROOT'];
		$name = random_generator();
		$name .= '.png';
		if($i == 8){
			$path = ROOTPATH . 'uploads/user_'.$userID.'/images/header/'.$name;
		}else{
			$path = ROOTPATH . 'uploads/user_'.$userID.'/images/'.$name;
		}
		$data = file_get_contents( $img['hits'][$i]['largeImageURL'] );
		
		$upload = file_put_contents( $path, $data);
		if($upload){
			if($i == 8){
				$fileurl = 'uploads/user_'.$userID.'/images/header/'.$name;
			}else{
				$fileurl = 'uploads/user_'.$userID.'/images/'.$name;
			}
			$original_name = basename($img['hits'][$i]['largeImageURL']);

			$resize = array();
			$resize['image_library'] = 'gd2';
			$resize['source_image'] = $path;
			$resize['create_thumb'] = TRUE;
			$resize['maintain_ratio'] = FALSE;
			$resize['width']     = 226;
			$resize['height']   = 140;
			$resize['new_image'] = $path;	

			$CI->load->library('image_lib');
			$CI->image_lib->clear();
			$CI->image_lib->initialize($resize);
			if ( ! $CI->image_lib->resize()){
				$result = array('status' => 0, 'msg' => $CI->image_lib->display_errors());
			}

			$thumb_name = filename_withoutext( $name );	
			if($i == 8){
				$thumb_url = 'uploads/user_'.$userID.'/images/header/' .$thumb_name . '_thumb.png';
			}else{
				$thumb_url = 'uploads/user_'.$userID.'/images/' .$thumb_name . '_thumb.png';
			}
			//$thumburl = base_url($thumb_url);
			$thumburl = $thumb_url;

			$idata = array(
				'user_id' => $userID,
				'name' => $original_name,
				'thumb' => $thumburl,
				'file' => $fileurl,
				'datetime' => date('Y-m-d h:i:s'),
				'status' => 1
			);

			$m_id = $CI->Common_DML->put_data( TBL_MEDIA, $idata );
			$article_images[] = array(
				'm_id' => $m_id,
				'url' => $fileurl
			);
		}

	}

	$articles = array();

	for($i=0;$i<count($ar['articles']);$i++){
		$arr = $ar['articles'][$i]['article'];
		$articles[] = array(
			'article_id' => $arr['id'],
			'article_name' => $arr['title'],
			'article_content' => $arr['summary'],
			'article_image_url' => isset($article_images[$i]['url']) ? $article_images[$i]['url'] : '',
			'article_image_id' =>  isset($article_images[$i]['m_id']) ? $article_images[$i]['m_id'] : '',
		);
	}

	return $articles;

}

function getTermsConditionsContent($site, $domain){
	return $str = "<h5>Terms and Conditions</h5>
	<p>Welcome to {$site}!</p> 
	<p>These terms and conditions outline the rules and regulations for the use of {$site}'s Website, located at {$domain}.</p> 
	<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use {$site} if you do not agree to take all of the terms and conditions stated on this page.</p>
	<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company’s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
	<h5>Cookies</h5>
	<p>We employ the use of cookies. By accessing {$site}, you agreed to use cookies in agreement with the {$site}'s Privacy Policy.</p>
	<p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
	<h5>License</h5>
	<p>Unless otherwise stated, {$site} and/or its licensors own the intellectual property rights for all material on {$site}. All intellectual property rights are reserved. You may access this from {$site} for your own personal use subjected to restrictions set in these terms and conditions.</p>
	<p>You must not:</p>
	<p>•	Republish material from {$site}p</p>
	<p>•	Sell, rent or sub-license material from {$site}</p>
	<p>•	Reproduce, duplicate or copy material from {$site}</p>
	<p>•	Redistribute content from {$site}</p>
	<p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the Terms And Conditions Generator and the Privacy Policy Generator.</p>
	<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. {$site} does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of {$site},its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, {$site} shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>
	<p>{$site} reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>
	<p>You warrant and represent that:</p>
	<p>•	You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</p>
	<p>•	The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</p>
	<p>•	The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</p>
	<p>•	The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</p>
	<p>You hereby grant {$site} a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>
	<h5>Hyperlinking to our Content</h5>
	<p>The following organizations may link to our Website without prior written approval:</p>
	<p>•	Government agencies;</p>
	<p>•	Search engines;</p>
	<p>•	News organizations;</p>
	<p>•	Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</p>
	<p>•	System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</p>
	<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>
	<p>We may consider and approve other link requests from the following types of organizations:</p>
	<p>•	commonly-known consumer and/or business information sources;</p>
	<p>•	dot.com community sites;</p>
	<p>•	associations or other groups representing charities;</p>
	<p>•	online directory distributors;</p>
	<p>•	internet portals;</p>
	<p>•	accounting, law and consulting firms; and</p>
	<p>•	educational institutions and trade associations.</p>
	<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of {$site}; and (d) the link is in the context of general resource information.</p>
	<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.</p>
	<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to {$site}. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>
	<p>Approved organizations may hyperlink to our Website as follows:</p>
	<p>•	By use of our corporate name; or</p>
	<p>•	By use of the uniform resource locator being linked to; or</p>
	<p>•	By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</p>
	<p>No use of {$site}'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>
	<h5>iFrames</h5>
	<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>
	<h5>Content Liability</h5>
	<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>
	<h5>Your Privacy</h5>
	<p>Please read Privacy Policy</p>
	<h5>Reservation of Rights</h5>
	<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>
	<h5>
	Removal of links from our website</h5>
	<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>
	<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>
	<h5>Disclaimer</h5>
	<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>
	<p>•	limit or exclude our or your liability for death or personal injury;</p>
	<p>•	limit or exclude our or your liability for fraud or fraudulent misrepresentation;</p>
	<p>•	limit any of our or your liabilities in any way that is not permitted under applicable law; or</p>
	<p>•	exclude any of our or your liabilities that may not be excluded under applicable law.</p>
	<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>
	<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>";
}

function getPrivacyPolicyContent($site, $domain){
	return $str = "<h3>Privacy Policy</h3>
	<p>At {$site}, accessible from {$domain}, one of our main priorities
		   is the privacy of our visitors. This Privacy Policy document contains types of information that is
		   collected and recorded by {$site} and how we use it.</p>
	   <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to
		   contact us.</p>

	   <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with
		   regards to the information that they shared and/or collect in {$site}. This policy is not
		   applicable to any information collected offline or via channels other than this website.</p>

	   <h5>Consent</h5>
	   <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>
	   <h5>Information we collect</h5>
	   <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it,
		   will be made clear to you at the point we ask you to provide your personal information.</p>
	   <p>If you contact us directly, we may receive additional information about you such as your name, email
		   address, phone number, the contents of the message and/or attachments you may send us, and any other
		   information you may choose to provide.</p>
	   <p>When you register for an Account, we may ask for your contact information, including items such as name,
		   company name, address, email address, and telephone number.</p>
	   <p>How we use your information</p>

	   <p>We use the information we collect in various ways, including to:</p>

	   <ul>
		   <li>Provide, operate, and maintain our website</li>
		   <li>Improve, personalize, and expand our website</li>
		   <li>Understand and analyze how you use our website</li>
		   <li>Develop new products, services, features, and functionality</li>
		   <li>Communicate with you, either directly or through one of our partners, including for customer
			   service, to provide you with updates and other information relating to the website, and for
			   marketing and promotional purposes</li>
		   <li>Send you emails</li>
		   <li>Find and prevent fraud</li>
	   </ul>

	   <h5>Log Files</h5>

	   <p>{$site} follows a standard procedure of using log files. These files log visitors when
		   they visit websites. All hosting companies do this and a part of hosting services' analytics. The
		   information collected by log files include internet protocol (IP) addresses, browser type, Internet
		   Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks.
		   These are not linked to any information that is personally identifiable. The purpose of the information
		   is for analyzing trends, administering the site, tracking users' movement on the website, and gathering
		   demographic information.</p>

	   <h5>Cookies and Web Beacons</h5>

	   <p>Like any other website, {$site} uses 'cookies'. These cookies are used to store
		   information including visitors' preferences, and the pages on the website that the visitor accessed or
		   visited. The information is used to optimize the users' experience by customizing our web page content
		   based on visitors' browser type and/or other information.</p>

	   <h5>Advertising Partners Privacy Policies</h5>

	   <p>You may consult this list to find the Privacy Policy for each of the advertising partners of Rapid
		   Commission Sites.</p>

	   <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are
		   used in their respective advertisements and links that appear on {$site}, which are sent
		   directly to users' browser. They automatically receive your IP address when this occurs. These
		   technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize
		   the advertising content that you see on websites that you visit.</p>

	   <p>Note that {$site} has no access to or control over these cookies that are used by
		   third-party advertisers.</p>
	   <h5>Third Party Privacy Policies</h5>

	   <p>{$site}'s Privacy Policy does not apply to other advertisers or websites. Thus, we are
		   advising you to consult the respective Privacy Policies of these third-party ad servers for more
		   detailed information. It may include their practices and instructions about how to opt-out of certain
		   options.</p>

	   <p>You can choose to disable cookies through your individual browser options. To know more detailed
		   information about cookie management with specific web browsers, it can be found at the browsers'
		   respective websites.</p>

	   <h5>CCPA Privacy Rights (Do Not Sell My Personal Information)</h5>

	   <p>Under the CCPA, among other rights, California consumers have the right to:</p>
	   <p>Request that a business that collects a consumer's personal data disclose the categories and specific
		   pieces of personal data that a business has collected about consumers.</p>

	   <p>Request that a business delete any personal data about the consumer that a business has collected.</p>
	   <p>Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>

	   <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these
		   rights, please contact us.</p>

	   <h5>GDPR Data Protection Rights</h5>
	   <p>We would like to make sure you are fully aware of all of your data protection rights. Every user is
		   entitled to the following:</p>
	   <p>The right to access – You have the right to request copies of your personal data. We may charge you a
		   small fee for this service.</p>

	   <p>The right to rectification – You have the right to request that we correct any information you believe is
		   inaccurate. You also have the right to request that we complete the information you believe is
		   incomplete.</p>

	   <p>The right to erasure – You have the right to request that we erase your personal data, under certain
		   conditions.</p>

	   <p>The right to restrict processing – You have the right to request that we restrict the processing of your
		   personal data, under certain conditions.</p>
	   <p>The right to object to processing – You have the right to object to our processing of your personal data,
		   under certain conditions.</p>

	   <p>The right to data portability – You have the right to request that we transfer the data that we have
		   collected to another organization, or directly to you, under certain conditions.</p>

	   <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these
		   rights, please contact us.</p>";
}

function getSiteHeader($category_name){

	$CI = get_instance($category_name);

	$page = 1;
	$start = $page;
	$end = 7;
	$category_name = urlencode($category_name);
	
	$pixabayAPIKEY = '20579593-4873d31d034f0a6adc36ba5b4';
	$page = 1;
	$start = $page;
	$end = 4;
	$url = "https://pixabay.com/api/?key={$pixabayAPIKEY}&response_group=high_resolution&q={$category_name}&pretty=true&safesearch=true&page={$start}&per_page={$end}";
	$images = file_get_contents_curl( $url );
	$img = json_decode($images, true);		

	$start = rand(1, (int) $img['totalHits'] / 4);
	$end = 4;
	$url = "https://pixabay.com/api/?key={$pixabayAPIKEY}&response_group=high_resolution&q={$category_name}&category={$category_name}&pretty=true&safesearch=true&page={$start}&per_page={$end}";
	$images = file_get_contents_curl( $url );
	$img = json_decode($images, true);		
	$images = array();
	for($i=0;$i<count($img['hits']);$i++){

		$userID = $CI->session->userdata( 'user_id' );
		$rootpath = $_SERVER['DOCUMENT_ROOT'];
		$name = random_generator();
		$name .= '.png';
		if($i == 8){
			$path = ROOTPATH . 'uploads/user_'.$userID.'/images/header/'.$name;
		}else{
			$path = ROOTPATH . 'uploads/user_'.$userID.'/images/'.$name;
		}
		$data = file_get_contents( $img['hits'][$i]['largeImageURL'] );
		
		$upload = file_put_contents( $path, $data);
		if($upload){
			$fileurl = 'uploads/user_'.$userID.'/images/'.$name;
			$original_name = basename($img['hits'][$i]['largeImageURL']);

			$resize = array();
			$resize['image_library'] = 'gd2';
			$resize['source_image'] = $path;
			$resize['create_thumb'] = TRUE;
			$resize['maintain_ratio'] = FALSE;
			$resize['width']     = 226;
			$resize['height']   = 140;
			$resize['new_image'] = $path;	

			$CI->load->library('image_lib');
			$CI->image_lib->clear();
			$CI->image_lib->initialize($resize);
			if ( ! $CI->image_lib->resize()){
				$result = array('status' => 0, 'msg' => $CI->image_lib->display_errors());
			}

			$thumb_name = filename_withoutext( $name );	
			$thumb_url = 'uploads/user_'.$userID.'/images/' .$thumb_name . '_thumb.png';
			$thumburl = $thumb_url;

			$idata = array(
				'user_id' => $userID,
				'name' => $original_name,
				'thumb' => $thumburl,
				'file' => $fileurl,
				'datetime' => date('Y-m-d h:i:s'),
				'status' => 1
			);

			$m_id = $CI->Common_DML->put_data( TBL_MEDIA, $idata );
			$images[] = array(
				'm_id' => $m_id,
				'url' => $fileurl
			);
		}

	}

	return $images;

}
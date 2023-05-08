<?php
class xs_subscriber{
	
	public function switch_responder( $apikey, $action, $responder ){
		switch($responder){
			case 'ConstantContact':
				return $this->ConstantContact( $apikey, $action );
			break;
			case 'Mailchimp':
				return $this->Mailchimp( $apikey, $action );
			break;
			case 'SendReach':
				return $this->SendReach( $apikey, $action );
			break;
			case 'iContact':
				return $this->iContact( $apikey, $action );
			break;
			case 'Infusionsoft':
				return $this->Infusionsoft( $apikey, $action );
			break;
			case 'Hubspot':
				return $this->Hubspot( $apikey, $action );
			break;
			case 'Aweber':
				return $this->AweberUpdate( $apikey, $action, $responder );
			break;
			case 'GetResponse':
				return $this->GetResponse( $apikey, $action );
			break;
			case 'CampaignMonitor':
				return $this->CampaignMonitor( $apikey, $action );
			break;
			case 'GoToWebinar':
				return $this->GoToWebinar( $apikey, $action );
			break;
			case 'ActiveCampaign':
				return $this->ActiveCampaign( $apikey, $action );
			break;
			case 'Sendlane':
				return $this->Sendlane( $apikey, $action );
			break;
			case 'Mailpoet':
				return $this->Mailpoet( $apikey, $action );
			break;
			case 'Sendy':
				return $this->Sendy( $apikey, $action );
			break;
			case 'Sendinblue':
				return $this->Sendinblue( $apikey, $action );
			break;
			case 'Verticalresponse':
				return $this->Verticalresponse( $apikey, $action );
			break;
			case 'ConvertKit':
				return $this->ConvertKit( $apikey, $action );
			break;
			case 'MailerLite':
				return $this->MailerLite( $apikey, $action );
			break;
			case 'Drip':
				return $this->Drip( $apikey, $action );
			break;
			case 'MarketHero':
				return $this->MarketHero( $apikey, $action );
			break;
			case 'Benchmark':
				return $this->Benchmark( $apikey, $action );
			break;
			case 'Sendloop':
				return $this->Sendloop( $apikey, $action );
			break;
			case 'CustomHTML':
				return $this->CustomHTML( $apikey, $action );
			break;
		}
	}
	
	//Benchmark
	public function Benchmark( $apikey, $action ){
		if($action == 'getList'){
			require_once  dirname(__FILE__) . '/Benchmark/BMEAPI.class.php';
			$username = $apikey['username'];
            $password = $apikey['password'];
           $apiURL = 'http://www.benchmarkemail.com/api/1.0/';
			$api = new BMEAPI($username, $password, $apiURL);
			if (!$api->errorCode){
				$retvals = $api->listGet("", 1, 10, "", "");
                if ($retvals){
					$list = array();
					foreach($retvals as $retval)
                    {
						$list[$retval['id']] = $retval['listname'];
					}
					$result['list'] = $list;
				}else{
					$result = array( 'error'=> 'An error occurred while getting your list.' );
				} 
			}else{
				$result = array( 'error'=> 'An error occurred while getting your list.' );
			}
		}
		
		if($action == 'subsCribe'){
		
			require_once  dirname(__FILE__) . '/Benchmark/BMEAPI.class.php'; 
				
			$username = $apikey['username'];
            $password = $apikey['password'];
            $apiurl = 'http://www.benchmarkemail.com/api/1.0/';
			
			$email = $_POST['email'];
			$fname = $_POST['name'];
			$listID = $_POST['listid'];
			
			try
			{
				$api = new BMEAPI($username, $password, $apiurl);
				$details[0]["email"] = $email;
				$details[0]["firstname"] = $fname;
				$details[0]["lastname"] = '';
				
				foreach($_POST as $k=>$v){
				if(!($k == 'name' || $k == 'email' || $k == 'action' || $k == 'listid')){
					$details[0][$k] = $v;
					}
				}
				if(!empty($listID)){
					$result = $api->listAddContacts($listID, $details);
				}
				
				if ($api->errorCode == ''){
					$result = array('success'=>'Subscribe successfully.');
				}elseif($api->errorCode == 214){
					$result = array('error'=>'This email already subscribe.');
				}else{ 
					$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
				} 
								
			} catch (Exception $e){ }
		}
		
		return $result;
	}
	
	
	//Sendloop
	public function Sendloop( $apikey, $action ){
		require_once  dirname(__FILE__) . '/Sendloop/SendloopAPI3.php';
		$api_key = $apikey['api_key'];
		$subdomain = $apikey['subdomain'];
		$sendloop = new Sendloop\SendloopAPI3($api_key, $subdomain, 'json');
		
		if($action == 'getList'){
			$sendloop->run('List.GetList',array());
			$getLists = json_decode($sendloop->Result,true);
			if(!isset($getLists['ErrorCode'])){
				$lists = array();
				foreach( $getLists['Lists'] as $list ){
					$lists[$list['ListID']] = $list['Name'];
				}
				$result['list'] = $lists;
		}else{
				$result = array( 'error'=> 'An error occurred while getting your list.' );
			}
		}
		
		if($action == 'subsCribe'){
			
			$custom_fields = array();
			foreach($_POST as $k=>$v){
				if(!($k == 'email' || $k == 'action' || $k == 'listid')){
					$custom_fields[$k] = $v;
				}
			}
			
			$data = array(
				'EmailAddress' => $_POST['email'],
				'ListID' => $_POST['listid'],
				'SubscriptionIP' => $_SERVER['REMOTE_ADDR'],
				'Fields'	=> $custom_fields
			);
			$sendloop->run('Subscriber.Subscribe',$data);
			$response = json_decode($sendloop->Result);
			if( $response->Success == 1 ){
				$result = array('success'=>'Subscribe successfully,Please check your email to confirm subscription.');
			}else{
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
		}
		
		return $result;
	}
	
	//Hubspot
	public function Hubspot( $apikey, $action ){
		
		$hubspotApiKey = $apikey['api_key'];
		if($action == 'getList'){
			$allListsArray = array();
			$lists = array(); 
			do {
				$parametersArray = array(
					'hapikey' => $hubspotApiKey,
					'count' => '100' 
				);
				if(isset($offset)){
					$parametersArray['offset'] = $offset; 
				}
				$urlParametersString = http_build_query($parametersArray);
				$url = "https://api.hubapi.com/contacts/v1/lists?$urlParametersString";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$responseJson = curl_exec($ch);
				curl_close($ch);
				$responseArray = json_decode($responseJson, true);
				foreach($responseArray['lists'] as $list){                     
					if (isset($list['authorId'])) {
						$lists[$list['listId']] =  $list['name'];
					}                    
				}
				$result['list'] = $lists;
				$offset = $responseArray['offset'];
			} while ($responseArray['has-more'] == true);
			if(empty($lists)){
				$result = array( 'error'=> 'An error occurred while getting your list.' );
			}
		}
		
		if($action == 'subsCribe'){
			
			$listID = $_POST['listid']; 
			$fname = $lname = $phone = $email = array();
			
			if((!empty($_POST['name']))){
				$fname['property'] = 'firstname';
				$fname['value'] = $_POST['name'];
			}
			
			if((!empty($_POST['email']))){
				$email['property'] = 'email';
				$email['value'] = $_POST['email'];
			}
			
			foreach($_POST as $k=>$v){
				if(!($k == 'name' || $k == 'email' || $k == 'action' || $k == 'listid')){
					if( $k == 'lastname' ){
						$lname['property'] = 'lastname';
						$lname['value'] = $v;
					}elseif( $k == 'phone' ){
						$phone['property'] = 'phone';
						$phone['value'] = $v;
					}
				}
			}
			 
			 
			$arr = array( 
				'properties' => array(
					$email,
					$fname,
					$lname,
					$phone
				)
			);
			$post_json = json_encode($arr);
			$endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . $hubspotApiKey;

			$ch = @curl_init();
			@curl_setopt($ch, CURLOPT_POST, true);
			@curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
			@curl_setopt($ch, CURLOPT_URL, $endpoint);
			@curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = @curl_exec($ch);
			$status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
			$curl_errors = curl_error($ch);
			@curl_close($ch);
			if(!empty($curl_errors)){
				$result = array('success'=>'Subscribe successfully.');
			}else{
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}		
			die();
		}
		return $result;
	}
	
	//Infusionsoft
	public function Infusionsoft( $apikey, $action ){
		
		if($action == 'getList'){
			$result = array('error'=>'No need to select list for Infusionsoft.');
		}
		
		if($action == 'subsCribe'){
			
			require_once  dirname(__FILE__) . '/Infusionsoft/infusionsoft.php';
			$infusionsoft_host = $apikey['host_url'];
			$infusionsoft_api_key = $apikey['api_key'];
			
			Infusionsoft_AppPool::addApp(new Infusionsoft_App($infusionsoft_host, $infusionsoft_api_key, 443));
			$contact = new Infusionsoft_Contact();
				
			//$contact->FirstName = 'test';
			//$contact->LastName = 'purpose';
			$contact->Email = $_POST['email'];
			$id = $contact->save();
			if(!empty($id)){
				$result = array('success'=>'Subscribe successfully.');
			}else{
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
		}
		
		return $result;
	}
	
	
	public function MarketHero( $apikey, $action ){
		
		$api_key = $apikey['api_key'];
		
		if($action == 'getList'){
			$apiURL = 'http://api.markethero.io/v1/api/tags?apiKey='.$api_key;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$apiURL);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$responseJson = curl_exec($ch);
			curl_close($ch);
			
			$responseArray = json_decode($responseJson, true);
			
			if( isset($responseArray['error']) ){
				$result = array( 'error'=> 'An error occurred while getting your list.' );
			}else {
				if (!empty($responseArray)){
					$list = array();
					for($i=0;$i<count($tag);$i++){
						$list[$tag[$i]] = $tag[$i];
					}
					$result['list'] = $list;
				}else{
					$result = array( 'error'=> 'An error occurred while getting your list.' );
				}
			}		
		}
		
		if($action == 'subsCribe'){	
			$listID = $_POST['listid'];
			$email = $_POST['email'];
			$markethero_data=array();
			$markethero_data['apiKey']=$api_key;
			$markethero_data['email']=$email;
			$markethero_data['tags']=array($listID);     
			$postmarkethero_data= json_encode($markethero_data);
			$apiURL = 'https://api.markethero.io/v1/api/tag-lead';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$apiURL);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postmarkethero_data);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			$response = curl_exec($ch);
			curl_close($ch);
			
			$resp = json_decode($resp,true);
			
			if(isset($resp['result'])){
				$result = array('success'=>'Subscribe successfully.');	
			}else{
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
			
		}
		
		return $result;
	}
	
	public function Drip( $apikey, $action ){
		
		$api_token = $apikey['api_token'];
		$account_id = $apikey['account_id'];
		
		$header = array(
			'Accept: application/vnd.api+json',
			'Content-Type: application/vnd.api+json',
			'Authorization: Basic '.base64_encode($api_token)
		);
		
		if($action == 'getList'){
			
			$Url = 'https://api.getdrip.com/v2/'.$account_id.'/campaigns/';
			
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $Url,
				CURLOPT_HTTPHEADER => $header
			));
			// Send the request & save response to $resp
			$resp = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);

			$resp = json_decode($resp,true);
		
			if(isset($resp['error'])){
				$result = array( 'error'=> 'An error occurred while getting your list.' );
			}elseif(isset($resp['campaigns']) && !empty($resp['campaigns'])){
				$list = array();
				foreach($resp['campaigns'] as $campaign){
					$list[$campaign['id']] = $campaign['name'];
				}
				$result['list'] = $list;
			}else{
				$result = array( 'error'=> 'An error occurred while getting your list.' );
			}
		
		}
		
		if($action == 'subsCribe'){	
			$campaign_id = $_POST['listid'];
			$email = $_POST['email'];
		
			$Url = 'https://api.getdrip.com/v2/'.$account_id.'/campaigns/'.$campaign_id.'/subscribers/';
			
			$a = json_encode( array('subscribers'=>array(
				array(
					'email' => $email
				)
			)) );
			
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
				CURLOPT_URL => $Url,
				CURLOPT_HTTPHEADER => $header,
				CURLOPT_SSL_VERIFYPEER => true,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $a
			));
			// Send the request & save response to $resp
			$resp = curl_exec($curl);
			// Close request to clear up some resources
			curl_close($curl);

			$resp = json_decode($resp,true);
			
			if(isset($resp['subscribers'])){
				$result = array('success'=>'Subscribe successfully.');	
			}else{
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
			
		}
		
		return $result;
	}
	
	public function MailerLite( $apikey, $action ){
		
		$apiKey = $apikey['api_key'];
		if($action == 'getList'){
			$Url = "https://api.mailerlite.com/api/v1/lists/?apiKey=".$apiKey;
			$cSession = curl_init(); 
			curl_setopt($cSession, CURLOPT_URL, $Url);
			curl_setopt($cSession, CURLOPT_RETURNTRANSFER,true);
			curl_setopt($cSession, CURLOPT_HEADER, false); 
			$groups = curl_exec($cSession);
			curl_close($cSession);
			
			$groups = (array) json_decode( $groups );
			
			if(isset($groups['error'])){
				$result = array( 'error'=> $groups['error']->message );
			}elseif(isset($groups['Results']) && !empty($groups['Results'])){
				$list = array();
				foreach($groups['Results'] as $group){
					$list[$group->id] = $group->name;
				}
				$result['list'] = $list;
			}else{
				$result = array( 'error'=> 'An error occurred while getting your list.' );
			}
		}
		if($action == 'subsCribe'){			
			$groupID = $_POST['listid'];			
			$email = $_POST['email'];
			
			$postData = 'apiKey='.$apiKey.'&email='.$email.'&id='.$groupID;
			$Url = "https://api.mailerlite.com/api/v1/subscribers/".$groupID;
			
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$Url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = curl_exec($ch);
			curl_close($ch);
			$data = json_decode($data, true);
			
			if(isset($data['email'])){
				$result = array('success'=>'Subscribe successfully.');	
			}else{
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
			
		}
		return $result;
	}
	
	public function ConvertKit( $apikey, $action ){
		
		$apiKey = $apikey['api_key'];
		$api_secret = $apikey['api_secret'];
		if($action == 'getList'){
			$cSession = curl_init(); 
			$Url = "https://api.convertkit.com/v3/forms?api_key=".$apiKey;
			curl_setopt($cSession, CURLOPT_URL, $Url);
			curl_setopt($cSession, CURLOPT_RETURNTRANSFER,true);
			curl_setopt($cSession, CURLOPT_HEADER, false); 
			$forms = curl_exec($cSession);
			curl_close($cSession);
			
			$forms = (array) json_decode( $forms );
			
			if(isset($forms['error'])){
				$result = array( 'error'=> $forms['message'] );
			}elseif(isset($forms['forms']) && !empty($forms['forms'])){
				$list = array();
				foreach($forms['forms'] as $form){
					$list[$form->id] = $form->name;
				}
				$result['list'] = $list;
			}else{
				$result = array( 'error'=> 'An error occurred while getting your list.' );
			}
			
		}
		if($action == 'subsCribe'){			
			$formId = $_POST['listid'];			
			$email = $_POST['email'];			
			$Url = "https://api.convertkit.com/v3/forms/".$formId."/subscribe";
			
			$postData = 'api_secret='.$api_secret.'&email='.$email;
			
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$Url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = curl_exec($ch);
			curl_close($ch);
			$data = json_decode($data, true);
			
			if(isset($data['subscription'])){
				$result = array('success'=>'Subscribe successfully.');	
			}else{
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
			
		}
		
		return $result;
	}
	
	public function CustomHTML( $apikey, $action ){
		return array( 'success' => 1 );
	}
	
	public function Verticalresponse( $apikey, $action ){
		
		if($action == 'getList'){
			$access_token = $apikey['accesstoken'];
			$params = array('access_token'=>$access_token);
			$ch = curl_init();
			$url ='';
			if ($params)
			{
				$url =  ( strpos( $url, '?' ) ? '&' : '?' ) . http_build_query($params, '', '&');
			}

			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, 'https://vrapi.verticalresponse.com/api/v1/lists' . $url);
			$headers = array('Authorization: Bearer ' . $access_token);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$data = curl_exec($ch);
			curl_close($ch);
			$retvals = json_decode($data, true);

			$lists = array();

			if ($retvals){
				if(isset($retvals['items'])) {
					if(count($retvals['items']) > 0) {
						$list = array();
						foreach($retvals['items'] as $retval){
							$list[$retval['attributes']['id']] = $retval['attributes']['name'];
						}
						$result['list'] = $list;
					}else {
						$result = array('error'=>'Error occur may be somethig wrong.');
					}
				}else {
					$result = array('error'=>'Error occur may be somethig wrong.');
				}

			} else {
				$result = array('error'=>'Error occur may be somethig wrong.');
			}
		}
		
		if($action == 'subsCribe'){
			$Verticalresponse_accesstoken = $apikey['accesstoken'];

			$email = $_POST['email'];

			if (!empty($_POST['name'])){
				$fname = $_POST['name'];
			}else {
				$fname = '';
			}
			$listID = $_POST['listid'];

			try{

			   $postData = '';
			   $params = array('email'=>$email);
			   //create name value pairs seperated by &
			   foreach($params as $k => $v)
			   {
				  $postData .= $k . '='.$v.'&';
			   }
			   $postData = rtrim($postData, '&');

				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL,'https://vrapi.verticalresponse.com/api/v1/lists/'.$listID.'/contacts');
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$headers = array('Authorization: Bearer ' . $Verticalresponse_accesstoken);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				$data = curl_exec($ch);
				curl_close($ch);
				$data = json_decode($data, true);
				//print_r($data);
				if(isset($data['success'])){
					$result = array('success'=>'Subscribe successfully.');	
				}else{
					$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
				}

			} catch (Exception $e){
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
		}
		
		return $result;
	}
	
	public function Sendinblue( $apikey, $action ){
		require_once  dirname(__FILE__) . '/Sendinblue/Mailin.php';
		if($action == 'getList'){
			$key = $apikey['api_key'];
			
			$mailin = new Mailin('https://api.sendinblue.com/v2.0',$key);

			$data = array(
			  "page" => 1,
			  "page_limit" => 50
			);
			$retvals = $mailin->get_lists($data);
			
			if( $retvals['code'] == 'success' ) {
				if( count($retvals['data']['lists']) > 0 ) {
					$list = array();
					foreach($retvals['data']['lists'] as $retval){
						$list[$retval['id']] = $retval['name'];
					}
					$result['list'] = $list;
				}else {
					$result = array('error'=>'Error occur may be somethig wrong.');
				}
			}else {
				$result = array('error'=>'Error occur may be somethig wrong.');
			}
		}
		
		if($action == 'subsCribe'){
			$key = $apikey['api_key'];
			$listID = $_POST['listid'];
			$email = $_POST['email'];
			if (!empty($_POST['name'])){
				$fname = $_POST['name'];
			}else {
				$fname = '';
			}

			try{
				$mailin = new Mailin('https://api.sendinblue.com/v2.0',$key);

				try {

					$data = array( "email" => $email,
						"attributes" => array("NAME"=>$fname, "SURNAME"=>''),
						"listid" => array($listID)
					);

					$res = $mailin->create_update_user($data);
					$result = array('success'=>'Subscribe successfully.');	
				} catch(Emma_Invalid_Response_Exception $e) {
					$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
				}

			} catch (Exception $e){
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
		}
		
		return $result;
	}
	
	public function Sendy( $apikey, $action ){
		if($action == 'getList'){
			$result['list'] = array($apikey['list_id'] => $apikey['list_nm']);
		}
		
		if($action == 'subsCribe'){
			$sendyapi = $apikey['api_key'];
			$sendyurl = 'http://domainname.com/codeapis/success/';
			$email = $_POST['email'];
			$listID = $_POST['listid'];

			if (!empty($_POST['name'])){
				$fname = $_POST['name'];
			}else {
				$fname = '';
			}
			require_once  dirname(__FILE__) . '/Sendy/SendyPHP.php';
			$config = array(
				'api_key' => $sendyapi, //your API key is available in Settings
				'installation_url' => $sendyurl,  //Your Sendy installation
				'list_id' => $listID
			);
			try{
				$sendy = new \SendyPHP\SendyPHP($config);
				$result = $sendy->subscribe(array(
					'name'=>$fname,
					'email' => $email
				));
			}catch(Exception $e){
				return $e;
			}
			
			$result = array('success'=>'Subscribe successfully.');
		}
		
		return $result;
	}
	
	public function Mailpoet( $apikey, $action ){
		if($action == 'getList' && class_exists('WYSIJA')){
			$lists = $result = array();
			//this will return an array of results with the name and list_id of each mailing list
			$model_list = WYSIJA::get('list','model');
			$mailpoet_lists = $model_list->get(array('name','list_id'),array('is_enabled'=>1));
			 
			//this loop will just echo the information selected for each list
			if(!empty($mailpoet_lists)){
				foreach($mailpoet_lists as $list){
					$lists[$list['list_id']] = $list['name'];
				}
				$result['list'] = $lists;
			}else{
				$result = array('error'=>'Error occur may be somethig wrong.');
			}			
		}
		
		if($action === 'subsCribe'  && class_exists('WYSIJA')){
			$my_email_variable = $_POST['email'];
			$my_list_id1 = $_POST['listid'];
			
			if (!empty($_POST['name'])){
				$fname = $_POST['name'];
			}else {
				$fname = '';
			}
		 
			//in this array firstname and lastname are optional
			$user_data = array(
				'email' => $my_email_variable,
				'firstname' => $fname
			);
		 
			$data_subscriber = array(
			  'user' => $user_data,
			  'user_list' => array('list_ids' => array($my_list_id1))
			);
		 
			$helper_user = WYSIJA::get('user','helper');
			$helper_user->addSubscriber($data_subscriber);
			$result = array('success'=>'Subscribe successfully.');
		}else{
			$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
		}
		
		return $result;
	}
	
	public function Sendlane( $apikey, $action ){
		
		if($action == 'getList'){
			$url = $apikey['user_url'];
			$api = $url . '/api/v1/lists';

			$post = array(
				'api'    => $apikey['api_key'],
				'hash'   => $apikey['hash_key']
			);

			$data = "";
			foreach( $post as $key => $value ) $data .= $key . '=' . urlencode($value) . '&';
			$data = rtrim($data, '& ');

			$request = curl_init($api);
			curl_setopt($request, CURLOPT_HEADER, 0);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($request, CURLOPT_POSTFIELDS, $data);
			curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

			$response = (string)curl_exec($request);
			curl_close($request);


			if( $response == '' ) {
				$result = array('error'=>'Error occur may be somethig wrong.');
			}else {
				$result = json_decode($response);
				if( isset ($result->error) ) {
					$result = array('error'=>'Error occur may be somethig wrong.');
				}else {
					if ( !isset($result[0]->list_id)) {
						$result = array('error'=>'Error occur may be somethig wrong.');
					}else {
						$list = array();
						foreach ($result as $solo_list){
							$list_key = $solo_list->list_id;
							$list_name = $solo_list->list_name;
							$list[$list_key] = $list_name;
						}
						$result['list'] = $list;
					}
				}
			}
		}
		
		if($action === 'subsCribe'){
			$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
		
			$url = $apikey['user_url'];
			$api = $url . '/api/v1/list-subscribers-add';

			$email = $_POST['email'];
			$listID = $_POST['listid'];

			if (!empty($_POST['name'])){
				$fname = $_POST['name'];
			}else {
				$fname = '';
			}

			$post = array(
				'api'    => $apikey['api_key'],
				'hash'   => $apikey['hash_key'],
				'email'   => $fname.'<'.$email.'>',
				'list_id' => $listID
			);

			$data = "";
			foreach( $post as $key => $value ) $data .= $key . '=' . urlencode($value) . '&';
			$data = rtrim($data, '& ');

			$request = curl_init($api);
			curl_setopt($request, CURLOPT_HEADER, 0);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($request, CURLOPT_POSTFIELDS, $data);
			curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

			$response = (string)curl_exec($request);
			curl_close($request);

			if ($response != ''){
				$result = array('success'=>'Subscribe successfully.');
			}
		}
		
		return $result;
	}
	
	public function ActiveCampaign( $apikey, $action ){
		if($action === 'getList'){
			$url = $apikey['api_url'];
			$api_key = $apikey['api_key'];

			$params = array(

				'api_key'      => $api_key,
				'api_action'   => 'list_paginator',
				'api_output'   => 'json',
				'somethingthatwillneverbeused' => '',
				'sort' => '',
				'offset' => 0,
				'limit' => 20,
				'filter' => 0,
				'public' => 0,

			);

			$query = "";
			foreach( $params as $key => $value ) $query .= $key . '=' . urlencode($value) . '&';
			$query = rtrim($query, '& ');
			$url = rtrim($url, '/ ');

			if ( !function_exists('curl_init') ) { $result = array('error'=>'Error occur may be somethig wrong.'); }

			if ( $params['api_output'] == 'json' && !function_exists('json_decode') ) {
				$result = array('error'=>'Error occur may be somethig wrong.');
			}
			$api = $url . '/admin/api.php?' . $query;

			$request = curl_init($api);
			curl_setopt($request, CURLOPT_HEADER, 0);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
			$response = (string)curl_exec($request);
			curl_close($request);

			if ( !$response ) {
			   $result = array('error'=>'Error occur may be somethig wrong.');
			}

			$results = json_decode($response);

			if( $results->result_code == 0 ) {
				$result = array('error'=>'Error occur may be somethig wrong.');
			}else {
				if ( $results->cnt == 0 ) {
					$result = array('error'=>'There is no list in your account.');
				}
				else {

					foreach ($results->rows as $solo_list){
						$list_key = $solo_list->id;
						$list_name = $solo_list->name;
						$list[$list_key] = $list_name;
					}
					$result['list'] = $list;
				}
			}
		}
		
		if($action === 'subsCribe'){
			$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			$url = $apikey['api_url'];
			$api_key = $apikey['api_key'];
			$listID = $_POST['listid'];

			$params = array(
				'api_key'      => $api_key,
				'api_action'   => 'contact_add',
				'api_output'   => 'json'
			);

			if (!empty($_POST['name']))
			{
				$fname = $_POST['name'];
			}
			else {
				$fname = '';
			}

			$post = array(
				'email'                    => $_POST['email'],
				'first_name'               => $fname,
				'tags'                     => 'api',
				'p[1]'                   => $listID,
				'status[1]'              => 1,
				'instantresponders[123]' => 1
			);

			$query = "";
			foreach( $params as $key => $value ) $query .= $key . '=' . urlencode($value) . '&';
			$query = rtrim($query, '& ');

			$data = "";
			foreach( $post as $key => $value ) $data .= $key . '=' . urlencode($value) . '&';
			$data = rtrim($data, '& ');

			$url = rtrim($url, '/ ');

			$api = $url . '/admin/api.php?' . $query;

			$request = curl_init($api);
			curl_setopt($request, CURLOPT_HEADER, 0);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($request, CURLOPT_POSTFIELDS, $data);
			curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
			$response = (string)curl_exec($request);
			curl_close($request);

			if ( $response ) {
				$results = json_decode($response);
				if( $results->result_code != 0) {
					$result = array('success'=>'Subscribe successfully.');
				}
			}
		}
		
		return $result;
	}
	
	public function GoToWebinar( $apikey, $action ){
		require_once  dirname(__FILE__) . '/GoToWebinar/citrix.php';
		
		if($action === 'getList'){
			$citrix = new Citrix($apikey['consumer_key']);
			$params = array();
			$params['consumer_key'] = $apikey['consumer_key'];
			$params['consumer_secret'] = $apikey['consumer_secret'];
			$params['user_id'] = $apikey['user_id'];
			$params['password'] = $apikey['password'];
			$organizer_key = '';
			
			if(!$organizer_key){

				$url = 'https://api.citrixonline.com/oauth/access_token?grant_type=password&user_id='.$params['user_id'].'&password='.$params['password'].'&client_id='.$params['consumer_key'];
				$results = file_get_contents($url);
				if($results){
					$res = json_decode($results,true);

					$citrix->set_organizer_key($res['organizer_key']);
					$citrix->set_access_token($res['access_token']);

					$webinars = $citrix->citrixonline_get_list_of_webinars(1) ;

					$webinar_list = array();

					if(!isset($webinars['upcoming']['webinars']['errorCode'])){
						
						foreach($webinars['upcoming']['webinars'] as $webinar){
							$list[$webinar['webinarID']] = $webinar['subject'];
						}
						$result['list'] = $list;

					}else{
						$result = array('error'=>'There is no list in your account.');
					}

				}else{
					$result = array('error'=>'Error occur may be somethig wrong.');
				}
				
			}
		}
		
		if($action === 'subsCribe'){
			$citrix = new Citrix($apikey['consumer_key']);
			$params = array();
			$params['consumer_key'] = $apikey['consumer_key'];
			$params['consumer_secret'] = $apikey['consumer_secret'];
			$params['user_id'] = $apikey['user_id'];
			$params['password'] = $apikey['password'];
			
			try{
				$email = $_POST['email'];
				if (!empty($_POST['name']['fname'])){
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
				}else {
					$fname = '';
					$lname = '';
				}
				$listID = $_POST['listid'];
				$response = $citrix->citrixonline_create_registrant_of_webinar( $listID, array('first_name' => $fname, 'last_name' => $lname, 'email'=>$email));
				
				$result = array('success'=>'Subscribe successfully.');

			}catch (Exception $e) {
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
		}
		
		return $result;
	}
	
	public function CampaignMonitor( $apikey, $action ){
		
		if($action === 'getList'){
			require_once  dirname(__FILE__) . '/CampaignMonitor/csrest_clients.php';
			$list = array();

			$wrap = new CS_REST_Clients($apikey["client_id"], $apikey["api_key"]);
			$cm_res = $wrap->get_lists();

			if ($cm_res->http_status_code != '200'){
				$result = array('error'=>'Error occur may be somethig wrong.');
			}else{

				if( count($cm_res->response) != 0 ){

					foreach ($cm_res->response as $solo_list){
						$list[$solo_list->ListID] = $solo_list->Name;
					}
					$result['list'] = $list;
					
				}
				else {
					$result = array('error'=>'There is no list in your account.');
				}

			}
		}
		
		if($action == 'subsCribe'){
			require_once  dirname(__FILE__) . '/CampaignMonitor/csrest_subscribers.php';
			$key = $apikey["api_key"];
			$listID = $_POST['listid'];

			if(!empty($listID)){
				$wrap = new CS_REST_Subscribers($listID, $key);
			}

			$args = array(
				'EmailAddress' => $_POST['email'],
				'Resubscribe' => true
			);

			if (!empty($_POST['name'])){
				$args['name'] = $_POST['name'];
			}

			$res = $wrap->add($args);
			
			$result = array('success'=>'Subscribe successfully.');
		}
		
		return $result;
	}
	
	public function GetResponse( $apikey, $action ){
		
		require_once  dirname(__FILE__) . '/GetResponse/GetResponseAPI3.class.php';
		
		if($action === 'getList'){
			$list = array();
			
			$api = new GetResponse($apikey["api_key"]);
			try{
				$r = $api->getCampaigns($apikey["api_key"]);
				$results = json_decode(json_encode($r), true);
				if( !empty($results) ) {

					foreach ($results as $k => $v){
						$list[$v['campaignId']] = $v['name'];
					}
					$result['list'] = $list;
				}else {
					$result = array('error'=>'There is no list in your account.'); // When no list found
				}
			}catch (Exception $e){
			   $result = array('error'=>'Error occur may be somethig wrong.'); // Invalid API key
			}
		}
		
		if($action == 'subsCribe'){
			$api = new GetResponse($apikey["api_key"]);
			try{
				$listID = $_POST['listid'];
				if(!empty($listID)){
					$args = array(
						'campaign' => array('campaignId'=>$listID),
						'email' => $_POST['email'],
						'cycle_day'=>0,
					);
				}

				if (!empty($_POST['name'])){
					$args['name'] = $_POST['name'];
				}

				$api->addContact($args);
				
				$result = array('success'=>'Subscribe successfully.');

			}catch (Exception $e){ 
				//$result = $e;
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
		}
		
		return $result;
		
	}

	/*public function GetResponse( $apikey, $action ){
		
		require_once  dirname(__FILE__) . '/GetResponse/jsonRPCClient.php';
		
		if($action === 'getList'){
			$list = array();
			
			$api = new jsonRPCClient('http://api2.getresponse.com');
			try{
				$results = $api->get_campaigns($apikey["api_key"]);
				if( count($results) > 0 ) {

					foreach ($results as $k => $v){
						$list[$k] = $v['name'];
					}
					$result['list'] = $list;
				}else {
					$result = array('error'=>'There is no list in your account.'); // When no list found
				}
			}catch (Exception $e){
			   $result = array('error'=>'Error occur may be somethig wrong.'); // Invalid API key
			}
		}
		
		if($action == 'subsCribe'){
			$api = new jsonRPCClient('http://api2.getresponse.com');
			try{
				$listID = $_POST['listid'];
				if(!empty($listID)){
					$args = array(
						'campaign' => $listID,
						'email' => $_POST['email'],
						'cycle_day'=>0,
					);
				}

				if (!empty($_POST['name'])){
					$args['name'] = $_POST['name'];
				}

				$api->add_contact($apikey["api_key"], $args);
				
				$result = array('success'=>'Subscribe successfully.');

			}catch (Exception $e){ 
				//$result = $e;
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
		}
		
		return $result;
		
	}*/

	public function AweberUpdate( $apikey, $action, $responder ){
		$CI = get_instance();
		$CI->load->helper('aweber_helper');
		
		$newToken = refreshToken( $apikey );

		$accessToken = $newToken['accessToken'];
		$accountId = $apikey['account_id'];		

		if($action === 'getList'){
			$client = new GuzzleHttp\Client();
			$headers = [
				'User-Agent' => 'ezsalaryz',
				'Accept' => 'application/json',
				'Authorization' => "Bearer {$accessToken}"
			];
			$url = "https://api.aweber.com/1.0/accounts/{$accountId}/lists?ws.size=100";
			$response = $client->get($url, ['headers' => $headers]);
			$body = json_decode($response->getBody(), true);

			if(!empty($body['entries'])){
				$list = array();
				$entries = $body['entries'];
				foreach ($entries as $solo_list){
					$list[$solo_list['id']] = $solo_list['name'];
				}
				$result['list'] = $list;
			}else{
				$result = array('error'=>'There is no list in your account.');
			}
			//print_r($body);
		}

		if($action == 'subsCribe'){
			try{
				if (!empty($_POST['name'])){
					$name = $_POST['name'];
				}else {
					$name = '';
				}
				$email = $_POST['email'];
				$listId = $_POST['listid'];
				$body = array(
					'email' => $email,
					'name' => $name,
					'ip' => $_SERVER['REMOTE_ADDR']
				);
				$headers = array(
					'Content-Type' => 'application/json',
					'Accept' => 'application/json',
					'Authorization' => "Bearer {$accessToken}",
					'User-Agent' => 'ezsalaryz'
				);
				$client = new GuzzleHttp\Client();
				$url = "https://api.aweber.com/1.0/accounts/{$accountId}/lists/{$listId}/subscribers";
				$response = $client->post($url, ['json' => $body, 'headers' => $headers]);
				//echo $response->getHeader('Location')[0];
				$result = array('success'=>'Subscribe successfully.');
			}catch(GuzzleHttp\Exception\ClientException $e){
				$r = $e->getMessage();
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}			  
		}

		return $result;
	}
	
	public function Aweber( $apikey, $action, $responder ){
		
		require_once  dirname(__FILE__) . '/Aweber/aweber_api.php';
		
		if(isset($apikey['access_secret'])){
			$consumer_key = $apikey['consumer_key'];
			$consumer_secret = $apikey['consumer_secret']; 
			$access_key = $apikey['access_key']; 
			$access_secret = $apikey['access_secret'];
		}
		
		if($action === 'getList'){
			$list = array();

			$descr = '';
			if(!isset($apikey['access_secret'])){
				try{
					list($consumer_key, $consumer_secret, $access_key, $access_secret) = AWeberAPI::getDataFromAweberID($apikey['aweber_code']);
				}catch (AWeberAPIException $exc){
					list($consumer_key, $consumer_secret, $access_key, $access_secret) = null;
					if(isset($exc->message))
					{
						$descr = $exc->message;
						$descr = preg_replace('/http.*$/i', '', $descr);	 # strip labs.aweber.com documentation url from error message
						$descr = preg_replace('/[\.\!:]+.*$/i', '', $descr); # strip anything following a . : or ! character
						$descr = '('.$descr.')';

					}
				}catch (AWeberOAuthDataMissing $exc){
					list($consumer_key, $consumer_secret, $access_key, $access_secret) = null;
				}catch (AWeberException $exc){
					list($consumer_key, $consumer_secret, $access_key, $access_secret) = null;
				}
			}

			if (!$access_secret){
				$result = array('error'=>'Error occur may be somethig wrong.');
			}else{
				$aweber = new AWeberAPI($consumer_key, $consumer_secret);
				$account = $aweber->getAccount($access_key, $access_secret);
				$aweber_result = $account->lists;
				if( $aweber_result->data['total_size'] != '' && $aweber_result->data['total_size'] != 0 ){
					foreach ($aweber_result->data['entries'] as $solo_list){
						$list[$solo_list['id']] = $solo_list['name'];
					}
					$result['list'] = $list;
				}else {
					$result = array('error'=>'There is no list in your account.');
				}
				
				if(!isset($apikey['access_secret'])){			
					$result['data'] = array(
						'aweber_code' => $apikey['aweber_code'],
						'consumer_key' => $consumer_key,
						'consumer_secret' => $consumer_secret,
						'access_key' => $access_key,
						'access_secret' => $access_secret
					);
				}
				
			}
		}
		
		if($action == 'subsCribe'){
			try{

				$email = $_POST['email'];
				$listID = $_POST['listid'];

				$aweber = new AWeberAPI($consumer_key, $consumer_secret);

				$account = $aweber->getAccount($access_key, $access_secret);

				$aweber_list = $listID;
				$list = $account->loadFromUrl('/accounts/' . $account->id . '/lists/' . $aweber_list);

				$subscriber = array(
					'email' => $email,
					'ip' => $_SERVER['REMOTE_ADDR']
				);

				if (!empty($_POST['name'])){
					$subscriber['name'] = $_POST['name'];
				}else {
					$fname = '';
				}

				$list->subscribers->create($subscriber);
				
				$result = array('success'=>'Subscribe successfully.');

			}catch (AWeberException $e){
				$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			}
		}
		
		return $result;
	}
	
	public function iContact( $apikey, $action ){
		require_once  dirname(__FILE__) . '/iContact/iContactApi.php';
		
		$list = $result = array();
		
		if($action === 'getList'){
			iContactApi::getInstance()->setConfig(array(
				'appId' => $apikey['app_id'],
				'apiPassword' => $apikey['app_password'],
				'apiUsername' => $apikey['login_email']
			));
			$oiContact = iContactApi::getInstance();
			
			try{
				$icontact_res = $oiContact->getLists();

				if( count($icontact_res) > 0 ) {
					foreach ($icontact_res as $solo_list){
						$list[$solo_list->listId] = $solo_list->name;
					}
				}else{
					$result = array('error'=>'There is no list in your account.');
				}

			}catch (Exception $oException){
				$result = array('error'=>'Error occur may be somethig wrong.');
			}
			
			$result['list'] = $list;
		}
		
		if($action == 'subsCribe'){
			$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			
			iContactApi::getInstance()->setConfig(array(
				'appId' => $apikey['app_id'],
				'apiPassword' => $apikey['app_password'],
				'apiUsername' => $apikey['login_email']
			));
			
			$email = $_POST['email'];
			$listID = $_POST['listid'];
			$oiContact = iContactApi::getInstance();

			if (!empty($_POST['name'])){
				$fname = $_POST['name'];
			}else {
				$fname = '';
			}

			$res1 = $oiContact->addContact($email, null, null, $fname , '' , null, null, null, null, null, null, null, null, null);
			if ($res1->contactId){
				if ($oiContact->subscribeContactToList($res1->contactId, $listID, 'normal')){
					$result = array('success'=>'Subscribe successfully.');
				}
			}
		}
		
		return $result;
	}
	
	public function SendReach( $apikey, $action ){
		$result = array();
		define('publicKey',$apikey['public_key']);
		define('privateKey',$apikey['private_key']);
		
		require_once  dirname(__FILE__) . '/SendReach/setup.php';
		
		if($action === 'getList'){
			$endpoint = new MailWizzApi_Endpoint_Lists();

			$response = $endpoint->getLists($pageNumber = 1, $perPage = 10);
			$body = $response->body;
			
			$list = array();
			$bool = false;

			foreach($body as $key=>$val) {
				if( $val != 'success' ) {
					if( $val['count'] > 0 ) {

						foreach( $val['records'] as $solo_rec ) {
							$list[$solo_rec['general']['list_uid']] = $solo_rec['general']['name'];
							$bool = true;
						}
						
					}
				}
			}
			
			if($bool == true){
				$result['list'] = $list;
			}else{
				$result = array('error'=>'There is no list in your account.');
			}			
		}
		
		if($action == 'subsCribe'){

			$email = $_POST['email'];
			$listID = $_POST['listid'];
			$fname = '';
			if (!empty($_POST['name'])){
				$fname = $_POST['name'];
			}
			$endpoint   = new MailWizzApi_Endpoint_ListSubscribers();
			$response   = $endpoint->create($listID, array(
				'EMAIL' => $email,
				'FNAME' => $fname,
				'LNAME' => '',
			));
			$response   = $response->body;

			if ($response->itemAt('status') == 'success') {
				$result = array('success'=>'Subscribe successfully.');
			}
		}
		
		return $result;
	}
	
	public function ConstantContact( $apikey, $action ){
		require_once  dirname(__FILE__) . '/ConstantContact/class.cc.php';
		
		if($action === 'getList'){
			$cc = new cc($apikey['username'], $apikey['password']);

            $resultofcc = $cc->get_lists('lists');

            if ($resultofcc){
				
				if( count($resultofcc) > 0  ){
					
					foreach($resultofcc as $v){
						$list[$v['id']] = $v['Name'];
					}
					
					$result['list'] = $list;
					
				}else{
					$result = array('error'=>'There is no list in your account.');
				}
				
			}else{
				$result = array('error'=>'Error occur may be somethig wrong.');
			}
			
			return $result;
		}
		
		if($action == 'subsCribe'){
			$result = array('error'=>'Subscribe unsuccessfully, please contact administrator for more information.');
			$cc = new cc($apikey['username'], $apikey['password']);
			
			$email = $_POST['email'];
			$listID = $_POST['listid'];

			$contact_list = $_POST['listid'];
			$extra_fields = array();
			if (!empty($_POST['name'])){
				$extra_fields['FirstName'] = $_POST['name'];
			}

			$contact = $cc->query_contacts($email);
			//print_r($_POST);			
			if (!$contact){
				//print_r($_POST);
				$new_id = $cc->create_contact($email, $contact_list, $extra_fields);
				if ($new_id){
					$result = array('success'=>'Subscribe successfully.');
				}
			}
			
			return $result;
		}
	}
	
	public function Mailchimp( $apikey, $action ){
		
		require_once  dirname(__FILE__) . '/Mailchimp/MCAPI.class.php';
		
		if($action === 'getList'){
			$key = $apikey['api_key'];
			
			$MailChimp = new MailChimp($key);
			$retval = $MailChimp->get('lists');
			
			if(isset($retval['lists'])){
				if(!empty($retval['lists'])){
					for($i=count($retval['lists'])-1;$i>=0;$i--){
						$list[$retval['lists'][$i]['id']] = $retval['lists'][$i]['name'];
					}
					$result['list'] = $list;
				}else{
					$result = array('error'=>'There is no list in your account.');
				}
			}else{
				$result = array('error'=>'Error occur may be somethig wrong.');
			}
			
			return $result;
		}
		
		if($action == 'subsCribe'){
			$key = $apikey['api_key'];
			
			$MailChimp = new MailChimp($key);
			
			$listID = $_POST['listid'];
			
			if(!empty($_POST['name'])){
				$args = array('FNAME' => $_POST['name']);
			}else{ $args = array(); }
			
			if(!empty($listID)){
				$mdata = $MailChimp->post("lists/$listID/members", [
					'email_address' => $_POST['email'],
					'status'        => 'subscribed',
				]);
			}
			
			if ($MailChimp->success()) {
				if(!empty($args)){
					$subscriber_hash = $MailChimp->subscriberHash( $_POST['email'] );
					$MailChimp->patch("lists/$listID/members/$subscriber_hash", [
						'merge_fields' => $args
					]);
				}
				$result = array('success'=>'Thank you, please check your email.');
			}elseif ($mdata['status'] == 400){
				$error = $_POST['email'] . ' is already a list member.';
				$result = array( 'error'=> $error );
			}else{
				$result = 'Error: ' . $MailChimp->getLastError();
			}
			return $result;
		}
		
	}
}
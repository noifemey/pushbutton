<?php
require_once __DIR__ . '/fvendor/src/Facebook/autoload.php'; 

/* Facebook login and profile details */
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
/* Facebook login and profile details */

class Facebooklib{
    private $fabcebook_object = '';
    private $user_access_token = '';
    private $page_access_token = '';
    private $redirectURL = '';

    public function __construct(){
        $this->redirectURL = base_url( "api/redirectOnFacebookToGetAccessToken" );
        $this->fabcebook_object = new Facebook(array(
            'app_id' => FACEBOOK_APP_ID,
            'app_secret' => FACEBOOK_APP_SECRET,
			'default_graph_version' => 'v9.0',
        ));
    }

    function errorHandler($fun , $error){
        $data = array(
            'user_id' => $_SESSION['user_id'],
            'function' => $fun,
            'error' => (is_array($error))?json_encode($error):$error,
            'type' => 2,
        );
		@get_instance()->Common_DML->put_data( TBL_ERROR, $data );
	}

    public function createAuthorizationURL(){
        $facebook = $this->fabcebook_object;
		$helper = $facebook->getRedirectLoginHelper();
		$permissions = array(
            'email',
            'pages_show_list',
            'pages_read_engagement',
            'pages_manage_posts',
            'public_profile', 
        );
		$loginUrl = $helper->getLoginUrl($this->redirectURL, $permissions);
		return $loginUrl;
    }

    public function generateAccessToken( $code ){
        $facebook = $this->fabcebook_object;
		$helper = $facebook->getRedirectLoginHelper();
		
		try {
		    $accessToken = $helper->getAccessToken();
		} catch(FacebookResponseException $e) {
            // When Graph returns an error
            //echo 'Graph returned an error: ' . $e->getMessage();
            return array(
                'status' => 0,
                'error' => 'Graph returned an error: ' . $e->getMessage()
            );
		} catch(FacebookSDKException $e) {
            $msg = $e->getMessage();
            $this->errorHandler('generateAccessToken' , $msg);
            // When validation fails or other local issues
            //echo 'Facebook SDK returned an error: ' . $msg;
            return array(
                'status' => 0,
                'error' => 'Facebook SDK returned an error: ' . $msg
            );
		}

		if (! isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
		}
		
		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $facebook->getOAuth2Client();

		// Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);

		// Validation (these will throw FacebookSDKException's when they fail)
		$tokenMetadata->validateAppId(FACEBOOK_APP_ID); // Replace {app-id} with your app id
		// If you know the user ID this access token belongs to, you can validate it here
		//$tokenMetadata->validateUserId('123');
		$tokenMetadata->validateExpiration();
		//$helper->getPersistentDataHandler()->set('state',$state);

		if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (FacebookSDKException $e) {
                $msg = $helper->getMessage();
                $this->errorHandler('generateAccessToken' , $msg);

                //echo "<p>Error getting long-lived access token: " . $msg . "</p>\n\n";
                return array(
                    'status' => 0,
                    'error' => "<p>Error getting long-lived access token: " . $msg . "</p>\n\n"
                );
            }
		}

		return array(
            'status' => 1,
            'token' => (string) $accessToken
        );
    }

    public function setAccessToken($token){
        $this->user_access_token = $token;
    }

    public function getUserInfo(){
        $token = $this->user_access_token;
        $facebook = $this->fabcebook_object;
		try {        
			$response = $facebook->get('/me?fields=id,name,email,picture', $token);
		} catch(FacebookResponseException $e) {
			$msg = $e->getMessage();
			$this->errorHandler('getUserInfo' , $msg);
			echo 'Graph returned an error: ' . $msg;
			exit;
		} catch(FacebookSDKException $e) {
			$msg = $e->getMessage();
			$this->errorHandler('getUserInfo' , $msg);
			echo 'Facebook SDK returned an error: ' . $msg;
			exit;
		}

		$user = $response->getGraphUser();
		
		return array(
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'picture' => $user['picture']['url']
        );
    }

    public function checkAccessToken($token){
		try {
            $facebook = $this->fabcebook_object;
			$response = $facebook->get('debug_token?input_token='.$token , FACEBOOK_APP_ID.'|'.FACEBOOK_APP_SECRET); 
			$results = $response->getGraphObject()->asArray();
			// print_r($results);
			return (isset($results['is_valid']))?$results['is_valid']:0;
		}catch (Exception $e) {
			// echo $e->getMessage();
			return $e->getMessage();
		}	
	}

    public function getPages() {
		$pages = array();
		$token = $this->user_access_token;
        $facebook = $this->fabcebook_object;
		$checkToken = $this->checkAccessToken($token);       
		if($checkToken){
			try {
				$response = $facebook->get('/me/accounts?fields=id,name,is_published', $token);
				$results = $response->getGraphEdge();
				foreach ($results as $result) {        
					if (isset($result['is_published'])) {
						if (empty($result['likes'])) $result['likes'] = 0;
						array_push($pages , $result->asArray());
					}
				}
			}catch (Exception $e) {				
				$msg = $e->getMessage();
				$this->errorHandler('getPages' , $msg);
			}	
			return $pages; 
		}else{
			return $checkToken; 
		}		
    }

    public function getPageAccessToken($page_id){
        $token = $this->user_access_token;
        $facebook = $this->fabcebook_object;
        $checkToken = $this->checkAccessToken($token);
        $pageToken = '';
        if($checkToken){
            try {
				$response = $facebook->get("/{$page_id}?fields=access_token", $token);
                $result = $response->getGraphNode();
                $pageToken = isset($result['access_token']) ? $result['access_token'] : '';
            }catch (Exception $e) {				
				$msg = $e->getMessage();
				$this->errorHandler('getPageAccessToken' , $msg);
			}	
			return $pageToken; 
        }else{
            return $checkToken; 
        }
    }
    
    public function getConversion($page_id, $pageToken){
        $token = $this->user_access_token;
        $facebook = $this->fabcebook_object;
        $checkToken = $this->checkAccessToken($token);
        $conversions = array();
		if($checkToken){
            try {
				$response = $facebook->get("/{$page_id}/ratings?fields=reviewer,review_text,recommendation_type,created_time,open_graph_story&limit=1000000", $pageToken);
                $conversions = $response->getGraphEdge()->asArray();
				
			}catch (Exception $e) {				
				$msg = $e->getMessage();
				$this->errorHandler('getConversion' , $msg);
			}	
			return $conversions; 
        }else{
            return $checkToken; 
        }
    }

    public function reviewReply($reply_id, $message, $pageToken){
        $token = $this->user_access_token;
        $facebook = $this->fabcebook_object;
        $checkToken = $this->checkAccessToken($token);
        $conversions = array();
		if($checkToken){
            try {
                $response = $facebook->post("/{$reply_id}/comments", array('message'=>$message), $pageToken);
                $result = $response->getGraphEdge()->asArray();
                return array('status'=>1, 'msg'=> '');
			}catch (Exception $e) {				
				$msg = $e->getMessage();
                $this->errorHandler('reviewReply' , $msg);
                return array('status'=>0, 'msg'=> $msg); 
			}	
        }else{
            return array('status'=>0, 'msg'=>'Your token has expired. Please reconnect with facebook account.'); 
        }
    }

    public function getAllComments($id, $pageToken){
        $token = $this->user_access_token;
        $facebook = $this->fabcebook_object;
        $checkToken = $this->checkAccessToken($token);
        $conversions = array();
		if($checkToken){
            try {
                $response = $facebook->get("/{$id}/comments", $pageToken);
                $result = $response->getGraphEdge()->asArray();
                return array('status'=>1, 'comments'=> $result);
			}catch (Exception $e) {				
				$msg = $e->getMessage();
                $this->errorHandler('getAllComments' , $msg);
                return array('status'=>0, 'msg'=> $msg); 
			}	
        }else{
            return array('status'=>0, 'msg'=>'Your token has expired. Please reconnect with facebook account.'); 
        }
    }

    public function createPost($page_id, $pageToken, $array){
        $token = $this->user_access_token;
        $facebook = $this->fabcebook_object;
        $checkToken = $this->checkAccessToken($token);
        if($checkToken){
            //$array = array('message' => '')
            try {
                $response = $facebook->post("/{$page_id}/feed", $array, $pageToken);                
                $graphNode = $response->getGraphNode();
                return json_decode($graphNode, true);
            } catch(FacebookExceptionsFacebookResponseException $e) {
                //return 'Graph returned an error: ' . $e->getMessage();
                $msg = $e->getMessage();
                $this->errorHandler('getAllComments' , $msg);
                return array('status'=>0, 'msg'=> $msg); 
            } catch(FacebookExceptionsFacebookSDKException $e) {
                //return 'Facebook SDK returned an error: ' . $e->getMessage();
                $msg = $e->getMessage();
                $this->errorHandler('getAllComments' , $msg);
                return array('status'=>0, 'msg'=> $msg); 
            }
        }else{
            return array('status'=>0, 'msg'=>'Your token has expired. Please reconnect with facebook account.'); 
        }
    }
}

?>
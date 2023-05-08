<?php
require 'aws/vendor/autoload.php';

use Aws\Ses\SesClient;
use Aws\Exception\AwsException;

/*use Aws\S3\S3Client;
use Aws\Sqs\SqsClient;
use Aws\Exception\AwsException;*/

/* sns notitfication 
use Aws\Sns\SnsClient;
use Aws\Sns\Message;
use Aws\Sns\MessageValidator;
use Aws\Sns\Exception\InvalidSnsMessageException;
sns notitfication */

function api_arguments(){
	global $amazonKey, $amazonSecretKey, $amazonRegion;
	$args = array(
		'version'     => 'latest',
		'region'      => $amazonRegion,
		'credentials' => array(
			'key'         => $amazonKey,
			'secret'      => $amazonSecretKey
		)
	);
	
	return $args;
}

function sendMailAws($sender_email, $recipient_emails, $subject, $content){
	$SesClient = new SesClient( api_arguments() );

	//$configuration_set = 'ConfigSet';

	$plaintext_body = 'This email was sent with Amazon SES using the AWS SDK for PHP.' ;
	$html_body =  '<h1>AWS Amazon Simple Email Service Test Email</h1>'.
				'<p>This email was sent with <a href="https://aws.amazon.com/ses/">'.
				'Amazon SES</a> using the <a href="https://aws.amazon.com/sdk-for-php/">'.
				'AWS SDK for PHP</a>.</p>';
	$char_set = 'UTF-8';

	try {
		$result = $SesClient->sendEmail([
			'Destination' => [
				'ToAddresses' => $recipient_emails,
			],
			'ReplyToAddresses' => [$sender_email],
			'Source' => $sender_email,
			'Message' => [
			'Body' => [
				/*'Html' => [
					'Charset' => $char_set,
					'Data' => $html_body,
				],*/
				'Text' => [
					'Charset' => $char_set,
					'Data' => $content,
				],
			],
			'Subject' => [
				'Charset' => $char_set,
				'Data' => $subject,
			],
			],
			//'ConfigurationSetName' => $configuration_set,
		]);
		$messageId = $result['MessageId'];
		return array('status' => 1, 'msg' => "Email sent! Message ID: $messageId"."\n");
	} catch (AwsException $e) {
		return array('status' => 0, 'msg' => $e->getAwsErrorMessage());
		// output error message if fails
		/*echo $e->getMessage();
		echo("The email was not sent. Error message: ".$e->getAwsErrorMessage()."\n");
		echo "\n";*/
	}

}

/*function upload_s3( $file, $folder, $userID ){
	if($userID === null){
		$target = $folder."/";
	}else{
		$target = "uploads/user_{$userID}/{$folder}/";
	}

	$pathData = s3_upload_object( $file, $target );

	return $pathData;	
}

function s3_upload_object($source, $target){
	try{
		global $bucket_name;
		$name = basename( $source );
		
		//$key = $target . '/' . uniqid() . '-' . $name;
		$key = $target . $name;
		$file_Path = $source;
		
		//Create a S3Client
		$s3Client = new S3Client( api_arguments() );
		
		$object = array(
			'ACL' => 'public-read',
			'Bucket' => $bucket_name,
			'Key' => $key,
			'SourceFile' => $file_Path,
		);
		
		$result = $s3Client->putObject( $object );
		
		$ObjectURL = $result->get( 'ObjectURL' );
		
		return array( 'url' => $ObjectURL, 'key' => $key );
		
		return $result;
	
	}catch (S3Exception $e) {
		return $e->getMessage();
	}
	
}


function s3_upload_object_ad($source, $key){
	try{
		global $bucket_name;
		//Create a S3Client
		$s3Client = new S3Client( api_arguments() );
		
		$object = array(
			'ACL' => 'public-read',
			'Bucket' => $bucket_name,
			'Key' => $key,
			'SourceFile' => $source,
		);
		
		$result = $s3Client->putObject( $object );
		
		$ObjectURL = $result->get( 'ObjectURL' );
		
		return array( 'url' => $ObjectURL, 'key' => $key );
		
		return $result;
	
	}catch (S3Exception $e) {
		return $e->getMessage();
	}
	
}


function s3_get_object( $keyname, $bucket_name = '' ){
	try{
		
		if($bucket_name == ''){
			global $bucket_name;
		}
		
		$s3Client = new S3Client( api_arguments() );
		
		$object = array(
			'Bucket' => $bucket_name,
			'Key'    => $keyname
		);
		
		$result = $s3Client->getObject( $object );
		//return $result;
		header("Content-Type: {$result['ContentType']}");
				
		return $result['Body'];
		
	}catch(S3Exception $e){
		return $e->getMessage();
	}
}

function s3_get_objects( $bucket_name = '' ){
	try{
		
		if($bucket_name == ''){
			global $bucket_name;
		}
		
		$s3Client = new S3Client( api_arguments() );
		
		$object = array(
			'Bucket' => $bucket_name
		);
		
		$result = $s3Client->listObjectsV2( $object );
		//print_r($result['Contents']);
		return isset($result['Contents']) ? $result['Contents'] : array();
		//header("Content-Type: {$result['ContentType']}");
				
		//return $result['Body'];
		
	}catch(S3Exception $e){
		return $e->getMessage();
	}
}

function s3_delete_object( $keys, $bucket_name = '' ){
	if($bucket_name == ''){
		global $bucket_name;
	}
	
	$s3Client = new S3Client( api_arguments() );
	
	$object = array(
		'Bucket' => $bucket_name,
		'Delete' => array(
			'Objects' => array_map(function ($keys) {
				return array('Key' => $keys);
			}, $keys)
		)
	);
	
	$result = $s3Client->deleteObjects( $object );
	
	$mes = $result->get( 'Deleted' );
	
	return $mes;
}

function s3_delete_matching_object($keys, $bucket_name = '' ){
	
	try{
	$s3Client = new S3Client( api_arguments() );
	
		$result = $s3Client->deleteMatchingObjects($bucket_name ,$keys);
		return $result ;
	}catch (S3Exception $e) {
		return $e->getMessage();
	}
}

function s3_get_bucket(){
	try{
		//Create a S3Client
		$s3Client = new S3Client( api_arguments() );

		//Listing all S3 Bucket
		$bucketsarray = $s3Client->listBuckets();
		
		$buckets = !empty($bucketsarray['Buckets']) ? $bucketsarray['Buckets'] : array();	

		return array( 'status' => 1, 'msg' => '', 'data' => $buckets );
	}catch (S3Exception $e) {
		return array( 'status' => 0, 'msg' => $e->getMessage() );
	}catch (Aws\S3\Exception\S3Exception $e) {
		return array( 'status' => 0, 'msg' => $e->getMessage() );
	}
}

function checkBucket( $bucket ){
	try{
		//Create a S3Client
		$s3Client = new S3Client( api_arguments() );

		$result = $s3Client->getBucketAcl([
			'Bucket' => $bucket
		]);	

		return array( 'status' => 1, 'msg' => $result );
	}catch (S3Exception $e) {
		return array( 'status' => 0, 'msg' => $e->getMessage() );
	}catch (Aws\S3\Exception\S3Exception $e) {
		return array( 'status' => 0, 'msg' => $e->getMessage() );
	}
}

function createBucket( $bucket ){
	try{
		//Create a S3Client
		$s3Client = new S3Client( api_arguments() );

		$result = $s3Client->createBucket([
			'ACL' => 'public-read-write',
			'Bucket' => $bucket
		]);

		return array( 'status' => 1, 'msg' => $result );
	}catch (S3Exception $e) {
		return array( 'status' => 0, 'msg' => $e->getMessage() );
	}catch (Aws\S3\Exception\S3Exception $e) {
		return array( 'status' => 0, 'msg' => $e->getMessage() );
	}
}

function getUrl( $bucket, $key ){
	try{
		$s3Client = new S3Client( api_arguments() );
		return $s3Client->getObjectUrl( $bucket, $key );
	}catch (S3Exception $e) {
		return array( 'status' => 0, 'msg' => $e->getMessage() );
	}catch (Aws\S3\Exception\S3Exception $e) {
		return array( 'status' => 0, 'msg' => $e->getMessage() );
	}
}

function s3_sns_notify(){
	try {
		// Create a message from the post data and validate its signature
		$message = Message::fromRawPostData();
		$validator = new MessageValidator();
		$validator->validate($message);
	} catch (InvalidSnsMessageException $e) {
		return $e->getMessage();
		// Pretend we're not here if the message is invalid
		http_response_code(404);
		die;
	}

	if ($message['Type'] === 'SubscriptionConfirmation') {
		// Confirm the subscription by sending a GET request to the SubscribeURL
	   file_get_contents($message['SubscribeURL']);
	   
	   return true;
	}

	if ($message['Type'] === 'Notification') {
	   // Do whatever you want with the message body and data.
		$a = array( 
			'messageid' => $message['MessageId'],
			'message' => $message['Message']
		);
	   
		return $a;
	   
	}
}

function getAllObjects( $folder ){
	global $bucket_name;
	$s3Client = new S3Client( api_arguments() );

	$objects = $s3Client->listObjects( array(
		"Bucket" => $bucket_name,
		"Prefix" => $folder
	)); 

	return $objects;
}

function sendMessage( $second, $sendMessage, $messageBody, $query_url = "" ){
	$client = new SqsClient( api_arguments() );

	$params = array(
		'DelaySeconds' => $second,
		'MessageAttributes' => $sendMessage,
		'MessageBody' => $messageBody,
		'QueueUrl' => $query_url
	);

	try {
		$result = $client->sendMessage($params);
		return $result;
	} catch (AwsException $e) {
		// output error message if fails
		error_log($e->getMessage());
	}
}

function deleteMessageWediosProcess( $Messages, $query_url = '' ){
	$client = new SqsClient( api_arguments() );
	try {
		$result = $client->receiveMessage(array(
			'VisibilityTimeout' => 20,
			'MaxNumberOfMessages' => 10,
			'QueueUrl' => $query_url
		));
		if (!empty($result->get('Messages'))) {
			$deleteMessage = array();
			foreach($result->get('Messages') as $msg){
				if( in_array( $msg['MessageId'], $Messages ) ){
					$dresult = $client->deleteMessage([
						'QueueUrl' => $query_url, // REQUIRED
						'ReceiptHandle' => $msg['ReceiptHandle'] // REQUIRED
					]); 
					$index = array_search( $msg['MessageId'], $Messages );
					$deleteMessage[] = $Messages[$index];
				}
			}
			return $deleteMessage;
		} else {
			return false;
		}
	} catch (AwsException $e) {
		// output error message if fails
		error_log($e->getMessage());
	}
}

function receiveMessage( $query_url = "" ){
	$client = new SqsClient( api_arguments() );
	echo 'asd';
	try {
		$result = $client->receiveMessage(array(
			'AttributeNames' => ['SentTimestamp'],
			'MaxNumberOfMessages' => 1,
			'MessageAttributeNames' => ['All'],
			'QueueUrl' => $query_url, // REQUIRED
			'WaitTimeSeconds' => 0,
		));
		if (!empty($result->get('Messages'))) {
			echo '<pre>';
			var_dump($result->get('Messages')[0]['MessageAttributes']);
			echo ($result->get('Messages')[0]['MessageAttributes']['Author']['StringValue']);
			echo ($result->get('Messages')[0]['MessageAttributes']['Title']['StringValue']);
			echo ($result->get('Messages')[0]['MessageAttributes']['WeeksOn']['StringValue']);
			echo '</pre>';
			$dresult = $client->deleteMessage([
				'QueueUrl' => $query_url, // REQUIRED
				'ReceiptHandle' => $result->get('Messages')[0]['ReceiptHandle'] // REQUIRED
			]);
			return $result->get('body');
		} else {
			echo "No messages in queue. \n";
		}
	} catch (AwsException $e) {
		// output error message if fails
		error_log($e->getMessage());
	}
}*/
<?php 

require '../zoomtest/vendor/autoload.php';

//file for zoom login
echo "Coming from zoom\n";

print_r($_REQUEST);


$zoom_login_url = "https://zoom.us/oauth/token";
$zoom_client_id = "test";//"TXwhCFbhTQKJ46_QhHNYqAT";
$zoom_client_secret = "test";//"fTD06LLZcOjhjbiBUxWSTve1RTfJbf2TT8";
$zoom_authorization_code = $_REQUEST['code'];//"pU3i3t7azi_SrJ6H0M2T-yYmthQogWOjA";


// echo $header_content = "Basic base64({$zoom_client_id}:{$zoom_client_secret})";
// Create a client with a base URI
$client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us/']);
// Send a request to https://foo.com/api/test
$response = $client->request('POST', 'oauth/token', [
	'headers' => [
		"Authorization" => "Basic base64({$zoom_client_id}:{$zoom_client_secret})"
	],
	'form_params' => [
		'grant_type' => 'authorization_code',
		'code' => $zoom_authorization_code,
		'redirect_uri' => 'http://localvm.com/zoomtest/zoomtest.php'
	],
	'debug' => true
]);

// echo "\n\n";

// foreach ($response->getHeaders() as $name => $values) {
//     echo $name . ': ' . implode(', ', $values) . "\r\n";
// }

// echo $response->getStatusCode(); // 200
// echo $response->getReasonPhrase(); // OK
// echo $response->getProtocolVersion(); // 1.1


// $body = $response->getBody();
echo "<pre>";
$stream = $response->getBody();
$contents = $stream->getContents(); // returns all the contents
// $contents = $stream->getContents(); // empty string
// $stream->rewind(); // Seek to the beginning
// $contents = $stream->getContents(); // returns all the contents
var_dump($contents);
// $body);
// Cast to a string: { ... }
// $body->seek(0);
// // Rewind the body
// $body->read(1024);
// Read bytes of the body


// print_r(json_decode($response->getBody()));

 ?>

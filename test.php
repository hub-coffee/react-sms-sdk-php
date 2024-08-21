<?php 

require __DIR__."/vendor/autoload.php";

use reactsms_sdk_php\SDK\Reactsms;


// Integration test

$AUTH_KEY = "rs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$API_KEY = "rs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$SERVICE_KEY = "xxxxxx";

$reactsms = new Reactsms($AUTH_KEY, $API_KEY, $SERVICE_KEY);

// $response = $reactsms->send_message("just a test!", 
//         [
//             ["zip_code" => "+225", "number" => "0758187266"],
//         ]
//     );
    
// print($response);


// $response = $reactsms->balance();
// print($response);

// $response = $reactsms->create_service("wetest09", 0, false, "jsut a test !");
// print($response);

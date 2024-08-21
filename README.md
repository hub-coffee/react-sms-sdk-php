# react-sms-sdk-php

ReactSMS SDK for PHP 

This Package can be used in PHP native project and all PHP Framework as Laravel, Symfony ...


## Install Package

To install this SDK, run: 

    composer require reactsms_sdk_php/reactsms_sdk_php


## Initial Configuration

    <?php 

    use reactsms_sdk_php\SDK\Reactsms;

    require_once './vendor/autoload.php';


## Example Send Message

    $AUTH_KEY = "rs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
    $API_KEY = "rs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
    $SERVICE_KEY = "xxxxxx";

    $reactsms = new Reactsms($AUTH_KEY, $API_KEY, $SERVICE_KEY);

    $response = $reactsms->send_message("Just a test", [["zip_code" => "+225", "number" => "0758187266"]]);
    print($response);


## Example Balance Checking

    $AUTH_KEY = "rs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
    $API_KEY = "rs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

    $reactsms = new Reactsms($AUTH_KEY, $API_KEY);

    $response = $reactsms->balance();
    print($response);


## Example Create service

    $AUTH_KEY = "rs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
    $API_KEY = "rs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

    $reactsms = new Reactsms($AUTH_KEY, $API_KEY);

    $response = $reactsms->create_service($service_name, $quota_sms, $active_quota, $description);
    print($response);




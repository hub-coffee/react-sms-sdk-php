<?php 
namespace reactsms_sdk_php\SDK;

use GuzzleHttp\Client as GuzzleClient;


class Reactsms {
    private $httpClient;
    private $apiKey;
    private $authKey;
    private $serviceKey;
    private const BASE_URL = "https://www.react-sms.com";


    public function __construct(string $authKey, string $apiKey, string $serviceKey = "") {
        $this->httpClient = new GuzzleClient(['base_uri' => self::BASE_URL]);
        $this->authKey = $authKey;
        $this->apiKey = $apiKey;
        $this->serviceKey = $serviceKey;
    }

    private function build_token():string {
        return base64_encode($this->authKey.":".$this->apiKey);
    }

    private function request($method, $uri, $options = []) {
        $options['headers']['Authorization'] = 'Bearer '.$this->build_token();
        $response = $this->httpClient->request($method, $uri, $options);
        return $response->getBody(); //json_decode($response->getBody(), true);
    }

    private function clean_phones(array $phones) {
        $new_phones = [];

        foreach($phones as $phone) {
            $object_phone = (object) $phone;
            array_push($new_phones, $object_phone);
        }
        return $new_phones;
    }

    /**
     * Send message function
     * 
     * @param string $message this parameter contains the message body
     * 
     * @param array $phones this parameter contains the phones numbers
     * 
     * @return json $data return type is JSON data
     * 
     */
    public function send_message(string $message, array $phones) {
        $payload = [
            "message" => $message, 
            "numbers" => json_encode($this->clean_phones($phones)),
            "serviceKey" => $this->serviceKey
        ];

        return $this->request('POST', "/messages/send", ['json' => $payload]);
    }

    /**
     * Balance function
     * 
     * @return json $data return type is JSON data
     */
    public function balance() {
        return $this->request('GET', "/messages/get_balance");
    }

    /**
     * Create service function
     * 
     * @param string $service_name
     * 
     * @param int $quota_sms
     * 
     * @param bool $active_quota
     * 
     * @param string $description
     *     
     * @return json $data return type is JSON data
     */
    public function create_service(string $service_name, int $quota_sms, bool $active_quota, string $description) {
        $payload = [
            "service_name" => $service_name,
            "quota_sms" => $quota_sms,
            "active_quota" => $active_quota,
            "description" => $description
        ];
        return $this->request('POST', "/messages/create_service", ['json' => $payload]);
    }
}
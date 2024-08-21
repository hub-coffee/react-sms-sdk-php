<?php 
namespace reactsms_sdk_php\SDK;

class SendMessage {
    private $reactsms;

    public function __construct(Reactsms $reactsms) {
        $this->reactsms = $reactsms;
    }

    public function send_message(array $payload) {
        return $this->reactsms->request('POST', "/send", ['json' => json_encode($payload)]);
    }
}
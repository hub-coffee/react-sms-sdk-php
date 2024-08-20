<?php 
namespace reactsms_sdk_php\SDK;

class CreateService {
    private $reactsms;

    public function __construct(Reactsms $reactsms) {
        $this->reactsms = $reactsms;
    }

    public function create_service(array $payload) {
        return $this->reactsms->request('POST', "/create_service", ['json' => json_encode($payload)]);
    }
}

new CreateService(new Reactsms("", "", ""));
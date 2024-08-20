<?php 
namespace reactsms_sdk_php\SDK;

class GetBalance {
    private $reactsms;

    public function __construct(Reactsms $reactsms) {
        $this->reactsms = $reactsms;
    }

    public function balance() {
        return $this->reactsms->request('GET', "/get_balance");
    }
}
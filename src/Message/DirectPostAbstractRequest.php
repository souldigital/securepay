<?php

namespace Omnipay\SecurePay\Message;

/**
 * SecurePay Direct Post Abstract Request
 */
abstract class DirectPostAbstractRequest extends AbstractRequest
{
    public $testPurchaseEndpoint = 'https://api.securepay.com.au/test/directpost/authorise';
    public $livePurchaseEndpoint = 'https://api.securepay.com.au/live/directpost/authorise';

    public function getRequestType(){
        return 'Payment';
    }
}

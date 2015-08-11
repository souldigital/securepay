<?php

namespace Omnipay\SecurePay\Message;

/**
 * SecurePay Direct Post Authorize Request
 */
class DirectPostCreateCardRequest extends DirectPostAuthorizeRequest
{
    public $txnType = '1';

    public function getData()
    {
        $this->validate('returnUrl', 'card');

        $data = array();
        $data['EPS_MERCHANT'] = $this->getMerchantId();
        $data['EPS_TXNTYPE'] = $this->txnType;
        $data['EPS_IP'] = $this->getClientIp();
        $data['EPS_AMOUNT'] = $this->getAmount();
        $data['EPS_REFERENCEID'] = $this->getTransactionId();
        $data['EPS_TIMESTAMP'] = gmdate('YmdHis');
        $data['EPS_FINGERPRINT'] = $this->generateFingerprint($data);
        $data['EPS_RESULTURL'] = $this->getReturnUrl();
        $data['EPS_CALLBACKURL'] = $this->getReturnUrl();
        $data['EPS_REDIRECT'] = 'TRUE';
        $data['EPS_CURRENCY'] = $this->getCurrency();
        $data['EPS_STORE'] = 'TRUE';
        $data['EPS_STORETYPE'] = 'TOKEN';

        $data = array_replace($data, $this->getCardData());

        return $data;
    }

    public function sendData($data)
    {
        return $this->response = new DirectPostAuthorizeResponse($this, $data, $this->getEndpoint());
    }

}

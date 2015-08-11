<?php

namespace Omnipay\SecurePay\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * SecurePay Direct Post Complete Create Card Response
 */
class DirectPostCompleteCreateCardResponse extends DirectPostCompletePurchaseResponse
{
    public function isSuccessful()
    {
        return isset($this->data['strescode']) && $this->data['strescode'] == 00;
    }

    public function getCardReference()
    {
        if (isset($this->data['token'])) {
            return $this->data['token'];
        }
    }

    public function getPayorReference()
    {
        if (isset($this->data['payor'])) {
            return $this->data['payor'];
        }
    }

}

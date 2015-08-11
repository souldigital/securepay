<?php

namespace Omnipay\SecurePay\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * SecurePay Direct Post Complete Create Card Request
 */
class DirectPostCompleteCreateCardRequest extends DirectPostCompletePurchaseRequest
{

    public function sendData($data)
    {
        return $this->response = new DirectPostCompleteCreateCardResponse($this, $data);
    }
}

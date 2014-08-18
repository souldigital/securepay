<?php

namespace Omnipay\SecurePay\Message;

/**
 * SecurePay Direct Post Purchase Request
 */
class DirectPostPurchaseRequest extends DirectPostAuthorizeRequest
{
    public $txnType = '0';
        public function getData(){
            $data = parent::getData();

            $this->validate('amount', 'card');

            $this->getCard()->validate();
            $data['EPS_CARDNUMBER'] = $this->getCard()->getNumber();
            $data['EPS_EXPIRYMONTH'] = $this->getCard()->getExpiryMonth();
            $data['EPS_EXPIRYYEAR'] = $this->getCard()->getExpiryYear();
            $data['EPS_CVV']  = $this->getCard()->getCvv();

            return $data;
        }
    }

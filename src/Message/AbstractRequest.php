<?php

namespace Omnipay\SecurePay\Message;

/**
 * SecurePay Direct Post Abstract Request.
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    public $testPurchaseEndpoint;
    public $livePurchaseEndpoint;
    public $testPeriodicEndpoint;
    public $livePeriodicEndpoint;

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getTransactionPassword()
    {
        return $this->getParameter('transactionPassword');
    }

    public function setTransactionPassword($value)
    {
        return $this->setParameter('transactionPassword', $value);
    }

    public function getEndpoint()
    {
        $type = $this->getRequestType();
        $mode = ($this->getTestMode())?"Test":"Live";

        $r["Payment"]["Test"] = $this->testPurchaseEndpoint;
        $r["Payment"]["Live"] = $this->livePurchaseEndpoint;
        $r["Periodic"]["Test"] = $this->testPeriodicEndpoint;
        $r["Periodic"]["Live"] = $this->livePeriodicEndpoint;

        return  $r[$type][$mode];
    }
}

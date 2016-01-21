<?php

namespace Omnipay\Adyen\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Adyen Response.
 *
 * Adyen is a Off-site gateway, where the customer is redirected to a third party site to enter payment details.
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{

    /**
     * @return boolean False to always redirect the customer to Adyen.
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * @return boolean True to always redirect the customer to Adyen.
     */
    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        return $this->getRequest()->getEndpoint().'?'.http_build_query($this->getRedirectData());
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return $this->data;
    }
}

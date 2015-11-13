<?php
class Bc_Bcpay_Helper_Data extends Mage_Core_Helper_Abstract{

    function getPaymentGatewayUrl()
    {
        return Mage::getUrl('bcpay/payment/gateway', array('_secure' => false));
    }

}
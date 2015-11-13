<?php
class Bc_Bcpay_Model_Bcpay extends Mage_Payment_Model_Method_Abstract
{
    protected $_code = 'bcpay';
    protected $_formBlockType = 'bcpay/form_bcpay';
    protected $_infoBlockType = 'bcpay/info_bcpay';

    public function assignData($data)
    {
        $info = $this->getInfoInstance();

        if ($data->getCustomFieldOne()) {
            $info->setCustomFieldOne($data->getCustomFieldOne());
        }

        if ($data->getCustomFieldTwo()) {
            $info->setCustomFieldTwo($data->getCustomFieldTwo());
        }

        return $this;
    }

    public function validate()
    {
        parent::validate();
        $info = $this->getInfoInstance();

        if (!$info->getCustomFieldOne()) {
            $errorCode = 'invalid_data';
            $errorMsg = $this->_getHelper()->__("CustomFieldOne is a required field.\n");
        }

        if (!$info->getCustomFieldTwo()) {
            $errorCode = 'invalid_data';
            $errorMsg .= $this->_getHelper()->__('CustomFieldTwo is a required field.');
        }

        if ($errorMsg) {
            Mage::throwException($errorMsg);
        }

        return $this;
    }

    public function getOrderPlaceRedirectUrl()
    {
        return Mage::getUrl('bcpay/payment/redirect', array('_secure' => false));
    }
}
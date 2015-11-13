<?php
class Bc_Bcpay_Block_Form_Bcpay extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('bcpay/form/bcpay.phtml');
    }
}
<?php


namespace Test\Eshoper\Block;
use Magento\Framework\View\Element\Template;

class HeaderTop extends \Magento\Framework\View\Element\Template
{
    public function _beforeToHtml()
    {
        $config = $this->_scopeConfig;
        $phone = $config->getValue('general/store_information/phone');
        $email = $config->getValue('trans_email/ident_general/email');
        $twitter = $config->getValue('social/social_config/twitter');
        $facebook = $config->getValue('social/social_config/facebook');
        $this->setData('store_phone', $phone);
        $this->setData('store_email', $email);
        $this->setData('store_twitter', $twitter);
        $this->setData('store_facebook', $facebook);
    }
}
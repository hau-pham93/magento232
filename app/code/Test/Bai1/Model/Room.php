<?php


namespace Test\Bai1\Model;


class Room extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Test\Bai1\Model\ResourceModel\Room');
    }
}
<?php


namespace Test\Bai1\Model\ResourceModel;


class Room extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('rooms', 'room_id');
    }
}
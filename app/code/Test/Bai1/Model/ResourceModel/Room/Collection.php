<?php


namespace Test\Bai1\Model\ResourceModel\Room;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'room_id';

    protected function _construct()
    {
        $this->_init('Test\Bai1\Model\Room', 'Test\Bai1\Model\ResourceModel\Room');
    }
}
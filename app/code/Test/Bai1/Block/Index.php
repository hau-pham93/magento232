<?php


namespace Test\Bai1\Block;


use Magento\Framework\View\Element\Template;
use Test\Bai1\Model\ResourceModel\Room\CollectionFactory;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $collectionFactory;
    protected $storeManager;
    public function __construct(Template\Context $context,
                                CollectionFactory $collectionFactory,
                                \Magento\Store\Model\StoreManagerInterface $storeManager,
                                array $data = [])
    {
        $this->storeManager = $storeManager;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getTitle()
    {
        return __('Có ai ở đây không!');
    }
    public function getRooms() {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('status', ['eq' => 1]);
        return $collection;
    }
    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);

        return $mediaUrl;
    }
}
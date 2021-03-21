<?php


namespace Test\Bai1\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;
use Test\Bai1\Model\RoomFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $resultRedirect;
    private $roomFactory;

    public function __construct(
        Action\Context $context,
        RoomFactory $roomFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->roomFactory = $roomFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['room_id']) ? $data['room_id'] : null;

        $newData = [
            'room_name' => $data['room_name'],
            'status' => $data['status'],
            'address' => $data['address'],
            'sku' => $data['sku'],
            'price' => $data['price'],
            'image' => $data['images'][0]['name'],
        ];

        $rooms = $this->roomFactory->create();
        if ($id) {
            $rooms->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }
        try{
            $rooms->addData($newData);
            $rooms->save();
            return $this->resultRedirect->create()->setPath('helloworld/post/index');
        }catch (\Exception $e){
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
    }
}
<?php

namespace Custom\InventoryAlert\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Custom\InventoryAlert\Model\AlertFactory;

class Status extends Action
{
    protected $alertFactory;

    public function __construct(
        Action\Context $context,
        AlertFactory $alertFactory
    ) {
        parent::__construct($context);
        $this->alertFactory = $alertFactory;
    }

    public function execute()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $status = (int) $this->getRequest()->getParam('status');

        try {
            $alert = $this->alertFactory->create()->load($id);

            if ($alert->getId()) {
                $alert->setStatus($status);
                $alert->save();
                $this->messageManager->addSuccessMessage(__('Alert status updated.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error: %1', $e->getMessage()));
        }

        return $this->_redirect('inventoryalert/index/index');
    }
}
<?php

namespace Custom\InventoryAlert\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Custom\InventoryAlert\Model\AlertFactory;

class Delete extends Action
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

        try {
            $alert = $this->alertFactory->create()->load($id);

            if ($alert->getId()) {
                $alert->delete();
                $this->messageManager->addSuccessMessage(__('Alert deleted.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error: %1', $e->getMessage()));
        }

        return $this->_redirect('inventoryalert/index/index');
    }
}
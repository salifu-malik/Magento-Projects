<?php

namespace Custom\InventoryAlert\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Custom\InventoryAlert\Model\AlertFactory;

class Save extends Action
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
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            return $this->_redirect('inventoryalert/index/create');
        }

        try {
            $alert = $this->alertFactory->create();
            $alert->setData([
                'product_sku' => $data['product_sku'],
                'threshold_qty' => $data['threshold_qty'],
                'notification_email' => $data['notification_email'],
                'status' => $data['status']
            ]);

            $alert->save();

            $this->messageManager->addSuccessMessage(__('Inventory alert saved successfully.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error saving alert: %1', $e->getMessage()));
        }

        return $this->_redirect('inventoryalert/index/create');
    }
}
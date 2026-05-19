<?php

namespace Marketplace\VendorManager\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Marketplace\VendorManager\Model\VendorFactory;

class Save extends Action
{
    protected $vendorFactory;

    public function __construct(
        Action\Context $context,
        VendorFactory $vendorFactory
    ) {
        parent::__construct($context);
        $this->vendorFactory = $vendorFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            return $this->_redirect('vendor/index/create');
        }

        try {
            $vendor = $this->vendorFactory->create();
            $vendor->setData([
                'name' => $data['name'],
                'email' => $data['email'],
                'store_name' => $data['store_name'],
                'status' => $data['status']
            ]);

            $vendor->save();

            $this->messageManager->addSuccessMessage(__('Vendor saved successfully.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error saving vendor: %1', $e->getMessage()));
        }

        return $this->_redirect('vendor/index/create');
    }
}

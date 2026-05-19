<?php

namespace Marketplace\VendorManager\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Marketplace\VendorManager\Model\VendorFactory;

class Status extends Action
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
        $id = (int) $this->getRequest()->getParam('id');
        $status = (int) $this->getRequest()->getParam('status');

        try {
            $vendor = $this->vendorFactory->create()->load($id);

            if ($vendor->getId()) {
                $vendor->setStatus($status);
                $vendor->save();
                $this->messageManager->addSuccessMessage(__('Vendor status updated.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error: %1', $e->getMessage()));
        }

        return $this->_redirect('vendor/index/index');
    }
}
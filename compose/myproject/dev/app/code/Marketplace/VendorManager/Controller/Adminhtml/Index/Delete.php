<?php

namespace Marketplace\VendorManager\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Marketplace\VendorManager\Model\VendorFactory;

class Delete extends Action
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

        try {
            $vendor = $this->vendorFactory->create()->load($id);

            if ($vendor->getId()) {
                $vendor->delete();
                $this->messageManager->addSuccessMessage(__('Vendor deleted.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error: %1', $e->getMessage()));
        }

        return $this->_redirect('vendor/index/index');
    }
}
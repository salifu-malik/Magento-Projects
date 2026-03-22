<?php

namespace Custom\InventoryAlert\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Create extends Action
{
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Add Inventory Alert'));

        return $resultPage;
    }
}
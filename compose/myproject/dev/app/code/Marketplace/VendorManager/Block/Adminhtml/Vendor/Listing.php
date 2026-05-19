<?php

namespace Marketplace\VendorManager\Block\Adminhtml\Vendor;

use Magento\Backend\Block\Template;
use Marketplace\VendorManager\Model\ResourceModel\Vendor\CollectionFactory;

class Listing extends Template
{
    protected $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
    }

    public function getVendors()
    {
        return $this->collectionFactory->create();
    }
}
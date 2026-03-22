<?php

namespace Custom\ProductSync\Block\Adminhtml\ProductSync;

use Magento\Backend\Block\Template;
use Custom\ProductSync\Model\ResourceModel\ProductSync\CollectionFactory;

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

    public function getProducts()
    {
        return $this->collectionFactory->create();
    }
}
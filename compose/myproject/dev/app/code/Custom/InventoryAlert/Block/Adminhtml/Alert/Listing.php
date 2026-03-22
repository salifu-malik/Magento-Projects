<?php

namespace Custom\InventoryAlert\Block\Adminhtml\Alert;

use Magento\Backend\Block\Template;
use Custom\InventoryAlert\Model\ResourceModel\Alert\CollectionFactory;

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

    public function getAlerts()
    {
        return $this->collectionFactory->create();
    }
}
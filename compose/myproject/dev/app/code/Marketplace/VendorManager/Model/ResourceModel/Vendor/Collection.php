<?php

namespace Marketplace\VendorManager\Model\ResourceModel\Vendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Marketplace\VendorManager\Model\Vendor;
use Marketplace\VendorManager\Model\ResourceModel\Vendor as VendorResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Vendor::class, VendorResource::class);
    }
}
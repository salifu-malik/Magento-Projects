<?php

namespace Marketplace\VendorManager\Model;

use Magento\Framework\Model\AbstractModel;

class Vendor extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Marketplace\VendorManager\Model\ResourceModel\Vendor::class);
    }
}
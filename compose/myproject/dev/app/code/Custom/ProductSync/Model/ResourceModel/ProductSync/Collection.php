<?php

namespace Custom\ProductSync\Model\ResourceModel\ProductSync;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Custom\ProductSync\Model\ProductSync;
use Custom\ProductSync\Model\ResourceModel\ProductSync as ProductSyncResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ProductSync::class, ProductSyncResource::class);
    }
}
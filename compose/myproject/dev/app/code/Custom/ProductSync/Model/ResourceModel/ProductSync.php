<?php

namespace Custom\ProductSync\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductSync extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('custom_product_sync', 'sync_id');
    }
}
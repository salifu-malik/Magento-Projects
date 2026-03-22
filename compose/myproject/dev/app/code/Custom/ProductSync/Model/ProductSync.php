<?php

namespace Custom\ProductSync\Model;

use Magento\Framework\Model\AbstractModel;

class ProductSync extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Custom\ProductSync\Model\ResourceModel\ProductSync::class);
    }
}
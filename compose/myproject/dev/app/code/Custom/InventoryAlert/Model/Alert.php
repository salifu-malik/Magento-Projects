<?php

namespace Custom\InventoryAlert\Model;

use Magento\Framework\Model\AbstractModel;

class Alert extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Custom\InventoryAlert\Model\ResourceModel\Alert::class);
    }
}
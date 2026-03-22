<?php

namespace Custom\InventoryAlert\Model\ResourceModel\Alert;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Custom\InventoryAlert\Model\Alert;
use Custom\InventoryAlert\Model\ResourceModel\Alert as AlertResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Alert::class, AlertResource::class);
    }
}
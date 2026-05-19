<?php

namespace Custom\AnalyticsDashboard\Block\Adminhtml;

use Magento\Backend\Block\Template;
use Magento\Framework\App\ResourceConnection;

class Dashboard extends Template
{
    protected $resource;

    public function __construct(
        Template\Context $context,
        ResourceConnection $resource,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->resource = $resource;
    }

    protected function getConnection()
    {
        return $this->resource->getConnection();
    }

    public function getVendorCount()
    {
        return $this->getConnection()
            ->fetchOne("SELECT COUNT(*) FROM marketplace_vendor");
    }

    public function getActiveVendorCount()
    {
        return $this->getConnection()
            ->fetchOne("SELECT COUNT(*) FROM marketplace_vendor WHERE status = 1");
    }

    public function getAlertCount()
    {
        return $this->getConnection()
            ->fetchOne("SELECT COUNT(*) FROM custom_inventory_alert");
    }

    public function getSyncedProductCount()
    {
        return $this->getConnection()
            ->fetchOne("SELECT COUNT(*) FROM custom_product_sync");
    }

    public function getActiveSyncedProductCount()
    {
        return $this->getConnection()
            ->fetchOne("SELECT COUNT(*) FROM custom_product_sync WHERE status = 1");
    }

    public function getTotalApiProductValue()
    {
        return $this->getConnection()
            ->fetchOne("SELECT SUM(price) FROM custom_product_sync");
    }

    public function getAverageApiProductPrice()
    {
        return $this->getConnection()
            ->fetchOne("SELECT AVG(price) FROM custom_product_sync");
    }

//    public function getLowStockProducts()
//    {
//        return $this->getConnection()->fetchAll(
//            "SELECT sku, quantity FROM cataloginventory_stock_item WHERE quantity <= 10"
//        );
//    }

    public function getLowStockProducts()
    {
        return $this->getConnection()->fetchAll(
            "SELECT e.sku, s.qty AS quantity
         FROM cataloginventory_stock_item s
         INNER JOIN catalog_product_entity e
             ON s.product_id = e.entity_id
         WHERE s.qty <= 10"
        );
    }
}
<?php

namespace Custom\ProductSync\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Custom\ProductSync\Model\ProductSyncFactory;

class Save extends Action
{
    protected $productSyncFactory;

    public function __construct(
        Action\Context $context,
        ProductSyncFactory $productSyncFactory
    ) {
        parent::__construct($context);
        $this->productSyncFactory = $productSyncFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            return $this->_redirect('productsync/index/create');
        }

        try {
            $product = $this->productSyncFactory->create();
            $product->setData([
                'product_name' => $data['product_name'],
                'sku' => $data['sku'],
                'price' => $data['price'],
                'status' => $data['status']
            ]);

            $product->save();

            $this->messageManager->addSuccessMessage(__('Synced product saved successfully.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error saving synced product: %1', $e->getMessage()));
        }

        return $this->_redirect('productsync/index/create');
    }
}
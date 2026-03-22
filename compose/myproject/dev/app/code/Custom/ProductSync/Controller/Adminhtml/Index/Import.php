<?php

namespace Custom\ProductSync\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Custom\ProductSync\Model\ProductSyncFactory;

class Import extends Action
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
        try {
            $apiUrl = 'https://fakestoreapi.com/products';
            $response = file_get_contents($apiUrl);
            $products = json_decode($response, true);

            if (!is_array($products)) {
                throw new \Exception('Invalid API response.');
            }

            $count = 0;

            foreach ($products as $item) {
                if (!isset($item['title'], $item['price'], $item['id'])) {
                    continue;
                }

                $product = $this->productSyncFactory->create();
                $product->setData([
                    'product_name' => $item['title'],
                    'sku' => 'api-product-' . $item['id'],
                    'price' => $item['price'],
                    'status' => 1
                ]);

                $product->save();
                $count++;
            }

            $this->messageManager->addSuccessMessage(__('%1 products imported from external API.', $count));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('API import failed: %1', $e->getMessage()));
        }

        return $this->_redirect('productsync/index/index');
    }
}
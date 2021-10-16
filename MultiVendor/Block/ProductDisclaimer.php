<?php
namespace Custom\MultiVendor\Block;


use Magento\Framework\View\Element\Template;
use \Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template\Context;

class ProductDisclaimer extends \Magento\Framework\View\Element\Template
{       


    /**
     * @var ScopeConfigInterface
     */
    private $storeConfig;
 
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context,$data);
    }

    public function getProductDisclaimer()
    {
        return $this->scopeConfig->getValue('general/product_details/product_disclaimer');
    }
}

<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Custom\MultiVendor\Model;

use Custom\MultiVendor\Api\Data\CustomMultivendorInterface;
use Custom\MultiVendor\Api\Data\CustomMultivendorInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class CustomMultivendor extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'custom_multivendor_custom_multivendor';
    protected $custom_multivendorDataFactory;

    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CustomMultivendorInterfaceFactory $custom_multivendorDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Custom\MultiVendor\Model\ResourceModel\CustomMultivendor $resource
     * @param \Custom\MultiVendor\Model\ResourceModel\CustomMultivendor\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CustomMultivendorInterfaceFactory $custom_multivendorDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Custom\MultiVendor\Model\ResourceModel\CustomMultivendor $resource,
        \Custom\MultiVendor\Model\ResourceModel\CustomMultivendor\Collection $resourceCollection,
        array $data = []
    ) {
        $this->custom_multivendorDataFactory = $custom_multivendorDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve custom_multivendor model with custom_multivendor data
     * @return CustomMultivendorInterface
     */
    public function getDataModel()
    {
        $custom_multivendorData = $this->getData();
        
        $custom_multivendorDataObject = $this->custom_multivendorDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $custom_multivendorDataObject,
            $custom_multivendorData,
            CustomMultivendorInterface::class
        );
        
        return $custom_multivendorDataObject;
    }
}


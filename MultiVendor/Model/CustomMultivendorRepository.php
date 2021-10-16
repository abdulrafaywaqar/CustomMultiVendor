<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Custom\MultiVendor\Model;

use Custom\MultiVendor\Api\CustomMultivendorRepositoryInterface;
use Custom\MultiVendor\Api\Data\CustomMultivendorInterfaceFactory;
use Custom\MultiVendor\Api\Data\CustomMultivendorSearchResultsInterfaceFactory;
use Custom\MultiVendor\Model\ResourceModel\CustomMultivendor as ResourceCustomMultivendor;
use Custom\MultiVendor\Model\ResourceModel\CustomMultivendor\CollectionFactory as CustomMultivendorCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class CustomMultivendorRepository implements CustomMultivendorRepositoryInterface
{

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $customMultivendorFactory;

    protected $searchResultsFactory;

    protected $dataCustomMultivendorFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $customMultivendorCollectionFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;


    /**
     * @param ResourceCustomMultivendor $resource
     * @param CustomMultivendorFactory $customMultivendorFactory
     * @param CustomMultivendorInterfaceFactory $dataCustomMultivendorFactory
     * @param CustomMultivendorCollectionFactory $customMultivendorCollectionFactory
     * @param CustomMultivendorSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCustomMultivendor $resource,
        CustomMultivendorFactory $customMultivendorFactory,
        CustomMultivendorInterfaceFactory $dataCustomMultivendorFactory,
        CustomMultivendorCollectionFactory $customMultivendorCollectionFactory,
        CustomMultivendorSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->customMultivendorFactory = $customMultivendorFactory;
        $this->customMultivendorCollectionFactory = $customMultivendorCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCustomMultivendorFactory = $dataCustomMultivendorFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Custom\MultiVendor\Api\Data\CustomMultivendorInterface $customMultivendor
    ) {
        /* if (empty($customMultivendor->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $customMultivendor->setStoreId($storeId);
        } */
        
        $customMultivendorData = $this->extensibleDataObjectConverter->toNestedArray(
            $customMultivendor,
            [],
            \Custom\MultiVendor\Api\Data\CustomMultivendorInterface::class
        );
        
        $customMultivendorModel = $this->customMultivendorFactory->create()->setData($customMultivendorData);
        
        try {
            $this->resource->save($customMultivendorModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customMultivendor: %1',
                $exception->getMessage()
            ));
        }
        return $customMultivendorModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($customMultivendorId)
    {
        $customMultivendor = $this->customMultivendorFactory->create();
        $this->resource->load($customMultivendor, $customMultivendorId);
        if (!$customMultivendor->getId()) {
            throw new NoSuchEntityException(__('custom_multivendor with id "%1" does not exist.', $customMultivendorId));
        }
        return $customMultivendor->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customMultivendorCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Custom\MultiVendor\Api\Data\CustomMultivendorInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Custom\MultiVendor\Api\Data\CustomMultivendorInterface $customMultivendor
    ) {
        try {
            $customMultivendorModel = $this->customMultivendorFactory->create();
            $this->resource->load($customMultivendorModel, $customMultivendor->getCustomMultivendorId());
            $this->resource->delete($customMultivendorModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the custom_multivendor: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($customMultivendorId)
    {
        return $this->delete($this->get($customMultivendorId));
    }
}


<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Custom\MultiVendor\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomMultivendorRepositoryInterface
{

    /**
     * Save custom_multivendor
     * @param \Custom\MultiVendor\Api\Data\CustomMultivendorInterface $customMultivendor
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Custom\MultiVendor\Api\Data\CustomMultivendorInterface $customMultivendor
    );

    /**
     * Retrieve custom_multivendor
     * @param string $customMultivendorId
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($customMultivendorId);

    /**
     * Retrieve custom_multivendor matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete custom_multivendor
     * @param \Custom\MultiVendor\Api\Data\CustomMultivendorInterface $customMultivendor
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Custom\MultiVendor\Api\Data\CustomMultivendorInterface $customMultivendor
    );

    /**
     * Delete custom_multivendor by ID
     * @param string $customMultivendorId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customMultivendorId);
}


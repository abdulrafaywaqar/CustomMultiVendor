<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Custom\MultiVendor\Api\Data;

interface CustomMultivendorSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get custom_multivendor list.
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface[]
     */
    public function getItems();

    /**
     * Set sku list.
     * @param \Custom\MultiVendor\Api\Data\CustomMultivendorInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}


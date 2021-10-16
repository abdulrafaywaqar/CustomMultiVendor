<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Custom\MultiVendor\Api\Data;

interface CustomMultivendorInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const UPDATED_AT = 'updated_at';
    const CUSTOM_MULTIVENDOR_ID = 'custom_multivendor_id';
    const VENDOR_NOTE = 'vendor_note';
    const CREATED_AT = 'created_at';
    const SKU = 'sku';
    const VENDOR_NUMBER = 'vendor_number';

    /**
     * Get custom_multivendor_id
     * @return string|null
     */
    public function getCustomMultivendorId();

    /**
     * Set custom_multivendor_id
     * @param string $customMultivendorId
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setCustomMultivendorId($customMultivendorId);

    /**
     * Get sku
     * @return string|null
     */
    public function getSku();

    /**
     * Set sku
     * @param string $sku
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setSku($sku);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Custom\MultiVendor\Api\Data\CustomMultivendorExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Custom\MultiVendor\Api\Data\CustomMultivendorExtensionInterface $extensionAttributes
    );

    /**
     * Get vendor_number
     * @return string|null
     */
    public function getVendorNumber();

    /**
     * Set vendor_number
     * @param string $vendorNumber
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setVendorNumber($vendorNumber);

    /**
     * Get vendor_note
     * @return string|null
     */
    public function getVendorNote();

    /**
     * Set vendor_note
     * @param string $vendorNote
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setVendorNote($vendorNote);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setUpdatedAt($updatedAt);
}


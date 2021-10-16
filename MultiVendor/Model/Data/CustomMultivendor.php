<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Custom\MultiVendor\Model\Data;

use Custom\MultiVendor\Api\Data\CustomMultivendorInterface;

class CustomMultivendor extends \Magento\Framework\Api\AbstractExtensibleObject implements CustomMultivendorInterface
{

    /**
     * Get custom_multivendor_id
     * @return string|null
     */
    public function getCustomMultivendorId()
    {
        return $this->_get(self::CUSTOM_MULTIVENDOR_ID);
    }

    /**
     * Set custom_multivendor_id
     * @param string $customMultivendorId
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setCustomMultivendorId($customMultivendorId)
    {
        return $this->setData(self::CUSTOM_MULTIVENDOR_ID, $customMultivendorId);
    }

    /**
     * Get sku
     * @return string|null
     */
    public function getSku()
    {
        return $this->_get(self::SKU);
    }

    /**
     * Set sku
     * @param string $sku
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Custom\MultiVendor\Api\Data\CustomMultivendorExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Custom\MultiVendor\Api\Data\CustomMultivendorExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get vendor_number
     * @return string|null
     */
    public function getVendorNumber()
    {
        return $this->_get(self::VENDOR_NUMBER);
    }

    /**
     * Set vendor_number
     * @param string $vendorNumber
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setVendorNumber($vendorNumber)
    {
        return $this->setData(self::VENDOR_NUMBER, $vendorNumber);
    }

    /**
     * Get vendor_note
     * @return string|null
     */
    public function getVendorNote()
    {
        return $this->_get(self::VENDOR_NOTE);
    }

    /**
     * Set vendor_note
     * @param string $vendorNote
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setVendorNote($vendorNote)
    {
        return $this->setData(self::VENDOR_NOTE, $vendorNote);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->_get(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Custom\MultiVendor\Api\Data\CustomMultivendorInterface
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}


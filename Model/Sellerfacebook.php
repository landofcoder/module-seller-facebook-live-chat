<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Model;

use Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface;

class Sellerfacebook extends \Magento\Framework\Model\AbstractModel implements SellerfacebookInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Lofmp\FacebookLiveChat\Model\ResourceModel\Sellerfacebook::class);
    }

    /**
     * Get sellerfacebook_id
     * @return string|null
     */
    public function getSellerfacebookId()
    {
        return $this->getData(self::SELLERFACEBOOK_ID);
    }

    /**
     * Set sellerfacebook_id
     * @param string $sellerfacebookId
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     */
    public function setSellerfacebookId($sellerfacebookId)
    {
        return $this->setData(self::SELLERFACEBOOK_ID, $sellerfacebookId);
    }

    /**
     * Get language_code
     * @return string|null
     */
    public function getLanguageCode()
    {
        return $this->getData(self::LANGUAGE_CODE);
    }

    /**
     * Set language_code
     * @param string $language_code
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     */
    public function setLanguageCode($language_code)
    {
        return $this->setData(self::LANGUAGE_CODE, $language_code);
    }

    /**
     * Get seller_id
     * @return string|null
     */
    public function getSellerId()
    {
        return $this->getData(self::SELLER_ID);
    }

    /**
     * Set seller_id
     * @param string $sellerId
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     */
    public function setSellerId($sellerId)
    {
        return $this->setData(self::SELLER_ID, $sellerId);
    }

    /**
     * Get page_id
     * @return string|null
     */
    public function getPageId()
    {
        return $this->getData(self::PAGE_ID);
    }

    /**
     * Set page_id
     * @param string $pageId
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     */
    public function setPageId($pageId)
    {
        return $this->setData(self::PAGE_ID, $pageId);
    }

    /**
     * Get logged_in_greeting
     * @return string|null
     */
    public function getLoggedInGreeting()
    {
        return $this->getData(self::LOGGED_IN_GREETING);
    }

    /**
     * Set logged_in_greeting
     * @param string $loggedInGreeting
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     */
    public function setLoggedInGreeting($loggedInGreeting)
    {
        return $this->setData(self::LOGGED_IN_GREETING, $loggedInGreeting);
    }

    /**
     * Get logged_out_greeting
     * @return string|null
     */
    public function getLoggedOutGreeting()
    {
        return $this->getData(self::LOGGED_OUT_GREETING);
    }

    /**
     * Set logged_out_greeting
     * @param string $loggedOutGreeting
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     */
    public function setLoggedOutGreeting($loggedOutGreeting)
    {
        return $this->setData(self::LOGGED_OUT_GREETING, $loggedOutGreeting);
    }

    /**
     * Get theme_color
     * @return string|null
     */
    public function getThemeColor()
    {
        return $this->getData(self::THEME_COLOR);
    }

    /**
     * Set theme_color
     * @param string $themeColor
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     */
    public function setThemeColor($themeColor)
    {
        return $this->setData(self::THEME_COLOR, $themeColor);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
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
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}


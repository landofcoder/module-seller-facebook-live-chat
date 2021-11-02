<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Api\Data;

interface SellerfacebookInterface
{

    const THEME_COLOR = 'theme_color';
    const LOGGED_IN_GREETING = 'logged_in_greeting';
    const UPDATED_AT = 'updated_at';
    const SELLER_ID = 'seller_id';
    const SELLERFACEBOOK_ID = 'sellerfacebook_id';
    const PAGE_ID = 'page_id';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const LOGGED_OUT_GREETING = 'logged_out_greeting';
    const LANGUAGE_CODE = 'language_code';

    /**
     * Get sellerfacebook_id
     * @return string|null
     */
    public function getSellerfacebookId();

    /**
     * Set sellerfacebook_id
     * @param string $sellerfacebookId
     * @return \Api\Data\SellerfacebookInterface
     */
    public function setSellerfacebookId($sellerfacebookId);

    /**
     * Get language_code
     * @return string|null
     */
    public function getLanguageCode();

    /**
     * Set language_code
     * @param string $language_code
     * @return \Api\Data\SellerfacebookInterface
     */
    public function setLanguageCode($language_code);

    /**
     * Get seller_id
     * @return string|null
     */
    public function getSellerId();

    /**
     * Set seller_id
     * @param string $sellerId
     * @return \Api\Data\SellerfacebookInterface
     */
    public function setSellerId($sellerId);

    /**
     * Get page_id
     * @return string|null
     */
    public function getPageId();

    /**
     * Set page_id
     * @param string $pageId
     * @return \Api\Data\SellerfacebookInterface
     */
    public function setPageId($pageId);

    /**
     * Get logged_in_greeting
     * @return string|null
     */
    public function getLoggedInGreeting();

    /**
     * Set logged_in_greeting
     * @param string $loggedInGreeting
     * @return \Api\Data\SellerfacebookInterface
     */
    public function setLoggedInGreeting($loggedInGreeting);

    /**
     * Get logged_out_greeting
     * @return string|null
     */
    public function getLoggedOutGreeting();

    /**
     * Set logged_out_greeting
     * @param string $loggedOutGreeting
     * @return \Api\Data\SellerfacebookInterface
     */
    public function setLoggedOutGreeting($loggedOutGreeting);

    /**
     * Get theme_color
     * @return string|null
     */
    public function getThemeColor();

    /**
     * Set theme_color
     * @param string $themeColor
     * @return \Api\Data\SellerfacebookInterface
     */
    public function setThemeColor($themeColor);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Api\Data\SellerfacebookInterface
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
     * @return \Api\Data\SellerfacebookInterface
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Api\Data\SellerfacebookInterface
     */
    public function setStatus($status);
}


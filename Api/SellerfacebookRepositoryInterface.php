<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SellerfacebookRepositoryInterface
{

    /**
     * Save Sellerfacebook
     * @param \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface $sellerfacebook
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface $sellerfacebook
    );

    /**
     * Retrieve Sellerfacebook
     * @param int $sellerfacebookId
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($sellerfacebookId);

    /**
     * Retrieve Sellerfacebook by seller id
     * @param int $sellerId
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getBySellerId($sellerId);

    /**
     * Retrieve Sellerfacebook matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Sellerfacebook
     * @param \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface $sellerfacebook
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface $sellerfacebook
    );

    /**
     * Delete Sellerfacebook by ID
     * @param int $sellerfacebookId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($sellerfacebookId);
}


<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Api\Data;

interface SellerfacebookSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Sellerfacebook list.
     * @return \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface[]
     */
    public function getItems();

    /**
     * Set seller_id list.
     * @param \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}


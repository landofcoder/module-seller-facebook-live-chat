<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Model\ResourceModel\Sellerfacebook;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'sellerfacebook_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Lofmp\FacebookLiveChat\Model\Sellerfacebook::class,
            \Lofmp\FacebookLiveChat\Model\ResourceModel\Sellerfacebook::class
        );
    }
}


<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Model\Resolver\DataProvider;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class GetSellerFacebookChat
{
    /**
     * @var \Lofmp\FacebookLiveChat\Api\SellerfacebookRepositoryInterface
     */
    private $apiRepository;

    /**
     * @param \Lofmp\FacebookLiveChat\Api\SellerfacebookRepositoryInterface $apiRepository
     */
    public function __construct(
        \Lofmp\FacebookLiveChat\Api\SellerfacebookRepositoryInterface $apiRepository
    ) {
        $this->apiRepository = $apiRepository;
    }

    public function getGetSellerFacebookChat(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        $seller_id = isset($args["seller_id"])?trim($args["seller_id"]):0;
        if (!$seller_id) {
            throw new GraphQlInputException(__('Required parameter "seller_id" is missing!'));
        }

        $dataModel = $this->apiRepository->getBySellerId($seller_id);
        if (!$dataModel) {
            throw new GraphQlInputException(__('Facebook Chat Request does not match any records.'));
        }
        return $dataModel->__toArray();
    }
}


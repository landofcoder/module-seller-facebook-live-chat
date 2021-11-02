<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class GetSellerFacebookChat implements ResolverInterface
{

    private $getSellerFacebookChatDataProvider;

    /**
     * @param DataProvider\GetSellerFacebookChat $getSellerFacebookChatRepository
     */
    public function __construct(
        DataProvider\GetSellerFacebookChat $getSellerFacebookChatDataProvider
    ) {
        $this->getSellerFacebookChatDataProvider = $getSellerFacebookChatDataProvider;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $getSellerFacebookChatData = $this->getSellerFacebookChatDataProvider->getGetSellerFacebookChat($field, $context, $info, $value, $args);
        return $getSellerFacebookChatData;
    }
}


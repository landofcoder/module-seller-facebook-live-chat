<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Block;

use Lof\MarketPlace\Helper\Data;
use Lof\MarketPlace\Helper\Seller;
use Magento\Customer\Model\Context;
use Magento\Customer\Model\Form;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;

class FacebookChat extends \Magento\Framework\View\Element\Template
{

     /**
     * @var int
     */
    private $_username = -1;
    /**
     *
     * @var Magento\Framework\App\Action\Session
     */
    protected $_customerSession;
    /**
     *
     * @var \Lofmp\FacebookLiveChat\Model\SellerfacebookFactory
     */
    protected $facebookFactory;

    /**
     * @var Data
     */
    protected $marketHelper;

    /**
     * @var Seller
     */
    protected $sellerHelper;

    /**
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;

    /**
     * Chat constructor.
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param Session $customerSession
     * @param Data $marketHelper
     * @param Seller $sellerHelper
     * @param \Lofmp\FacebookLiveChat\Model\SellerfacebookFactory $facebookFactory
     * @param \Magento\Framework\App\Http\Context $httpContext
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        Session $customerSession,
        Data $marketHelper,
        Seller $sellerHelper,
        \Lofmp\FacebookLiveChat\Model\SellerfacebookFactory $facebookFactory,
        \Magento\Framework\App\Http\Context $httpContext,
        array $data = []
    ) {
        $this->_coreRegistry = $context->getRegistry();
        $this->marketHelper = $marketHelper;
        $this->sellerHelper = $sellerHelper;
        $this->facebookFactory = $facebookFactory;
        $this->_customerSession = $customerSession;
        $this->httpContext = $httpContext;
        parent::__construct($context, $data);
    }

    /**
     * get current seller
     *
     * @return mixed|Object|null
     */
    public function getCurrentSeller()
    {
        $seller = $this->_coreRegistry->registry('current_seller');
        if ($seller) {
            $this->setData('current_seller', $seller);
        }
        return $seller;
    }

    /**
     * get current product
     *
     * @return mixed|Object|null
     */
    public function getProduct()
    {
        $curPro = $this->_coreRegistry->registry('current_product');
        return $curPro;
    }

    /**
     * get current seller id
     *
     * @return int
     */
    public function getCurrentSellerId()
    {
        $sellerId = 0;
        $seller = $this->getCurrentSeller();
        if (!$seller) {
            $currentProduct = $this->getProduct();
            $sellerId = $currentProduct ? (int)$currentProduct->getData("seller_id") : 0;
        } else {
            $sellerId = $seller->getId();
        }
        return $sellerId;
    }

    /**
     * get seller facebook chat info
     *
     * @param int $seller_id
     * @return mixed|Object|null
     */
    public function getFacebookInfo($seller_id = 0)
    {
        $sellerFacebookChat = null;
        if (!$seller_id) {
            $seller_id = $this->getCurrentSellerId();
        }
        if ($seller_id) {
            $sellerFacebookChat = $this->facebookFactory->create()->load((int)$seller_id, "seller_id");
        }
        return $sellerFacebookChat;
    }
}


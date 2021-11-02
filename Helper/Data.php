<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Locale\Resolver;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * @var Resolver
     */
    private $localeResolver;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param Resolver $localeResolver
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        Resolver $localeResolver
    ) {
        parent::__construct($context);
    }

    /**
     * @param $field
     * @param null $storeId
     * @return mixed
     */
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->getConfigValue("lofmpfacebooklivechat/general/enabled");
    }

    public function getCurrentLocaleCode()
    {
        $currentLocaleCode = $this->localeResolver->getLocale();
        return $currentLocaleCode;
    }
}


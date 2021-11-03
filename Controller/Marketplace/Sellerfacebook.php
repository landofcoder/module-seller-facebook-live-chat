<?php
/**
 * LandofCoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/license
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   LandofCoder
 * @package    Lofmp_FacebookLiveChat
 * @copyright  Copyright (c) 2021 Landofcoder (https://landofcoder.com/)
 * @license    https://landofcoder.com/LICENSE-1.0.html
 */

namespace Lofmp\FacebookLiveChat\Controller\Marketplace;

/**
 * Admin seller coupon rule edit controller
 */
class Sellerfacebook extends Actions
{
    /**
     * Form session key
     * @var string
     */
    protected $_formSessionKey  = 'lofmp_facebooklivechat_sellerfacebook';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey      = 'Lofmp_FacebookLiveChat::Sellerfacebook';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass      = \Lofmp\FacebookLiveChat\Model\Sellerfacebook::class;

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu      = 'Lofmp_FacebookLiveChat::facebook';

    /**
     * Status field name
     * @var string
     */
    protected $_statusField     = 'status';

    /**
     * {@inheritdoc}
     */
    protected $_idKey = 'sellerfacebook_id';
}

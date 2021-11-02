<?php
/**
 * Landofcoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/license-agreement.html
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   Landofcoder
 * @package    Lof_FacebookLiveChat
 * @copyright  Copyright (c) 2021 Landofcoder (https://landofcoder.com/)
 * @license    https://landofcoder.com/LICENSE-1.0.html
 */

namespace Lofmp\FacebookLiveChat\Controller\Marketplace\Sellerfacebook;

class Edit extends \Lofmp\FacebookLiveChat\Controller\Marketplace\Sellerfacebook
{
    public function execute()
    {
        $isActived = $this->isActiveSeller();
        if ($isActived) {
            $seller = $this->getCurrentSeller();
            $model = $this->_getModel(false);
            $model->load($seller->getId(), "seller_id");
            $this->registry->register('current_model', $model);
            $this->registry->register('seller_id', $seller->getId());
            $this->registry->register('sellerfacebook_id', $model->getSellerfacebookId());
            $this->getRequest()->setParam("seller_id", $seller->getId());
            $this->getRequest()->setParam("id", $model->getId());
            $this->getRequest()->setParam("sellerfacebook_id", $model->getSellerfacebookId());
            $this->_view->renderLayout();
        }
    }
}

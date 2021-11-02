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
        $this->_view->loadLayout();
        $this->_setActiveMenu($this->_activeMenu);
        $isActived = $this->isActiveSeller();
        if ($isActived) {
            try {
                $seller = $this->getCurrentSeller();
                $model = $this->_getModel(false);
                $model->load($seller->getId(), "seller_id");
                if (!$model->getId()) {
                    $model->setThemeColor("#44bec7");
                    $model->setLoggedInGreeting(__("Hello! Welcome to our shop"));
                    $model->setLoggedOutGreeting(__("Hello! Welcome to our shop"));
                }

                $registry = $this->_getRegistry();
                $registry->register('current_model', $model);
                $registry->register('seller_id', $seller->getId());
                $registry->register('sellerfacebook_id', $model->getSellerfacebookId());
                $this->getRequest()->setParam("seller_id", $seller->getId());
                $this->getRequest()->setParam("id", $model->getId());
                $this->getRequest()->setParam("sellerfacebook_id", $model->getSellerfacebookId());

                $title = __("Facebook Live Chat");
                if ($model->getId()) {
                    $breadcrumbTitle = __('Edit %1', $title);
                    $breadcrumbLabel = $breadcrumbTitle;
                } else {
                    $breadcrumbTitle = __('New %1', $title);
                    $breadcrumbLabel = __('Create %1', $title);
                }

                $this->_view->getPage()->getConfig()->getTitle()->prepend(__($title));
                $this->_view->getPage()->getConfig()->getTitle()->prepend(
                    $model->getId() ? $this->_getModelName($model) : __('New %1', $title)
                );

                $this->_addBreadcrumb($breadcrumbLabel, $breadcrumbTitle);

                // restore data
                $values = $this->_getSession()->getData($this->_formSessionKey, true);
                if ($this->_paramsHolder) {
                    $values = isset($values[$this->_paramsHolder]) ? $values[$this->_paramsHolder] : null;
                }

                if ($values) {
                    $model->addData($values);
                }
                $this->_view->renderLayout();
            } catch (\Exception $e) {
                $this->messageManager->addException(
                    $e,
                    __(
                        'Something went wrong: %1',
                        $e->getMessage()
                    )
                );
                $this->_redirect('*/*/');
            }
        }
    }
}

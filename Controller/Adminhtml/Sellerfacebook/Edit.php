<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Controller\Adminhtml\Sellerfacebook;

class Edit extends \Lofmp\FacebookLiveChat\Controller\Adminhtml\Sellerfacebook
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('sellerfacebook_id');
        $model = $this->_objectManager->create(\Lofmp\FacebookLiveChat\Model\Sellerfacebook::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Sellerfacebook no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('lofmp_facebooklivechat_sellerfacebook', $model);

        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Seller Facebook Live Chat') : __('New Seller Facebook Live Chat'),
            $id ? __('Edit Seller Facebook Live Chat') : __('New Seller Facebook Live Chat')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Seller Facebook Live Chat'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Seller Facebook Live Chat %1', $model->getId()) : __('New Seller Facebook Live Chat'));
        return $resultPage;
    }
}


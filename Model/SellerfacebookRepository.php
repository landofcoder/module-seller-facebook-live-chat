<?php
/**
 * Copyright © Landofcoder.com All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lofmp\FacebookLiveChat\Model;

use Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterfaceFactory;
use Lofmp\FacebookLiveChat\Api\Data\SellerfacebookSearchResultsInterfaceFactory;
use Lofmp\FacebookLiveChat\Api\SellerfacebookRepositoryInterface;
use Lofmp\FacebookLiveChat\Model\ResourceModel\Sellerfacebook as ResourceSellerfacebook;
use Lofmp\FacebookLiveChat\Model\ResourceModel\Sellerfacebook\CollectionFactory as SellerfacebookCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class SellerfacebookRepository implements SellerfacebookRepositoryInterface
{

    protected $sellerfacebookFactory;

    protected $dataObjectHelper;

    protected $dataSellerfacebookFactory;

    protected $extensionAttributesJoinProcessor;

    protected $extensibleDataObjectConverter;
    protected $resource;

    protected $dataObjectProcessor;

    private $collectionProcessor;

    private $storeManager;

    protected $searchResultsFactory;

    protected $sellerfacebookCollectionFactory;


    /**
     * @param ResourceSellerfacebook $resource
     * @param SellerfacebookFactory $sellerfacebookFactory
     * @param SellerfacebookInterfaceFactory $dataSellerfacebookFactory
     * @param SellerfacebookCollectionFactory $sellerfacebookCollectionFactory
     * @param SellerfacebookSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceSellerfacebook $resource,
        SellerfacebookFactory $sellerfacebookFactory,
        SellerfacebookInterfaceFactory $dataSellerfacebookFactory,
        SellerfacebookCollectionFactory $sellerfacebookCollectionFactory,
        SellerfacebookSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->sellerfacebookFactory = $sellerfacebookFactory;
        $this->sellerfacebookCollectionFactory = $sellerfacebookCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSellerfacebookFactory = $dataSellerfacebookFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface $sellerfacebook
    ) {
        /* if (empty($sellerfacebook->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $sellerfacebook->setStoreId($storeId);
        } */

        $sellerfacebookData = $this->extensibleDataObjectConverter->toNestedArray(
            $sellerfacebook,
            [],
            \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface::class
        );

        $sellerfacebookModel = $this->sellerfacebookFactory->create()->setData($sellerfacebookData);

        try {
            $this->resource->save($sellerfacebookModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the sellerfacebook: %1',
                $exception->getMessage()
            ));
        }
        return $sellerfacebookModel;
    }

    /**
     * {@inheritdoc}
     */
    public function get($sellerfacebookId)
    {
        $sellerfacebook = $this->sellerfacebookFactory->create();
        $this->resource->load($sellerfacebook, $sellerfacebookId);
        if (!$sellerfacebook->getId()) {
            throw new NoSuchEntityException(__('Sellerfacebook with id "%1" does not exist.', $sellerfacebookId));
        }
        return $sellerfacebook;
    }

    /**
     * {@inheritdoc}
     */
    public function getBySellerId($sellerId)
    {
        $collection = $this->sellerfacebookFactory->create()->getCollection();
        $foundFacebookChat =$collection->addFieldToFilter("seller_id", (int)$sellerId)
                    ->addFieldToFilter("status", 1)
                    ->getFirstItem();
        if ($foundFacebookChat) {
            return $this->get($foundFacebookChat->getSellerfacebookId());
        } else {
            throw new NoSuchEntityException(__('Sellerfacebook with seller_id "%1" does not exist.', $sellerId));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->sellerfacebookCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Lofmp\FacebookLiveChat\Api\Data\SellerfacebookInterface $sellerfacebook
    ) {
        try {
            $sellerfacebookModel = $this->sellerfacebookFactory->create();
            $this->resource->load($sellerfacebookModel, $sellerfacebook->getSellerfacebookId());
            $this->resource->delete($sellerfacebookModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Sellerfacebook: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($sellerfacebookId)
    {
        return $this->delete($this->get($sellerfacebookId));
    }
}


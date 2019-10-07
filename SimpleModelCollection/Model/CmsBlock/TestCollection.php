<?php

declare(strict_types=1);

namespace M2Dev\SimpleModelCollection\Model\CmsBlock;

class TestCollection
{
    /**
     * @var \Magento\Cms\Model\ResourceModel\Block\CollectionFactory
     */
    private $blockCollectionFactory;

    public function __construct(
        \Magento\Cms\Model\ResourceModel\Block\CollectionFactory $blockCollectionFactory
    ) {
        $this->blockCollectionFactory = $blockCollectionFactory;
    }

    public function getFullCollection()
    {
        /** @var \Magento\Cms\Model\ResourceModel\Block\Collection $blockCollection */
        $blockCollection = $this->blockCollectionFactory->create();
        echo '<pre>';
        var_dump($blockCollection->toArray());
        echo '</pre>';
        echo "<textarea>" . $blockCollection->getSelect()->__toString() . "</textarea>";
    }

    public function basicSelectFilterSortLimit()
    {
        /** @var \Magento\Cms\Model\ResourceModel\Block\Collection $blockCollection */
        $blockCollection = $this->blockCollectionFactory->create();

        $blockCollection->addFieldToSelect(['block_id', 'title'])
            ->addFieldToFilter('block_id', ['gt' => 1])
            ->setOrder('block_id', 'desc')
            ->setPageSize(5)
            ->setCurPage(2);

        echo '<pre>';
        var_export($blockCollection->toArray());
        echo '</pre>';
        echo "<textarea>" . $blockCollection->getSelect()->__toString() . "</textarea>";
    }

    public function andFilter()
    {
        /** @var \Magento\Cms\Model\ResourceModel\Block\Collection $blockCollection */
        $blockCollection = $this->blockCollectionFactory->create();

        $blockCollection->addFieldToSelect('*')
            ->addFieldToFilter('block_id', ['gt' => 0])
            ->addFieldToFilter('title', ['like' => '%Women%']);

        echo '<pre>';
        var_dump($blockCollection->toArray());
        echo '</pre>';
        echo "<textarea>" . $blockCollection->getSelect()->__toString() . "</textarea>";
    }

    public function orFilter()
    {
        /** @var \Magento\Cms\Model\ResourceModel\Block\Collection $blockCollection */
        $blockCollection = $this->blockCollectionFactory->create();

        $blockCollection->addFieldToFilter(
            ['block_id', 'block_id'], [1, 5]
        //['block_id', 'block_id'], [['eq' => 1], ['eq' => 5]]
        );
        echo '<pre>';
        var_dump($blockCollection->toArray());
        echo '</pre>';
        echo "<textarea>" . $blockCollection->getSelect()->__toString() . "</textarea>";
    }

    // Explain what deos load do
}

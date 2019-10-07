<?php

namespace M2Dev\SimpleModelCollection\Controller\Cms\Block;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Collection extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \M2Dev\SimpleModelCollection\Model\CmsBlock\TestCollection
     */
    private $blockTestCollection;

    public function __construct(
        Context $context,
        \M2Dev\SimpleModelCollection\Model\CmsBlock\TestCollection $blockTestCollection
    ) {
        parent::__construct($context);
        $this->blockTestCollection = $blockTestCollection;
    }

    /**
     * /simplemodelcollection/cms_block/collection
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        /** @var  \M2Dev\SimpleModelCollection\Model\CmsBlock\TestCollection $blockCollection */
        $blockCollection = $this->blockTestCollection;
        // $blockCollection->getFullCollection();
        // $blockCollection->basicSelectFilterSortLimit();
        // $blockCollection->andFilter();
         $blockCollection->orFilter();
    }
}

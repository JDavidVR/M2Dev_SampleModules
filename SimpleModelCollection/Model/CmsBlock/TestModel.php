<?php

declare(strict_types=1);

namespace M2Dev\SimpleModelCollection\Model\CmsBlock;

class TestModel
{
    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    protected $blockFactory;
    /**
     * @var \Magento\Cms\Model\ResourceModel\Block
     */
    protected $resourceBlock;

    public function __construct(
        \Magento\Cms\Model\BlockFactory $blockFactory,
        \Magento\Cms\Model\ResourceModel\Block $resourceBlock
    ) {
        $this->blockFactory = $blockFactory;
        $this->resourceBlock = $resourceBlock;
    }

    public function loadModel()
    {
        /** @var \Magento\Cms\Model\Block $blockModel */
        $blockModel = $this->blockFactory->create();
        $this->resourceBlock->load($blockModel, 1);

        var_export($blockModel->toArray());
    }

    public function updateModel()
    {
        /** @var \Magento\Cms\Model\Block $blockModel */
        $blockModel = $this->blockFactory->create();
        $this->resourceBlock->load($blockModel, 1);

        // Print Previous
        var_export($blockModel->toArray());

        // Update data
        $blockModel->setTitle('Updated Title');

        try {
            $this->resourceBlock->save($blockModel);
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }

        // Print After
        var_export($blockModel->toArray());
    }

    public function createModel()
    {
        /** @var \Magento\Cms\Model\Block $blockModel */
        $blockModel = $this->blockFactory->create();
        $blockModel->setTitle('New Block');
        $blockModel->setIdentifier('new-block');
        $blockModel->setContent('<h1>New Block</h1><br><p>Some Description</p>');

        try {
            $this->resourceBlock->save($blockModel);
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }
    }

    public function deleteModel()
    {
        /** @var \Magento\Cms\Model\Block $blockModel */
        $blockModel = $this->blockFactory->create();
        $this->resourceBlock->load($blockModel, 20);

        try {
            $this->resourceBlock->delete($blockModel);
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }
    }
}

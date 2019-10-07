<?php

declare(strict_types=1);

namespace M2Dev\FrontControllerResults\Controller\Type;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Forward extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * Forward constructor.
     * @param Context $context
     * @param \Magento\Framework\Controller\Result\Forward $forward
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
    ) {
        parent::__construct($context);
        $this->resultForwardFactory = $resultForwardFactory;
    }

    /**
     * {domain}/result/type/forward
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Forward $resultForward */
        $resultForward = $this->resultForwardFactory->create();

        $resultForward->forward('page');

        return $resultForward;
    }
}
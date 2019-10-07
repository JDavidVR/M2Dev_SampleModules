<?php

namespace M2Dev\PatternProxy\Controller\Test;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Prox extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \M2Dev\PatternProxy\Model\Slow
     */
    private $slow;
    /**
     * @var \M2Dev\PatternProxy\Model\Quick
     */
    private $quick;

    public function __construct(
        Context $context,
        \M2Dev\PatternProxy\Model\Quick $quick,
        \M2Dev\PatternProxy\Model\Slow $slow

    ) {
        parent::__construct($context);
        $this->quick = $quick;
        $this->slow = $slow;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Raw $resulRaw */
        $resulRaw = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $qh = $this->quick->hello();
//        $qh = $this->useSlowClass();
        $resulRaw->setContents("<pre>{$qh}</pre>");
        return $resulRaw;
    }

    public function useSlowClass()
    {
        $this->slow->getHello();
    }
}

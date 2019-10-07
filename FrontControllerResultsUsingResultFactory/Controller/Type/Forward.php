<?php

declare(strict_types=1);

namespace M2Dev\FrontControllerResultsUsingResultFactory\Controller\Type;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Forward extends \Magento\Framework\App\Action\Action
{
    /**
     * {domain}/resultfactory/type/forward
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Forward $resultForward */
        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        $resultForward->forward('page');
        return $resultForward;
    }
}

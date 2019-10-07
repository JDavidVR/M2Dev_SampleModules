<?php
declare(strict_types=1);

namespace M2Dev\FrontControllerResultsUsingResultFactory\Controller\Type;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Redirect extends \Magento\Framework\App\Action\Action
{
    /**
     * {domain}/resultfactory/type/redirect
     * @return ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('resultfactory/type/json');
        return $resultRedirect;
    }
}

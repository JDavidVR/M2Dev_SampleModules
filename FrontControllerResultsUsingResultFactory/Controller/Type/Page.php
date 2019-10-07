<?php
declare(strict_types=1);

namespace M2Dev\FrontControllerResultsUsingResultFactory\Controller\Type;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Page extends \Magento\Framework\App\Action\Action
{
    /**
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->set('Custom Title');
        return $resultPage;
    }
}

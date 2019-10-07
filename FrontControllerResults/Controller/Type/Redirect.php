<?php
declare(strict_types=1);

namespace M2Dev\FrontControllerResults\Controller\Type;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Redirect extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\Controller\Result\RedirectFactory  */
    protected $resultRedirectFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory
    )
    {
        parent::__construct($context);
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    /**
     * {domain}/result/type/redirect
     * @return ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('result/type/json');

        return $resultRedirect;
    }
}
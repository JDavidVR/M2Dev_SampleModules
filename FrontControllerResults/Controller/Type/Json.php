<?php

declare(strict_types=1);

namespace M2Dev\FrontControllerResults\Controller\Type;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Json extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
    }

    /**
     * {domain}/result/type/json
     * @return ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $arrayData = [
            'key' => 'value',
            'name' => 'Foo',
            'pets' => ['dog', 'cat', 'birds']
        ];
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultJsonFactory->create();

        // Skip resultJson dependecy injection by using resultFactory
        // $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        $resultJson->setData($arrayData);
        return $resultJson;
    }
}

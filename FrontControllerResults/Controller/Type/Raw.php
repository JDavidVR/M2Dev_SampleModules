<?php
declare(strict_types=1);

namespace M2Dev\FrontControllerResults\Controller\Type;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Raw extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\RawFactory
     */
    private $resultRawFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\RawFactory $resultRawFactory
    ) {
        parent::__construct($context);
        $this->resultRawFactory = $resultRawFactory;
    }

    /**
     * {domain}/result/type/raw
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Raw|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Raw $resultRaw */
        $resultRaw = $this->resultRawFactory->create();

        // Skip resultJson dependecy injection by using resultFactory
        // $resultRaw = $this->resultFactory->create(ResultFactory::TYPE_RAW);

        $contents = <<<EOD
<h1>Hey</h1>
<p>I can print html.</p>
<pre>echo 'Hooolaaa!!'</pre>
EOD;
        return $resultRaw->setContents($contents);
    }
}

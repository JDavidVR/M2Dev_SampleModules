<?php
declare(strict_types=1);

namespace M2Dev\FrontControllerResultsUsingResultFactory\Controller\Type;

use Magento\Framework\Controller\ResultFactory;

class Raw extends \Magento\Framework\App\Action\Action
{
    /**
     * {domain}/resultfactory/type/raw
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Raw|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Raw $resultRaw */
        $resultRaw = $this->resultFactory->create(ResultFactory::TYPE_RAW);

        $contents = <<<EOD
<h1>Hey</h1>
<p>I can print html.</p>
<pre>echo 'Hooolaaa!!'</pre>
EOD;
        return $resultRaw->setContents($contents);
    }
}

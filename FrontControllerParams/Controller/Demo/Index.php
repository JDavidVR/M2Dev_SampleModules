<?php
declare(strict_types=1);

namespace M2Dev\FrontControllerParams\Controller\Demo;

use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $all = $this->getRequest()->getParams();
        var_export($all);

        $param1value = $this->getRequest()->getParam('param1');
        $param2value = $this->getRequest()->getParam('param2');

        var_export($param1value);
        var_export($param2value);
    }
}

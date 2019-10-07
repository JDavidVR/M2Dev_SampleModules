<?php
declare(strict_types=1);

namespace M2Dev\FrontControllerActionNamesSamples\Controller\Index;

use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * {domain}/{routeName}/{controllerName}/{actionName}
     * Usually: {domain}/{routeName}/index/index
     * But can be accessed by:
     *  -  {domain}/{routeName}/index
     *  -  {domain}/{routeName}
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        // TODO: Implement execute() method.
    }
}

<?php
declare(strict_types=1);

namespace M2Dev\FrontControllerActionNamesSamples\Controller\NestedController\ParentController\ChildController;

use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * Ex:
     * {domain}/{routeName}/{controllerName}/{actionName}
     * {domain}/{routeName}/nestedcontroller_parentcontroller_childcontroller/index
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        // TODO: Implement execute() method.
    }
}
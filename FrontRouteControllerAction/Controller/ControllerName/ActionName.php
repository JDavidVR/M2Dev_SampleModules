<?php
declare(strict_types=1);

namespace M2Dev\FrontRouteControllerAction\Controller\ControllerName;

use Magento\Framework\App\ResponseInterface;

class ActionName extends \Magento\Framework\App\Action\Action
{
    /**
     * Visit from {storeDomain}/{routeName}/{controllerName}/{actionName}
     * In this case:{storeDomain}/routename/controllername/actionname
     */
    public function execute()
    {
        // Note this is only a quick demo, action must return an instance of
        // \Magento\Framework\Controller\ResultInterface
        die('Hello from my new controller;');
    }
}

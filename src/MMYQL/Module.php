<?php
/**
 * User: Zdenek
 * Date: 27/04/13
 * Time: 14:42
 */

namespace MMYQL;

use MMYQL\Service\ServiceYQLFactory;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ServiceProviderInterface{

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'serviceYQL' => new ServiceYQLFactory(),
            )
        );
    }
}
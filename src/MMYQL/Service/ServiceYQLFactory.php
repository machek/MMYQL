<?php
/**
 * Factory class to initiate service
 * User: Zdenek
 * Date: 27/04/13
 * Time: 14:44
 */

namespace MMYQL\Service;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceYQLFactory implements FactoryInterface{


    public function __construct(){

    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config  = $serviceLocator->get('Configuration');
        return new ServiceYQL($config['mmyql']);

    }
}
<?php

namespace BgIntercom;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ServiceManager;
use Zend\View\HelperPluginManager;

class Module implements AutoloaderProviderInterface, ViewHelperProviderInterface, ServiceProviderInterface
{

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'intercom' => function (HelperPluginManager $helperPluginManager) {
                    $options = $helperPluginManager->getServiceLocator()->get('BgIntercom\Options\ModuleOptions');
                    $zfcUserAuth = $helperPluginManager->getServiceLocator()->get('zfcuser_auth_service');
                    $helper = new View\Helper\Intercom($options, $zfcUserAuth);

                    return $helper;
                },
            ),
        );
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'BgIntercom\Options\ModuleOptions' => function (ServiceManager $serviceLocator) {
                    $config = $serviceLocator->get('Config');
                    return new Options\ModuleOptions(isset($config['bgintercom']) ? $config['bgintercom'] : array());
                }
            ),
        );
    }
}

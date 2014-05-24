<?php

namespace MongodbODMSoftdeleteModule;



use Doctrine\ODM\MongoDB\SoftDelete\SoftDeleteManager;
use Doctrine\Common\EventManager;
use Doctrine\ODM\MongoDB\SoftDelete\Configuration;
class Module
{
    public function onBootstrap($e)
    {
        $app     = $e->getParam('application');
        $sm      = $app->getServiceManager();

    }

    public function getAutoloaderConfig()
    {
        return array(
        
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'aliases' => array(
        
            ),
            'factories' => array(
                'mongodb_softdelete' => function ($sm) {
                    $dm=$sm->get('doctrine.documentmanager.odm_default');
                    $eventManager=new EventManager();
                    $configuration=new Configuration();
                    return new SoftDeleteManager($dm, $configuration, $eventManager);
                 
                }
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}

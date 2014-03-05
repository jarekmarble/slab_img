<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Slabs;

use Common\Model\TableEntityMapper;
use Slabs\Model\Slab;
use Slabs\Model\SlabTable;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getServiceConfig()
    {
        return array(
            'abstract_factories' => array(),
            'aliases' => array(),
            'factories' => array(
                // DB
                'SlabTable' => function($sm) {
                        $tableGateway = $sm->get('SlabTableGateway');
                        $table = new SlabTable($tableGateway);
                        return $table;
                    },
                'SlabTableGateway' => function($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        // column name => entity property
                        $hydrator = new TableEntityMapper(
                            array(
                                'Id' => 'Id',
                                'SlabId' => 'SlabId',
                                'Container' => 'Container',
                            ));
                        $rowObjectPrototype = new Slab();
                        $resultSet = new HydratingResultSet($hydrator, $rowObjectPrototype);

                        return new TableGateway('Slabs', $dbAdapter, null, $resultSet);
                    },
            ),
            'invokables' => array(),
            'services' => array(),
            'shared' =>array(),
        );
    }
}

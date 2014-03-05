<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Slabs\Controller\Index' => 'Slabs\Controller\IndexController',
            'Slabs\Controller\SlabManager' => 'Slabs\Controller\SlabManagerController',
            'Slabs\Controller\PhotoManager' => 'Slabs\Controller\PhotoManagerController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'slabs' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/slabs',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Slabs\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'slab-manager' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/slab-manager[/:action[/:id]]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'Slabs\Controller\SlabManager',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'slabs' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'layout/layout'  => __DIR__ . '/../view/layout/slabs-layout.phtml',
        ),
    ),
);

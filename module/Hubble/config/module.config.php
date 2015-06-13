<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'branches' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Hubble\Controller\BranchList',
                        'action' => 'all',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'filters' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => 'branches[/:action]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'Hubble\Controller\BranchList',
                                'action' => 'all',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Hubble\Controller\BranchList' => 'Hubble\Controller\BranchListController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.twig',
            'hubble/branch-list/unreleased' => __DIR__ . '/../view/hubble/branchlist/index.twig',
            'hubble/branch-list/deployed' => __DIR__ . '/../view/hubble/branchlist/index.twig',
            'hubble/branch-list/all' => __DIR__ . '/../view/hubble/branchlist/index.twig',
            'error/404' => __DIR__ . '/../view/error/404.twig',
            'error/index' => __DIR__ . '/../view/error/error.twig',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            'Hubble_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Hubble/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Hubble\Entity' => 'Hubble_driver'
                ),
            ),
        ),
    ),
);

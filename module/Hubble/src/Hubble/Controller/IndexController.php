<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Hubble\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel(array(
            'branches' => array(
                array(
                    'status' => 'created',
                    'name' => 'beep',
                    'team' => 'Alpha Team',
                    'sprints' => array('21, 22, 33'),
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'created',
                    'name' => 'boop',
                    'team' => 'Alpha Team',
                    'sprints' => array('21, 22, 33'),
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'created',
                    'name' => 'bop',
                    'team' => 'Alpha Team',
                    'sprints' => array('21, 22, 33'),
                    'date' => date('Y/m/d')
                ),
            )
        ));
    }
}

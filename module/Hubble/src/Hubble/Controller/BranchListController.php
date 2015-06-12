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

class BranchListController extends AbstractActionController
{
    public function allAction()
    {
        return new ViewModel(array(
            'title' => 'All Branches',
            'branches' => array(
                array(
                    'status' => 'Created',
                    'name' => 'beep',
                    'team' => 'Alpha Team',
                    'sprints' => array(21, 22, 33),
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'Created',
                    'name' => 'boop',
                    'team' => 'Alpha Team',
                    'sprints' => array(21, 22, 33),
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'Created',
                    'name' => 'bop',
                    'team' => 'Alpha Team',
                    'sprints' => array(21, 22, 33),
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'Deployed',
                    'name' => 'test',
                    'team' => 'Alpha Team',
                    'sprints' => 12,
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'Deployed',
                    'name' => 'tast',
                    'team' => 'Alpha Team',
                    'sprints' => array(22, 23),
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'Deployed',
                    'name' => 'toast',
                    'team' => 'Alpha Team',
                    'sprints' => array(15, 16),
                    'date' => date('Y/m/d')
                ),
            )
        ));

    }

    public function unreleasedAction()
    {
        return new ViewModel(array(
            'title' => 'Unreleased Branches',
            'branches' => array(
                array(
                    'status' => 'Created',
                    'name' => 'beep',
                    'team' => 'Alpha Team',
                    'sprints' => array(21, 22, 33),
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'Created',
                    'name' => 'boop',
                    'team' => 'Alpha Team',
                    'sprints' => array(21, 22, 33),
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'Created',
                    'name' => 'bop',
                    'team' => 'Alpha Team',
                    'sprints' => array(21, 22, 33),
                    'date' => date('Y/m/d')
                ),
            )
        ));
    }

    public function deployedAction()
    {
        return new ViewModel(array(
            'title' => 'Deployed Branches',
            'branches' => array(
                array(
                    'status' => 'Deployed',
                    'name' => 'test',
                    'team' => 'Alpha Team',
                    'sprints' => 12,
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'Deployed',
                    'name' => 'tast',
                    'team' => 'Alpha Team',
                    'sprints' => array(22, 23),
                    'date' => date('Y/m/d')
                ),
                array(
                    'status' => 'Deployed',
                    'name' => 'toast',
                    'team' => 'Alpha Team',
                    'sprints' => array(15, 16),
                    'date' => date('Y/m/d')
                ),
            )
        ));
    }
}

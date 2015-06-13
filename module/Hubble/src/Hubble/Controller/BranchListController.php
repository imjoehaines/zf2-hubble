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
use Doctrine\DBAL\Types\Type;
use Doctrine\Common\Collections\Collection;
use Hubble\Model\BranchModel;

class BranchListController extends AbstractActionController
{
    /**
     * Action to get all branches
     * @return ViewModel
     */
    public function allAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $branchModel = new BranchModel($objectManager);
        $branches = $branchModel->getAllBranches();

        return new ViewModel(array(
            'title' => 'All Branches',
            'branches' => $branches,
        ));
    }

    /**
     * Action to get unreleased branches
     * @return ViewModel
     */
    public function unreleasedAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $branchModel = new BranchModel($objectManager);
        $branches = $branchModel->getUnreleasedBranches();

        return new ViewModel(array(
            'title' => 'Unreleased Branches',
            'branches' => $branches,
        ));
    }

    /**
     * Action to get deployed branches
     * @return ViewModel
     */
    public function deployedAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $branchModel = new BranchModel($objectManager);
        $branches = $branchModel->getDeployedBranches();

        return new ViewModel(array(
            'title' => 'Deployed Branches',
            'branches' => $branches,
        ));
    }
}

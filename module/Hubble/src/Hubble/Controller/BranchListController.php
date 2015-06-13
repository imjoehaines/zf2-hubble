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
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder;
use Hubble\Model\BranchModel;
use Hubble\Entity\Branch;

class BranchListController extends AbstractActionController
{
    protected function constructPaginatedView($branches, $title)
    {
        $paginator = new Paginator(new ArrayAdapter($branches));
        $paginator->setDefaultItemCountPerPage(10);
        $paginator->setCurrentPageNumber($this->params()->fromRoute('page', 1));

        return new ViewModel(array(
            'title' => $title,
            'branches' => $paginator,
            'actionName' => $this->params()->fromRoute('action')
        ));
    }

    /**
     * Action to get all branches
     * @return ViewModel
     */
    public function allAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $branchModel = new BranchModel($objectManager);
        $branches = $branchModel->getAllBranches();

        return $this->constructPaginatedView($branches, 'All Branches');
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

        return $this->constructPaginatedView($branches, 'Unreleased Branches');
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

        return $this->constructPaginatedView($branches, 'Deployed Branches');
    }
}

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
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder;
use Hubble\Entity\Branch;

class BranchController extends AbstractActionController
{
    public function newAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $branch = new Branch();
        $builder = new AnnotationBuilder($objectManager);

        $form = $builder->createForm($branch);
        $form->setHydrator(new DoctrineHydrator($objectManager,'\Hubble\Entity\Branch'));
        $form->bind($branch);

        return new ViewModel(array(
            'title' => 'Add New Branch',
            'actionName' => $this->params()->fromRoute('action'),
            'branchForm' => $form
        ));
    }
}

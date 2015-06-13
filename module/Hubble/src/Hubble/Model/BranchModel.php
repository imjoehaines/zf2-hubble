<?php

namespace Hubble\Model;

use Doctrine\DBAL\Types\Type;
use Doctrine\Common\Collections\Collection;
use Hubble\Entity\Branch;

class BranchModel
{
    protected $objectManager;

    public function __construct($objectManager)
    {
        $this->objectManager = $objectManager;

        Type::addType('text_array', "Doctrine\\DBAL\\PostgresTypes\\TextArrayType");
        Type::addType('int_array', "Doctrine\\DBAL\\PostgresTypes\\IntArrayType");
    }

    /**
     * Gets all branches
     * @return array
     */
    public function getAllBranches()
    {
        return $this->objectManager->getRepository('\Hubble\Entity\Branch')->findAll();
    }

    /**
     * Gets unreleased branches
     * @return ViewModel
     */
    public function getUnreleasedBranches()
    {
        $repository = $this->objectManager->getRepository('\Hubble\Entity\Branch');

        $queryBuilder = $this->objectManager->createQueryBuilder();
        $branches = $queryBuilder->select(array('partial b.{id,status,name,team,sprints,created}'))
            ->from('\Hubble\Entity\Branch', 'b')
            ->where('b.status != :status')
            ->setParameter('status', 'deployed')
            ->getQuery()
            ->getResult();

        return $branches;
    }

    /**
     * Gets deployed branches
     * @return ViewModel
     */
    public function getDeployedBranches()
    {
        $repository = $this->objectManager->getRepository('\Hubble\Entity\Branch');

        $branches = $repository->findBy(array('status' => 'deployed'));

        return $branches;
    }
}

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
        $repository = $this->objectManager->getRepository('\Hubble\Entity\Branch');

        $branches = $repository->findBy(
            array(),
            array('created' => 'DESC')
        );

        return $branches;
    }

    /**
     * Gets unreleased branches, ordered by created ASC so oldest branches are
     * most visible
     * @return ViewModel
     */
    public function getUnreleasedBranches()
    {
        $repository = $this->objectManager->getRepository('\Hubble\Entity\Branch');

        $queryBuilder = $this->objectManager->createQueryBuilder();
        $branches = $queryBuilder->select(array('partial b.{id,status,name,team,sprints,created}'))
            ->from('\Hubble\Entity\Branch', 'b')
            ->where('b.status != :deployedStatus')
            ->orderBy('b.created', 'ASC')
            ->setParameter('deployedStatus', 'deployed')
            ->getQuery()
            ->getResult();

        return $branches;
    }

    /**
     * Gets deployed branches, ordered by created DESC so newest branches are
     * most visible
     * @return ViewModel
     */
    public function getDeployedBranches()
    {
        $repository = $this->objectManager->getRepository('\Hubble\Entity\Branch');

        $branches = $repository->findBy(
            array('status' => 'deployed'),
            array('created' => 'DESC')
        );

        return $branches;
    }
}

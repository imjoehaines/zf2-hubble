<?php

namespace Hubble\Model;

use Doctrine\DBAL\Types\Type;

class BranchModel
{
    const STATUS_CREATED = 'Created';
    const STATUS_IN_PROGRESS = 'In Progress';
    const STATUS_IN_REVIEW = 'In Review';
    const STATUS_READY_FOR_MASTER = 'Ready For Master';
    const STATUS_MERGED_TO_MASTER = 'Merged To Master';
    const STATUS_DEPLOYED = 'Deployed';
    const STATUS_DEPRECATED = 'Deprecated';

    /**
     * Valid statuses for active branches
     * @var array
     */
    protected $activeStatuses = array(
        self::STATUS_CREATED,
        self::STATUS_IN_PROGRESS,
        self::STATUS_IN_REVIEW,
        self::STATUS_READY_FOR_MASTER,
        self::STATUS_MERGED_TO_MASTER,
    );

    protected $objectManager;

    public function __construct($objectManager)
    {
        $this->objectManager = $objectManager;

        Type::addType('text_array', "Doctrine\\DBAL\\PostgresTypes\\TextArrayType");
        Type::addType('int_array', "Doctrine\\DBAL\\PostgresTypes\\IntArrayType");
    }

    /**
     * Gets all branches, ordered by created DESC so newest branches are
     * most visible
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
        $branches = $repository->findBy(
            array('status' => $this->activeStatuses),
            array('created' => 'ASC')
        );

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
            array('status' => self::STATUS_DEPLOYED),
            array('created' => 'DESC')
        );

        return $branches;
    }
}

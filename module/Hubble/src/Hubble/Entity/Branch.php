<?php
namespace Hubble\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Type;

/** @ORM\Entity */
class Branch {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('sprint', 'support', 'other')")
     */
    protected $type;

    /**
     * @ORM\Column(type="int_array")
     */
    protected $task_numbers;

    /**
     * @ORM\Column(type="int_array")
     */
    protected $sprints;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Alpha Team', 'IPAs and APIs', 'Astrofan')")
     */
    protected $team;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('deprecated', 'created', 'deployed', 'mergedToMaster', 'readyForMaster', 'prepareForMaster', 'inReview', 'readyForReview', 'inProgress')")
     */
    protected $status;

    /**
     * @ORM\Column(type="text_array")
     */
    protected $contributors;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $acceptance_tests;

    /**
     * @ORM\Column(type="string")
     */
    protected $acceptance_tests_author;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $unit_tests;

    /**
     * @ORM\Column(type="string")
     */
    protected $unit_tests_author;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $browser_tests;

    /**
     * @ORM\Column(type="string")
     */
    protected $browser_tests_author;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $ready_for_review;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $passed_review;

    /**
     * @ORM\Column(type="string")
     */
    protected $reviewer;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $passing_on_ci;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $merged_master;

    /**
     * @ORM\Column(type="string")
     */
    protected $master_commit;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_deployed;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_deprecated;

    public function __construct()
    {
        Type::addType('text_array', "Doctrine\\DBAL\\PostgresTypes\\TextArrayType");
        Type::addType('int_array', "Doctrine\\DBAL\\PostgresTypes\\IntArrayType");

        // set some default values
        $this->created = new \DateTime();
        $this->status = 'created';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getTaskNumbers()
    {
        return $this->taskNumbers;
    }

    public function getSprints()
    {
        return $this->sprints;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getTeam()
    {
        return $this->team;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getContributors()
    {
        return $this->contributors;
    }

    public function getAcceptanceTests()
    {
        return $this->acceptance_tests;
    }

    public function getAcceptanceTestsAuthor()
    {
        return $this->acceptance_tests_author;
    }

    public function getUnitTests()
    {
        return $this->unit_tests;
    }

    public function getUnitTestsAuthor()
    {
        return $this->unit_tests_author;
    }

    public function getBrowserTests()
    {
        return $this->browser_tests;
    }

    public function getBrowserTestsAuthor()
    {
        return $this->browser_tests_author;
    }

    public function getReadyForReview()
    {
        return $this->ready_for_review;
    }

    public function getPassedReview()
    {
        return $this->passed_review;
    }

    public function getReviewer()
    {
        return $this->reviewer;
    }

    public function getPassingOnCi()
    {
        return $this->passing_on_ci;
    }

    public function getMergedMaster()
    {
        return $this->merged_master;
    }

    public function getMasterCommit()
    {
        return $this->master_commit;
    }

    public function getIsDeployed()
    {
        return $this->is_deployed;
    }

    public function getIsDeprecated()
    {
        return $this->is_deprecated;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setTaskNumbers($taskNumbers)
    {
        $this->task_numbers = $taskNumbers;
        return $this;
    }

    public function setSprints($sprints)
    {
        $this->sprints = $sprints;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setTeam($team)
    {
        $this->team = $team;
        return $this;
    }

    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setContributors($contributors)
    {
        $this->contributors = $contributors;
        return $this;
    }

    public function setAcceptanceTests($acceptanceTests)
    {
        $this->acceptance_tests = $acceptanceTests;
        return $this;
    }

    public function setAcceptanceTestsAuthor($acceptanceTestsAuthor)
    {
        $this->acceptance_tests_author = $acceptanceTestsAuthor;
        return $this;
    }

    public function setUnitTests($unitTests)
    {
        $this->unit_tests = $unitTests;
        return $this;
    }

    public function setUnitTestsAuthor($unitTestsAuthor)
    {
        $this->unit_tests_author = $unitTestsAuthor;
        return $this;
    }

    public function setBrowserTests($browserTests)
    {
        $this->browser_tests = $browserTests;
        return $this;
    }

    public function setBrowserTestsAuthor($browserTestsAuthor)
    {
        $this->browser_tests_author = $browserTestsAuthor;
        return $this;
    }

    public function setReadyForReview($readyForReview)
    {
        $this->ready_for_review = $readyForReview;
        return $this;
    }

    public function setPassedReview($passedReview)
    {
        $this->passed_review = $passedReview;
        return $this;
    }

    public function setReviewer($reviewer)
    {
        $this->reviewer = $reviewer;
        return $this;
    }

    public function setPassingOnCi($passingOnCi)
    {
        $this->passing_on_ci = $passingOnCi;
        return $this;
    }

    public function setMergedMaster($mergedMaster)
    {
        $this->merged_master = $mergedMaster;
        return $this;
    }

    public function setMasterCommit($masterCommit)
    {
        $this->master_commit = $masterCommit;
        return $this;
    }

    public function setIsDeployed($isDeployed)
    {
        $this->is_deployed = $isDeployed;
        return $this;
    }

    public function setIsDeprecated($isDeprecated)
    {
        $this->is_deprecated = $isDeprecated;
        return $this;
    }

}

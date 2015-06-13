<?php
namespace Hubble\Entity;

use Zend\Form\Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Type;

/** @ORM\Entity */
class Branch {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    * @Annotation\Attributes({"type": "hidden"})
    */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Annotation\Options({"label": "Name"})
     */
    protected $name;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('sprint', 'support', 'other')")
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Options({"label": "Type", "value_options": {"sprint": "Sprint", "support": "Support", "other": "Other"}})
     */
    protected $type;

    /**
     * @ORM\Column(type="int_array")
     * @Annotation\Exclude() TODO: fix this
     */
    protected $task_numbers;

    /**
     * @ORM\Column(type="int_array")
     * @Annotation\Exclude() TODO: fix this
     */
    protected $sprints;

    /**
     * @ORM\Column(type="text")
     * @Annotation\Options({"label": "Description", "class": "50"})
     * @Annotation\Attributes({"cols": "100"})
     */
    protected $description;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Alpha Team', 'IPAs and APIs', 'Astrofan')")
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Options({"label": "Team", "value_options": {"Alpha Team": "Alpha Team", "IAPs and APIs": "IAPs and APIs", "Astrofan": "Astrofan"}})
     */
    protected $team;

    /**
     * @ORM\Column(type="datetime")
     * @Annotation\Exclude()
     */
    protected $created;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Created', 'In Progress', 'In Review', 'Ready For Master', 'Merged To Master', 'Deployed', 'Deprecated')")
     * @Annotation\Exclude()
     */
    protected $status;

    /**
     * @ORM\Column(type="text_array")
     * @Annotation\Exclude() TODO: fix this
     */
    protected $contributors;

    /**
     * @ORM\Column(type="boolean")
     * @Annotation\Type("Zend\Form\Element\Radio")
     * @Annotation\Options({"label": "Acceptance tested?",  "value_options": {"true": "Yes", "false": "No", "null": "N/A"}})
     */
    protected $acceptance_tests;

    /**
     * @ORM\Column(type="string")
     * @Annotation\Options({"label": "Who wrote them?"})
     */
    protected $acceptance_tests_author;

    /**
     * @ORM\Column(type="boolean")
     * @Annotation\Type("Zend\Form\Element\Radio")
     * @Annotation\Options({"label": "Unit tested?",  "value_options": {"true": "Yes", "false": "No", "null": "N/A"}})
     */
    protected $unit_tests;

    /**
     * @ORM\Column(type="string")
     * @Annotation\Options({"label": "Who wrote them?"})
     */
    protected $unit_tests_author;

    /**
     * @ORM\Column(type="boolean")
     * @Annotation\Type("Zend\Form\Element\Radio")
     * @Annotation\Options({"label": "Browser tested?",  "value_options": {"true": "Yes", "false": "No", "null": "N/A"}})
     */
    protected $browser_tests;

    /**
     * @ORM\Column(type="string")
     * @Annotation\Options({"label": "Who wrote them?"})
     */
    protected $browser_tests_author;

    /**
     * @ORM\Column(type="boolean")
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label": "Ready for review"})
     */
    protected $ready_for_review;

    /**
     * @ORM\Column(type="boolean")
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label": "Passed review"})
     */
    protected $passed_review;

    /**
     * @ORM\Column(type="string")
     * @Annotation\Options({"label": "Reviewer"})
     */
    protected $reviewer;

    /**
     * @ORM\Column(type="boolean")
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label": "Passing on Bamboo"})
     */
    protected $passing_on_ci;

    /**
     * @ORM\Column(type="boolean")
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label": "Merged to master"})
     */
    protected $merged_master;

    /**
     * @ORM\Column(type="string")
     * @Annotation\Options({"label": "Master commit"})
     */
    protected $master_commit;

    /**
     * @ORM\Column(type="boolean")
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label": "Is deployed"})
     */
    protected $is_deployed;

    /**
     * @ORM\Column(type="boolean")
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label": "Is deprecated"})
     */
    protected $is_deprecated;

    /**
     * @Annotation\Type("Zend\Form\Element\Submit")
     * @Annotation\Attributes({"value": "Add Branch"})
     */
    protected $submit;

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

<?php
namespace ThomasWoehlke\TwSimpleworklist\Domain\Model;

/***
 *
 * This file is part of the "SimpleWorklist" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2016 
 *
 ***/

/**
 * Task
 */
class Task extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     * 
     * @var string
     */
    protected $title = '';
    
    /**
     * text
     * 
     * @var string
     */
    protected $text = '';
    
    /**
     * focus
     * 
     * @var bool
     */
    protected $focus = false;
    
    /**
     * taskState
     * 
     * @var int
     */
    protected $taskState = 0;
    
    /**
     * lastTaskState
     * 
     * @var int
     */
    protected $lastTaskState = 0;
    
    /**
     * taskEnergy
     * 
     * @var int
     */
    protected $taskEnergy = 0;
    
    /**
     * taskTime
     * 
     * @var int
     */
    protected $taskTime = 0;
    
    /**
     * dueDate
     * 
     * @var \DateTime
     */
    protected $dueDate = null;
    
    /**
     * orderIdProject
     * 
     * @var int
     */
    protected $orderIdProject = 0;
    
    /**
     * orderIdTaskState
     * 
     * @var int
     */
    protected $orderIdTaskState = 0;
    
    /**
     * project
     * 
     * @var \ThomasWoehlke\TwSimpleworklist\Domain\Model\Project
     */
    protected $project = null;
    
    /**
     * context
     * 
     * @var \ThomasWoehlke\TwSimpleworklist\Domain\Model\Context
     */
    protected $context = null;
    
    /**
     * userAccount
     * 
     * @var \ThomasWoehlke\TwSimpleworklist\Domain\Model\UserAccount
     */
    protected $userAccount = null;
    
    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the text
     * 
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }
    
    /**
     * Sets the text
     * 
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }
    
    /**
     * Returns the focus
     * 
     * @return bool $focus
     */
    public function getFocus()
    {
        return $this->focus;
    }
    
    /**
     * Sets the focus
     * 
     * @param bool $focus
     * @return void
     */
    public function setFocus($focus)
    {
        $this->focus = $focus;
    }
    
    /**
     * Returns the boolean state of focus
     * 
     * @return bool
     */
    public function isFocus()
    {
        return $this->focus;
    }
    
    /**
     * Returns the taskState
     * 
     * @return int $taskState
     */
    public function getTaskState()
    {
        return $this->taskState;
    }
    
    /**
     * Sets the taskState
     * 
     * @param int $taskState
     * @return void
     */
    public function setTaskState($taskState)
    {
        $this->taskState = $taskState;
    }
    
    /**
     * Returns the lastTaskState
     * 
     * @return int $lastTaskState
     */
    public function getLastTaskState()
    {
        return $this->lastTaskState;
    }
    
    /**
     * Sets the lastTaskState
     * 
     * @param int $lastTaskState
     * @return void
     */
    public function setLastTaskState($lastTaskState)
    {
        $this->lastTaskState = $lastTaskState;
    }
    
    /**
     * Returns the taskEnergy
     * 
     * @return int $taskEnergy
     */
    public function getTaskEnergy()
    {
        return $this->taskEnergy;
    }
    
    /**
     * Sets the taskEnergy
     * 
     * @param int $taskEnergy
     * @return void
     */
    public function setTaskEnergy($taskEnergy)
    {
        $this->taskEnergy = $taskEnergy;
    }
    
    /**
     * Returns the taskTime
     * 
     * @return int $taskTime
     */
    public function getTaskTime()
    {
        return $this->taskTime;
    }
    
    /**
     * Sets the taskTime
     * 
     * @param int $taskTime
     * @return void
     */
    public function setTaskTime($taskTime)
    {
        $this->taskTime = $taskTime;
    }
    
    /**
     * Returns the dueDate
     * 
     * @return \DateTime $dueDate
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }
    
    /**
     * Sets the dueDate
     * 
     * @param \DateTime $dueDate
     * @return void
     */
    public function setDueDate(\DateTime $dueDate = NULL)
    {
        $this->dueDate = $dueDate;
    }
    
    /**
     * Returns the orderIdProject
     * 
     * @return int $orderIdProject
     */
    public function getOrderIdProject()
    {
        return $this->orderIdProject;
    }
    
    /**
     * Sets the orderIdProject
     * 
     * @param int $orderIdProject
     * @return void
     */
    public function setOrderIdProject($orderIdProject)
    {
        $this->orderIdProject = $orderIdProject;
    }
    
    /**
     * Returns the orderIdTaskState
     * 
     * @return int $orderIdTaskState
     */
    public function getOrderIdTaskState()
    {
        return $this->orderIdTaskState;
    }
    
    /**
     * Sets the orderIdTaskState
     * 
     * @param int $orderIdTaskState
     * @return void
     */
    public function setOrderIdTaskState($orderIdTaskState)
    {
        $this->orderIdTaskState = $orderIdTaskState;
    }
    
    /**
     * Returns the project
     * 
     * @return \ThomasWoehlke\TwSimpleworklist\Domain\Model\Project $project
     */
    public function getProject()
    {
        return $this->project;
    }
    
    /**
     * Sets the project
     * 
     * @param \ThomasWoehlke\TwSimpleworklist\Domain\Model\Project $project
     * @return void
     */
    public function setProject(\ThomasWoehlke\TwSimpleworklist\Domain\Model\Project $project)
    {
        $this->project = $project;
    }
    
    /**
     * Returns the context
     * 
     * @return \ThomasWoehlke\TwSimpleworklist\Domain\Model\Context $context
     */
    public function getContext()
    {
        return $this->context;
    }
    
    /**
     * Sets the context
     * 
     * @param \ThomasWoehlke\TwSimpleworklist\Domain\Model\Context $context
     * @return void
     */
    public function setContext(\ThomasWoehlke\TwSimpleworklist\Domain\Model\Context $context)
    {
        $this->context = $context;
    }
    
    /**
     * Returns the userAccount
     * 
     * @return \ThomasWoehlke\TwSimpleworklist\Domain\Model\UserAccount $userAccount
     */
    public function getUserAccount()
    {
        return $this->userAccount;
    }
    
    /**
     * Sets the userAccount
     * 
     * @param \ThomasWoehlke\TwSimpleworklist\Domain\Model\UserAccount $userAccount
     * @return void
     */
    public function setUserAccount(\ThomasWoehlke\TwSimpleworklist\Domain\Model\UserAccount $userAccount)
    {
        $this->userAccount = $userAccount;
    }
}

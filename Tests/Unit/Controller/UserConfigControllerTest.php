<?php
namespace ThomasWoehlke\Gtd\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Thomas Woehlke <woehlke@faktura-berlin.de>
 */
class UserConfigControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \ThomasWoehlke\Gtd\Controller\UserConfigController
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = $this->getMock(\ThomasWoehlke\Gtd\Controller\UserConfigController::class, ['redirect', 'forward', 'addFlashMessage'], [], '', false);
    }

    protected function tearDown()
    {
        parent::tearDown();
    }



    /**
     * @test
     */
    public function listActionTest()
    {
        $allUserConfigs = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, [], [], '', false);

        $userConfigRepository = $this->getMock(\ThomasWoehlke\Gtd\Domain\Repository\UserConfigRepository::class, ['findAll'], [], '', false);
        $userConfigRepository->expects(self::once())->method('findAll')->will(self::returnValue($allUserConfigs));
        $this->inject($this->subject, 'userConfigRepository', $userConfigRepository);

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $view->expects(self::once())->method('assign')->with('userConfigs', $allUserConfigs);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function  showActionTest(){
        $userLoggedIn = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser('loggedinuser','fd85df6575');
        $userConfig = new \ThomasWoehlke\Gtd\Domain\Model\UserConfig();
        $currentContext = new \ThomasWoehlke\Gtd\Domain\Model\Context();
        $currentContext->setNameDe('Arbeit');
        $currentContext->setNameEn('Work');
        $userConfig->setUserAccount($userLoggedIn);
        $userConfig->setDefaultContext($currentContext);
        $contextList = [$currentContext];
        $project1 = new \ThomasWoehlke\Gtd\Domain\Model\Project();
        $project1->setName('p1');
        $project1->setDescription('d1');
        $project1->setContext($currentContext);
        $project1->setUserAccount($userLoggedIn);
        $project2 = new \ThomasWoehlke\Gtd\Domain\Model\Project();
        $project2->setName('p2');
        $project2->setDescription('d2');
        $project2->setContext($currentContext);
        $project2->setUserAccount($userLoggedIn);
        $rootProjects = array($project1,$project2);

        // inject userAccountRepository
        $userAccountRepository = $this->getMock(\TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository::class, ['findByUid'], [1], '', false);
        $userAccountRepository->expects(self::once())->method('findByUid')->will(self::returnValue($userLoggedIn));
        $this->inject($this->subject, 'userAccountRepository', $userAccountRepository);

        //inject $userConfigRepository
        $userConfigRepository = $this->getMock(\ThomasWoehlke\Gtd\Domain\Repository\UserConfigRepository::class, ['findByUserAccount'], [$userLoggedIn], '', false);
        $userConfigRepository->expects(self::once())->method('findByUserAccount')->will(self::returnValue($userConfig));
        $this->inject($this->subject, 'userConfigRepository', $userConfigRepository);

        //inject $contextService
        $contextService = $this->getMock(\ThomasWoehlke\Gtd\Service\ContextService::class, ['getCurrentContext','getContextList'], [], '', false);
        $contextService->expects(self::once())->method('getCurrentContext')->will(self::returnValue($currentContext));
        $contextService->expects(self::once())->method('getContextList')->will(self::returnValue($contextList));
        $this->inject($this->subject, 'contextService', $contextService);

        //inject $projectRepository
        $projectRepository = $this->getMock(\ThomasWoehlke\Gtd\Domain\Repository\ProjectRepository::class, ['getRootProjects'], [$currentContext], '', false);
        $projectRepository->expects(self::once())->method('getRootProjects')->will(self::returnValue($rootProjects));
        $this->inject($this->subject, 'projectRepository', $projectRepository);

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $view->expects(self::at(0))->method('assign')->withConsecutive(['thisUser', $userLoggedIn]);
        $view->expects(self::at(1))->method('assign')->withConsecutive(['userConfig', $userConfig]);
        $view->expects(self::at(2))->method('assign')->withConsecutive(['contextList', $contextList]);
        $view->expects(self::at(3))->method('assign')->withConsecutive(['currentContext', $currentContext]);
        $view->expects(self::at(4))->method('assign')->withConsecutive(['rootProjects', $rootProjects]);

        $this->inject($this->subject, 'view', $view);

        $this->subject->showAction();
    }

    /**
     * @test
     */
    public function updateActionTest(){

    }
}

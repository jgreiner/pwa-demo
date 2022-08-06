<?php

declare(strict_types=1);

namespace Analogde\Test\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class Model1ControllerTest extends UnitTestCase
{
    /**
     * @var \Analogde\Test\Controller\Model1Controller|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Analogde\Test\Controller\Model1Controller::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllModel1sFromRepositoryAndAssignsThemToView(): void
    {
        $allModel1s = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $model1Repository = $this->getMockBuilder(\Analogde\Test\Domain\Repository\Model1Repository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $model1Repository->expects(self::once())->method('findAll')->will(self::returnValue($allModel1s));
        $this->subject->_set('model1Repository', $model1Repository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('model1s', $allModel1s);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenModel1ToView(): void
    {
        $model1 = new \Analogde\Test\Domain\Model\Model1();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('model1', $model1);

        $this->subject->showAction($model1);
    }
}

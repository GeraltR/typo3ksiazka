<?php

declare(strict_types=1);

namespace ExtBooks\Extbooks\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class AutorControllerTest extends UnitTestCase
{
    /**
     * @var \ExtBooks\Extbooks\Controller\AutorController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\ExtBooks\Extbooks\Controller\AutorController::class))
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
    public function listActionFetchesAllAutorsFromRepositoryAndAssignsThemToView(): void
    {
        $allAutors = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $autorRepository = $this->getMockBuilder(\ExtBooks\Extbooks\Domain\Repository\AutorRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $autorRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAutors));
        $this->subject->_set('autorRepository', $autorRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('autors', $allAutors);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAutorToView(): void
    {
        $autor = new \ExtBooks\Extbooks\Domain\Model\Autor();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('autor', $autor);

        $this->subject->showAction($autor);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenAutorToAutorRepository(): void
    {
        $autor = new \ExtBooks\Extbooks\Domain\Model\Autor();

        $autorRepository = $this->getMockBuilder(\ExtBooks\Extbooks\Domain\Repository\AutorRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $autorRepository->expects(self::once())->method('add')->with($autor);
        $this->subject->_set('autorRepository', $autorRepository);

        $this->subject->createAction($autor);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenAutorToView(): void
    {
        $autor = new \ExtBooks\Extbooks\Domain\Model\Autor();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('autor', $autor);

        $this->subject->editAction($autor);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenAutorInAutorRepository(): void
    {
        $autor = new \ExtBooks\Extbooks\Domain\Model\Autor();

        $autorRepository = $this->getMockBuilder(\ExtBooks\Extbooks\Domain\Repository\AutorRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $autorRepository->expects(self::once())->method('update')->with($autor);
        $this->subject->_set('autorRepository', $autorRepository);

        $this->subject->updateAction($autor);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenAutorFromAutorRepository(): void
    {
        $autor = new \ExtBooks\Extbooks\Domain\Model\Autor();

        $autorRepository = $this->getMockBuilder(\ExtBooks\Extbooks\Domain\Repository\AutorRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $autorRepository->expects(self::once())->method('remove')->with($autor);
        $this->subject->_set('autorRepository', $autorRepository);

        $this->subject->deleteAction($autor);
    }
}

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
class KsiazkaControllerTest extends UnitTestCase
{
    /**
     * @var \ExtBooks\Extbooks\Controller\KsiazkaController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\ExtBooks\Extbooks\Controller\KsiazkaController::class))
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
    public function listActionFetchesAllKsiazkasFromRepositoryAndAssignsThemToView(): void
    {
        $allKsiazkas = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ksiazkaRepository = $this->getMockBuilder(\ExtBooks\Extbooks\Domain\Repository\KsiazkaRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $ksiazkaRepository->expects(self::once())->method('findAll')->will(self::returnValue($allKsiazkas));
        $this->subject->_set('ksiazkaRepository', $ksiazkaRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('ksiazkas', $allKsiazkas);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenKsiazkaToView(): void
    {
        $ksiazka = new \ExtBooks\Extbooks\Domain\Model\Ksiazka();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('ksiazka', $ksiazka);

        $this->subject->showAction($ksiazka);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenKsiazkaToKsiazkaRepository(): void
    {
        $ksiazka = new \ExtBooks\Extbooks\Domain\Model\Ksiazka();

        $ksiazkaRepository = $this->getMockBuilder(\ExtBooks\Extbooks\Domain\Repository\KsiazkaRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $ksiazkaRepository->expects(self::once())->method('add')->with($ksiazka);
        $this->subject->_set('ksiazkaRepository', $ksiazkaRepository);

        $this->subject->createAction($ksiazka);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenKsiazkaToView(): void
    {
        $ksiazka = new \ExtBooks\Extbooks\Domain\Model\Ksiazka();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('ksiazka', $ksiazka);

        $this->subject->editAction($ksiazka);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenKsiazkaInKsiazkaRepository(): void
    {
        $ksiazka = new \ExtBooks\Extbooks\Domain\Model\Ksiazka();

        $ksiazkaRepository = $this->getMockBuilder(\ExtBooks\Extbooks\Domain\Repository\KsiazkaRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $ksiazkaRepository->expects(self::once())->method('update')->with($ksiazka);
        $this->subject->_set('ksiazkaRepository', $ksiazkaRepository);

        $this->subject->updateAction($ksiazka);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenKsiazkaFromKsiazkaRepository(): void
    {
        $ksiazka = new \ExtBooks\Extbooks\Domain\Model\Ksiazka();

        $ksiazkaRepository = $this->getMockBuilder(\ExtBooks\Extbooks\Domain\Repository\KsiazkaRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $ksiazkaRepository->expects(self::once())->method('remove')->with($ksiazka);
        $this->subject->_set('ksiazkaRepository', $ksiazkaRepository);

        $this->subject->deleteAction($ksiazka);
    }
}

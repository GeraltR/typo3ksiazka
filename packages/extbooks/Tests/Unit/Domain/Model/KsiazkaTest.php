<?php

declare(strict_types=1);

namespace ExtBooks\Extbooks\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class KsiazkaTest extends UnitTestCase
{
    /**
     * @var \ExtBooks\Extbooks\Domain\Model\Ksiazka|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \ExtBooks\Extbooks\Domain\Model\Ksiazka::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTytulReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTytul()
        );
    }

    /**
     * @test
     */
    public function setTytulForStringSetsTytul(): void
    {
        $this->subject->setTytul('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('tytul'));
    }

    /**
     * @test
     */
    public function getOpisReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getOpis()
        );
    }

    /**
     * @test
     */
    public function setOpisForStringSetsOpis(): void
    {
        $this->subject->setOpis('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('opis'));
    }

    /**
     * @test
     */
    public function getOkladkaReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getOkladka()
        );
    }

    /**
     * @test
     */
    public function setOkladkaForFileReferenceSetsOkladka(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setOkladka($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('okladka'));
    }

    /**
     * @test
     */
    public function getAutorReturnsInitialValueForAutor(): void
    {
        self::assertEquals(
            null,
            $this->subject->getAutor()
        );
    }

    /**
     * @test
     */
    public function setAutorForAutorSetsAutor(): void
    {
        $autorFixture = new \ExtBooks\Extbooks\Domain\Model\Autor();
        $this->subject->setAutor($autorFixture);

        self::assertEquals($autorFixture, $this->subject->_get('autor'));
    }
}

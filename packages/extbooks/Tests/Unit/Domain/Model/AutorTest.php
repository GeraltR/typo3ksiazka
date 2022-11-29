<?php

declare(strict_types=1);

namespace ExtBooks\Extbooks\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class AutorTest extends UnitTestCase
{
    /**
     * @var \ExtBooks\Extbooks\Domain\Model\Autor|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \ExtBooks\Extbooks\Domain\Model\Autor::class,
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
    public function getImieReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getImie()
        );
    }

    /**
     * @test
     */
    public function setImieForStringSetsImie(): void
    {
        $this->subject->setImie('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('imie'));
    }

    /**
     * @test
     */
    public function getNazwiskoReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNazwisko()
        );
    }

    /**
     * @test
     */
    public function setNazwiskoForStringSetsNazwisko(): void
    {
        $this->subject->setNazwisko('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('nazwisko'));
    }

    /**
     * @test
     */
    public function getZdjecieReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getZdjecie()
        );
    }

    /**
     * @test
     */
    public function setZdjecieForFileReferenceSetsZdjecie(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setZdjecie($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('zdjecie'));
    }
}

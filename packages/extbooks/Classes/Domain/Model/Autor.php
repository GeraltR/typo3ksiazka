<?php

declare(strict_types=1);

namespace ExtBooks\Extbooks\Domain\Model;


/**
 * This file is part of the "ExtBooks" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * Autor
 */
class Autor extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * imie
     *
     * @var string
     */
    protected $imie = null;

    /**
     * nazwisko
     *
     * @var string
     */
    protected $nazwisko = null;

    /**
     * zdjecie
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $zdjecie = null;

    /**
     * Returns the imie
     *
     * @return string
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Sets the imie
     *
     * @param string $imie
     * @return void
     */
    public function setImie(string $imie)
    {
        $this->imie = $imie;
    }

    /**
     * Returns the nazwisko
     *
     * @return string
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Sets the nazwisko
     *
     * @param string $nazwisko
     * @return void
     */
    public function setNazwisko(string $nazwisko)
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * Returns the zdjecie
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference zdjecie
     */
    public function getZdjecie()
    {
        return $this->zdjecie;
    }

    /**
     * Sets the zdjecie
     *
     * @param string $zdjecie
     * @return void
     */
    public function setZdjecie(string $zdjecie)
    {
        $this->zdjecie = $zdjecie;
    }
}

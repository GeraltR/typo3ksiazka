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
 * Ksiazka
 */
class Ksiazka extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * tytul
     *
     * @var string
     */
    protected $tytul = null;

    /**
     * opis
     *
     * @var string
     */
    protected $opis = null;

    /**
     * okladka
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $okladka = null;

    /**
     * autor
     *
     * @var \ExtBooks\Extbooks\Domain\Model\Autor
     */
    protected $autor = null;

    /**
     * Returns the tytul
     *
     * @return string
     */
    public function getTytul()
    {
        return $this->tytul;
    }

    /**
     * Sets the tytul
     *
     * @param string $tytul
     * @return void
     */
    public function setTytul(string $tytul)
    {
        $this->tytul = $tytul;
    }

    /**
     * Returns the opis
     *
     * @return string
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Sets the opis
     *
     * @param string $opis
     * @return void
     */
    public function setOpis(string $opis)
    {
        $this->opis = $opis;
    }

    /**
     * Returns the autor
     *
     * @return \ExtBooks\Extbooks\Domain\Model\Autor
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Sets the autor
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Autor $autor
     * @return void
     */
    public function setAutor(\ExtBooks\Extbooks\Domain\Model\Autor $autor)
    {
        $this->autor = $autor;
    }

    /**
     * Returns the okladka
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference okladka
     */
    public function getOkladka()
    {
        return $this->okladka;
    }

    /**
     * Sets the okladka
     *
     * @param string $okladka
     * @return void
     */
    public function setOkladka(string $okladka)
    {
        $this->okladka = $okladka;
    }
}

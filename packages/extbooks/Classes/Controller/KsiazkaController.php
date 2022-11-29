<?php

declare(strict_types=1);

namespace ExtBooks\Extbooks\Controller;


/**
 * This file is part of the "ExtBooks" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * KsiazkaController
 */
class KsiazkaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * ksiazkaRepository
     *
     * @var \ExtBooks\Extbooks\Domain\Repository\KsiazkaRepository
     */
    protected $ksiazkaRepository = null;

    /**
     * @param \ExtBooks\Extbooks\Domain\Repository\KsiazkaRepository $ksiazkaRepository
     */
    public function injectKsiazkaRepository(\ExtBooks\Extbooks\Domain\Repository\KsiazkaRepository $ksiazkaRepository)
    {
        $this->ksiazkaRepository = $ksiazkaRepository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $ksiazkas = $this->ksiazkaRepository->findAll();
        $this->view->assign('ksiazkas', $ksiazkas);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Ksiazka $ksiazka
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\ExtBooks\Extbooks\Domain\Model\Ksiazka $ksiazka): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('ksiazka', $ksiazka);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Ksiazka $newKsiazka
     */
    public function createAction(\ExtBooks\Extbooks\Domain\Model\Ksiazka $newKsiazka)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ksiazkaRepository->add($newKsiazka);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Ksiazka $ksiazka
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("ksiazka")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\ExtBooks\Extbooks\Domain\Model\Ksiazka $ksiazka): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('ksiazka', $ksiazka);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Ksiazka $ksiazka
     */
    public function updateAction(\ExtBooks\Extbooks\Domain\Model\Ksiazka $ksiazka)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ksiazkaRepository->update($ksiazka);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Ksiazka $ksiazka
     */
    public function deleteAction(\ExtBooks\Extbooks\Domain\Model\Ksiazka $ksiazka)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ksiazkaRepository->remove($ksiazka);
        $this->redirect('list');
    }
}

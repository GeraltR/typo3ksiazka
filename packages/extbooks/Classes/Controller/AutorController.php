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
 * AutorController
 */
class AutorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * autorRepository
     *
     * @var \ExtBooks\Extbooks\Domain\Repository\AutorRepository
     */
    protected $autorRepository = null;

    /**
     * @param \ExtBooks\Extbooks\Domain\Repository\AutorRepository $autorRepository
     */
    public function injectAutorRepository(\ExtBooks\Extbooks\Domain\Repository\AutorRepository $autorRepository)
    {
        $this->autorRepository = $autorRepository;
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
        $autors = $this->autorRepository->findAll();
        $this->view->assign('autors', $autors);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Autor $autor
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\ExtBooks\Extbooks\Domain\Model\Autor $autor): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('autor', $autor);
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
     * @param \ExtBooks\Extbooks\Domain\Model\Autor $newAutor
     */
    public function createAction(\ExtBooks\Extbooks\Domain\Model\Autor $newAutor)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->autorRepository->add($newAutor);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Autor $autor
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("autor")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\ExtBooks\Extbooks\Domain\Model\Autor $autor): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('autor', $autor);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Autor $autor
     */
    public function updateAction(\ExtBooks\Extbooks\Domain\Model\Autor $autor)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->autorRepository->update($autor);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \ExtBooks\Extbooks\Domain\Model\Autor $autor
     */
    public function deleteAction(\ExtBooks\Extbooks\Domain\Model\Autor $autor)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->autorRepository->remove($autor);
        $this->redirect('list');
    }

    /**
     * action
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function Action(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }
}

<?php

declare(strict_types=1);

namespace Analogde\Test\Controller;

use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * This file is part of the "test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022
 */

/**
 * Model1Controller
 */
class Model1Controller extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * model1Repository
     *
     * @var \Analogde\Test\Domain\Repository\Model1Repository
     */
    protected $model1Repository = null;

    /**
     * @param \Analogde\Test\Domain\Repository\Model1Repository $model1Repository
     */
    public function injectModel1Repository(\Analogde\Test\Domain\Repository\Model1Repository $model1Repository)
    {
        $this->model1Repository = $model1Repository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction()
    {
        $model1s = $this->model1Repository->findAll()->toArray();


       // DebuggerUtility::var_dump($model1s,null,8,true);die;
        $json = [];
        /** @var \Analogde\Test\Domain\Model\Model1 $model */
        foreach ($model1s as $model) {
            $json[] = $model;

        }
        return new JsonResponse($json);
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listActionAlt(): \Psr\Http\Message\ResponseInterface
    {
        $model1s = $this->model1Repository->findAll();
        $this->view->assign('model1s', $model1s);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Analogde\Test\Domain\Model\Model1 $model1
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Analogde\Test\Domain\Model\Model1 $model1): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('model1', $model1);
        return $this->htmlResponse();
    }
}

<?php

declare(strict_types=1);

namespace Pwademo\Sitepackage\Controller;

use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class DemoController extends ActionController
{
    public function demoAction(): JsonResponse
    {
        $data = [];
        for($i=0;$i<=50;$i++) {
            $data['item'.$i] = random_int(0,10000);
        }


        return new JsonResponse($data);
    }
}

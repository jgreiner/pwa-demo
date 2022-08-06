<?php

declare(strict_types=1);

namespace Pwademo\Sitepackage\Controller;

use TYPO3\CMS\Core\Http\JsonResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class DemoController extends ActionController
{
    public function demoAction(): JsonResponse
    {
<<<<<<< HEAD
        $data = [];
        for($i=0;$i<=50;$i++) {
            $data['item'.$i] = random_int(0,10000);
        }
        return new JsonResponse($data);
=======
        return new JsonResponse(['item' => 'test']);
>>>>>>> a82f0f1f505022784ff34e24d0d4cc2040813f14
    }
}

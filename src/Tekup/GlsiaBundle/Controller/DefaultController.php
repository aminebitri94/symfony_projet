<?php

namespace Tekup\GlsiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@TekupGlsia/Default/index.html.twig');
    }
}

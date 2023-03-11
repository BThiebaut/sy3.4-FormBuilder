<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends Controller
{
    protected function getRepository(string $className)
    {
        return $this->getDoctrine()->getManager()->getRepository($className);
    }
}

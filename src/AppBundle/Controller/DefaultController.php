<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Form;
use AppBundle\Factory\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $formRepo = $this->getRepository(Form::class);
        $forms = $formRepo->findAll();

        return $this->render('builder/form_list.html.twig', [
            'forms' => $forms
        ]);
    }

    /**
     * @Route("/forms/{id}", name="app_forms_form")
     */
    public function formAction(Request $request, $id = null)
    {
        $form = null;
        $formRepo = $this->getRepository(Form::class);

        if ($id != null){
            $form = $formRepo->find($id);
        }else {
            $form = new Form();
        }

        $models = FormFactory::getInstance()->getModelsConfig();
        dump($models);

        return $this->render('builder/form_form.html.twig', [
            'form' => $form
        ]);
    }
}

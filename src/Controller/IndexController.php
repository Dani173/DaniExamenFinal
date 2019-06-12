<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Pack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class IndexController extends AbstractController
{
    /**
     * @Route("/index/{id}/show", name="index")
     */
    public function index(Request $request, $id)
    {
        $employee = $this->getDoctrine()->getRepository(Employee::class)->findBy(
            array(
                'id'=> $id
            )
        );

        return $this->render('index/index.html.twig', [
            'employee' => $employee,
        ]);
    }

}

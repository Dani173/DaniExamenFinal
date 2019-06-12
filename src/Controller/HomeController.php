<?php

namespace App\Controller;

use App\Form\PackType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pack;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Employee;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;





class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $packs = $this->getDoctrine()->getRepository(Pack::class)->findAll();


        return $this->render('home/index.html.twig', [
            'packs' => $packs,
        ]);
    }

    /**
     * @Route("/home/{id}/show", name="home_show")
     */
    public function gomee(Request $request, $id)
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

    /**
     * @Route("/search", name="home_search")
     */
    public function buscador(Request $request)
    {
        $pack = new Pack();
        $form = $this->createForm(PackType::class,$pack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $pack1=$pack->getEmployeeId();
            $employee= $this->getDoctrine()->getRepository(Employee::class)->findBy(
                array(
                    'id'=> $pack1
                )
            );
            return $this->render('home/resultado.html.twig', [
               'employee'=>$employee
            ]);
        }

        return $this->render('home/buscador.html.twig', [
            'form' => $form->createView(),
            'pack'=>$pack
        ]);
    }




}

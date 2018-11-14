<?php

namespace App\Controller;

use App\Entity\Tennant;
use App\Form\TennantType;
use App\Repository\TennantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class TennantController extends AbstractController
{
    /**
     * @Route("/", name="tennant_index", methods="GET")
     */
    public function index(TennantRepository $tennantRepository): Response
    {
        return $this->render('tennant/index.html.twig', ['tennants' => $tennantRepository->findAll()]);
    }

    /**
     * @Route("/new", name="tennant_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $tennant = new Tennant();
        $form = $this->createForm(TennantType::class, $tennant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tennant);
            $em->flush();

            return $this->redirectToRoute('tennant_index');
        }

        return $this->render('tennant/new.html.twig', [
            'tennant' => $tennant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tennant_show", methods="GET")
     */
    public function show(Tennant $tennant): Response
    {
        return $this->render('tennant/show.html.twig', ['tennant' => $tennant]);
    }

    /**
     * @Route("/{id}/edit", name="tennant_edit", methods="GET|POST")
     */
    public function edit(Request $request, Tennant $tennant): Response
    {
        $form = $this->createForm(TennantType::class, $tennant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tennant_index', ['id' => $tennant->getId()]);
        }

        return $this->render('tennant/edit.html.twig', [
            'tennant' => $tennant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tennant_delete", methods="DELETE")
     */
    public function delete(Request $request, Tennant $tennant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tennant->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tennant);
            $em->flush();
        }

        return $this->redirectToRoute('tennant_index');
    }
}

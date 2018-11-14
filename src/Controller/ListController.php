<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tennant;

class ListController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Tennant::class);

        return $this->render('list/index.html.twig', [
            'tennants' => $repository->findAll()

        ]);
    }
}

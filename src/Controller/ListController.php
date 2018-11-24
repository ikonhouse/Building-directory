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

        //$tennantList = $repository->findAll();
        $tennantList = $repository->findBy([], ['name' => 'ASC']);



        $last = '';

        foreach ($tennantList as $tennant) {
            $current = strtolower($tennant->getName()[0]);
            if ($last != $current) {
                $letterArr[] = strtoupper($current);
                //echo strtoupper($current) . "<br />";
                $last = $current;
            }
            //echo "<a href=\"/artists/artist.php?user=".$row{'user'}."\">".$row{'name'}."</a><br />";
        }

        return $this->render('list/index.html.twig', [
            'tennants' => $tennantList,
            'letters' => $letterArr

        ]);
    }
}

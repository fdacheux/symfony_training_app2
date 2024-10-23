<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContinentController extends AbstractController
{
    #[Route('/continents', name: 'continents')]
    public function index(ContinentRepository $repository): Response
    {
        $continents = $repository->findAll();
        return $this->render('continent/continents.html.twig', [
            'continents' => $continents,
        ]);
    }
    #[Route('/continent/{id}', name: 'display_continent')]
    public function displayContinent(Continent $continent): Response
    {
        return $this->render('continent/displayContinent.html.twig', [
            'continent' => $continent,
        ]);
    }
}

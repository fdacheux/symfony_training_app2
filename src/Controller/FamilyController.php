<?php

namespace App\Controller;

use App\Entity\Family;
use App\Repository\FamilyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FamilyController extends AbstractController
{
    #[Route('/families', name: 'families')]
    public function index(FamilyRepository $repository): Response
    {
        $families = $repository->findAll();
        return $this->render('family/families.html.twig', [
            'families' => $families,
        ]);
    }
    #[Route('/families/{id}', name: 'display_family')]
    public function displayFamily(Family $family): Response
    {
        return $this->render('family/displayFamily.html.twig', [
            'family' => $family,
        ]);
    }
}

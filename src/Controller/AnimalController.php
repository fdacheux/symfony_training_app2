<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Animal;
use App\Repository\AnimalRepository;


class AnimalController extends AbstractController
{
    #[Route('/', name: 'animals')]
    public function index(AnimalRepository $repository): Response
    {
        $animals = $repository->findAll();
        return $this->render('animal/index.html.twig', [
            'animals' => $animals]);
    }

    #[Route('/animal/{id}', name: 'display_animal')]
    public function displayAnimal(Animal $animal): Response
    {
        return $this->render('animal/displayAnimal.html.twig', [
            'animal' => $animal]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonController extends AbstractController
{
    #[Route('/persons', name: 'persons')]
    public function index(PersonRepository $repository): Response
    {
        $persons = $repository->findAll();
        return $this->render('person/persons.html.twig', [
            'persons' => $persons,
        ]);
    }
    #[Route('/persons/{id}', name: 'display_person')]
    public function displayPerson(Person $person): Response
    {
        return $this->render('person/displayPerson.html.twig', [
            'person' => $person,
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{

    // on change la route vers la racine et on nomme la route homepage
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }

    // création d'une nouvelle route
    #[Route('/page/{id}', // on ajoute une variable dans l'url page
        name: 'page', // on nomme la route page
        requirements: ['id' => '\d+'], // id doit être un nombre
        methods: ['GET'], // on précise que la route n'accepte que les requêtes GET
    )]
    // lien de l'attribut avec la méthode page
    public function page(int $id): Response
    {
        return new Response("<body>Page $id</body>");
    }
}

<?php

// src/Controller/HelloController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController {

    /**
     * Page d'accueil
     * 
     * @Route("/", name="accueil")
     */
    public function home() {
        return $this->render('hello.html.twig', ['birthday' => '']); // date au format YYYY-MM-DD
    }
}

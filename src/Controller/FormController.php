<?php

// src/Controller/FormController.php
namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class FormController extends AbstractController {
    /**
     * @Route("/form/new", name="creation_article")
     */
    public function new(Request $request, EntityManagerInterface $em) {
        $article = new Article();
        $article->setTitle("Hello World");
        $article->setContent("Un très court article.");
        $article->setAuthor("Zozor");

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article->setDate(new \DateTime());

            $em->persist($article);
            $em->flush();
        }

        return $this->render('default/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/form/edit/{id<\d+>}")
     */
    public function edit(Request $request, EntityManagerInterface $em, Article $article) {
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Va effectuer la requête UPDATE en base de données
            $em->flush();
        }

        return $this->render('default/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/form/delete/{id<\d+>}")
     */
    public function delete(EntityManagerInterface $em, Article $article) {
        $em->remove($article);
        $em->flush();

        // Redirige la page
        return $this->redirectToRoute("creation_article");
    }
}

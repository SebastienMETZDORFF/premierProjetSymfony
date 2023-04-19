<?php

// src/Entity/Article.php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 */
class Article {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message = "Un auteur doit être associé à l'article")
     */
    private $author;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message = "Le contenu ne peut être vide")
     */
    private $content;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *  min = 10,
     *  max = 70,
     *  minMessage = "Ce titre est trop court",
     *  maxMessage = "Ce titre est trop long"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="datetime", name="date")
     */
    private $date;


    //----------------- GETTERS et SETTERS --------------------

    public function getId() {
        return $this->id;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }
}

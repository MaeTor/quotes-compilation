<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuoteController extends AbstractController
{
    #[Route('/create-first-quote', name: 'create_first_quote')]
    public function createFirstQuote(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $quote = new Quote();
        $quote->setText("Toute la gestion des erreurs en PHP consiste à trouver l'équilibre entre la perspicacité du développeur et l'expérience utilisateur")
        $quote->setAuthor("Gary Clarke");

        $entityManager->persist($quote);
        $entityManager->flush();
        
        return new response('nouvelle citation enregistrée avec l\'identifiant ' . $quote->id());

    }
}

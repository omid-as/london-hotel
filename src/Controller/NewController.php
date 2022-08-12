<?php

namespace App\Controller;


use App\Service\DateCalculator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewController extends AbstractController
{
    private const HOTEL_OPENED =1969;

    #[Route('/new', name: 'app_new')]
    public function index(LoggerInterface $logger, DateCalculator $dateCalculator): Response
    {
        $logger->info(message: 'Homepage loaded.');

        $year = $dateCalculator->yearsDefference(year: self::HOTEL_OPENED);

        

        return $this->render('new/index.html.twig', [
            'controller_name' => 'NewController',
            'year' => $year,
            
        ]);
    }
}

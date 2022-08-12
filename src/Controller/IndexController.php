<?php

namespace App\Controller;

use App\Service\RandomNumberGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(LoggerInterface $logger, RandomNumberGenerator $randomNumberGenerator)
    {
        $logger->info(message: 'Homepage loaded.');

        $year = $randomNumberGenerator->getRandomNumber();

        $image = [
            ['url' => 'image/hotel/intro_room.jpg', 'class' => ''],
            ['url' => 'image/hotel/intro_pool.jpg', 'class' => ''],
            ['url' => 'image/hotel/intro_dining.jpg', 'class' => ''],
            ['url' => 'image/hotel/intro_attractions.jpg', 'class' => ''],
            ['url' => 'image/hotel/intro_wedding.jpg', 'class' => 'hidesm']
            
        ];

        return $this->render(view: 'index.html.twig'

        );

        
    }
}
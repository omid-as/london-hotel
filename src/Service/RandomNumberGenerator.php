<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class RandomNumberGenerator
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function getRandomNumber() 
    {
       

        $number = [60,50,70];
        shuffle( array: $number);
        $number = array_pop(array: $number);
        return $number;

    }
}
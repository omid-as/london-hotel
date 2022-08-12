<?php

namespace App\EventSubscriber;

use App\Controller\ApiController;
use App\Controller\TokenAuthenticationController;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class TokenSubscriber implements EventSubscriberInterface
{
    private $token;

    public function __construct()
    {
        $this->token = [
            'user1' => 'token1',
            'user2' => 'token2'
        ];
    }
    public function beforeController(ControllerEvent $event)
    {
        $controller = $event->getController();

        if (is_array($controller) && $controller[0] instanceof TokenAuthenticationController) {
            $token = $event->getRequest()->query->get(key: 'token');
            if (!in_array($token, $this->token)) {
                throw new AccessDeniedException( message: 'this needs a valid token');

            }
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER =>'beforeController',
        ];
    }
}
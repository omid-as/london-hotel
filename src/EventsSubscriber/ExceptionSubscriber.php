<?php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionSubscriber implements EventDispatcherInterface
{
    public function onException(ExceptionEvent $event)
    {
        $e = $event->getException();

        if(!$e instanceof AccessDeniedException){
            return;
        }
        $responseData = [
            'error' => $e->getMessage()
        ];

        $response = new JsonResponse($responseData);

        $event->setResponse($response);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onException'
        ];
    }
}
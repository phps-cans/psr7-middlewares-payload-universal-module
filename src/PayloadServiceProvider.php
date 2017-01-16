<?php

namespace PsCs\UniversalModule\Psr7Middlewares\Middleware;
use Interop\Container\ServiceProvider;
use Interop\Container\ContainerInterface as Container;
use Psr7Middlewares\Middleware\Payload;
use TheCodingMachine\MiddlewareOrder;

class PayloadServiceProvider implements ServiceProvider {
  public function getServices() {
    return [
        Payload::class => [ self::class, 'createPayload' ],
        MiddlewareListServiceProvider::MIDDLEWARES_QUEUE => [self::class, 'updatePriorityQueue'],
    ];
  }

    public static function createPayload() : Payload
    {
        return new Payload();
    }

    public static function updatePriorityQueue(ContainerInterface $container, callable $previous = null) : \SplPriorityQueue
    {
        if ($previous) {
            $priorityQueue = $previous();
            $priorityQueue->insert($container->get(Payload::class), MiddlewareOrder::UTILITY_EARLY);
            return $priorityQueue;
        } else {
            throw new InvalidArgumentException("Could not find declaration for service '".MiddlewareListServiceProvider::MIDDLEWARES_QUEUE."'.");
        }
    }

}

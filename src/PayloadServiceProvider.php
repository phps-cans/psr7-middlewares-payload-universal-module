<?php

namespace PsCs\UniversalModule\Psr7Middlewares\Middleware;

use Psr7Middlewares\Middleware\Payload;
use TheCodingMachine\Funky\Annotations\Factory;
use TheCodingMachine\Funky\Annotations\Tag;
use TheCodingMachine\Funky\ServiceProvider;
use TheCodingMachine\MiddlewareListServiceProvider;
use TheCodingMachine\MiddlewareOrder;

class PayloadServiceProvider extends ServiceProvider
{
    /**
     * @Factory(tags={@Tag(name=MiddlewareListServiceProvider::MIDDLEWARES_QUEUE, priority=MiddlewareOrder::UTILITY_EARLY)})
     */
    public static function createPayload() : Payload
    {
        return new Payload();
    }
}

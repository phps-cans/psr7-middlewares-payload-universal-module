<?php

namespace PsCs\UniversalModule\Psr7Middlewares\Middleware;
use Interop\Container\ServiceProvider;
use Interop\Container\ContainerInterface as Container;

class PayloadServiceProvider implements ServiceProvider {
  public function getServices() {
    return [
        \Psr7Middlewares\Middleware\Payload::class => function(Container $container) {
          return new Payload();
        }
    ];
  }
}

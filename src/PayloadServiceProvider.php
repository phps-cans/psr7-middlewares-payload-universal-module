<?php

namespace Psr7Middlewares\Middleware;
use Interop\Container\ServiceProvider;
use Interop\Container\ContainerInterface as Container;

class PayloadServiceProvider implements ServiceProvider {
  public function getServices() {
    return [
        Payload::class => function(Container $container) {
          return new Payload();
        }
    ];
  }
}

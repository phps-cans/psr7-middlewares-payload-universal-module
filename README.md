# Payload universal module


This package integrates Payload's middleware in any [container-interop](https://github.com/container-interop/service-provider) compatible framework/container.

For this, it provides a service provider for the Payload Middleware of  [`oscarotero/psr7-middlewares`](https://github.com/oscarotero/psr7-middlewares).

It create an instance of `Psr7Middlewares\Middleware\Payload` under the name `Psr7Middlewares\Middleware\Payload`

It also update the queue named  `TheCodingMachine\MiddlewareListServiceProvider::MIDDLEWARES_QUEUE` by inserting the middleware instance with a priortity `TheCodingMachine\MiddlewareOrder\MiddlewareOrder::UTILITY_EARLY`

## Installation

```
composer require phps-cans/psr7-middlewares-payload-universal-module
```

## Usage

To be able to use this package, you must use [Stratigility universal module](https://github.com/thecodingmachine/middleware-list-universal-module).
For this, you must register the service provider provided. If you use [simplex](https://github.com/mnapoli/simplex): 

```php
$container->register(new \TheCodingMachine\MiddlewareListServiceProvider());
```

Once the `MiddlewareListServiceProvider` registered, you must register the payload's service provider:

```php
$container->register(new \Psr7Middlewares\Middleware\PayloadServiceProvider());
```
Once it is done:


1. If you use [stratigility-harmony](https://github.com/thecodingmachine/stratigility-harmony), there is nothing more to do.


2. If not using [stratigility-harmony](https://github.com/thecodingmachine/stratigility-harmony), do not forget to register middlewares inside the pipe. If you use Zend Expressive:
 ```php
 $app = $container->get(\Zend\Expressive\Application::class);
 $middlewaresQueue = $container->get(\TheCodingMachine\MiddlewareListServiceProvider::MIDDLEWARES_QUEUE);

 foreach ($middlewaresQueue as $middleware) {
     $app->pipe($middleware);
 }
 ```


## Expected values / services

This *service provider* expects the following configuration / services to be available:

| Name                                                                       | Compulsory | Description                            |
|-----------------------------                                               |------------|----------------------------------------|
| `\TheCodingMachine\MiddlewareListServiceProvider::MIDDLEWARES_QUEUE`       | *yes*       | Instance of `\ SplPriorityQueue`                             |


## Provided services

This *service provider* provides the following services:

| Service name                | Description                          |
|-----------------------------|--------------------------------------|
| `\Psr7Middlewares\Middleware\Payload::class`              | The middleware instancied                           |

## Extended services

This *service provider* extends those services:

| Name                        | Compulsory | Description                            |
|-----------------------------|------------|----------------------------------------|
| `\TheCodingMachine\MiddlewareListServiceProvider::MIDDLEWARES_QUEUE`               | *yes*      | Update the queue with the middleware's payload                             |

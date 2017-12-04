# Payload service provider

This package provide a service provider for the Payload Middleware of  [`oscarotero/psr7-middlewares`](https://github.com/oscarotero/psr7-middlewares).

It create an instance of `Psr7Middlewares\Middleware\Payload` under the name `Psr7Middlewares\Middleware\Payload`

It also update the queue named  `TheCodingMachine\MiddlewareListServiceProvider::MIDDLEWARES_QUEUE` by inserting the middleware instance with a priortity `TheCodingMachine\MiddlewareOrder\MiddlewareOrder::UTILITY_EARLY`

## Usage

To be able to use this package, you must use [Stratigility universal module](https://github.com/thecodingmachine/middleware-list-universal-module)

```php
$container->register(new \TheCodingMachine\MiddlewareListServiceProvider());
```

Once the `MiddlewareListServiceProvider` registered, you must register the payload's service provider:

```php
$container->register(new \Psr7Middlewares\Middleware\PayloadServiceProvider());
```

Do not forget to register middlewares inside the pipe. If you use Zend Expressive:
 ```php
 $app = $container->get(\Zend\Expressive\Application::class);
 $middlewaresQueue = $container->get(\TheCodingMachine\MiddlewareListServiceProvider::MIDDLEWARES_QUEUE);

 foreach ($middlewaresQueue as $middleware) {
     $app->pipe($middleware);
 }
 ```

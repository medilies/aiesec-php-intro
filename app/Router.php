<?php

namespace Medilies\AiesecPhpIntro;

class Router
{
    private array $routes;
    private string $method;
    private string $uri;
    private string $path;
    private string $targetRouteKey;
    private Renderer $renderer;

    public function __construct()
    {
        $this->routes = require __DIR__.'/routes.php';
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];

        $this->path = rtrim(parse_url($this->uri, PHP_URL_PATH), '/') ?: '/';

        $this->targetRouteKey = "{$this->method}:{$this->path}";

        $this->renderer = new Renderer;
    }

    public function handleRequest(): string
    {
        $handler = $this->resolveRoute();

        if(is_null($handler)) {
            return $this->notFoundResponse();
        }

        // TODO: middleware

        return call_user_func_array([new $handler['action'][0], $handler['action'][1]], []);
    }

    private function resolveRoute(): ?array
    {
        return $this->routes[$this->targetRouteKey] ?? null;
    }

    private function notFoundResponse(): string
    {
        http_response_code(404);
        return $this->renderer->render('404');
    }
}
<?php
declare(strict_types=1);

namespace Mvc;

/**
 * The Mvc Application
 *
 * @package Mvc
 */
class Application
{
    /**
     * The configured routes
     *
     * @var array
     */
    private $routesConfig;

    /**
     * @var Route
     */
    private $route;

    /**
     * Application Constructor
     *
     * @param array $applicationConfig
     */
    public function __construct(array $applicationConfig)
    {
        $this->routesConfig = array_key_exists('routes', $applicationConfig) ? $applicationConfig['routes'] : [];
    }

    /**
     * Static Application init
     *
     * @param array $applicationConfig
     * @return \Mvc\Application
     */
    public static function init(array $applicationConfig)
    {
        return new self($applicationConfig);
    }

    /**
     * Application run
     *
     * @return void
     */
    public function run()
    {
        $this->route = new Route($this->getRequestedRoute());

        $this->dispatch();
    }

    /**
     * Dispatch
     *
     * @return void
     */
    protected function dispatch()
    {
        include __DIR__ . '/../' . str_replace('\\', '/', $this->route->getController()) . '.php';

        $controllerString = '\\' . $this->route->getController();
        $controller = new $controllerString($this->route);

        $controller->{$this->route->getAction() . 'Action'}();
    }

    /**
     * Returns the requested route
     *
     * @return array
     */
    protected function getRequestedRoute() : array
    {
        $requestedPath = $_SERVER['REQUEST_URI'];

        foreach ($this->routesConfig as $name => $routeEntry) {

            if ($requestedPath === $routeEntry['path']) {
                return $routeEntry;
            }

        }

        return $this->routesConfig['notFound'];
    }
}
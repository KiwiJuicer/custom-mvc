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
     * Parameters
     *
     * @var array
     */
    private $params = [];

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

        (new $controllerString($this->route, $this->params))->{$this->route->getAction() . 'Action'}();
    }

    /**
     * Returns the requested route
     *
     * @return array
     */
    protected function getRequestedRoute() : array
    {
        preg_match_all('/(\d+)/', $_SERVER['REQUEST_URI'], $matches);
        $paramValues = (isset($matches[1])) ? $matches[1] : null;
        $slices = explode('/', $_SERVER['REQUEST_URI']);

        $matchUri = $_SERVER['REQUEST_URI'];

        foreach ($this->routesConfig as $routeEntry) {

            if (false !== $pos = strpos($routeEntry['path'], ':')) {

                $subString = substr($routeEntry['path'], $pos);
                $paramNames = explode('/', $subString);

                foreach ($slices as &$slice) {

                    foreach ($paramValues as $index => $param) {

                        if ($param === $slice) {
                            $this->params[substr($paramNames[$index], 1)] = $slice;
                            $slice = $paramNames[$index];
                            break;
                        }
                    }
                }

                $matchUri = implode('/', $slices);
            }

            if ($matchUri === $routeEntry['path']) {
                return $routeEntry;
            }

        }

        return $this->routesConfig['notFound'];
    }
}
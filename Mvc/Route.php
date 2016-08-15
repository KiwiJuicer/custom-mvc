<?php
declare(strict_types=1);

namespace Mvc;

/**
 * Mvc Route
 * @package Mvc
 */
class Route
{
    private $name;
    private $path;
    private $controller;
    private $action;

    /**
     * Route Constructor
     *
     * @param array $routeConfig
     */
    public function __construct(array $routeConfig)
    {
        $this->name = $routeConfig['name'];
        $this->path = $routeConfig['path'];
        $this->controller = $routeConfig['controller'];
        $this->action = $routeConfig['action'];
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPath() : string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getController() : string
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getAction() : string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
}
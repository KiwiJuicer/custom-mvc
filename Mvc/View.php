<?php
declare(strict_types=1);

namespace Mvc;

/**
 * Mvc View
 *
 * @package Mvc
 */
class View
{
    /**
     * The route
     *
     * @var \Mvc\Route
     */
    protected $route;

    /**
     * The name of the view
     *
     * @var string
     */
    protected $viewName;

    /**
     * The view content path
     *
     * @var string
     */
    protected $viewContentPath;

    /**
     * View Constructor
     *
     * @param \Mvc\Route $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
        $this->viewName = $route->getName();
    }

    /**
     * Magic setter
     *
     * @param string $name
     * @param $value
     */
    public function __set(string $name, $value)
    {
        $this->$name = $value;
    }

    /**
     * Magic getter
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * Outputs the view
     */
    public function show()
    {
        $this->viewContentPath =  __DIR__ . '/../View/' . $this->viewName . '.phtml';
        include __DIR__ . '/../View/layout/layout.phtml';
    }

    /**
     * Sets the 404 not found header
     */
    public function setNotFound()
    {
        header("HTTP/1.0 404 Not Found");
    }
}
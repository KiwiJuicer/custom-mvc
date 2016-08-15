<?php
declare(strict_types=1);

namespace Controller;

use Mvc\Route;
use Mvc\View;

/**
 * Abstract Controller
 *
 * @package Controller
 */
class AbstractController {

    /**
     * The View
     *
     * @var \Mvc\View
     */
    protected $view;

    /**
     * Route parameters
     *
     * @var array
     */
    protected $params;

    /**
     * Abstract Controller Constructor
     *
     * @param \Mvc\Route $route
     */
    public function __construct(Route $route, array $params)
    {
        $this->view = new View($route);
        $this->params = $params;
    }

    /**
     * Not Found View Action
     */
    public function notFoundAction()
    {
        $this->view->setNotFound();
        $this->view->title = 'Not Found Title';
        $this->view->show();
    }
}
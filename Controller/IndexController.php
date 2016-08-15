<?php
declare(strict_types=1);

namespace Controller;

/**
 * Index Controller
 *
 * @package Controller
 */
class IndexController extends AbstractController
{
    /**
     * Index View Action
     */
    public function indexAction()
    {
        $this->view->title = 'KiwiJuicer';
        $this->view->content = [
            'Apples',
            'Tomatoes',
            'Dogs'
        ];
        $this->view->show();
    }
}
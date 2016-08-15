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

    /**
     * Objects View Action
     */
    public function objectsAction()
    {
        echo '<pre>'; print_r($this->params); echo '</pre>';
        $this->view->title = 'Objects';
        $objects = [
            'Apples',
            'Tomatoes',
            'Dogs'
        ];
        $this->view->count = (int)$this->params['count'];
        $this->view->object = $objects[(int)$this->params['id']];
        $this->view->show();
    }
}
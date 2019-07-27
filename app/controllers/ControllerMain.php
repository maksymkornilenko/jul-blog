<?php

namespace controllers;

use core\Controller;
use models\ModelMain;

class ControllerMain extends Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new ModelMain();
    }

    public function action_index() {
        $this->view->main = $this->model->all();
        $this->view->new = $this->model->popular();
        $this->view->render('main_index_view');
    }

    public function action_delete() {
        $this->view->delete = $this->model->delete();
        $this->view->render('main_index_view');
    }

    public function action_create() {
        $this->view->add = $this->model->addNews();
        $this->view->render('main_index_view');
    }

}

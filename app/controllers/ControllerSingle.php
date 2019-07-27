<?php

namespace controllers;

use core\Controller;
use models\ModelSingle;

class ControllerSingle extends Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new ModelSingle();
    }

    public function action_index() {
        $this->view->comment = $this->model->getCommentsById();
        $this->view->one = $this->model->get();
        $this->view->render('single_index_view');
    }
    public function action_add() {
        $this->view->addcom = $this->model->add();
        $this->view->render('single_index_view');
    }
}

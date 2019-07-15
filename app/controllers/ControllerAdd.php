<?php

namespace controllers;

use core\Controller;
use models\ModelAdd;

class ControllerAdd extends Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new ModelAdd();
    }

    public function action_index() {
        $this->view->render('add_index_view');
    }
     public function action_create() {
        $this->view->add = $this->model->addNews();
        $this->view->render('add_index_view');
    }

}

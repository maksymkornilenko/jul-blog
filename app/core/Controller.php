<?php

namespace core;

abstract class Controller {
    /**
     *
     * @var Model
     */
    protected $model;
    /**
     *
     * @var View 
     */
    protected $view;
    public function __construct() {
        $this->view= new View();
    }
    public abstract function action_index();
}

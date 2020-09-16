<?php

namespace Source\Core;

class Controller {
    protected $view;

    public function __construct(string $pathToViews = null)
    {
        $this->view = new View($pathToViews);
    }
}
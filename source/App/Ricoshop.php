<?php
namespace Source\App;

use Source\Core\Controller;

class Ricoshop extends Controller{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    public function ricoshopsIndex()
    {
        echo $this->view->render("ricoshops", []);
    }
}
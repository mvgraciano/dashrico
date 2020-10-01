<?php

namespace Source\App;

use Source\Core\Controller;

class App extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    public function home()
    {
        // echo $this->view->render("home", [
        //     "head" => "",
        //     "message" => null,
        //     "title" => "Home"
        // ]);
        redirect("/ricoshops");
    }
}

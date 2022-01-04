<?php

class Home
{
    public function index()
    {
        $this->view("home");
    }

    public function view($view)
    {
        if (file_exists("../app/views/main/" . $view . ".php")) {
            include("../app/views/main/" . $view . ".php");
        } else {
            include("../app/views/404/404.php");
        }
    }
}

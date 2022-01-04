<?php

class Home extends Controller
{
    public function index()
    {
        $DB = new Database();
        $data = array(
            'result' => $DB->viewUsers(),
            'page_title' => WEBSITE_TITLE,
        );

        $this->view("home", $data);
    }
}

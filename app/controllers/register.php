<?php

class Register extends Controller
{
    public function index()
    {
        $DB = new Database();
        $data = array(
            'page_title' => "Registration",
        );
        $this->view("register", $data);
    }
}

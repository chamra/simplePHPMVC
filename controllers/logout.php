<?php

class Logout extends Controller
{
    function __construct()
    {
        Session::init();
        if (!Session::get('user')) {
            header('Location: ' . base_url);
        }

        parent::__construct();
    }

    public function action()
    {
        Session::destroy();
        header('Location: ' . base_url);
    }
}
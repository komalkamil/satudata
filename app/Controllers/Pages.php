<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        echo view('layout/header');
        echo view('layout/navbar');
        echo view('pages/home');
        echo view('layout/footer');
    }
}

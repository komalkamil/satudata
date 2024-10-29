<?php

namespace App\Controllers;

class Data extends BaseController
{
    public function index()
    {
        echo view('layout/header');
        echo view('layout/navbar');
        echo view('pages/data');
        echo view('layout/footer');
    }
}

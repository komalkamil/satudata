<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Dashboard extends  BaseController
{
    public function index()
    {
        session();
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'dashboard',
            'header' => 'Dashboard',
            'userData' => session()->get()
        ];

        return view('backend/dashboard', $data);
    }
    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }
}

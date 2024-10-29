<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/backend/dashboard');
        }

        $data = [
            'title' => 'pusdatin'
        ];

        return view('login', $data);
    }

    public function login()
    {
        $data = $this->request->getPost(['email', 'password']);

        if (! $this->validateData($data, [
            'email' => 'required',
            'password' => 'required'
        ])) {
            return $this->index();
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $credentials = ['email' => $email];

        $user = $this->model->where($credentials)
            ->first();

        if (! $user) {
            session()->setFlashdata('error', 'Email atau password anda salah.');
            return redirect()->back();
        }

        $passwordCheck = password_verify($password, $user['password']);

        if (! $passwordCheck) {
            session()->setFlashdata('error', 'Email atau password anda salah.');
            return redirect()->back();
        }

        $userData = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'logged_in' => TRUE
        ];

        session()->set($userData);
        return redirect()->to('/backend/dashboard');
    }

    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }

    public function logout()
    {

        $userData = [
            'name',
            'email',
            'logged_in'
        ];

        session()->remove($userData);

        return redirect()->to('/auth');
    }
}

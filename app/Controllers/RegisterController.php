<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        $data = [
            'header' => 'tambah user',
            'title' => 'pusdatin',
            'userData' => session()->get()

        ];

        return view('auth/register', $data);
    }
    public function store()
    {
        $data = $this->request->getPost(['name', 'email', 'password', 'role']);

        if (! $this->validateData($data, $this->model->validationRules)) {
            return $this->index();
        }

        $user = $this->validator->getValidated();

        $save = $this->model->save($user);

        if ($save) {
            session()->setFlashdata('success', 'Register Berhasil!');
            return redirect()->to('/auth');
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }
}

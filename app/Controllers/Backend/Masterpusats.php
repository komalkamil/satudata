<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ModelPusats;

class Masterpusats extends  BaseController
{
    protected $ModelPusats;
    public function __construct()
    {
        session();
        helper(['form', 'url']);
        $this->ModelPusats = new ModelPusats();
    }
    public function index()
    {
        $data = [
            'title' => 'Master Pusat',
            'header' => 'Master Pusat',
            'divisi' => $this->ModelPusats->getData('divisi'),
            'userData' => session()->get()


        ];
        return view('backend/masterpusat/index', $data);
    }
    public function create()
    {
        session();
        $data = [
            'title' => 'Master Pusat',
            'header' => 'Tambah Master Pusat',
            'userData' => session()->get()
        ];
        return view('backend/masterpusat/create', $data);
    }


    public function save()
    {
        // dd($this->request->getVar());
        // validasi

        helper(['form', 'url']);

        $rules = [
            'nm_divisi' => [
                'rules' => 'required|is_unique[divisi.nm_divisi]',
                'errors' => [
                    'required' => 'Filed ga boleh kosong',
                    'is_unique' => 'data ini sudah ada'
                ]
            ],
            'akronim' => [
                'rules' => 'required|is_unique[divisi.akronim]',
                'errors' => [
                    'required' => 'Filed ga boleh kosong',
                    'is_unique' => 'data ini sudah ada'
                ]
            ],
            'path' => [
                'rules' => 'uploaded[path]|max_size[path,2048]|mime_in[path,image/jpg,image/jpeg,image/png]|is_image[path]',
                'errors' => [
                    'uploaded' => 'pilih gambar terlebih dahulu',
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'berkas yang diupload bukan gambar',
                    'mime_in' => 'berkas yang diupload bukan gambar',
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $slug = url_title($this->request->getVar('nm_divisi'), '-', true);
            $pic = $this->request->getFile('path');
            $path = $pic->getRandomName();
            $pic->move('img', $path);
            $this->ModelPusats->save([
                'nm_divisi' => $this->request->getVar('nm_divisi'),
                'akronim' => $this->request->getVar('akronim'),
                'slug' => $slug,
                'path' => $path,
                'penulis' => 'admin'
            ]);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to('/backend/masterpusats');
        } else {
            $data = [
                'validation' => $this->validator,
                'title' => 'master pusat',
                'header' => 'Tambah master pusat'

            ];

            // Pass errors back to the view
            echo view('backend/masterpusat/create', $data);
        }



        // insert data 


    }
}

<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ModelBanners;

class Banners extends  BaseController
{
    protected $ModelBanners;
    public function __construct()
    {
        helper(['form', 'url', 'file']);
        $this->ModelBanners = new ModelBanners();
        session();
    }
    public function index()
    {

        $data = [
            'title' => 'Banner',
            'header' => 'Banner',
            'banners' => $this->ModelBanners->getData('banner'),
            'userData' => session()->get()
        ];
        return view('backend/banners/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Banner',
            'header' => 'Tambah Banner',
            'userData' => session()->get()

        ];
        return view('backend/banners/create', $data);
    }
    public function save()
    {


        $rules = [
            'judul_banner' => [
                'rules' => 'required|is_unique[banner.judul_banner]',
                'errors' => [
                    'required' => 'Filed ga boleh kosong',
                    'is_unique' => 'data ini sudah ada'
                ]
            ],
            'isi' => [
                'rules' => 'required|is_unique[banner.isi]',
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
            $slug = url_title($this->request->getVar('judul_banner'), '-', true);
            $pic = $this->request->getFile('path');
            $path = $pic->getRandomName();
            $pic->move('img', $path);
            $this->ModelBanners->save([
                'judul_banner' => $this->request->getVar('judul_banner'),
                'isi' => $this->request->getVar('isi'),
                'slug' => $slug,
                'path' => $path,
                'penulis' => 'admin'
            ]);
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to('/backend/banners')->withInput();
        } else {
            // Validation failed
            // Retrieve validation errors
            $data = [
                'validation' => $this->validator,
                'title' => 'master pusat',
                'header' => 'Tambah master pusat'

            ];

            // Pass errors back to the view
            echo view('backend/banners/create', $data);
        }



        // insert data 


    }
}

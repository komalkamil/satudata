<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ModelDatas;
use App\Models\ModelStatus;

class Masterstatus extends  BaseController
{
    protected $ModelStatus;
    public function __construct()
    {
        session();
        $this->ModelStatus = new ModelStatus();
    }

    public function index()
    {

        // $status = $this->ModelStatus->findAll();
        $data = [
            'title' => 'Master status',
            'header' => 'Master status',
            'status' => $this->ModelStatus->getData('status'),
            'userData' => session()->get()

        ];
        return view('backend/masterstatus/index', $data);
    }


    public function create()
    {
        session();
        $data = [
            'title' => 'Master status',
            'header' => 'Tambah Master status',
            'validation' => \Config\Services::validation(),
            'userData' => session()->get()
        ];
        return view('backend/masterstatus/create', $data);
    }


    public function detail($slug)
    {
        $status = $this->ModelStatus->getData('status', $slug);
        dd($status);
    }


    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nm_status' => $this->basic_rules('status', 'nm_status')
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/backend/masterstatus/create')->with('validation', $validation);
        };

        $slug = url_title($this->request->getVar('nm_status'), '-', true);

        $this->ModelStatus->save([
            'nm_status' => $this->request->getVar('nm_status'),
            'slug' => $slug,
            'penulis' => 'admin',
            'userData' => session()->get()
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/backend/masterstatus');
    }
    public function edit($slug)
    {
        $datas = $this->ModelStatus->getData('status', $slug);
        $data = [
            'title' => 'Ubah status',
            'header' => 'Ubah status',
            'status' => $datas,
            'userData' => session()->get()
        ];
        return view('backend/masterstatus/edit', $data);
    }
    public function update($id)
    {
        $datalama = $this->ModelStatus->getData('status', $this->request->getVar('slug'));
        if ($datalama['nm_status'] == $this->request->getVar('nm_status')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[status.nm_status]';
        }

        if (!$this->validate([
            'nm_status' => [
                'rules' => $rule,
                'errors' => [
                    'required' => 'Field tidak boleh kosong',
                    'is_unique' => 'nama status ini sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/backend/masterstatus/edit/' . $this->request->getVar('slug'))->with('validation', $validation);
        };

        $slug = url_title($this->request->getVar('nm_status'), '-', true);

        $this->ModelStatus->save([
            'id_status' => $this->request->getVar('id'),
            'nm_status' => $this->request->getVar('nm_status'),
            'slug' => $slug,
            'penulis' => 'admin'
        ]);
        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/backend/masterstatus');
    }
    public function delete($id)
    {
        $this->ModelStatus->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/backend/masterstatus');
    }
}

<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ModelJenisData;

class Masterjenisdatas extends  BaseController
{
    protected $ModelJenisData;
    public function __construct()
    {
        session();

        $this->ModelJenisData = new ModelJenisData();
    }
    public function index()
    {

        $data = [
            'title' => 'Master jenisdata',
            'header' => 'Master jenis data',
            'jenis_data' => $this->ModelJenisData->getData('jenis_data'),
            'userData' => session()->get()
        ];
        return view('backend/masterjenisdata/index', $data);
    }
    public function create()
    {
        session();

        $data = [
            'title' => 'Master jenisdata',
            'header' => 'Tambah Master jenis data',
            'userData' => session()->get()
        ];
        return view('backend/masterjenisdata/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'jenis_data' => $this->basic_rules('jenis_data', 'nm_format')
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/backend/masterjenisdatas/create')->with('validation', $validation);
        };

        $slug = url_title($this->request->getVar('jenis_data'), '-', true);

        $this->ModelJenisData->save([
            'jenis_data' => $this->request->getVar('jenis_data'),
            'slug' => $slug,
            'penulis' => 'admin'
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/backend/masterjenisdatas');
    }
    public function edit($slug)
    {
        $datas = $this->ModelJenisData->getData('jenis_data', $slug);
        $data = [
            'title' => 'Ubah jenisdata',
            'header' => 'Ubah Jenis data',
            'jenis_data' => $datas,
            'userData' => session()->get()
        ];
        return view('backend/masterjenisdata/edit', $data);
    }
    public function update($id)
    {


        if (!$this->validate([
            'jenis_data' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field tidak boleh kosong',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/backend/masterjenisdatas/edit/' . $this->request->getVar('slug'))->with('validation', $validation);
        };

        $slug = url_title($this->request->getVar('jenis_data'), '-', true);

        $this->ModelJenisData->save([
            'id' => $this->request->getVar('id'),
            'jenis_data' => $this->request->getVar('jenis_data'),
            'slug' => $slug,
            'penulis' => 'admin'
        ]);
        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/backend/masterjenisdatas');
    }
    public function delete($id)
    {
        $this->ModelJenisData->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/backend/masterjenisdatas');
    }
}

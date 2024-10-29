<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ModelDisagregasis;

class MasterDisagregasis extends  BaseController
{
    protected $ModelDisagregasis;
    public function __construct()
    {
        session();
        $this->ModelDisagregasis = new ModelDisagregasis();
    }
    public function index()
    {

        $data = [
            'title' => 'Master disagregasi',
            'header' => 'Master Disagregasi',
            'disagregasi' => $this->ModelDisagregasis->getData('disagregasi'),
            'userData' => session()->get()
        ];
        return view('backend/masterDisagregasi/index', $data);
    }
    public function create()
    {
        session();

        $data = [
            'title' => 'Master disagregasi',
            'header' => 'Tambah Disagregasi',
            'userData' => session()->get()

        ];
        return view('backend/masterdisagregasi/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nm_disagregasi' => $this->basic_rules('disagregasi', 'nm_disagregasi')
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/backend/masterDisagregasis/create')->with('validation', $validation);
        };

        $slug = url_title($this->request->getVar('nm_disagregasi'), '-', true);

        $this->ModelDisagregasis->save([
            'nm_disagregasi' => $this->request->getVar('nm_disagregasi'),
            'slug' => $slug,
            'penulis' => 'admin'
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/backend/masterDisagregasis');
    }
    public function edit($slug)
    {
        $datas = $this->ModelDisagregasis->getData('disagregasi', $slug);
        $data = [
            'title' => 'Ubah disagregasi',
            'header' => 'Ubah disagregasi',
            'disagregasi' => $datas,
            'userData' => session()->get()
        ];
        return view('backend/masterdisagregasi/edit', $data);
    }
    public function update($id)
    {
        $datalama = $this->ModelDisagregasis->getData('disagregasi', $this->request->getVar('slug'));
        if ($datalama['nm_disagregasi'] == $this->request->getVar('nm_disagregasi')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[disagregasi.nm_disagregasi]';
        }

        if (!$this->validate([
            'nm_disagregasi' => [
                'rules' => $rule,
                'errors' => [
                    'required' => 'Field tidak boleh kosong',
                    'is_unique' => 'format Data ini sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/backend/masterdisagregasis/edit/' . $this->request->getVar('slug'))->with('validation', $validation);
        };

        $slug = url_title($this->request->getVar('nm_disagregasi'), '-', true);

        $this->ModelDisagregasis->save([
            'id' => $this->request->getVar('id'),
            'nm_disagregasi' => $this->request->getVar('nm_disagregasi'),
            'slug' => $slug,
            'penulis' => 'admin'
        ]);
        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/backend/masterdisagregasis');
    }
    public function delete($id)
    {
        $this->ModelDisagregasis->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/backend/masterdisagregasis');
    }
}

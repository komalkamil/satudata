<?php

namespace App\Controllers\Backend;

use App\Models\ModelFormatData;
use App\Controllers\BaseController;

class Masterformatdatas extends  BaseController
{
    protected $ModelFormatData;
    public function __construct()
    {
        session();

        $this->ModelFormatData = new ModelFormatData();
    }
    public function index()
    {
        $data = [
            'title' => 'Master formatdata',
            'header' => 'Master format data',
            'format_data' => $this->ModelFormatData->getData('format_data'),
            'userData' => session()->get()

        ];
        return view('backend/masterformatdata/index', $data);
    }
    public function create()
    {
        session();
        $data = [
            'title' => 'Master formatdata',
            'header' => 'Tambah Master format data',
            'userData' => session()->get()

        ];
        return view('backend/masterformatdata/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'format_data' => [
                'rules' => 'required|is_unique[format_data.nm_format]',
                'errors' => [
                    'required' => 'Field tidak boleh kosong',
                    'is_unique' => 'format Data ini sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/backend/masterformatdatas/create')->with('validation', $validation);
        };

        $slug = url_title($this->request->getVar('format_data'), '-', true);

        $this->ModelFormatData->save([
            'nm_format' => $this->request->getVar('format_data'),
            'slug' => $slug,
            'penulis' => 'admin'
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/backend/masterformatdatas');
    }
    public function edit($slug)
    {
        $datas = $this->ModelFormatData->getData('format_data', $slug);
        $data = [
            'title' => 'Ubah formatdata',
            'header' => 'Ubah format data',
            'format_data' => $datas,
            'userData' => session()->get()
        ];
        return view('backend/masterformatdata/edit', $data);
    }
    public function update($id)
    {
        $formatLama = $this->ModelFormatData->getData('format_data', $this->request->getVar('slug'));
        if ($formatLama['nm_format'] == $this->request->getVar('nm_format')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[format_data.nm_format]';
        }

        if (!$this->validate([
            'format_data' => [
                'rules' => $rule,
                'errors' => [
                    'required' => 'Field tidak boleh kosong',
                    'is_unique' => 'format Data ini sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/backend/masterformatdatas/edit/' . $this->request->getVar('slug'))->with('validation', $validation);
        };

        $slug = url_title($this->request->getVar('format_data'), '-', true);

        $this->ModelFormatData->save([
            'id' => $this->request->getVar('id'),
            'nm_format' => $this->request->getVar('format_data'),
            'slug' => $slug,
            'penulis' => 'admin'
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/backend/masterformatdatas');
    }
    public function delete($id)
    {
        $this->ModelFormatData->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/backend/masterformatdatas');
    }
}

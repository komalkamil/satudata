<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ModelDatas;
use App\Models\ModelStatus;
use App\Models\ModelPusats;
use App\Models\ModelJenisData;
use App\Models\ModelFormatData;
use App\Models\ModelDisagregasis;
use App\Models\UserModel;
use App\Models\ModelLogsdata;

class Datas extends  BaseController
{

    public function __construct()
    {
        session();
        helper('form', 'url', 'file');
        $userData = session()->get();
        $this->ModelDatas = new ModelDatas();
        $this->ModelPusats = new ModelPusats();
        $this->ModelStatus = new ModelStatus();
        $this->ModelJenisData = new ModelJenisData();
        $this->ModelFormatData = new ModelFormatData();
        $this->ModelDisagregasis = new ModelDisagregasis();
        $this->ModelLogsdata = new ModelLogsdata();
        $this->UserModel = new UserModel();
    }

    public function builder($where = false)
    {
        if ($where == false) {
            return $this->ModelDatas->select('data.*,
            divisi.nm_divisi,
            status.nm_status, 
            format_data.nm_format, 
            disagregasi.nm_disagregasi,
            jenis_data.jenis_data')
                ->join('divisi', 'divisi.id = data.id_divisi', 'inner')
                ->join('disagregasi', 'disagregasi.id = data.id_disagregasi', 'inner')
                ->join('status', 'status.id_status = data.id_status_daftar', 'inner')
                ->join('jenis_data', 'jenis_data.id = data.id_jenis_data', 'inner')
                ->join('format_data', 'format_data.id = data.id_format', 'inner')
                ->findAll();
        }
        return $this->ModelDatas->select('data.*,
            divisi.nm_divisi,
            status.nm_status, 
            format_data.nm_format, 
            disagregasi.nm_disagregasi,
            jenis_data.jenis_data')
            ->join('divisi', 'divisi.id = data.id_divisi', 'inner')
            ->join('disagregasi', 'disagregasi.id = data.id_disagregasi', 'inner')
            ->join('status', 'status.id_status = data.id_status_daftar', 'inner')
            ->join('jenis_data', 'jenis_data.id = data.id_jenis_data', 'inner')
            ->join('format_data', 'format_data.id = data.id_format', 'inner')
            ->where($where)
            ->findAll();
    }


    public function index()
    {
        $data = [
            'title' => 'Data',
            'header' => 'Data',
            'userData' => session()->get(),
            'datas' => $this->builder('data.id_status_daftar >5')
        ];
        return view('backend/datas/index', $data);
    }
    public function daftar_usulan_data()
    {

        $data = [
            'title' => 'Master Pusat',
            'header' => 'Master Pusat',
            'userData' => session()->get(),
            'datas' => $this->builder(),
        ];
        return view('backend/datas/daftar_usulan_data', $data);
    }

    public function Verifikasi_data()
    {

        $data = [
            'title' => 'Master Pusat',
            'header' => 'Master Pusat',
            'datas' => $this->builder(),
            'userData' => session()->get(),
        ];
        return view('backend/datas/verifikasi_data', $data);
    }

    public function dataRules()
    {
        return [
            'nm_data' => $this->basic_rules(),
            'pusats' => $this->basic_rules(),
            'jenis_data' => $this->basic_rules(),
            'pengumpulan' => $this->basic_rules(),
            'media' => $this->basic_rules(),
            'format_data' => $this->basic_rules(),
            'akses' => $this->basic_rules(),
            'pemutakhiran' => $this->basic_rules(),
            'waktu_pengumpulan' => $this->basic_rules(),
            'periode_daftar' => $this->basic_rules(),
            'disagregasi' => $this->basic_rules(),
            'periode_awal' => $this->basic_rules(),
            'periode_akhir' => $this->basic_rules(),
            'penanggung_jawab' => $this->basic_rules(),
            'kontak_produsen' => $this->basic_rules(),
            'prioritas' => $this->basic_rules(),
        ];
    }

    public function create()
    {
        session()->get();
        $data = [
            'title' => 'Tambah Usulan Data',
            'header' => 'Tambah Usulan Data',
            'pusats' => $this->ModelPusats->getData('divisi'),
            'jenis_data' => $this->ModelJenisData->getData('jenis_data'),
            'format_data' => $this->ModelFormatData->getData('format_data'),
            'disagregasi' => $this->ModelDisagregasis->getData('disagregasi'),
            'userData' => session()->get(),
        ];
        return view('backend/datas/create', $data);
    }

    public function save()
    {
        $rules = $this->dataRules();
        $slug = url_title($this->request->getVar('nm_data'), '-', true);
        $datas = [
            'nm_data' => $this->request->getVar('nm_data'),
            'slug' => $slug,
            'id_divisi' => $this->request->getVar('pusats'),
            'id_format' => $this->request->getVar('format_data'),
            'id_jenis_data' => $this->request->getVar('jenis_data'),
            'id_disagregasi' => $this->request->getVar('disagregasi'),
            'id_status_daftar' => 1,
            'id_status' => 1,
            'metode' => $this->request->getVar('pengumpulan'),
            'media_pengumpulan' => $this->request->getVar('media'),
            'akses' => $this->request->getVar('akses'),
            'waktu_pengumpulan' => $this->request->getVar('waktu_pengumpulan'),
            'jadwal_pemuktahiran' => $this->request->getVar('pemutakhiran'),
            'periode_daftar' => $this->request->getVar('periode_daftar'),
            'periode_awal' => $this->request->getVar('periode_awal'),
            'periode_akhir' => $this->request->getVar('periode_akhir'),
            'penanggung_jawab' => $this->request->getVar('penanggung_jawab'),
            'kontak_produsen' => $this->request->getVar('kontak_produsen'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'status_prio' => $this->request->getVar('prioritas'),
            'alasan' => $this->request->getVar('alasan_prio'),
            'image' => '',
            'penulis' => $this->request->getVar('penulis'),
            'highlight' => '',
            'excel' => '',
            'pdf' => '',
            'berita_acara' => '',

        ];
        if ($this->validate($rules)) {
            $this->ModelDatas->save($datas);
            $data = $this->ModelDatas->getData('data', $slug);
            $logs = [
                'id_data' => $data['id'],
                'pesan' => 'data baru diusulkan',
                'penulis' => $this->request->getVar('penulis'),

            ];
            $this->ModelLogsdata->save($logs);

            return redirect()->to('/backend/Datas')->with('Pesan', 'Data Berhasil Ditambahkan')->withInput();
        } else {
            $data = [
                'title' => 'Tambah Usulan Data',
                'header' => 'Tambah Usulan Data',
                'pusats' => $this->ModelPusats->getData('divisi'),
                'jenis_data' => $this->ModelJenisData->getData('jenis_data'),
                'format_data' => $this->ModelFormatData->getData('format_data'),
                'disagregasi' => $this->ModelDisagregasis->getData('disagregasi'),
                'userData' => session()->get(),
            ];

            return view('backend/datas/create', $data);
        }
    }
    public function verifikasi($slug)
    {
        $query = $this->ModelDatas->select('data.*,
        divisi.nm_divisi,
        status.nm_status, 
        format_data.nm_format, 
        disagregasi.nm_disagregasi,
        jenis_data.jenis_data')
            ->join('divisi', 'divisi.id = data.id_divisi', 'inner')
            ->join('disagregasi', 'disagregasi.id = data.id_disagregasi', 'inner')
            ->join('status', 'status.id_status = data.id_status_daftar', 'inner')
            ->join('jenis_data', 'jenis_data.id = data.id_jenis_data', 'inner')
            ->join('format_data', 'format_data.id = data.id_format', 'inner')
            ->where('data.slug', "$slug")
            ->findAll();

        $data = [
            'title' => 'Verifikasi Data',
            'header' => 'Verifikasi Data',
            'userData' => session()->get(),
            'datas' => $query
        ];

        return view('backend/datas/verifikasi', $data);
    }
    public function validasi($slug)
    {
        $datas = $this->ModelDatas->getData('data', $slug);
        $id_status_daftar = $datas['id_status_daftar'];
        $user = $this->UserModel->getUsers($this->request->getVar('user'));
        $valid = $this->request->getVar('valid');

        if ($valid) {
            if ($id_status_daftar < 4) {
                $data = [
                    'id' => $datas['id'],
                    'id_status_daftar' => 5
                ];
            } elseif ($id_status_daftar > 4) {
                $data = [
                    'id' => $datas['id'],
                    'id_status_daftar' => $id_status_daftar + 1
                ];
            }
            $this->ModelDatas->save($data, $slug);
        }
        $logs = [
            'id_data' => $datas['id'],
            'pesan' => $this->request->getVar('pesan'),
            'penulis' => $user['name'],

        ];

        $this->ModelLogsdata->save($logs);

        return redirect()->to('/backend/datas/verifikasi_data')->with('pesan', 'Status Data Berhasil Diupdate');
    }
}

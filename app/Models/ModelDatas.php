<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDatas extends Model
{
    protected $table = 'data';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nm_data',
        'slug',
        'id_divisi',
        'id_format',
        'id_jenis_data',
        'id_disagregasi',
        'id_status_daftar',
        'id_status',
        'metode',
        'media_pengumpulan',
        'akses',
        'waktu_pengumpulan',
        'jadwal_pemuktahiran',
        'periode_daftar',
        'periode_awal',
        'periode_akhir',
        'penanggung_jawab',
        'kontak_produsen',
        'deskripsi',
        'status_prio',
        'alasan',
        'image',
        'penulis',
        'highlight',
        'excel',
        'pdf',
        'berita_acara',
    ];

    public function getDatas($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}

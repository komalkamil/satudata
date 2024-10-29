<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBanners extends Model
{
    protected $table = 'banner';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id',
        'judul_banner',
        'slug',
        'isi',
        'path',
        'penulis'
    ];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJenisData extends Model
{
    protected $table = 'jenis_data';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'jenis_data',
        'slug',
        'penulis'
    ];
}

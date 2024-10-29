<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStatus extends Model
{
    protected $table = 'status';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_status',
        'nama_status',
        'slug',
        'penulis'
    ];
}

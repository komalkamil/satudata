<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDisagregasis extends Model
{
    protected $table = 'disagregasi';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_status',
        'nm_disagregasi',
        'slug',
        'penulis'
    ];
}

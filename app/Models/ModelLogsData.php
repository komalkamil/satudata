<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogsdata extends Model
{
    protected $table = 'log_data';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_data',
        'pesan',
        'penulis',
    ];
}

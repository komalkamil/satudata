<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPusats extends Model
{
    protected $table = 'divisi';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nm_divisi',
        'slug',
        'akronim',
        'penulis',
        'path'
    ];
}

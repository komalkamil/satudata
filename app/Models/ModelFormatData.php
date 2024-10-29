<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFormatData extends Model
{
    protected $table = 'format_data';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nm_format',
        'slug',
        'penulis'
    ];
}

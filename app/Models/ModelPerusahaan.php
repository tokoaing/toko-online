<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPerusahaan extends Model
{
    protected $table            = 'perusahaan';
    protected $primaryKey       = 'peruid';
    protected $allowedFields    = [
        'perunama', 'perualamat', 'peruwa', 'perutelp', 'perufax', 'peruemail', 'peruicon', 'perufoto'
    ];
}

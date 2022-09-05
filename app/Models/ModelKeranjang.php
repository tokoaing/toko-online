<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeranjang extends Model
{
    protected $table            = 'keranjang';
    protected $primaryKey       = 'kerid';
    protected $allowedFields    = [
        'kernomor', 'kertanggal', 'kerbrgid', 'kerjml', 'kersubtotal', 'keruser'
    ];
}

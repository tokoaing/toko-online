<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduct extends Model
{
    protected $table            = 'product';
    protected $primaryKey       = 'prodid';
    protected $allowedFields    = [
        'prodnama', 'prodtype', 'prodkat', 'prodbranch', 'proddeskripsi', 'prodharga', 'prodstock', 'prodgambar'
    ];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeranjang extends Model
{
    protected $table            = 'keranjang';
    protected $primaryKey       = 'kerid';
    protected $allowedFields    = [
        'kertanggal', 'kerbrgid', 'kerjml', 'keruser'
    ];

    public function cekKeranjang($kerbrgid)
    {
        return $this->table('keranjang')->getWhere([
            'kerbrgid' => $kerbrgid
        ]);
    }

    function ambilTotalKeranjang($iduser)
    {
        $query = $this->table('keranjang')->getWhere([
            'keruser' => $iduser
        ]);

        $totalKeranjang = 0;
        foreach ($query->getResultArray() as $r) :
            $totalKeranjang += $r['kerjml'];
        endforeach;
        return $totalKeranjang;
    }
}

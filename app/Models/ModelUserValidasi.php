<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUserValidasi extends Model
{
    protected $table            = 'uservalidasi';
    protected $primaryKey       = 'userid';
    protected $allowedFields    = [
        'userid', 'usernama', 'userpassword', 'userlevel', 'userstatus'
    ];

    public function cekUser($id)
    {
        return $this->table('uservalidasi')->getWhere([
            'sha1(userid)' => $id
        ]);
    }
}

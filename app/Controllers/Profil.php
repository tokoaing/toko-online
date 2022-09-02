<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBranch;
use App\Models\ModelPerusahaan;
use App\Models\ModelUsers;

class Profil extends BaseController
{
    public function index($user)
    {
        $modelUser = new ModelUsers();
        $rowUser = $modelUser->cekUser($user)->getRowArray();

        // menampilkan data perusahaan
        $modelPerusahaan = new ModelPerusahaan();
        $rowPeru = $modelPerusahaan->find(1);

        // menampilkan branch
        $modelBranch = new ModelBranch();
        $cekBranch = $modelBranch->findAll();

        if ($rowPeru > 0) {
            $data = [
                'peruid'            => $rowPeru['peruid'],
                'perunama'          => $rowPeru['perunama'],
                'perualamat'        => $rowPeru['perualamat'],
                'perualamatlink'    => $rowPeru['perualamatlink'],
                'peruwa'            => $rowPeru['peruwa'],
                'perutelp'          => $rowPeru['perutelp'],
                'perufax'           => $rowPeru['perufax'],
                'peruemail'         => $rowPeru['peruemail'],
                'peruicon'          => $rowPeru['peruicon'],
                'perufoto'          => $rowPeru['perufoto'],
                'databranch'        => $cekBranch,

                'userid'            => $rowUser['userid'],
                'usernama'          => $rowUser['usernama'],
                'userpassword'      => $rowUser['userpassword'],
                'userlevel'         => $rowUser['userlevel'],
                'usergender'        => $rowUser['usergender'],
                'userlahir'         => $rowUser['userlahir'],
                'useralamat'        => $rowUser['useralamat'],
                'userrt'            => $rowUser['userrt'],
                'userrw'            => $rowUser['userrw'],
                'useralamatid'      => $rowUser['useralamatid'],
                'propinsi'          => $rowUser['propinsi'],
                'kota_kabupaten'    => $rowUser['kota_kabupaten'],
                'kecamatan'         => $rowUser['kecamatan'],
                'kelurahan'         => $rowUser['kelurahan'],
                'kodepos'           => $rowUser['kodepos'],
                'usertelp'          => $rowUser['usertelp'],
                'userfoto'          => $rowUser['userfoto'],
                'usermap'           => $rowUser['usermap'],

            ];
        } else {
            $data = [
                'peruid'            => 'Default',
                'perunama'          => 'Default',
                'perualamat'        => 'Default',
                'perualamatlink'    => 'Default',
                'peruwa'            => 'Default',
                'perutelp'          => 'Default',
                'perufax'           => 'Default',
                'peruemail'         => 'Default',
                'peruicon'          => '',
                'perufoto'          => 'Default',
                'databranch'        => 'Default',

                'userid'            => 'Default',
                'usernama'          => 'Default',
                'userpassword'      => 'Default',
                'userlevel'         => 'Default',
                'usergender'        => 'Default',
                'userlahir'         => 'Default',
                'useralamat'        => 'Default',
                'userrt'            => 'Default',
                'userrw'            => 'Default',
                'useralamatid'      => 'Default',
                'propinsi'          => 'Default',
                'kota_kabupaten'    => 'Default',
                'kecamatan'         => 'Default',
                'kelurahan'         => 'Default',
                'kodepos'           => 'Default',
                'usertelp'          => 'Default',
                'userfoto'          => 'Default',
                'usermap'           => 'Default',
            ];
        }

        return view('profil/lihat', $data);
    }
}

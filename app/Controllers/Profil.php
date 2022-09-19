<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBranch;
use App\Models\ModelPerusahaan;
use App\Models\ModelUsers;
use Config\Services;

class Profil extends BaseController
{

    public function __construct()
    {
        helper('form');
    }



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


    public function editprofil()
    {
        if ($this->request->isAJAX()) {
            $user = sha1($this->request->getVar('userid'));

            $modelUser = new ModelUsers();
            $rowData = $modelUser->cekUser($user)->getRowArray();

            $data = [
                'userid'            => $rowData['userid'],
                'usernama'          => $rowData['usernama'],
                'userpassword'      => $rowData['userpassword'],
                'userlevel'         => $rowData['userlevel'],
                'usergender'        => $rowData['usergender'],
                'userlahir'         => $rowData['userlahir'],
                'useralamat'        => $rowData['useralamat'],
                'userrt'            => $rowData['userrt'],
                'userrw'            => $rowData['userrw'],
                'useralamatid'      => $rowData['useralamatid'],
                'usertelp'          => $rowData['usertelp'],
                'userfoto'          => $rowData['userfoto'],
                'usermap'           => $rowData['usermap'],
                'propinsi'          => $rowData['propinsi'],
                'kota_kabupaten'    => $rowData['kota_kabupaten'],
                'kecamatan'         => $rowData['kecamatan'],
                'kelurahan'         => $rowData['kelurahan'],
                'kodepos'           => $rowData['kodepos'],
            ];

            $json = [
                'data' => view('profil/editprofil', $data)
            ];

            echo json_encode($json);
        } else {
            exit('Maaf, gagal menampilkan data');
        }
    }

    public function simpanfoto()
    {
        $userid          = $this->request->getVar('userid');
        $userfoto         = $this->request->getFile('userfoto');


        $modelUser = new ModelUsers();

        $cekGambar = $modelUser->find($userid);

        $fotoLama = $cekGambar['userfoto'];

        if ($fotoLama != NULL) {
            unlink('upload/' . $fotoLama);
        }

        $fileGambar = $userfoto->getRandomName();

        $userfoto->move('upload', $fileGambar);


        $modelUser->update($userid, [
            'userfoto'           => $fileGambar,
        ]);


        $user = sha1($userid);

        if ($modelUser) {
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
        }
        return view('profil/lihat', $data);
    }
}

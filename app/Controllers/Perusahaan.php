<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPerusahaan;

class Perusahaan extends BaseController
{
    public function index()
    {
        $modelPerusahaan = new ModelPerusahaan();

        $data = [
            'title'         => 'Data Perusahaan',
            'menu'          => 'master',
            'submenu'       => 'perusahaan',
            'actmenu'       => '',
            'tampildata'    => $modelPerusahaan->find(1)
        ];

        return view('perusahaan/viewdata', $data);
    }


    public function formedit($peruid)
    {
        $modelPerusahaan = new ModelPerusahaan();
        $cekData        = $modelPerusahaan->find($peruid);
        if ($cekData) {
            $data = [
                'peruid'            => $cekData['peruid'],
                'perunama'          => $cekData['perunama'],
                'perualamat'        => $cekData['perualamat'],
                'perualamatlink'    => $cekData['perualamatlink'],
                'peruwa'            => $cekData['peruwa'],
                'perutelp'          => $cekData['perutelp'],
                'perufax'           => $cekData['perufax'],
                'peruemail'         => $cekData['peruemail'],
                'peruicon'          => $cekData['peruicon'],
                'perufoto'          => $cekData['perufoto'],
            ];

            $json = [
                'data' => view('perusahaan/modaledit', $data)
            ];
        }
        echo json_encode($json);
    }
}

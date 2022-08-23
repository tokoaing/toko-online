<?php

namespace App\Controllers;

use App\Models\ModelPerusahaan;

class Home extends BaseController
{
    public function index()
    {
        $modelPerusahaan = new ModelPerusahaan();
        $rowPeru = $modelPerusahaan->find(1);

        if ($rowPeru > 0) {
            $data = [
                'peruid'        => $rowPeru['peruid'],
                'perunama'      => $rowPeru['perunama'],
                'perualamat'    => $rowPeru['perualamat'],
                'peruwa'        => $rowPeru['peruwa'],
                'perutelp'      => $rowPeru['perutelp'],
                'perufax'       => $rowPeru['perufax'],
                'peruemail'     => $rowPeru['peruemail'],
                'peruicon'      => $rowPeru['peruicon'],
                'perufoto'      => $rowPeru['perufoto'],
            ];
        } else {
            $data = [
                'peruid'        => 'Default',
                'perunama'      => 'Default',
                'perualamat'    => 'Default',
                'peruwa'        => 'Default',
                'perutelp'      => 'Default',
                'perufax'       => 'Default',
                'peruemail'     => 'Default',
                'peruicon'      => '',
                'perufoto'      => 'Default',
            ];
        }

        return view('halaman_utama', $data);
    }
}

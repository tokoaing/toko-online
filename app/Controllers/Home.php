<?php

namespace App\Controllers;

use App\Models\ModelBaner;
use App\Models\ModelLevels;
use App\Models\ModelPerusahaan;
use App\Models\ModelProduct;
use App\Models\ModelUsers;
use Config\Services;

class Home extends BaseController
{

    public function index()
    {
        // menampilkan data perusahaan
        $modelPerusahaan = new ModelPerusahaan();
        $rowPeru = $modelPerusahaan->find(1);

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
            ];
        }

        return view('dashboard', $data);
    }

    function tampilBaner()
    {
        if ($this->request->isAJAX()) {
            $modelBaner = new ModelBaner();
            $dataBaner = $modelBaner->findAll();



            $data = [
                'indikator' => $dataBaner,
                'tampildata' => $dataBaner,
                'tombolindikator' => $dataBaner,
            ];

            $json = [
                'data' => view('tampilbaner', $data)
            ];

            echo json_encode($json);
        } else {
            exit('Maaf, gagal menampilkan data');
        }
    }

    public function katalog()
    {
        // menampilkan data perusahaan
        $modelPerusahaan = new ModelPerusahaan();
        $rowPeru = $modelPerusahaan->find(1);


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
            ];
        }

        return view('katalog', $data);
    }

    function katalogTampil()
    {
        if ($this->request->isAJAX()) {
            $modelProduct = new ModelProduct();
            $dataProduct = $modelProduct->findAll();



            $data = [
                'tampilkatalog' => $dataProduct,
            ];

            $json = [
                'data' => view('katalogtampil', $data)
            ];

            echo json_encode($json);
        } else {
            exit('Maaf, gagal menampilkan data');
        }
    }

    //form Login
    function login()
    {
        if ($this->request->isAJAX()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $validation = \Config\Services::validation();



            $valid = $this->validate([
                'email'    => [
                    'label'     => 'Email',
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ],
                'password'    => [
                    'label'     => 'Password',
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $json = [
                    'error' => [
                        'errEmail'     => $validation->getError('email'),
                        'errPassword'   => $validation->getError('password'),
                    ]
                ];
            } else {
                $modelUser  = new ModelUsers();

                $cekUser = $modelUser->find($email);
                $passwordUser = $cekUser['userpassword'];


                if ($cekUser == null) {
                    $json = [
                        'error' => [
                            'errEmail'     => 'Maaf user tidak terdaftar',
                        ]
                    ];
                } else {
                    if ($password == $passwordUser) {
                        //lanjutkan
                        $json = [
                            'sukses' => 'Anda berhasil login...'
                        ];
                    } else {
                        $json = [
                            'error' => [
                                'errPassword'     => 'Maaf passwordword anda salah !!',
                            ]
                        ];
                    }
                }
            }

            echo json_encode($json);
        }
    }
}

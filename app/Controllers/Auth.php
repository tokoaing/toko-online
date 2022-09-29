<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUsers;
use Config\Services;

class Auth extends BaseController
{
    public function index()
    {
        return view('login/index');
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
                    'label'     => 'Kata Sandi',
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

                if ($cekUser == null) {
                    $json = [
                        'error' => [
                            'errEmail'     => 'Maaf user tidak terdaftar',
                        ]
                    ];
                } else if ($cekUser['userlevel'] == '2') {
                    $json = [
                        'error' => [
                            'errEmail'     => 'Maaf user tidak terdaftar',
                        ]
                    ];
                } else {
                    $passwordUser = $cekUser['userpassword'];
                    if (sha1($password) == $passwordUser) {
                        $simpan_session = [
                            'userid'        => $email,
                            'usernama'      => $cekUser['usernama'],
                            'userlevel'     => $cekUser['userlevel'],
                        ];
                        session()->set($simpan_session);
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

    // fungsi Logout
    public function keluar()
    {
        if ($this->request->isAJAX()) {
            session()->destroy();

            $json = [
                'sukses' => 'Anda berhasil logout...'
            ];

            echo json_encode($json);
        }
    }
}

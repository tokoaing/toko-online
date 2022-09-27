<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUsers;
use App\Models\ModelUsersPagination;
use Config\Services;

class User extends BaseController
{
    public function __construct()
    {
        $this->modelUser = new ModelUsers();
    }
    public function index()
    {
        $data = [
            'title'      => 'Data User',
            'menu'      => 'master',
            'submenu'    => 'user',
            'actmenu'       => '',
            'tampildata'    => $this->modelUser->findAll()
        ];
        return view('user/viewdata', $data);
    }



    public function listData()
    {
        $request = Services::request();
        $datamodel = new ModelUsersPagination($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tombolEdit = "<button type=\"button\" class=\"btn btn-sm btn-info\" onclick=\"edit('" . $list->userid . "')\" title=\"Edit\"><i class='fas fa-edit'></i></button>";
                $tombolHapus = "<button type=\"button\" class=\"btn btn-sm btn-danger\" onclick=\"hapus('" . $list->userid . "')\" title=\"Hapus\"><i class='fas fa-trash-alt'></i></button>";

                $row[] = $no;
                $row[] = $list->userid;
                $row[] = $list->usernama;
                $row[] = $tombolEdit . ' ' . $tombolHapus;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
    public function index()
    {
        $data = [
            'title'         => '',
            'menu'          => '',
            'submenu'       => '',
            'actmenu'       => '',
        ];
        return view('template/layout', $data);
    }
}

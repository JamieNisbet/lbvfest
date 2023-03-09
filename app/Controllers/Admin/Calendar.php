<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Calendar extends BaseController
{

    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Calendar";

        return view('templates/header', $data)
            . view('pages/admin/calendar')
            . view('templates/footer');
    }
}

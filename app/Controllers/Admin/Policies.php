<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\PolicyModel;


class Policies extends BaseController
{
    public function __construct()
    {
        $this->policy_m = new PolicyModel();
    }

    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Policies";
        $data['policies'] = $this->policy_m->find();
        $data['table_headers'] = ["ID", "Name", "Description", "File", "Status", ""];

        return view('templates/header', $data)
            . view('pages/admin/policies')
            . view('templates/footer');
    }
}

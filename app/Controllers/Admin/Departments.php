<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\DepartmentModel;

class Departments extends BaseController
{
    public function __construct()
    {
        $this->department_m = new DepartmentModel();
    }
    public function index()
    {
        $data = $this->meta_data;
        $data["title"] = "Departments";
        $data["departments"] = $this->department_m->find();
        $data["table_headers"] = ["Id", "Name", "Status", ""];

        return view('templates/header', $data)
            . view('pages/admin/departments')
            . view('templates/footer');
    }

    public function add()
    {
        $this->department_m->save($_POST);
        return redirect()->to('/admin/departments');
    }

    public function edit($id)
    {
        $response = $this->department_m->find($id);

        if ($response) {
            $_POST['id'] = $id;
            $this->department_m->save($_POST);
            return redirect()->to('/admin/departments');
        }
    }

    public function delete($id)
    {
        $response = $this->department_m->find($id);

        if ($response) {
            $this->department_m->delete($id);
            return redirect()->to('/admin/departments');
        }
    }
}

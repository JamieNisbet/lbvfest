<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\AssignmentModel;

class Assignments extends BaseController
{

    public function __construct()
    {
        $this->assignment_m = new AssignmentModel();
    }

    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Assignments";
        $data["assignments"] = $this->assignment_m->get_data();
        $data["users"] = $this->user_m->find();
        $data['table_headers'] = ["Id", "User ID", "Activity ID", ""];
        return view('templates/header', $data)
            . view('pages/admin/assignments')
            . view('templates/footer');
    }

    public function view($id)
    {
        $data = $this->meta_data;
        $data['details'] = $this->assignment_m->find($id);

        return view('templates/header', $data)
            . view('pages/admin/assignment_entry')
            . view('templates/footer');
    }

    public function create()
    {
        $this->project_m->save($_POST);
        return redirect()->to('/admin/assignments');
    }

    public function update($id)
    {
        $response = $this->project_m->find($id);

        if ($response) {
            $_POST['id'] = $id;
            $this->project_m->save($_POST);
            return redirect()->to('/admin/assignments');
        }
    }

    public function remove($id)
    {
        $response = $this->project_m->find($id);

        if ($response) {
            $this->project_m->delete($id);
            return redirect()->to('/admin/assignments');
        }
    }
}

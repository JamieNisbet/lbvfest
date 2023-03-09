<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function __construct()
    {
        $this->task_m = new TaskModel();
    }

    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Tasks";
        $data["tasks"] = $this->task_m->get_data();
        $data['table_headers'] = ["Id", "Activity", "User", "Hours", "Date", ""];
        return view('templates/header', $data)
            . view('pages/admin/tasks')
            . view('templates/footer');
    }

    public function view($id)
    {
        $data = $this->meta_data;
        $data['details'] = $this->task_m->find($id);

        return view('templates/header', $data)
            . view('pages/admin/task_entry')
            . view('templates/footer');
    }

    public function create()
    {
        $this->task_m->save($_POST);
        return redirect()->to('/admin/tasks');
    }

    public function update($id)
    {
        $response = $this->task_m->find($id);

        if ($response) {
            $_POST['id'] = $id;
            $this->task_m->save($_POST);
            return redirect()->to('/admin/tasks');
        }
    }

    public function remove($id)
    {
        $response = $this->task_m->find($id);

        if ($response) {
            $this->task_m->delete($id);
            return redirect()->to('/admin/tasks');
        }
    }
}

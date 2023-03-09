<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ActivityModel;

class Activities extends BaseController
{
    public function __construct()
    {
        $this->activity_m = new ActivityModel();
    }
    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Activities";
        $data["activities"] = $this->activity_m->get_data();
        $data['table_headers'] = ["Id", "Name", "Client", "Project", "Status", ""];

        return view('templates/header', $data)
            . view('pages/admin/activities')
            . view('templates/footer');
    }

    public function view($id)
    {
        $data = $this->meta_data;
        $data['details'] = $this->activity_m->find($id);

        return view('templates/header', $data)
            . view('pages/admin/activity_entry')
            . view('templates/footer');
    }
    public function create()
    {
        $this->activity_m->save($_POST);
        return redirect()->to('/admin/activities');
    }

    public function update($id)
    {
        $response = $this->activity_m->find($id);

        if ($response) {
            $_POST['id'] = $id;
            $this->activity_m->save($_POST);
            return redirect()->to('/admin/activities');
        }
    }

    public function remove($id)
    {
        $response = $this->activity_m->find($id);

        if ($response) {
            $this->activity_m->delete($id);
            return redirect()->to('/admin/activities');
        }
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ProjectModel;
use App\Models\ClientModel;

class Projects extends BaseController
{
    public function __construct()
    {
        $this->project_m = new ProjectModel();
        $this->client_m = new ClientModel();
    }
    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Projects";
        $data["projects"] = $this->project_m->get_data();
        $data["clients"] = $this->client_m->is_active();
        $data['table_headers'] = ["Id", "Name", "Client", "Status", ""];
        return view('templates/header', $data)
            . view('pages/admin/projects')
            . view('templates/footer');
    }

    // public function get_projects()
    // {
    //     $client_id = $_POST['client_id'];
    //     $data = $this->project_m->get_projects($client_id);

    //     $options .= '<option value="">Test</option>';
    //     foreach($data as $project) {
    //         $options .= '<option value="' . $project['id'] . '">' . $project['name'] . '</option>';
    //     }
    //     return $options;
    // }


    public function view($id)
    {
        $data = $this->meta_data;
        $data["details"] = $this->project_m->find($id);

        return view('templates/header', $data)
        . view('pages/admin/project_entry')
        . view('templates/footer');
    }

    public function add()
    {
        $this->project_m->save($_POST);
        return redirect()->to('/admin/projects');
    }

    public function edit($id)
    {
        $response = $this->project_m->find($id);

        if ($response) {
            $_POST['id'] = $id;
            $this->project_m->save($_POST);
            return redirect()->to('/admin/projects');
        }
    }

    public function delete($id)
    {
        $response = $this->project_m->find($id);

        if ($response) {
            $this->project_m->delete($id);
            return redirect()->to('/admin/projects');
        }
    }
}

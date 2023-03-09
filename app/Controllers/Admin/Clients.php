<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ClientModel;

class Clients extends BaseController
{
    public function __construct()
    {
        $this->client_m = new ClientModel();
    }
    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Clients";
        $data["clients"] = $this->client_m->is_active();
        $data['table_headers'] = ["Id", "Name", "Status", ""];

        return view('templates/header', $data)
            . view('pages/admin/clients')
            . view('templates/footer');
    }

    public function view($id)
    {
        $data = $this->meta_data;
        $data["details"] = $this->client_m->find($id);

        return view('templates/header', $data)
            . view('pages/admin/client_entry')
            . view('templates/footer');
    }

    public function add()
    {
        $this->client_m->save($_POST);
        return redirect()->to('/admin/clients');
    }

    public function edit($id)
    {
        $response = $this->client_m->find($id);

        if ($response) {
            $_POST['id'] = $id;
            $this->client_m->save($_POST);
            return redirect()->to('/admin/clients');
        }
    }

    public function delete($id)
    {
        $response = $this->client_m->find($id);

        if ($response) {
            $this->client_m->delete($id);
            return redirect()->to('/admin/clients');
        }
    }

}

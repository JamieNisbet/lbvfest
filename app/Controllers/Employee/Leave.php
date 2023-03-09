<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;

use App\Models\LeaveModel;

class Leave extends BaseController
{
    public function __construct()
    {
        $this->leave_m = new LeaveModel();
    }
    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Leave History";
        $data["total_leaves"] = $this->leave_m->get_data();
        $data["table_headers"] = ["Date", "Employee", "Type", ""];

        return view('templates/header', $data)
            . view('pages/employee/leave')
            . view('templates/footer');
    }

    public function view($id)
    {
        $data = $this->meta_data;
        $data['details'] = $this->leave_m->find($id);

        return view('templates/header', $data)
            . view('pages/employee/leave_entry')
            . view('templates/footer');
    }

    public function applyLeave()
    {
        $data = $this->meta_data;

        if ($this->request->getMethod() == "post") {

            $rules = [
                // RULES HERE
                "comments" => [
                    "rules" => "required",
                    "label" => "Reason",
                    "errors" => [
                        "required" => "You must provide a reason for your leave"
                    ]
                ],
                "from_date" => [
                    "rules" => "required",
                    "label" => "Date",
                    "errors" => [
                        "required" => "You must provide a date for your leave"
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                // $file = $this->request->getFile('file');

                // $data['fileName'] = $file->getName();
                // SUCCESS LOGIC HERE
                return print_r($data);
            } else {
                // ERROR LOGIC HERE
                $data['validation'] = $this->validator;
            }
        }

        return view('templates/header', $data)
            . view('pages/employee/apply_leave')
            . view('templates/footer');
    }

    public function add()
    {
        $this->leave_m->save($_POST);
        return redirect()->to('/employee/leave');
    }

    public function edit($id)
    {
        $response = $this->leave_m->find($id);

        if ($response) {
            $_POST['id'] = $id;
            $this->leave_m->save($_POST);
            return redirect()->to('/employee/leave');
        }
    }

    public function delete($id)
    {
        $response = $this->leave_m->find($id);

        if ($response) {
            $this->leave_m->delete($id);
            return redirect()->to('/employee/leave');
        }
    }
}

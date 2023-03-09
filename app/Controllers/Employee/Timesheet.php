<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\TaskModel;

class Timesheet extends BaseController
{
    public function __construct()
    {
        $this->task_m = new TaskModel();   
    }
    public function index()
    {
        $data = $this->meta_data;
        $data['history'] = $this->task_m->get_history();
        $data['title'] = "Time Sheet History";
        $data["table_headers"] = ["Date", "Employee", "Client", "Project", "Code", "Activity", "Hours", ""];

        return view('templates/header', $data)
            . view('pages/employee/timesheet')
            . view('templates/footer');
    }

    public function add()
    {
        $data = $this->meta_data;

        if ($this->request->getMethod() == "post") {
            $rules = [
                "date" => [
                    "rules" => "required|date_check",
                    "label" => "Date",
                    "errors" => [
                        "date_check" => "You cannot log a future date"
                        ]
                ]
            ];

            if ($this->validate($rules)) {
                return redirect()->to('admin/departments');
            } else {
                $data['validation'] = $this->validator;
            }
        }

            return view('templates/header', $data)
                . view('pages/employee/new_entry')
                . view('templates/footer');
    }

}

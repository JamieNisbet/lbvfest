<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ActivityModel;
use App\Models\ClientModel;
use App\Models\ProjectModel;
use App\Models\TaskModel;
use App\Models\AssignmentModel;

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
            . view('pages/admin/timesheet')
            . view('templates/footer');
    }

    public function view($id)
    {
        $data = $this->meta_data;
        $data['details'] = $this->task_m->find($id);

        return view('templates/header', $data)
            . view('pages/admin/timesheet_entry')
            . view('templates/footer');
    }

    public function add()
    {
        $this->client_m = new ClientModel();

        $rules = [
            "date" => [
                "rules" => "required|timesheet_date_check",
                "label" => "date",
                "errors" => [
                    "timesheet_date_check" => "You cannot log a future date"
                ]
            ],
            "client_id" => [
                "rules" => "required",
                "label" => "client",
            ],
            "project_id" => [
                "rules" => "required",
                "label" => "project",
            ],
            "activity_id" => [
                "rules" => "required",
                "label" => "activity",
            ],
            "hours" => [
                "rules" => "required",
                "label" => "hours",
                "errors" => [
                    "required" => "Please log the hours you have worked"
                ]
            ]
        ];

        if ($this->request->getMethod() == "post" && $this->validate($rules)) {
            $this->assignment_m = new AssignmentModel();
            $user_id = $this->session->get('user_id');
            $activity_id = $this->request->getVar('activity_id');
            $assignment = $this->assignment_m->get_data_by_user_activity($user_id, $activity_id);

            if (!$assignment) {
                $this->assignment_m->insert_assignment($user_id, $activity_id);
            } else{
                $assignment_id = $assignment->id;
                $date = $this->request->getVar('date');
                $hours = $this->request->getVar('hours');
                $notes = $this->request->getVar('notes');
                $excludereports = false;
                $this->task_m->new_entry($assignment_id, $hours, $date, $notes, $excludereports);
                return redirect()->to('/' . $_SESSION['user_role'] . '/success');
            }

        }

        $data = $this->meta_data;
        $data['clients'] = $this->client_m->is_active();
        $data['validation'] = $this->validation;

        return view('templates/header', $data)
            . view('pages/admin/new_entry')
            . view('templates/footer');
    }




}
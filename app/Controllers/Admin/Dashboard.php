<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ProjectModel;
use App\Models\ClientModel;
use App\Models\InvoiceModel;
use App\Models\PolicyModel;
use App\Models\HolidayModel;
use App\Models\DepartmentModel;
use App\Models\LeaveModel;
use App\Models\TaskModel;
use App\Models\CustomModel;


class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->task_m = new TaskModel();
        $this->holiday_m = new HolidayModel();
        $this->client_m = new ClientModel();
        $this->policy_m = new PolicyModel();
        $this->leave_m = new LeaveModel();
        $this->custom_m = new CustomModel();
    }
    public function index()
    {
        $data = $this->meta_data;
        $data["title"] = "Dashboard";
        $data["employees"] = $this->user_m->is_active();
        $data["clients"] = $this->client_m->find();
        $data['on_leave_today'] = $this->leave_m->on_leave_today();
        $data['leave_applications'] = $this->leave_m->leave_requests();

        return view('templates/header', $data)
            . view('pages/admin/dashboard')
            . view('templates/footer');
    }





    public function getCalendar()
    {
        $data = $this->meta_data;
        $data['title'] = "Calendar";

        return view('templates/header', $data)
            . view('pages/admin/calendar')
            . view('templates/footer');
    }

    public function getPolicies()
    {
        $data = $this->meta_data;
        $data['title'] = "Policies";
        $data['policies'] = $this->policy_m->find();
        $data['table_headers'] = ["ID", "Name", "Description", "File", "Status", ""];

        return view('templates/header', $data)
            . view('pages/admin/policies')
            . view('templates/footer');
    }

    public function getHolidays()
    {
        $data = $this->meta_data;
        $data['title'] = "Holidays";
        $data['holidays'] = $this->holiday_m->find();
        $data['table_headers'] = ["Id", "Title", "Description", "Start Date", "End Date", "Status", ""];

        return view('templates/header', $data)
            . view('pages/admin/holidays')
            . view('templates/footer');
    }
}

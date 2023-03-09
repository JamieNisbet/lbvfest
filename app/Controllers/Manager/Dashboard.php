<?php

namespace App\Controllers\Manager;

use App\Controllers\BaseController;

use App\Models\ProjectModel;
use App\Models\ClientModel;
use App\Models\InvoiceModel;
use App\Models\PolicyModel;
use App\Models\AssignmentModel;
use App\Models\HolidayModel;
use App\Models\DepartmentModel;
use App\Models\LeaveModel;


class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->project_m = new ProjectModel();
        $this->invoice_m = new InvoiceModel();
        $this->assignment_m = new AssignmentModel();
        $this->holiday_m = new HolidayModel();
        $this->client_m = new ClientModel();
        $this->department_m = new DepartmentModel();
        $this->policy_m = new PolicyModel();
        $this->leave_m = new LeaveModel();
    }
    public function index()
    {
        $data = $this->meta_data;
        $data["title"] = "Dashboard";
        $data["employees"] = $this->user_m->is_active();
        $data["projects"] = $this->project_m->find();
        $data["invoices"] = $this->invoice_m->find();
        $data["clients"] = $this->client_m->find();
        $data["departments"] = $this->department_m->find();
        $data['on_leave_today'] = $this->leave_m->on_leave_today();
        $data['leave_applications'] = $this->leave_m->leave_requests();

        return view('templates/header', $data)
            . view('pages/manager/dashboard')
            . view('templates/footer');
    }

    public function getCalendar()
    {
        $data = $this->meta_data;
        $data['title'] = "Calendar";

        return view('templates/header', $data)
            . view('pages/manager/calendar')
            . view('templates/footer');
    }

    public function getPolicies()
    {
        $data = $this->meta_data;
        $data['title'] = "Policies";
        $data['policies'] = $this->policy_m->find();
        $data['table_headers'] = ["ID", "Name", "Description", "File", "Status", ""];

        return view('templates/header', $data)
            . view('pages/manager/policies')
            . view('templates/footer');
    }

    public function profile($id)
    {
        $this->assignment_m = new AssignmentModel();
        $data = $this->meta_data;
        $data['assignments'] = $this->assignment_m->get_data_by_user($id);
        $data['profile'] = $this->user_m->find($id);

        return view('templates/header', $data)
            . view('pages/manager/profile')
            . view('templates/footer');
    }

    public function getHolidays()
    {
        $data = $this->meta_data;
        $data['title'] = "Holidays";
        $data['holidays'] = $this->holiday_m->find();
        $data['table_headers'] = ["Id", "Title", "Description", "Start Date", "End Date", "Status", ""];

        return view('templates/header', $data)
            . view('pages/manager/holidays')
            . view('templates/footer');
    }
}

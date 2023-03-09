<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ProjectModel;
use App\Models\ActivityModel;


class Ajax extends BaseController
{

    public function getProjects()
    {
        $client_id = $this->request->getVar('client_id');
        $this->project_m = new ProjectModel();
        $projects = $this->project_m->get_projects($client_id);
        return $this->response->setJSON($projects);
    }

    public function getActivities()
    {
        $project_id = $this->request->getVar('project_id');
        $this->activity_m = new ActivityModel();
        $activities = $this->activity_m->byProject($project_id);
        return $this->response->setJSON($activities);
    }

    public function getEmployee()
    {
        $id = $this->request->getVar('pk_user_id');
        $user = $this->user_m->find($id);
        return $this->response->setJSON($user);
    }

    public function generatePayslip()
    {
        $db = db_connect('hrms');
        $month = str_pad($this->request->getVar('month'), 2, "0", STR_PAD_LEFT);
        $year = $this->request->getVar('year');
        $employeeId = $this->request->getVar('employee_id');

        // Calculate start and end dates for the month
        $startDate = "$year-$month-01";
        $endDate = date('Y-m-t', strtotime($startDate));

        // Query 1: Get the basic user information
        $query1 = $db->table('user')
            ->select('*')
            ->where('pk_user_id', $employeeId)
            ->get();

        $basicUserInfo = $query1->getRow();


        // Query 2: Get the total number of leaves applied by the user

        $where = "from_date <= $year-$month-30 AND from_date >= $year-$month-01 AND fk_user_id = $employeeId AND leave_status = 1 AND leave_type = 'Leave'";

        $query2 = $db->table('leave')
            ->select('SUM(count_leaves) AS total_leaves_applied')
            ->where($where)
            ->get();

        $totalLeavesApplied = $query2->getRow()->total_leaves_applied;

        $leave_query = $db->table('leave')->select('id')->where(["fk_user_id" => $employeeId, "leave_status" => 1, 'leave_type' => "Leave", 'Year(from_date)' => $year, 'Month(from_date)' => $month])->get();
        $leave_id = $leave_query->getRow();
        $query3 = $db->table('leaves_per_month')
            ->select('SUM(leaves_count) AS leaves_approved')
            ->where([
                'fk_leave_id' => $leave_id,
                'month_year' => "$year-$month-01",
            ])
            ->get();

        $leavesApproved = $query3->getRow()->leaves_approved;

        // Combine the results into one array
        $result = [
            'employee' => $basicUserInfo,
            'leaves_assigned' => $basicUserInfo->leaves_assigned,
            'total_leaves_applied' => $totalLeavesApplied,
            'approved_leaves' => $leavesApproved
        ];

        return $this->response->setJSON($result);
    }

}
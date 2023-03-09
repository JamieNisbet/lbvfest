<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $DBGroup = 'timesheet';
    protected $table      = 'tasks';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['assignment_id', 'hours', "date", "notes"];

    protected $useTimestamps = true;

    protected $createdField = "created_at";

    protected $updatedField = "updated_at";


    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    function get_data()
    {
        return $this->db->table('tasks as task')
        ->select('task.*, assignment.user_id as user_id, assignment.activity_id as activity_id')
        ->join('assignments as assignment', "assignment.id = task.assignment_id")
        ->limit(20)
        ->get()
        ->getResult();
    }

    function get_history()
    {
        return $this->db->table('tasks as task')
        ->select('task.*, user.first_name as user_fname, user.last_name as user_lname, user.email as email, activity.name as activity_name, client.name as client_name, project.name as project_name')
        ->join('assignments as assignment', "assignment.id = task.assignment_id")
        ->join('activities as activity', "activity.id = assignment.activity_id")
        ->join('clients as client', "client.id = activity.client_id")
        ->join('projects as project', "project.id = activity.project_id")
        ->join('users as user', "user.id = assignment.user_id")
        ->limit(20)
        ->get()
        ->getResult();
    }

    function new_entry($assignment_id, $hours, $date, $notes, $excludereports)
    {
        $data = [
            'assignment_id' => $assignment_id,
            'hours' => $hours,
            'date' => $date,
            'notes' => $notes,
            'excludereports' => $excludereports,
        ];

        return $this->insert($data);
    }
}

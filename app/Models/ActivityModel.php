<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $DBGroup = 'timesheet';
    protected $table      = 'activities';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'client_id', "project_id", "isactive"];
    protected $useTimestamps = true;
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";

    function get_data()
    {
        return $this->db->table('activities as activity')
        ->select('activity.*, project.name as project_name, client.name as client_name')
        ->join('projects as project', "activity.project_id = project.id")
        ->join('clients as client', "activity.client_id = client.id")
        ->orderBy('activity.updated_at', "DESC")
        ->limit(20)
        ->get()
        ->getResult();
    }

    function byProject($project_id)
    {
        return $this->db->table('activities as activity')
            ->select('*')
            ->where('project_id', $project_id)
            ->get()
            ->getResultArray();
    }

    function is_active($bool = true)
    {
        return $this->db->table('activities as activity')
        ->select('activity.*, project.name as project_name, client.name as client_name')
        ->join('projects as project', "activity.project_id = project.id")
        ->join('clients as client', "activity.client_id = client.id")
        ->orderBy('activity.updated_at', "DESC")
        ->get()
        ->getResult();
    }

}

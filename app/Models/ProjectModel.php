<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $DBGroup = 'timesheet';
    protected $table      = 'projects';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'client_id', 'is_active'];

    protected $useTimestamps = true;
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";

    function get_data()
    {
        return $this->db->table('projects as project')
            ->select('project.*, client.name as client_name')
            ->join('clients as client', "project.client_id = client.id")
            ->get()
            ->getResult();
    }

    function get_projects($client_id)
    {
        return $this->db->table('projects as project')
            ->select('*')
            ->where('client_id', $client_id)
            ->get()
            ->getResultArray();
    }

    function is_active($bool = true)
    {
        if ($bool) {
            return $this->db->table('projects')
                ->where("isactive", "t")
                ->get()
                ->getResult();
        } else {
            return $this->db->table('projects')
                ->where("isactive", "f")
                ->get()
                ->getResult();
        }
    }
}

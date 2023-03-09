<?php

namespace App\Models;

use CodeIgniter\Model;

class AssignmentModel extends Model
{
    protected $DBGroup = 'timesheet';
    protected $table = 'assignments';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['user_id', 'activity_id'];
    protected $useTimestamps = true;
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";

    function get_data()
    {
        return $this->db->table('assignments as assignment')
            ->select('assignment.*, activity.name as activity_name, activity.project_id as project_id, user.handle as user_name')
            ->join('activities as activity', "assignment.activity_id = activity.id")
            ->join('users as user', 'assignment.user_id = user.id')
            ->orderBy('assignment.updated_at', "DESC")
            ->limit(5)
            ->get()
            ->getResult();
    }

    function get_data_by_user($id)
    {
        return $this->db->table('assignments as assignment')
            ->select('assignment.*, activity.name as activity_name, project.name as project_name')
            ->where("user_id", $id)
            ->join('activities as activity', "assignment.activity_id = activity.id")
            ->join('projects as project', "activity.project_id = project.id")
            ->orderBy("assignment.updated_at", "DESC")
            ->get()
            ->getResult();
    }

    function get_data_by_user_activity($user_id, $activity_id)
    {
        $builder = $this->db->table('assignments');

        $data = array(
            'user_id' => $user_id,
            'activity_id' => $activity_id
        );

        $builder->where(['user_id' => $user_id, 'activity_id' => $activity_id]);
        $query = $builder->get();

        if ($query->getNumRows() == 0) {
            $builder->insert($data);
            $query = $builder->get();
        }

        return $query->getRow();

    }
}
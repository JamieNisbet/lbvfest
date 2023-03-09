<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $DBGroup = 'timesheet';
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['email', 'first_name', 'last_name', 'handle', 'whatsapp', 'tel', 'isadmin', 'permission', 'timer_status', 'timer_paused_at', 'timer_started_at', 'timer_elapsed', 'timer_activity'];

    function get_users($str)
    {
        if ($str == "admin") {
            return $this->db->table('users')
                ->where(["is_admin" => "t"])
                ->get()
                ->getResult();
        } else if ($str == "employee") {
            return $this->db->table('users')
                ->where(["is_admin" => "t"])
                ->get()
                ->getResult();
        } else {
            return $this->db->table('users')
            ->get()
            ->getResult();
        }
    }
}
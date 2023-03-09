<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table      = 'departments';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['department_name', 'status'];

    function is_active($bool = true)
    {
        if ($bool) {
            return $this->db->table('departments')
                ->where("status", "t")
                ->get()
                ->getResult();
        } else {
            return $this->db->table('departments')
                ->where("status", "f")
                ->get()
                ->getResult();
        }
    }
}
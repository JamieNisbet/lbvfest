<?php

namespace App\Models;

use CodeIgniter\Model;

class LeaveModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table      = 'leave';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['from_date', 'end_date', 'comments', 'leave_spec', 'leave_reason', 'leave_type', 'isplanned'];

    function get_data()
    {
        return $this->db->table('leave as leave')
            ->select('leave.*, user.*')
            ->join('user as user', "leave.fk_user_id = user.pk_user_id")
            ->limit(10)
            ->get()
            ->getResult();
    }

    function on_leave_today()
    {
        $today = $this->db->escape(date('Y-m-d'));
        $where = "from_date <= {$today} AND end_date >= {$today}";
        
        return $this->db->table('leave as leave')
            ->select('leave.*, user.first_name as user_fname, user.last_name as user_lname, user.pk_user_id as user_id')
            ->where($where)
            ->join('user as user', "leave.fk_user_id = user.pk_user_id")
            ->limit(10)
            ->get()
            ->getResultArray();
    }

    function leave_requests()
    {
        return $this->db->table('leave as leave')
            ->select('leave.*, user.first_name as user_fname, user.last_name as user_lname')
            ->where(['is_planned'=>0])
            ->join('user as user', "leave.fk_user_id = user.pk_user_id")
            ->limit(10)
            ->get()
            ->getResult();
    }

}
<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table = 'user';
    protected $primaryKey = 'pk_user_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['email', 'first_name', 'last_name', 'username', 'personal_email', 'mobile', 'user_type', 'designation', 'department_id', 'location_id', 'date_of_join', 'bank_acc', 'status', 'gender', 'dob', 'is_active', 'salary'];



    function login($email, $password)
    {
        $pwd = md5($password);
        $query = $this->db->table("user")
            ->where(["username" => $email, "password" => $pwd])
            ->get()
            ->getResult();

        if ($query) {
            return $query;
        } else {
            return 'Error';
        }
    }

    function is_active($bool = true)
    {
        $today = $this->db->escape(date('Y-m-d'));
        $where = "leave.from_date <= {$today} AND leave.end_date >= {$today}";

        if (!$bool) {
            return $this->db->table('user')
                ->select('user.*, leave.id as leave_today')
                ->where(["user.is_active" => "N"])
                ->where($where)
                ->join('leave', 'leave.fk_user_id = user.pk_user_id')
                ->get()
                ->getResultArray();
        } else {
            return $this->db->table('user')
                ->select('user.*')
                ->where(["user.is_active" => "Y"])
                ->get()
                ->getResultArray();
        }
    }

    function user_verify($email)
    {
        $result = $this->db->table('user')
            ->select('*')
            ->where("email", $email)
            ->get()
            ->getResultArray();

        if (!$result) {
            return false;
        } else {
            return $result[0]['first_name'];
        }
    }
}
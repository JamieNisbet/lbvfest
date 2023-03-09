<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $DBGroup = 'timesheet';
    protected $table      = 'clients';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'isactive'];
    protected $useTimestamps = true;
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";


    function is_active($bool = true)
    {
        if ($bool) {
            return $this->db->table('clients')
                ->where("isactive", "t")
                ->get()
                ->getResult();
        } else {
            return $this->db->table('clients')
                ->where("isactive", "f")
                ->get()
                ->getResult();
        }
    }
}

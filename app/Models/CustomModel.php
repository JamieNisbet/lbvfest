<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
{
    public function all_users()
    {
        $db1 = \Config\Database::connect('hrms');
        $db2 = \Config\Database::connect('timesheet');

        $hrms_users = $db1->table("user")->get()->getResultArray();
        $timesheet_users = $db2->table("users")->get()->getResultArray();

        return array_reduce($hrms_users, function($carry, $item) use ($timesheet_users) {
            $id = $item['pk_user_id'];
            $index = array_search($id, array_column($timesheet_users, 'id'));
            if ($index !== false) {
                $carry[] = array_merge($item, $timesheet_users[$index]);
            }
            return $carry;
        }, []);
    }

    public function user_details($id)
    {
        $db1 = \Config\Database::connect('hrms');
        $db2 = \Config\Database::connect('timesheet');

        $hrms_user = $db1->table("user")->where('pk_user_id', $id)->get()->getResultArray();
        $timesheet_user = $db2->table("users")->where('id', $id)->get()->getResultArray();

        return [...$hrms_user, ...$timesheet_user];
    }
}

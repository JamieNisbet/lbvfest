<?php

namespace App\Validations;

use App\Models\UserModel;

class CustomRules
{
    function timesheet_date_check(string $str, string &$error = null) : bool
    {
        return ($str < date('Y-m-d')) ? true : false;
    }
    function email_check(string $str, string &$error = null) : bool
    {
        $user_m = new UserModel();
        $result = $user_m->user_verify($str);
        return $result ? true : false;
    }
}


<?php

namespace App\Models;

use CodeIgniter\Model;

class WithdrawalModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table      = 'withdrawals';
    protected $primaryKey = 'pkwithdrawalid';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['amount', 'withdrawal_notes', 'is_active', 'withdrawaldate'];

}
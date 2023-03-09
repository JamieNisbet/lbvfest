<?php

namespace App\Models;

use CodeIgniter\Model;

class MonthlyExpenditureModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table      = 'monthly_expenditure';
    protected $primaryKey = 'pkexpenditureid';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['expenditure_date', 'expenditure_details', 'amount', "mop", "is_active", 'fkwithdrawalid'];

}
<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpenditureModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table      = 'expenditure';
    protected $primaryKey = 'pkexpid';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['month', 'year', 'amount'];
}
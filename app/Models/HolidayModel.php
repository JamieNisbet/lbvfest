<?php

namespace App\Models;

use CodeIgniter\Model;

class HolidayModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table      = 'holidays';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['title', 'description', 'start_date', 'end_date', 'is_active'];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class PolicyModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table      = 'policies';
    protected $primaryKey = 'pkpolicieid';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['policiename', 'description', 'documentlink', "isactive"];

}
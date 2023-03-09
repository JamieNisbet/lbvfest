<?php

namespace App\Models;

use CodeIgniter\Model;

class SalaryModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table = 'salary';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['fk_user_id', 'paid_days', "basic_pay", "hra", 'conveyance', 'special_allowance', "medical_allowance", "food_allowance", 'performance_commission', 'professional_tax', "provident_fund", "income_tax", "gross_salary", "net_salary", "insurance", "year", "month", 'data_array'];


    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;



    function send($payslip)
    {
        return $this->insert($payslip);
    }
}
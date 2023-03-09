<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ExpenditureModel;
use App\Models\MonthlyExpenditureModel;

class Expenditures extends BaseController
{
    public function __construct()
    {
        $this->expenditure_m = new ExpenditureModel();
        $this->monthly_expenditure_m = new MonthlyExpenditureModel();
    }


    public function index()
    {
        $data = $this->meta_data;
        $data["title"] = "Expenditures";
        $data["expenditures"] = $this->expenditure_m->find();
        $data["table_headers"] =   ["ID", "Date", "Amount", ""];

        return view('templates/header', $data)
            . view('pages/admin/expenditures')
            . view('templates/footer');
    }

    public function expenditures_by_month()
    {
        $data = $this->meta_data;
        $data["title"] = "Monthly Expenditures";
        $data["monthly_expenditures"] = $this->monthly_expenditure_m->find();
        $data["table_headers"] =  ["ID", "Date", "Details", "Amount", "Method of Payment", ""];

        return view('templates/header', $data)
            . view('pages/admin/monthly_expenditures')
            . view('templates/footer');
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


use App\Models\WithdrawalModel;

class Withdrawals extends BaseController
{
    public function __construct()
    {
        $this->withdrawal_m = new WithdrawalModel();
    }

    public function index()
    {
        $data = $this->meta_data;
        $data["title"] = "Withdrawals";
        $data["withdrawals"] = $this->withdrawal_m->find();
        $data["table_headers"] = ["ID", "Date", "Amount", "Notes", "Status", "Balance", ""];

        return view('templates/header', $data)
            . view('pages/admin/withdrawals')
            . view('templates/footer');
    }
}

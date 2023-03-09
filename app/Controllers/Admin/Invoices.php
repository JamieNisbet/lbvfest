<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\InvoiceModel;


class Invoices extends BaseController
{
    public function __construct()
    {
        $this->invoice_m = new InvoiceModel();
    }
    public function index()
    {
        $data = $this->meta_data;
        $data["title"] = "Invoices";
        $data["invoices"] = $this->invoice_m->find();
        $data["table_headers"] = ["ID", "Name", "Date", "Amount Raised", "Amount Received", "Invoice", ""];

        return view('templates/header', $data)
            . view('pages/admin/invoices')
            . view('templates/footer');
    }
}

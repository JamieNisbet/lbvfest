<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\HolidayModel;


class Holidays extends BaseController
{
    public function __construct()
    {
        $this->holiday_m = new HolidayModel();
    }
    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Holidays";
        $data['holidays'] = $this->holiday_m->find();
        $data['table_headers'] = ["Id", "Title", "Description", "Start Date", "End Date", "Status", ""];

        return view('templates/header', $data)
            . view('pages/admin/holidays')
            . view('templates/footer');
    }
}

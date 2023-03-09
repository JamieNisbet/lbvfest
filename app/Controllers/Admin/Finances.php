<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SalaryModel;
class Finances extends BaseController
{
    public function finance_menu()
    {
        $data = $this->meta_data;

        return view('templates/header', $data)
            . view('pages/admin/finance_menu')
            . view('templates/footer');
    }

    public function invoices()
    {
        $data = $this->meta_data;

        return view('templates/header', $data)
            . view('pages/admin/invoices')
            . view('templates/footer');
    }

    public function withdrawals()
    {
        $data = $this->meta_data;

        return view('templates/header', $data)
            . view('pages/admin/withdrawals')
            . view('templates/footer');
    }

    public function reports()
    {
        $data = $this->meta_data;

        return view('templates/header', $data)
            . view('pages/admin/reports')
            . view('templates/footer');
    }

    public function payslip()
    {

        $this->salary_m = new SalaryModel();
        $data = $this->meta_data;
        $data['employees'] = $this->user_m->is_active();

        $rules = [
            "basic_salary" => [
                "rules" => "required",
                "label" => "Salary"
            ]
        ];

        if ($this->request->getMethod() == "post" && $this->validate($rules)) {
            $payslip = [
                'year' => $this->request->getVar('year'),
                'month' => $this->request->getVar('month'),
                'fk_user_id' => $this->request->getVar('employee_id'),
                'basic_salary' => $this->request->getVar('basic_salary'),
                'hra' => $this->request->getVar('hra'),
                'medical_allowance' => $this->request->getVar('medical_allowance'),
                'insurance' => $this->request->getVar('insurance'),
                'professional_tax' => $this->request->getVar('professional_tax'),
                'provident_fund' => $this->request->getVar('provident_fund'),
                'conveyance' => $this->request->getVar('conveyance'),
                'gross_salary' => $this->request->getVar('gross_salary'),
                'net_salary' => $this->request->getVar('total_salary'),
                'data_array'=> 'N/A'
            ];

            $employee = $this->user_m->find($this->request->getVar('employee_id'));
            $user = $this->user_m->find($_SESSION['user_id']);

            $this->salary_m->send($payslip);

            $this->email->setTo($user['email'])
                ->setSubject('Payslip Generation Succesfull')
                ->setMessage('Your payslip for ' . $employee['first_name'] . ' ' . $employee['last_name'] . ' has been successfully generated.')
                ->send();


        }




        $data['validation'] = $this->validation;

        return view('templates/header', $data)
            . view('pages/admin/single_payslip')
            . view('templates/footer');
    }

    public function bulk_payslip()
    {

        $data = $this->meta_data;
        $data['employees'] = $this->user_m->is_active();

        return view('templates/header', $data)
            . view('pages/admin/bulk_payslip')
            . view('templates/footer');
    }
}
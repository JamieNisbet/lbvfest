<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\AssignmentModel;
use App\Models\CustomModel;

class Employees extends BaseController
{
    public function index()
    {
        $data = $this->meta_data;
        $data['users'] = $this->user_m->find();
        $data['title'] = "Employees";
        $data['table_headers'] = ["Code", "Employee", "Email", "Mobile", "Location", ""];

        return view('templates/header', $data)
            . view('pages/admin/employees')
            . view('templates/footer');
    }

    public function view($id)
    {
        $data = $this->meta_data;

        $data['details'] = $this->custom_m->user_details($id);

        return view('templates/header', $data)
            . view('pages/admin/employee')
            . view('templates/footer');
    }

    public function create()
    {
        // CREATE USER
    }

    public function update($id)
    {
        // UPDATE USER
    }

    public function remove($id)
    {
        // UPDATE USER
    }

    public function getUserDetails($id)
    {
        $this->assignment_m = new AssignmentModel();
        $data = $this->meta_data;
        $data['assignments'] = $this->assignment_m->get_data_by_user($id);
        $data['profile'] = $this->user_m->find($id);

        return view('templates/header', $data)
            . view('pages/admin/profile')
            . view('templates/footer');
    }

    // public function editUserDetails($id)
    // {
    //     $this->assignment_m = new AssignmentModel();
    //     $data = $this->meta_data;
    //     $data['assignments'] = $this->assignment_m->getByUser($id);
    //     $data['profile'] = $this->user_m->find($id);

    //     if ($this->request->getMethod() == "post") {

    //         $rules = [
    //             // RULES HERE
    //             "profile_pic" => [
    //                 "rules" => "uploaded[profile_pic]",
    //                 "label" => "Profile Picture",
    //                 "errors" => [
    //                     "uploaded[profile_pic]" => "You must provide a profile picture"
    //                 ]
    //             ],
    //         ];

    //         if ($this->validate($rules)) {
    //             $file = $this->request->getFile('profile_pic');
    //             if ($file->isValid() && !$file->hasMoved()) {
    //                 $fileName = "profile_pic_" . $id .".";
    //                 $file->move("./images/uploads", $fileName . $file->getExtension());
    //             }
    //             // $data['fileName'] = $file->getName();
    //             // SUCCESS LOGIC HERE
    //         } else {
    //             // ERROR LOGIC HERE
    //             $data['validation'] = $this->validator;
    //         }
    //     }

    //     return view('templates/header', $data)
    //         . view('pages/admin/profile')
    //         . view('templates/footer');
    // }
}

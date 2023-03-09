<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomModel;

class Users extends BaseController
{

    public function index()
    {
        $data = $this->meta_data;
        $data['title'] = "Apoyar HUMAN";
        return view('index', $data);
    }
    public function success()
    {
        $data = $this->meta_data;
        $data['message'] = "You have successfully logged your hours";
        $redirect_url = base_url('admin/timesheet/new_entry');
        $this->response->setHeader('refresh', '2;url=' . $redirect_url);
        return view('templates/header', $data)
        . view('templates/success')
        . view('templates/footer');
    }

    public function login()
    {
        $data = $this->meta_data;
        $data['title'] = "Apoyar HUMAN";

        $rules = [
            "username" => [
                "rules" => "required|valid_email",
                "label" => "Email",

            ],
            "password" => [
                "rules" => "required",
                "label" => "Password",
            ]

        ];
        if ($this->request->getMethod() == "post" && $this->validate($rules)) {
            $email = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $result = $this->user_m->login($email, $password);
            if ($result !== 'Error') {
                $role = "";
                switch ($result[0]->user_type) {
                    case 1:
                        $role = "admin";
                        break;
                    case 2:
                        $role = "manager";
                        break;
                    default:
                        $role = "employee";
                }
                $session_data = [
                    "user_id" => $result[0]->pk_user_id,
                    "user_role" => $role,
                    "logged_in" => true,
                ];

                $this->session->set($session_data);
                return redirect()->to('/' . $role);

            } else {
                $data["error"] = "Incorrect username or password!";
            }

        } else {
            $data["validation"] = $this->validator;
        }


        return view('index', $data);

    }

    public function password_forgot()
    {
        $data = $this->meta_data;
        $data['title'] = 'Password Reset';

        $rules = [
            "email" => [
                "rules" => "required|valid_email|email_check",
                "label" => "Email",
                "errors" => [
                    "email_check" => "You're not in the Apoyar system, contact an administrator."
                ]
            ]
        ];

        if ($this->request->getMethod() == "post" && $this->validate($rules)) {

            $email = $this->request->getVar('email');
            $user = $this->user_m->user_verify($email);

            $html = file_get_contents(__DIR__ . '/../Views/emails/password_reset.html');

            $html = str_replace('{username}', $user, $html);

            $this->email->setTo($email)
                ->setSubject("Reset Password")
                ->setMessage($html)
                ->send();
            return redirect()->to('/');
        } else {
            $data['validation'] = $this->validator;
        }



        return view('forgot_password', $data);
    }

    public function userLogout()
    {
        $this->session->destroy();
        return redirect()->to('login');
    }

    public function list_users()
    {
        $this->custom_m = new CustomModel();
        $data = $this->meta_data;
        $data['title'] = "Apoyar HUMAN";
        $data['results'] = $this->custom_m->all_users();
        return view('users', $data);
    }
}
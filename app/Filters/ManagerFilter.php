<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ManagerFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $auth = $session->get('logged_in');
        $role = $session->get('user_role');

        if (!$auth) {
            return redirect()->to('login');
        } else {
            switch($role)
            {
                case 1:
                    return redirect()->to('admin');
                    break;
                case 3:
                    return redirect()->to('employee');
                    break;
                default:
                 
            }
        }

    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
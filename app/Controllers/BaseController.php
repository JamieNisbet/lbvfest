<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    protected $session;

    /**
     * Application Data
     */
    protected $meta_data;
    protected $user_m;
    protected $project_m;
    protected $activity_m;

    protected $custom_m;

    protected $config;

    protected $client_m;
    protected $department_m;
    protected $salary_m;

    protected $task_m;
    protected $assignment_m;
    protected $invoice_m;
    protected $time_sheet_m;
    protected $employee_m;
    protected $expenditure_m;
    protected $holiday_m;

    protected $validation;
    protected $leave_m;
    protected $monthly_expenditure_m;
    protected $policy_m;
    protected $withdrawal_m;
    protected $error_email;

    protected $email;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->email = \Config\Services::email();
        $this->validation = \Config\Services::validation();
        $this->config = config('Validation');
        $this->session = \Config\Services::session();
        $this->user_m = new UserModel();
        $this->error_email = file_get_contents(__DIR__ . '/../Views/emails/error_email.html');

        if ($this->session->get('logged_in') == true) {
            $user = $this->user_m->find($this->session->get('user_id'));
            switch($user['user_type']) {
                case 1:
                    $user_role = "admin";
                    break;
                case 2:
                    $user_role = "manager";
                    break;
                default:
                    $user_role = "employee";
            }
            $this->meta_data = ["user_details" => $user, "user_role" => $user_role];
        }
    }
}

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// WELCOME ROUTES
$routes->add('/', 'Users::index');
$routes->add('forgot_password', 'Users::password_forgot');
$routes->add('logout', "Users::userLogout");
$routes->group("login", function ($routes) {
    $routes->add('/', 'Users::index');
    $routes->post('/', "Users::login");
});

// ADMIN ROUTES
$routes->group('admin', ["filter" => "admin"], function ($routes) {
    $routes->add('/', 'Admin\Dashboard::index');
    $routes->add('success', 'Users::success');


    // EMPLOYEES - CRUD
    $routes->group('employees', function ($routes) {
        $routes->add('/', 'Admin\Employees::index');
        $routes->post('/', 'Admin\Employees::create');
        $routes->add('(:num)', 'Admin\Employees::view/$1');
        $routes->post('edit/(:num)', 'Admin\Employees::update/$1');
        $routes->delete('delete/(:num)', 'Admin\Employees::remove/$1');
    }
    );

    // ASSIGNMENTS - CRUD
    $routes->group('assignments', function ($routes) {
        $routes->add('/', 'Admin\Assignments::index');
        $routes->post('/', 'Admin\Assignments::create');
        $routes->add('(:num)', 'Admin\Assignments::view/$1');
        $routes->post('edit/(:num)', 'Admin\Assignments::update/$1');
        $routes->delete('delete/(:num)', 'Admin\Assignments::remove/$1');
    }
    );

    // ACTIVITIES - CRUD
    $routes->group('activities', function ($routes) {
        $routes->add('/', 'Admin\Activities::index');
        $routes->post('/', 'Admin\Activities::create');
        $routes->add('(:num)', 'Admin\Activities::view/$1');
        $routes->post('edit/(:num)', 'Admin\Activities::update/$1');
        $routes->delete('delete/(:num)', 'Admin\Activities::remove/$1');
    }
    );

    // TASKS - CRUD
    $routes->group('tasks', function ($routes) {
        $routes->add('/', 'Admin\Tasks::index');
        $routes->post('/', 'Admin\Tasks::create');
        $routes->add('(:num)', 'Admin\Tasks::view/$1');
        $routes->post('edit/(:num)', 'Admin\Tasks::update/$1');
        $routes->delete('delete/(:num)', 'Admin\Tasks::remove/$1');
    }
    );

    // TIMESHEET - CRUD
    $routes->group('timesheet', function ($routes) {
        $routes->add('/', 'Admin\Timesheet::index');
        $routes->add('new_entry', 'Admin\Timesheet::add');
        $routes->add('entry/(:num)', 'Admin\Timesheet::view/$1');
        $routes->post('new_entry', 'Admin\Timesheet::add');
    }
    );

    // DEPARTMENTS - CRUD
    $routes->group('departments', function ($routes) {
        $routes->add('/', "Admin\Departments::index");
        $routes->post('/', "Admin\Departments::add");
        $routes->post('edit/(:num)', "Admin\Departments::edit/$1");
        $routes->add('delete/(:num)', "Admin\Departments::delete/$1");
    }
    );

    // PROJECTS - CRUD
    $routes->group('projects', function ($routes) {
        $routes->add('/', "Admin\Projects::index");
        $routes->add('(:num)', "Admin\Projects::view/$1");
        $routes->post('/', "Admin\Projects::add");
        $routes->post('edit/(:num)', "Admin\Projects::edit/$1");
        $routes->add('delete/(:num)', "Admin\Projects::delete/$1");
    }
    );

    //  CLIENTS - CRUD
    $routes->group('clients', function ($routes) {
        $routes->add('/', "Admin\Clients::index");
        $routes->add('(:num)', "Admin\Clients::view/$1");
        $routes->post('/', "Admin\Clients::add");
        $routes->post('edit/(:num)', "Admin\Clients::edit/$1");
        $routes->add('delete/(:num)', "Admin\Clients::delete/$1");
    }
    );

    // LEAVE - CRUD
    $routes->group('leave', function ($routes) {
        $routes->add('/', "Admin\Leave::index");
        $routes->add('(:num)', "Admin\Leave::view/$1");
        $routes->post('/', "Admin\Leave::add");
        $routes->add('apply_leave', 'Admin\Leave::applyLeave');
        $routes->post('edit/(:num)', "Admin\Leave::edit/$1");
        $routes->add('delete/(:num)', "Admin\Leave::delete/$1");
    }
    );

    // FINANCES - CRUD
    $routes->group(
        'finances',
        function ($routes) {
            $routes->add('invoices', "Admin\Finances::invoices");
            $routes->add('withdrawals', "Admin\Finances::withdrawals");
            $routes->add('reports', "Admin\Finances::reports");
            $routes->add('/', 'Admin\Finances::finance_menu');
            $routes->add('generate_payslip', 'Admin\Finances::payslip');
            $routes->add('generate_bulk_payslip', 'Admin\Finances::bulk_payslip');
        }
    );



    $routes->add('holidays', "Admin\Dashboard::getHolidays");
    $routes->add('profile/(:num)', "Admin\Employees::getUserDetails/$1");
    $routes->add('policies', "Admin\Dashboard::getPolicies");
    $routes->add('calendar', "Admin\Dashboard::getCalendar");
});

// EMPLOYEE ROUTES
$routes->group('employee', ["filter" => "employee"], function ($routes) {
    $routes->add('/', 'Employee\Dashboard::index');

    $routes->group('timesheet', function ($routes) {
        $routes->add('/', 'Employee\Timesheet::index');
        $routes->add('new_entry', 'Employee\Timesheet::add');
        $routes->post('new_entry', 'Employee\Timesheet::add');
    }
    );

    $routes->group('leave', function ($routes) {
        $routes->add('/', "Employee\Leave::index");
        $routes->add('(:num)', "Employee\Leave::view/$1");
        $routes->post('/', "Employee\Leave::add");
        $routes->add('apply_leave', 'Employee\Leave::applyLeave');
        $routes->post('edit/(:num)', "Employee\Leave::edit/$1");
    }
    );

    $routes->add('holidays', "Employee\Dashboard::getHolidays");
    $routes->add('profile/(:num)', "Employee\Dashboard::profile/$1");
    $routes->add('policies', "Employee\Dashboard::getPolicies");
    $routes->add('calendar', "Employee\Dashboard::getCalendar");
});

// MANAGER ROUTES
$routes->group('manager', ["filter" => "manager"], function ($routes) {
    $routes->add('/', 'Manager\Dashboard::index');

    $routes->group('timesheet', function ($routes) {
        $routes->add('/', 'Manager\Timesheet::index');
        $routes->add('new_entry', 'Manager\Timesheet::add');
        $routes->post('new_entry', 'Manager\Timesheet::add');
    }
    );

    // LEAVE - CRUD
    $routes->group('leave', function ($routes) {
        $routes->add('/', "Manager\Leave::index");
        $routes->add('(:num)', "Manager\Leave::view/$1");
        $routes->post('/', "Manager\Leave::add");
        $routes->add('apply_leave', 'Manager\Leave::applyLeave');
        $routes->post('edit/(:num)', "Manager\Leave::edit/$1");
    }
    );

    $routes->add('holidays', "Manager\Dashboard::getHolidays");
    $routes->add('profile/(:num)', "Manager\Dashboard::profile/$1");
    $routes->add('policies', "Manager\Dashboard::getPolicies");
    $routes->add('calendar', "Manager\Dashboard::getCalendar");
});


// AJAX
$routes->group(
    'ajax',
    function ($routes) {
        $routes->post('getProjects', 'Ajax::getProjects');
        $routes->post('getActivities', 'Ajax::getActivities');
        $routes->post('getEmployee', 'Ajax::getEmployee');
        $routes->post('getCurrentMonthLeave', 'Ajax::getCurrentMonthLeave');
        $routes->post('generatePayslip', 'Ajax::generatePayslip');
        $routes->post('bulkPayslip', 'Ajax::bulkPayslip');

    }
);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
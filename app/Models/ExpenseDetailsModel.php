<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpenseDetailsModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table      = 'expense_details';
    protected $primaryKey = 'pkexpid';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['fkexpenditureid', 'fkinvoiceid', "expensesfor", "expenseamt", 'month', 'year'];

    function get_data()
    {
        return $this->db->table('expense_details as expense')
        ->select('expense.*, invoice.invoicename as invoicename, invoice.invoicefile as invoicefile')
        ->join('invoices as invoice', "expense.fkinvoiceid = invoice.invoiceid")
        ->limit(5)
        ->get()
        ->getResult();
    }
}

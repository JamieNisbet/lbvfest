<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $DBGroup = 'hrms';
    protected $table      = 'invoice';
    protected $primaryKey = 'pkinvoiceid';
    protected $useAutoIncrement = true;
    protected $allowedFields = ["invoiceid", 'invoicename', 'month', 'year', 'invoicefile', 'usdamtraised', 'usdamtreceived', 'inramtraised', 'inramtreceived'];

}
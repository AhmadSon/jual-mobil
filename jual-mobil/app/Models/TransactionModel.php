<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['vehicle_id', 'customer_id', 'sales_id', 'amount', 'transaction_date'];
}

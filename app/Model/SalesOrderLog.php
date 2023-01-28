<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderLog extends Model
{
    use HasFactory;
    protected $table = 'sales_order_logs';
}

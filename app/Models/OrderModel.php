<?php

namespace App\Models;

use  CodeIgniter\Model;

class  OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'o_id';
    protected $allowedFields = [
        'user_email',
        'order_id',
        'total_amount',
        'payment_id',
        'date'
    ];
}

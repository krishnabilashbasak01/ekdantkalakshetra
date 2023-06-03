<?php

namespace App\Models;

use  CodeIgniter\Model;

class  OrderAddressModel extends Model
{
    protected $table = 'order_address';
    protected $primaryKey = 'address_id';
    protected $allowedFields = [
        'user_email',
        'order_id',
        'billing_name',
        'billing_full_address',
        'land_mark',
        'billing_city',
        'billing_postal_code',
        'billing_telephone',
    ];
}
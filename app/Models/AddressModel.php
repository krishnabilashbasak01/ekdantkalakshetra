<?php

namespace App\Models;

use  CodeIgniter\Model;

class  AddressModel extends Model
{
    protected $table = 'billing_address';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_email',
        'billing_name',
        'billing_full_address',
        'land_mark',
        'billing_city',
        'billing_postal_code',
        'billing_telephone',
    ];
}

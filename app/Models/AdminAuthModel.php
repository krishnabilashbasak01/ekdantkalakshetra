<?php

namespace App\Models;

use  CodeIgniter\Model;

class  AdminAuthModel extends Model
{
    protected $table = 'admin_auth';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_name',
        'password',
        'name',
        'email',
        'user_type'
    ];
}

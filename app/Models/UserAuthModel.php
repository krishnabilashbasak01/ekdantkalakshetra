<?php

namespace App\Models;

use  CodeIgniter\Model;

class  UserAuthModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'active'
    ];
}

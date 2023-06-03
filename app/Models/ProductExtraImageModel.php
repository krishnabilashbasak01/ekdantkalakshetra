<?php

namespace App\Models;

use  CodeIgniter\Model;

class  ProductExtraImageModel extends Model
{
    protected $table = 'book_extra_image';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id',
        'image'
    ];
}

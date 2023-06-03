<?php

namespace App\Models;

use  CodeIgniter\Model;

class  ProductModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'product_id';
    protected $allowedFields = [
        'product_name',
        'product_meta_keywords',
        'product_short_desc',
        'product_desc',
        'product_thumbnail',
        'product_category',
        'product_price',
        'product_offer_percent',
        'product_status',
        'product_name_slug',
    ];
}

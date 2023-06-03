<?php

namespace App\Models;

use  CodeIgniter\Model;

class  ProductReviewsModel extends Model
{
    protected $table = 'book_reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id',
        'review_image',
    ];
}

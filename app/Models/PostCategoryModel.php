<?php

namespace App\Models;

use CodeIgniter\Model;

class PostCategoryModel extends Model{
    protected $table = "post_categories";
    protected $primaryKey = "id";
    protected $allowedFields = [
        'category'
    ];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = "posts";
    protected $primaryKey = 'post_id';
    protected $allowedFields = [
        'post_title',
        'post_slug',
        'post_meta_desc',
        'post_thumbnail',
        'post_content',
        'post_categories',
        'post_tags',
        'post_author_user_name',
        'post_author_name',
        'post_meta_keywords',
        'views',
        'status'
    ];
}

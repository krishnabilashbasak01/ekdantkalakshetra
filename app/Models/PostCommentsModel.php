<?php

namespace App\Models;

use CodeIgniter\Model;
class PostCommentsModel extends Model
{
    protected $table = "post_comments";
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'post_slug',
        'name',
        'email',
        'comment',
        'createdAt',
        'updatedAt',
    ];
}

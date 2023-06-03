<?php

namespace App\Models;

use  CodeIgniter\Model;

class  TestimonialModel extends Model
{
    protected $table = 'testimonial';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'user_type',
        'user_picture',
        'testimonial',
    ];
}

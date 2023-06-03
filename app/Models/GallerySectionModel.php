<?php

namespace App\Models;

use CodeIgniter\Model;

class GallerySectionModel extends Model
{
    protected $table = "gallery_sections";
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'thumbnail',
        'title',
        'date',
       
    ];
}

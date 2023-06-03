<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryVideoModel extends Model
{
    protected $table = "gallery_video";
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'gallery_section_id',
        'youtube_video_id',
    ];
}

<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;
    protected $guraded = ['id'];
    protected $casts = [
        'status' => PostStatus::class,
    ];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'posts_categories', 'post_id', 'category_id');
    }
}
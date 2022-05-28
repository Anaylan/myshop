<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'slug', 'description', 'imagePrev_path', 'image_path', 'user_id'];

    // We have post and it belongsTo a user

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // We have a post and it belongsTo a category 

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

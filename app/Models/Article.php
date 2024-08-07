<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $fillable = ['title', 'article_img', 'slug', 'body', 'user_id', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function bookmarked_users()
    {
        return $this->belongsToMany(User::class, 'user_article');
    }
}

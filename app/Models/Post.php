<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use Commentable;

    protected $fillable = [
        'title', 'slug', 'image', 'description', 'user_id', 'category_id', 'published_at',
    ];

    protected $dates = [
        'published_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}

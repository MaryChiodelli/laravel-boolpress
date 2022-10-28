<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
        'cover'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    static public function getUniqueSlugFrom($title) {
        $base_slug = Str::slug($title);
        $slug = $base_slug;
        
        $existing_post = Post::where('slug', $slug)->first();
        $count = 1;

        while ($existing_post) {
            $slug = $base_slug . '-' . $count;
            $existing_post = Post::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }

    public function getUpdateDateAttribute()
    {
        return $this->updated_at->format('d/m/Y');
    }

    protected $appends = ['update_date'];
}

<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'image',
        'caption',
        'title',
        'likes',
        'slug',
        'category_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

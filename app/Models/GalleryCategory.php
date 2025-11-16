<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'description'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category_id', 'id');
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

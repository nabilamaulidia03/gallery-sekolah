<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comment',
        'gallery_id',
        'created_at'
    ];

    protected $appends = ['formatted_date'];

    public function getFormattedDateAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)
            ->translatedFormat('d F Y, H:i'); // contoh: 10 November 2025, 16:03
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}

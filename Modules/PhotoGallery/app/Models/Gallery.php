<?php

namespace Modules\PhotoGallery\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    use Sluggable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'info',
        'weight',
        'active'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

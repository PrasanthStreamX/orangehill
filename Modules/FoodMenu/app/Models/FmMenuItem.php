<?php

namespace Modules\FoodMenu\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FmMenuItem extends Model
{

    use SoftDeletes, Sluggable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','slug','price','thumb', 'cover_photo', 'info','description','weight','active','available','note'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
}

<?php

namespace Modules\FoodMenu\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class FmMenuType extends Model
{
    use Sluggable;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','slug','info','description','note','thumb','cover_photo','weight','active'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
 
}

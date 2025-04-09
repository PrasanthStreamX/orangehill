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
    protected $fillable = ['title','slug', 'type', 'price_full', 'price_half', 'min_pack', 'info','description','note','thumb','cover_photo','weight','in_menu','active'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
 
}

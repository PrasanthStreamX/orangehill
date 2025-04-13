<?php

namespace Modules\FoodMenu\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    
    public function related_model(): HasMany
    {
        return $this->hasMany(FmMenuTypeHasModel::class, 'id','type_id');
    }
}

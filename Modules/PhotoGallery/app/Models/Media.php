<?php

namespace Modules\PhotoGallery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\FoodMenu\Models\FmMenuCategory;
use Modules\FoodMenu\Models\FmMenuItem;
use Modules\FoodMenu\Models\FmMenuType;

class Media extends Model
{
    protected $table = 'photo_gallery_medias';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'menu_item_id',
        'menu_type_id',
        'menu_category_id',
        'title',
        'info',
        'media_type',
        'media',
        'weight',
        'active'
    ];

    
    public function menu_type(): HasOne
    {
        return $this->hasOne(FmMenuType::class, 'id', 'menu_type_id');
    }

    public function menu_category(): HasOne
    {
        return $this->hasOne(FmMenuCategory::class, 'id', 'menu_category_id');
    }

    public function menu_item(): HasOne
    {
        return $this->hasOne(FmMenuItem::class, 'id', 'menu_item_id');
    }
}

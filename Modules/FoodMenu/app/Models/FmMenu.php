<?php

namespace Modules\FoodMenu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\FoodMenu\Database\Factories\FmMenuFactory;

class FmMenu extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['type_id','category_id','item_id', 'weight', 'active','published'];

    public function type(): HasOne
    {
        return $this->hasOne(FmMenuType::class, 'id', 'type_id');
    }

    public function category(): HasOne
    {
        return $this->hasOne(FmMenuCategory::class, 'id', 'category_id');
    }

    public function item(): HasOne
    {
        return $this->hasOne(FmMenuItem::class, 'id', 'item_id');
    }
}
